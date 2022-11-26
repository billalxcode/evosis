<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class Pemilih extends BaseController
{
    protected $pemilihModel;
    
    function __construct()
    {
        $this->pemilihModel = new \App\Models\PemilihModel();
    }
    
    public function get_all() {
        $data = $this->pemilihModel->get_data_permanent();
        
        return $this->response->setJSON([
            'success' => true,
            'data' => $data
        ]);
    }

    public function get_preview()
    {
        $data = $this->pemilihModel->get_data_not_permanent();
        
        return $this->response->setJSON([
            'success' => true,
            'data' => $data
        ]);
    }
}
