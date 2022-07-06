<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SettingsMigrate extends Migration
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
            'penyelenggara' => [
                'type' => 'TEXT'
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'kota' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'alamat' => [
                'type' => 'TEXT'
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
        $this->forge->createTable('settings');
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
