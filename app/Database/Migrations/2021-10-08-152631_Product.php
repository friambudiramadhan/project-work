<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
            ],
            'product_description' => [
                'type' => 'VARCHAR',
                'constraint' => 3000,
            ],
            'product_price' => [
                'type' => 'INT',
            ],
        ]);

        $this->forge->addKey('product_id', true);
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
