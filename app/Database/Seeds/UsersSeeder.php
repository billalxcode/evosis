<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => password_hash('123456', PASSWORD_BCRYPT)
        ];

        $this->db->table('users')->insert($data);
    }
}
