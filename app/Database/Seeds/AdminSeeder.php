<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'admin@admin.com',
            'name' => 'Voting App',
            'role' => 'admin',
            'avatar' => '',
            'password' => password_hash('1234', PASSWORD_BCRYPT)
        ];

        $table = $this->db->table('admin');
        $table->insert($data);
    }
}
