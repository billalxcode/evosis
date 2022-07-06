<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Settings extends BaseController
{
    public function index()
    {
        $this->context['title'] = "Kelola Pengaturan";

        return $this->renderView("admin/settings/general");
    }
}
