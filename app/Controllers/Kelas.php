<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kelas extends BaseController
{
    public function index()
    {
        $this->context['title'] = "Kelola Kelas";
        $this->context['data'] = $this->kelasModel->findAll();
        $this->renderView('admin/kelas/view');
    }

    public function save() {
        if ($this->validate(['nama' => 'required'])) {
            $name = $this->request->getPost("nama");
            $this->kelasModel->save([
                'name' => $name
            ]);
            $this->session->setFlashdata("message", ['type' => 'success', 'text' => 'Berhasil menambahkan data']);
        } else {
            $this->session->setFlashdata("message", ['type' => 'danger', 'text' => 'Gagal menambahkan data']);
        }
    }
}
