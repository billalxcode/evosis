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
        'nisn', 'nama_lengkap', 'kelas', 'password', 'jenis_kelamin', 'aktif'
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

    public function processImport($data) {
        $data_batch = [];
        $idx = 0;
        foreach ($data as $row) {
            if (count($row) != 5) {
                return false;
            }

            if ($idx != 0) {
                if ($row[0] == NULL || $row[1] == NULL || $row[2] == NULL || $row[3] == NULL || $row[4] == NULL) {
                    continue;
                }
                $data_real = [
                    'nisn' => $row[0],
                    'nama_lengkap' => $row[1],
                    'kelas' => $row[2],
                    'jenis_kelamin' => $row[3],
                    'password' => password_hash($row[4], PASSWORD_BCRYPT),
                    'aktif' => 1
                ];
                array_push($data_batch, $data_real);
            }
            $idx++;
        }

        $this->insertBatch($data_batch);
        return ['status' => true, 'max_index' => $idx];
    }
}
