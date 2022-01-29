<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['user_id', 'product_id', 'status', 'date', 'user_email', 'image', 'product_name', 'product_grind', 'quantity', 'tracking_number', 'recepient_name', 'recepient_phone', 'address', 'city', 'zip_code', 'total_price', 'image_payment', 'admin_message'];

    public function getOrders($user_id)
    {
        return $this->where('user_id', $user_id)->findAll();
    }

    public function getOrder($id, $user_id)
    {
        return $this->where('order_id', $id)->where('user_id', $user_id)->first();
    }

    public function getOrderAdmin($id)
    {
        return $this->where('order_id', $id)->first();
    }

    public function approval($input)
    {
        return $this->table('orders')->like('date', $input)->orLike('order_id', $input)->orLike('user_email', $input)->orLike('recepient_name', $input)->orLike('recepient_phone', $input);
    }

    // search order
    public function search($input)
    {
        return $this->table('orders')->like('date', $input)->orLike('order_id', $input)->orLike('user_email', $input)->orLike('recepient_name', $input)->orLike('recepient_phone', $input)->orLike('status', $input);
    }
}
