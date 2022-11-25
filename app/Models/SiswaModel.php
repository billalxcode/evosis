<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nis', 'fullname', 'class_id', 'token', 'password'
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

    public function verify_id($id) {
        $data = $this->select('id')->where('id', $id)->first();
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    
    public function create_data($nis, $fullname, $class_id, $password) {
        return [
            'nis' => $nis,
            'fullname' => $fullname,
            'class_id' => $class_id,
            'password' => $password
        ];
    }

    public function find_all_siswa() {
        $data = $this->select('id,nis,fullname,class_id,password,created_at')->orderBy('fullname')->findAll();
        // Kode untuk mencari kelas berdasarkan id

        // End
        return $data;
    }
    
    public function get_total_id() {
        $selector = $this->select('id')->countAllResults();
        return $selector;
    }
}
