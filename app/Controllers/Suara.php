<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Suara extends BaseController
{
    public function index()
    {
        $this->loadModel();
        $this->context['title'] = "Kelola Suara";

        $this->renderView('admin/suara/view');
        
    }
}
