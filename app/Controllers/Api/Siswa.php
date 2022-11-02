<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
    protected $siswaModel;
    function __construct()
    {
        $this->siswaModel = new \App\Models\SiswaModel();
    }

    public function get_all()
    {
        $data = $this->siswaModel->find_all_siswa();
        return $this->response->setJSON([
            'success' => true,
            'data' => $data
        ]);
    }
}
