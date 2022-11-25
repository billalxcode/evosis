<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SecurityMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 25,
                'auto_increment' => true,
                'null' => false,
                'unsigned' => false
            ],
            'password_algorithm' => [
                'type' => "ENUM('base64', 'md5', 'bcrypt', 'sha1', 'sha256', 'openssl')",
                'null' => false
            ],
            'active_live' => [
                'type' => "ENUM('true','false')",
                'null' => false,
            ],
            'network_encrypt' => [
                'type' => "ENUM('true','false')",
                'null' => false,
            ],
            'network_password_algorithm' => [
                'type' => "ENUM('openssl', 'evosis_network_encrypt')",
                'null' => false
            ]
        ]);
    }

    public function down()
    {
        //
    }
}
