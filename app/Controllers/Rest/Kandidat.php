<?php

namespace App\Controllers\Rest;

use App\Controllers\BaseController;

class Kandidat extends BaseController
{
    public function search()
    {
        $kandidat_id = $this->request->getPost("id");
        $filter = $this->request->getPost("filter");
        if (isset($filter) && $filter == "all") {
            $kandidatData = $this->kandidatModel->where("id", $kandidat_id)->findAll();
            $this->context['data'] = $kandidatData;
        } else {
            $kandidatData = $this->kandidatModel->where("id", $kandidat_id)->first();
            $this->context['data'] = $kandidatData;
        }
        $this->context['error'] = false;
        return $this->response->setJSON($this->context);
    }
}
