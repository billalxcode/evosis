<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Siswa extends BaseController
{
    public function index()
    {
        helper("form");
        $this->loadModel();
        $this->context['title'] = "Kelola Siswa";
        $this->context['siswa'] = $this->siswaModel->findAll();
        $this->renderView('admin/siswa/view');
    }

    public function create()
    {
        $this->context['title'] = "Tambah Siswa";

        $this->renderView('admin/siswa/create');
    }

    public function save()
    {
        $rules = [
            'nisn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "NISN Wajib Diisi"
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nama Wajib Diisi"
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Silahkan pilih kelas"
                ]
            ],
            'kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Silahkan pilih jenis kelamin"
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[25]',
                'errors' => [
                    'required' => "Kata sandi Wajib Diisi",
                    'min_length' => 'Kata sandi minimal 4 karakter',
                    'max_length' => 'Kata sandi maksimal 25 karakter'
                ]
            ],

        ];
        if ($this->validate($rules)) {
            $name = $this->request->getPost("nama");
            $nisn = $this->request->getPost("nisn");
            $kelas = $this->request->getPost('kelas');
            $kelamin = $this->request->getPost("kelamin");
            $password = $this->request->getPost("password");
            $data_post = [
                "nisn" => $nisn,
                "nama_lengkap" => $name,
                "kelas" => $kelas,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'jenis_kelamin' => strtoupper($kelamin),
                'aktif' => 1,
            ];
            $this->siswaModel->save($data_post);
            $this->session->setFlashdata("success", "Data berhasil ditambahkan");
            return redirect()->back();
        } else {
            $this->session->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back();
        }
    }

    public function trash() {
        $conn = \Config\Database::connect();
        $table = $conn->table("siswa");
        $table->emptyTable();
        $this->session->setFlashdata('success', 'Berhasil mereset data, data tidak bisa dikembalikan karena sudah dihapus secara permanen.');
        return redirect()->to('admin/siswa');
    }

    public function importFile() {
        $this->context['title'] = "Import Siswa";

        $this->renderView('admin/siswa/import');
    }

    public function process() {
        $rules = [
            'filetype' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mohon pilih tipe file.'
                ]
            ],
            'userfile' => [
                'rules' => 'uploaded[userfile]|ext_in[userfile,csv,xls,xlsx,ods]|max_size[userfile,5120]',
                'errors' => [
                    'uploaded' => 'Mohon pilih file yang akan di import',
                    'ext_in' => 'File tidak didukung',
                    'max_size' => 'Ukuran maksimal file hanya 5Mb'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $filetype = $this->request->getPost("filetype");
            $documents = $this->request->getFile("userfile");
            if ($filetype == "xlsx") {
                $reader = new Xlsx();
                $spreadsheet = $reader->load($documents);
                $arr = $spreadsheet->getActiveSheet()->toArray();
                
                $status = $this->siswaModel->processImport($arr);
                if ($status == false) {
                    $this->session->setFlashdata('error', 'Maaf terjadi kesalahan pada saat import data, mohon cek ulang.');
                } else {
                    $this->session->setFlashdata('success', 'Berhasil menyimpan ' . $status['max_index'] . ' data');
                }
                return redirect()->back();
            } else {
                $this->session->setFlashdata('error', 'Maaf ektensi belum di dukung. Silahkan tunggu update selanjutnya');
                return redirect()->back();
            }
        } else {
            $this->session->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back();
        }
    }
}
