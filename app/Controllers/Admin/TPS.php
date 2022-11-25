<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TpsModel;
use Config\Services;

class TPS extends BaseController
{
    protected $session;
    protected $tpsModel;

    function __construct()
    {
        $this->session = Services::session();
        $this->tpsModel = new TpsModel();
    }

    public function create()
    {
        return $this->render("admin/tps/create");
    }
    
    public function save() {
        $rules = [
            'kd_tps' => [
                'rules' => 'required|is_unique[tps.kd_tps]',
                'errors' => [
                    'required' => 'Kolom {field} wajib diisi',
                    'is_unique' => 'Terdeteksi duplikasi. Kolom ini bersifat unik, isi harus berbeda dari yang lain.'
                ]
            ],
            'tps_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} wajib diisi'
                ]
            ],
            'tps_loc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} wajib diisi'
                ]
            ],
        ];

        $method = $this->request->getMethod();
        if ($method == "post") {
            if ($this->validate($rules)) {
                $kd_tps     = $this->request->getPost("kd_tps");
                $tps_name   = $this->request->getPost("tps_name");
                $tps_loc    = $this->request->getPost("tps_loc");

                $data       = $this->tpsModel->create_data($kd_tps, $tps_name, $tps_loc);
                $this->tpsModel->save($data);
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
}
