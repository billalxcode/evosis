<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PemilihModel;
use App\Models\TpsModel;
use Config\Services;

class Pemilih extends BaseController
{
    protected $session;
    protected $pemilihModel;
    protected $tpsModel;

    function __construct()
    {
        $this->session = Services::session();
        $this->pemilihModel = new PemilihModel();
        $this->tpsModel = new TpsModel();
    }

    public function create()
    {
        $tpsData = $this->tpsModel->get_all_tps();

        $this->set_context('tps_data', $tpsData);

        return $this->render('admin/pemilih/create');
    }

    public function save() {
        helper('form');
        $method = $this->request->getMethod();
        if ($method == "post") {
            $tipe = $this->request->getPost('tipe');
            $pengurutan = $this->request->getPost("sort");

            if ($tipe == "otomatis") {
                $outputs = $this->pemilihModel->automation_process($pengurutan);
            }

            $this->pemilihModel->insertBatch($outputs);
            echo "Berhasil";
        } else {
            $this->session->setFlashdata('error', "Akses ditolak");
            return redirect()->back()->withInput();
        }
    }
}
