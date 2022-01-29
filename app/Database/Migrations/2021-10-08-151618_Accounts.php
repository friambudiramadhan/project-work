<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Accounts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'recovery_code' => [
                'type' => 'VARCHAR',
                'constraint' => 12,
            ],
            'level' => [
                'type' => 'VARCHAR',
                'constraint' => 12,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('accounts');
    }

    public function down()
    {
        $this->forge->dropTable('accounts');
    }
}
