<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
            ],
            'product_id' => [
                'type' => 'INT',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'date' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'user_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 2555,
            ],
            'image_payment' => [
                'type' => 'VARCHAR',
                'constraint' => 2555,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'product_grind' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'quantity' => [
                'type' => 'INT',
            ],
            'tracking_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'recepient_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'recepient_phone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 2555,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'zip_code' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'total_price' => [
                'type' => 'INT',
            ],
            'admin_message' => [
                'type' => 'VARCHAR',
                'constraint' => 2555,
            ],
        ]);

        $this->forge->addKey('order_id', true);
        $this->forge->addForeignKey('user_id', 'accounts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'product', 'product_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
