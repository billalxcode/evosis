<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    protected $pegawaiModel;

    function __construct()
    {
        $this->pegawaiModel = new \App\Models\PegawaiModel();
    }

    public function get_all() {
        $data = $this->pegawaiModel->find_all_data();
        return $this->response->setJSON([
            'success' => true,
            'data' => $data
        ]);
    }
}
