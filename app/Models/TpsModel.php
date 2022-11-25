<?php

namespace App\Models;

use CodeIgniter\Model;

class TpsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tps';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_tps', 'tps_name', 'tps_loc'
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

    public function create_data($kd_tps, $tps_name, $tps_loc) {
        return [
            'kd_tps' => $kd_tps,
            'tps_name' => $tps_name,
            'tps_loc' => $tps_loc
        ];
    }

    public function get_all_tps() {
        $data = $this->select('id,kd_tps,tps_name')->orderBy('kd_tps')->findAll();
        return $data;
    }

    public function get_total_id() {
        $selector = $this->select('id')->countAllResults();
        return $selector;
    }
}
