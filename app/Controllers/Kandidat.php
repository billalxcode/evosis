<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kandidat extends BaseController
{
    public function index()
    {
        $this->loadModel();
        $this->context['title'] = "Kelola Kandidat";
        $this->context['data'] = $this->kandidatModel->findAll();
        $this->renderView('admin/kandidat/view');
    }

    public function create() {
        helper("form");
        $this->context['title'] = "Tambah Kandidat";
        $this->renderView('admin/kandidat/create');
    }

    public function save() {
        $rules = [
            'avatar' => [
                'rules' => 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png,image/webp]|max_size[avatar,2048]',
                'errors' => [
                    'is_image' => 'File tidak didukung',
                    'mime_in' => 'File tidak didukung',
                    'max_size' => 'Maksimal upload hanya 2Mb'
                ],
                'nisn_ketua' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Silahkan masukan/pilih NISN ketua'
                    ]
                ],
                'nisn_wakil' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Silahkan masukan/pilih NISN ketua'
                    ]
                ],
                'organisasi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Silahkan masukan organisasi'
                    ]
                ],
            ]
        ];

        if ($this->validate($rules)) {
            $avatar_files = $this->request->getFile("avatar");
            if (!$avatar_files->hasMoved()) {
                $filename = $avatar_files->getRandomName();
                $avatar_files->move("upload/image", $filename);
                
                $ketua_nisn = $this->request->getPost("nisn_ketua");
                $wakil_nisn = $this->request->getPost("nisn_wakil");
                $organisasi = $this->request->getPost("organisasi");
                $visi = $this->request->getPost("visi");
                $misi = $this->request->getPost("misi");

                $siswaData = $this->siswaModel->where("nisn", $ketua_nisn)->first();
                $siswaData2 = $this->siswaModel->where("nisn", $wakil_nisn)->first();
                if (!$siswaData) {
                    $this->session->setFlashdata("error", "NISN ketua tidak ditemukan");
                    return redirect()->back();
                }
                if (!$siswaData2) {
                    $this->session->setFlashdata("error", "NISN wakil tidak ditemukan");
                    return redirect()->back();
                }

                $data_post = [
                    'ketuaid' => $siswaData['id'],
                    'wakilid' => $siswaData2['id'],
                    'organisasi' => $organisasi,
                    'norut' => $this->kandidatModel->getNorut(),
                    'visi' => $visi,
                    'misi' => $misi,
                    'foto' => 'upload/image/' . $filename
                ]; 
                $this->kandidatModel->save($data_post);
                $this->session->setFlashdata("success", 'Berhasil menambahkan data');
                return redirect()->back();
            }
        } else {
            $this->session->setFlashdata("errors", $this->validator->getErrors());
            return redirect()->back();
        }
    }

    public function trash() {
        $conn = \Config\Database::connect();
        $table = $conn->table("kandidat");
        $table->emptyTable();
        $this->session->setFlashdata('success', 'Berhasil mereset data, data tidak bisa dikembalikan karena sudah dihapus secara permanen.');
        return redirect()->to('admin/kandidat');
    }
}
