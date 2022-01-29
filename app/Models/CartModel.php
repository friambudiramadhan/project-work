<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['user_id', 'product_id', 'image', 'product_name', 'product_grind', 'product_price', 'quantity'];

    public function getCart($id)
    {
        return $this->where(['user_id' => $id])->findAll();
    }

    public function getCartProduct($id)
    {
        return $this->where('cart_id', $id)->first();
    }
}
