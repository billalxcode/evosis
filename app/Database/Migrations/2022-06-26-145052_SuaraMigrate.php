<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuaraMigrate extends Migration
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
            'siswaid' => [
                'type' => 'INT',
                'constraint' => 5
            ],
            'kandidatid' => [
                'type' => 'INT',
                'constraint' => 5
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
        $this->forge->createTable('suara');
    }

    public function down()
    {
        $this->forge->dropTable('suara');
    }
}
