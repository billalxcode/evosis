<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiswaMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 25,
                'auto_increment' => true,
                'unsigned' => true,
                'null' => false
            ],
            'nis' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => false
            ],
            'fullname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'class_id' => [
                'type' => 'INT',
                'constraint' => 25,
                'null' => true
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'password' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('siswa');
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
