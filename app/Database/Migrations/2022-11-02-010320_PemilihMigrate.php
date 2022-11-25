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
            'kd_user' => [
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
            'is_permanent' => [
                'type' => 'ENUM("true", "false")',
                'default' => 'false',
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ],
            'deleted_at' => [
                'type' => 'DATETIME'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('pemilih');
    }

    public function down()
    {
        $this->forge->dropTable('pemilih');
    }
}
