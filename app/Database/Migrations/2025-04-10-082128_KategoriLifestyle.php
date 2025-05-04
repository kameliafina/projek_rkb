<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriLifestyle extends Migration
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
            'nama_kategori_l' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kategori_lifestyle');
    
    }

    public function down()
    {
        //
    }
}
