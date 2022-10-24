<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $table = $this->db->table('users');

        $table->insert([
            'email' => "admin@admin.com",
            'password' => password_hash('admin1234', PASSWORD_BCRYPT),
            'role' => 'admin'
        ]);
    }
}
