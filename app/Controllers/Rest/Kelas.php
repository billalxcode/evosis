<?php

namespace App\Controllers\Rest;

use App\Controllers\BaseController;

class Kelas extends BaseController
{
    public function getAll()
    {
        $data = $this->kelasModel->findAll();
        $this->context['error'] = false;
        $this->context['data'] = $data;
        return $this->response->setJSON($this->context);
    }

    public function search() {
        $kelasid = $this->request->getPost("kelasid");
        $filter = $this->request->getPost("filter");
        if (isset($kelasid) && isset($filter)) {
            $kelasData = $this->kelasModel->where("id", $kelasid);
            if (strtolower($filter) == "all") {
                return $this->response->setJSON([
                    'error' => false,
                    'data' => $kelasData->findAll()
                ]);
            } elseif (strtolower($filter) == "first") {
                return $this->response->setJSON([
                    'error' => false,
                    'data' => $kelasData->first()
                ]);
            } else {
                return $this->response->setJSON([
                    'error' => true
                ]);
            }
        } else {
            return $this->response->setJSON([
                'error' => true,
                'message' => 'Anda tidak dapat mengakses halaman ini.'
            ]);
        }
    }
}
