<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'email', 'password', 'role'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    private function generate_token() {
        $bytes = random_bytes(10);
        $encrypted = base64_encode($bytes);
        $hash = hash('sha256', $encrypted);
        $token = 'TOKEN::' . $hash;
        return $token;
    }

    public function verify_user($email, $password) {
        helper('form');
        $data = $this->select('id,password,role,refresh_token')->where('email', $email)->first();

        if ($data) {
            if (password_verify($password, $data['password'])) {
                $token = $this->generate_token();
                
                $builder = $this->builder('users');
                $builder->set('refresh_token', $token);
                $builder->where('id', $data['id']);
                $builder->update();
                
                session()->setFlashdata('success', 'Login berhasil');
                session()->set('token', $token);

                return true;
            } else {
                session()->setFlashdata('error', 'Username atau Password tidak sesuai. Silahkan login ulang');
                return false;
            }
        } else {
            session()->setFlashdata('error', 'Username atau Password tidak sesuai. Silahkan login ulang');
            return false;
        }
    }

    public function verify_token($token) {
        $data = $this->select('*')->where('refresh_token', $token)->first();
        return $data;
    }
}
