<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Statement extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('statement');
    }

    public function down()
    {
        $this->forge->dropTable('statement');
    }
}
