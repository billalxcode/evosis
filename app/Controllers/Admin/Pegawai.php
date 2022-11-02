<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    protected $pegawaiModel;
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->pegawaiModel = new \App\Models\PegawaiModel();
    }

    public function index()
    {
        return $this->render('admin/pegawai/manage');
    }

    public function create() {
        return $this->render('admin/pegawai/create');
    }

    public function save() {
        helper('form');
        $rules = [
            'nip' => [
                'rules' => 'required|is_unique[pegawai.nip]',
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
                $nip        = $this->request->getPost('nip');
                $fullname   = $this->request->getPost('fullname');
                $acc_type   = $this->request->getPost('type');
                $password   = $this->request->getPost("password");

                if ($password == null || $password == "") {
                    $password = 'abcd12345';
                }

                $data = $this->pegawaiModel->create_data($nip, $fullname, $acc_type, $password);
                $this->pegawaiModel->save($data);
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

    public function trash()
    {
        $data_id = $this->request->getPost('id');
        $verifed = $this->pegawaiModel->verify_id($data_id);
        if ($verifed) {
            $this->pegawaiModel->delete($data_id);
            $this->session->setFlashdata('success', 'Data berhasil dihapus. Data tidak bisa dipulihkan');
        } else {
            $this->session->setFlashdata('error', 'Gagal menghapus data, mohon coba lagi.');
        }
        return redirect()->back();
    }
}
