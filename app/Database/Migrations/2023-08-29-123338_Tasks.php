<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tasks extends Migration
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
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'status' => [
                'type' => 'int',
                'constraint' => 1,
                'default' => 0,
            ],

        ]);


        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('tasks', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tasks');
    }
}