<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Suara extends BaseController
{
    public function index()
    {
        helper("form");
        $this->loadModel();
        $this->context['title'] = "Kelola Suara";

        $this->renderView('admin/suara/view');
    }

    public function trash() {
        $conn = \Config\Database::connect();
        $table = $conn->table("suara");
        $table->emptyTable();
        $this->session->setFlashdata('success', 'Berhasil mereset data, data tidak bisa dikembalikan karena sudah dihapus secara permanen.');
        return redirect()->to('admin/suara');
    }
}
