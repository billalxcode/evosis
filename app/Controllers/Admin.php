<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $this->loadModel();
        $this->context['title'] = "Dashboard E-VoSis";
        return $this->renderView('admin/dashboard');
    }

    public function auth() {
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mohon isi nama pengguna'
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

        $this->context['title'] = "Masuk Admin";
        $method = $this->request->getMethod();
        if ($method == "post") {
            if ($this->validate($rules)) {
                $username = $this->request->getPost("username");
                $password = $this->request->getPost('password');
                $usersData = $this->usersModel->where('username', $username)->first();
                if ($usersData) {
                    if (password_verify($password, $usersData['password'])) {
                        session()->set([
                            'role' => 'admin',
                            'username' => $username
                        ]);
                        $this->session->setFlashdata('logged', "Login berhasil, mengarahkan ke dashboard");
                        return redirect()->to('admin/auth');
                    } else {
                        $this->session->setFlashdata("message", "Kata sandi salah");
                        return redirect()->to('admin/auth');
                    }
                } else {
                    $this->session->setFlashdata("message", "Maaf akun tidak ditemukan");
                    return redirect()->to('admin/auth');
                }
                die();
            } else {
                $this->session->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->to('admin/auth');
            }
        } else {
            return $this->renderView('admin/auth');
        }
    }

}
