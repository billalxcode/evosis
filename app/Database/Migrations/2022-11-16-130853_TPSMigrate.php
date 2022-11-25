<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TPSMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
                'null' => false,
            ],
            'kd_tps' => [
                'type' => 'VARCHAR',
                'constraint' => 25
            ],
            'tps_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'tps_loc' => [
                'type' => 'VARCHAR',
                'constraint' => 255
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
        $this->forge->addKey('id');
        $this->forge->createTable('tps');
    }

    public function down()
    {
        $this->forge->dropTable('tps');
    }
}
