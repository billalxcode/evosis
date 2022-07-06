<?php

namespace App\Controllers\Rest;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
    public function getAll() {
        $this->context['error'] = false;
        $this->context['data'] = $this->siswaModel->findAll();
        return $this->response->setJSON($this->context);
    }

    public function search() {
        $siswaid = $this->request->getPost("id");
        $filter = $this->request->getPost("filter");
        $this->siswaModel->select("id,nama_lengkap,jenis_kelamin,nisn,kelas");
        $siswaData = $this->siswaModel->where('id', $siswaid);
        $this->context['error'] = false;
        if (strtolower($filter) && $filter == "first") {
            $this->context['data'] = $siswaData->first();
        } else {
            $this->context['data'] = $siswaData->findAll();
        }

        return $this->response->setJSON($this->context);
    }
}
