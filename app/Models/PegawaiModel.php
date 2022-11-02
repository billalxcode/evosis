<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nip', 'fullname', 'jabatan', 'type', 'token', 'password'
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
    protected $afterDelete    = [];
    protected $beforeDelete   = [];

    public function verify_id($id)
    {
        $data = $this->select('id')->where('id', $id)->first();
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function create_data($nip, $fullname, $type, $password)
    {
        return [
            'nip' => $nip,
            'fullname' => $fullname,
            'type' => $type,
            'password' => $password
        ];
    }

    public function find_all_data()
    {
        $data = $this->select('id,nip,fullname,type,password,created_at')->orderBy('fullname')->findAll();
        return $data;
    }

}
