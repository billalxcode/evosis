<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KandidatMigrate extends Migration
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
            'ketuaid' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'wakilid' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'organisasi' => [
                'type' => 'TEXT'
            ],
            'norut' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'visi' => [
                'type' => 'TEXT'
            ],
            'misi' => [
                'type' => 'TEXT'
            ],
            'foto' => [
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

        $this->forge->addKey('id', true);
        $this->forge->createTable('kandidat');
    }

    public function down()
    {
        $this->forge->dropTable('kandidat');
    }
}
