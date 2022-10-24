<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->set_context('title', 'EVOSIS - Dashboard');
        return $this->render('admin/dashboard');
    }
}
