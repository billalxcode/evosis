<?php

namespace App\Models;

use CodeIgniter\Model;

class SuaraModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'suara';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'siswaid', 'kandidatid'
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

    public function getLast() {
        $suaraData = $this->select('siswaid,kandidatid')->findAll();
        $results = [];

        if (count($suaraData) >= 7) {
            $result_slice = array_slice($suaraData, (count($suaraData) - 7));
        } else {
            $result_slice = $suaraData;
        }

        foreach ($result_slice as $row) {
            $siswaModel = new SiswaModel();
            $kandidatModel = new KandidatModel();

            $siswaData = $siswaModel->select('nama_lengkap')->where('id', $row['siswaid'])->first();
            $kandidatData = $kandidatModel->select('norut')->where('id', $row['kandidatid'])->first();
            array_push($results, [
                'siswa' => $siswaData['nama_lengkap'],
                'norut' => $kandidatData['norut']
            ]);
        }
        return $results;
    }
}
