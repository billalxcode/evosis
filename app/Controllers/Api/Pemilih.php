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
    
    public function get_preview()
    {
        $data = $this->pemilihModel->get_data_not_permanent();
        dd($data);
    }
}
