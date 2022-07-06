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
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'nama_lengkap' => [
                'type' => 'TEXT'
            ],
            'kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 5
            ],
            'password' => [
                'type' => 'TEXT'
            ],
            'jenis_kelamin' => [
                'type' => "VARCHAR",
                'constraint' => 2
            ],
            'aktif' => [
                'type' => 'VARCHAR',
                'constraint' => 2
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
        $this->forge->createTable("siswa");
    }

    public function down()
    {
        $this->forge->dropTable('siswa');
    }
}
