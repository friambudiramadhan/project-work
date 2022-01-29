<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['image', 'product_name', 'product_description', 'product_price'];

    public function getProduct($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['product_id' => $id])->first();
    }

    public function deleteProduct($id)
    {
        return $this->where(['product_id' => $id])->delete();
    }
}
