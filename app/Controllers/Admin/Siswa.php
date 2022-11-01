<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Services;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $session;

    function __construct()
    {
        $this->siswaModel = new \App\Models\SiswaModel();
        $this->session = Services::session();
    }

    public function create()
    {
        return $this->render('admin/siswa/create');
    }

    public function save() {
        helper('form');
        $rules = [
            'nis' => [
                'rules' => 'required|is_unique[siswa.nis]',
                'errors' => [
                    'required' => 'Kolom {field} wajib diisi',
                    'is_unique' => 'Kolom {field} adalah kolom unik, mohon untuk tidak duplikat kolom {field}'
                ]
                ],
                'fullname' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom {field} wajib diisi'
                    ]
                ],
                'password' => [
                    'rules' => 'min_length[4]|max_length[25]',
                    'errors' => [
                        'min_length' => 'Password minimal 4 karakter',
                        'max_length' => 'Password maksimal 25 karakter'
                    ]
                ]
        ];
        $method = $this->request->getMethod();
        if ($method == "post") {
            if ($this->validate($rules)) {
                $nis        = $this->request->getPost('nis');
                $fullname   = $this->request->getPost('fullname');
                $class_id   = $this->request->getPost('class_id');
                $password   = $this->request->getPost("password");

                if ($password == null || $password == "") {
                    $password = 'abcd12345';
                }

                $data = $this->siswaModel->create_data($nis, $fullname, $class_id, $password);
                $this->siswaModel->save($data);
                $this->session->setFlashdata('success', 'Data berhasil disimpan, silahkan masukan data yang lainnya.');
                return redirect()->back();
            } else {
                $this->session->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            } 
        } else {
            $this->session->setFlashdata('error', "Akses ditolak");
            return redirect()->back()->withInput();
        }
    }
}
