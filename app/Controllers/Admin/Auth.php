<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use Config\Services;

class Auth extends BaseController
{
    protected $session;
    protected $usersModel;

    function __construct()
    {
        $this->session = Services::session();
        $this->usersModel = new UsersModel();
    }

    public function login()
    {
        return $this->render('admin/auth/login');
    }

    public function verify() {
        $method = $this->request->getMethod();
        
        if ($method == "post") {
            $email      = $this->request->getPost("email");
            $password   = $this->request->getPost("password");

            $logged = $this->usersModel->verify_user($email, $password);
            if ($logged) {
                return redirect()->to('admin');
            } else {
                return redirect()->back()->withInput();
            }
        } else {
            return redirect()->to('403');
        }
    }
}
