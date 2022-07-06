<?php

namespace App\Models;

use CodeIgniter\Model;

class KandidatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kandidat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ketuaid', 'wakilid', 'organisasi', 'norut', 'visi', 'misi', 'foto'
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

    public function getNorut() {
        $data = $this->select("norut")->findAll();
        if (count($data) >= 1) {
            $norut_last = intval($data[count($data)-1]['norut']);
            $norut = $norut_last + 1;
            return $norut;
        } else {
            return 1;
        }
    }
}
