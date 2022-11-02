<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemilihMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
                'null' => false,
                'unsigned' => true
            ],
            'kd_users' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false
            ],
            'kd_pemilih' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => false
            ],
            'tps_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false
            ],
            ''
        ]);
    }

    public function down()
    {
        //
    }
}
