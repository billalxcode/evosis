<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Settings extends BaseController
{
    public function index()
    {
        helper("form");
        $this->context['title'] = "Kelola Pengaturan";
        $this->context['values'] = $this->settingsModel->first();
        $this->context['profiles'] = $this->usersModel->where('id', $this->context['usersData']['id'])->first();
        return $this->renderView("admin/settings/general");
    }

    public function save() {
        $type = $this->request->getPost('type');
        if ($type == 'general') {
            $penyelenggara = $this->request->getPost("penyelenggara");
            $provinsi = $this->request->getPost("provinsi");
            $kota = $this->request->getPost("kota");
            $kecamatan = $this->request->getPost("kecamatan");

            $penyelenggara = isset($penyelenggara) ? $penyelenggara : "";
            $provinsi = isset($provinsi) ? $provinsi : "";
            $kota = isset($kota) ? $kota : "";
            $kecamatan = isset($kecamatan) ? $kecamatan : "";

            $data_post = [
                'penyelenggara' => $penyelenggara,
                'provinsi' => $provinsi,
                'kota' => $kota,
                'kecamatan' => $kecamatan,
                'alamat' => ''
            ];
            $settingsData = $this->settingsModel->first();
            if ($settingsData) {
                $this->settingsModel->update($settingsData['id'], $data_post);
            } else {
                $this->settingsModel->save($data_post);
            }

            $this->session->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->back();
        } elseif ($type == 'profile') {
            $userData = $this->usersModel->where('id', $this->context['usersData']['id'])->first();

            $name = $this->request->getPost('name');
            $email = $this->request->getPost("email");
            $username = $this->request->getPost("username");
            $password = $this->request->getPost("password");

            $name = isset($name) ? $name : $userData['name'];
            $email = isset($email) ? $email : $userData['email'];
            $username = isset($username) ? $username : $userData['username'];
            $password = isset($password) ? password_hash($password, PASSWORD_BCRYPT) : $userData['password$password'];

            $data_post = [
                'name' => $name,
                'email' => $email,
                'username' => $username,
                'password' => $password
            ];
            
            $this->usersModel->update($userData['id'], $data_post);
            $this->session->setFlashdata('success', 'Berhasil menyimpan data.');
            return redirect()->back();
        }
    }
}
