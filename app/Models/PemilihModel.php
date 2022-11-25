<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilihModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pemilih';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_user', 'kd_pemilih', 'tps_id'
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

    private function rand_kd_pemilih() {
        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $res = "";
        for ($i = 0; $i <= 2; $i++) {
            $randx = random_int(0, strlen($alpha) - 1);
            $res .= $alpha[$randx];
        }

        for ($i = 0; $i <= 4; $i++) {
            $randx = random_int(0, strlen($num) - 1);
            $res .= $num[$randx];
        }

        return $res;
    }

    public function automation_process(string $sortby) {
        $siswaModel = new \App\Models\SiswaModel();
        $tpsModel  = new \App\Models\TpsModel();
        
        $selector = $siswaModel->select('id as kd_user');
        if ($sortby != "null") {
            $selector->orderBy($sortby);
        }
        $dataSiswa = $selector->findAll();
        $dataTps = $tpsModel->findAll();

        $totalSiswa = $siswaModel->get_total_id();
        $totalTps = $tpsModel->get_total_id();
        $pembagian = intval($totalSiswa) / intval($totalTps);

        $counter = 0;
        $sample = [];
        
        foreach ($dataTps as $tps) {
            for ($i = 0; $i <= $pembagian; $i++) {
                if ($counter >= $totalSiswa) {
                    break;
                }
                $siswa = $dataSiswa[$counter];
                $siswa['tps_id'] = $tps['id'];
                $siswa['kd_pemilih'] = $this->rand_kd_pemilih();
                $siswa['is_permanent'] = 'false';

                $sample[] = $siswa;
                $counter += 1;
            }
        }

        return $sample;
    }

    public function get_data_not_permanent() {
        $siswaModel = new \App\Models\SiswaModel();
        $tpsModel = new \App\Models\TpsModel();

        $pemilihResults = [];
        $pemilihData = $this->select('*')->findAll();
        foreach ($pemilihData as $pemilih) {
            $siswaData = $siswaModel->select('nis,fullname')->where('id', $pemilih['kd_user'])->first();
            $tpsData = $tpsModel->select('kd_tps,tps_name')->where('id', $pemilih['tps_id']);

            $pemilihResults[] = [
                $siswaData,
                $tpsData
            ];
        }

        dd($pemilihResults);
    }
}
