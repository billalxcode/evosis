<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class SiswaSeeder extends Seeder
{
    private function random_nis() {
        $alphanum = '1234567890';
        $res = "";
        for ($_ = 0; $_ <= 12; $_++) {
            $randx = random_int(0, strlen($alphanum) - 1);
            $res .= $alphanum[$randx];
        }
        return $res;
    }

    public function run()
    {
        $table = $this->db->table('siswa');
        $faker = Factory::create('id_ID');
        $batch = [];
        for ($i = 0; $i < 600; $i++) {
            $data = [
                'nis' => $this->random_nis(),
                'fullname' => $faker->name(),
                'class_id' => null,
                'password' => password_hash('abcd1234', PASSWORD_BCRYPT)
            ];
            $batch[] = $data;
        }
        $table->insertBatch($batch);
    }
}
