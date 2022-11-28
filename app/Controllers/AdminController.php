<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use Config\Services;

class AdminController extends BaseController
{
    protected $session;
    protected $adminModel;

    function __construct()
    {
        $this->session = Services::session();
        $this->adminModel = new AdminModel();
    }
    public function index()
    {
        //
    }

    public function login() {
        return $this->render('auth/login');
    }

    public function process_login() {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost("password");

        $adminData = $this->adminModel->where('email', $email)->first();
        if ($adminData) {
            if (password_verify($password, $adminData['password'])) {
                $token = $this->adminModel->update_token($adminData['id'], false);
                
                $this->session->set('remember_token', $token);
                return redirect()->to('/dashboard');
            } else {
                $this->session->setFlashdata('error', 'The provided credentials do not match our records.');
                return redirect()->back()->withInput();
            }
        } else {
            $this->session->setFlashdata('error', 'The provided credentials do not match our records.');
            return redirect()->back()->withInput();
        }
    }
}
