<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cart extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cart_id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
            ],
            'product_id' => [
                'type' => 'INT',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 1000,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => 1000
            ],
            'product_grind' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'product_price' => [
                'type' => 'INT',
            ],
            'quantity' => [
                'type' => 'INT',
            ],
        ]);

        $this->forge->addKey('cart_id', true);
        $this->forge->addForeignKey('user_id', 'accounts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'product', 'product_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('cart');
    }

    public function down()
    {
        $this->forge->dropTable('cart');
    }
}
