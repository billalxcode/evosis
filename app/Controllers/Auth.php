<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        helper("form");

        $rules = [
            'nisn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mohon isi nomor induk'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[24]',
                'errors' => [
                    'required' => 'Mohon isi kata sandi',
                    'min_length' => 'Kata sandi minimal 4 karakter',
                    'max_length' => 'Kata sandi maksimal 24 karakter'
                ]
            ]
        ];

        $this->context['title'] = "Masuk untuk vote";
        $method = $this->request->getMethod();
        if ($method == "post") {
            if ($this->validate($rules)) {
                $nisn = $this->request->getPost('nisn');
                $password = $this->request->getPost('password');
                $siswaData = $this->siswaModel->where("nisn", $nisn)->first();
                if ($siswaData) {
                    if (password_verify($password, $siswaData['password'])) {
                        session()->set([
                            'role' => 'siswa',
                            'nisn' => $siswaData['nisn']
                        ]);
                        return redirect()->to('/');
                    } else {
                        $this->session->setFlashdata("message", "Kata sandi salah");
                        return redirect()->to("auth");
                    }
                } else {
                    $this->session->setFlashdata("message", "Maaf akun tidak ditemukan");
                    return redirect()->to("auth");
                }
            } else {
                // die(var_dump($this->validator->getErrors()));
                $this->session->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->to('auth');
            }
        } else {
            $this->renderView('auth');
        }
    }

    public function logout()
    {
        $role = session()->get("role");
        if (isset($role) && $role == "admin") {
            session()->destroy();
            return redirect()->to("admin/auth");
        } else if (isset($role) && $role == "siswa") {
            session()->destroy();
            return redirect()->to('auth');
        } else {
            return redirect()->back();
        }
    }
}
