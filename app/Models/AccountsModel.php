<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountsModel extends Model
{

    protected $table = 'accounts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone', 'password', 'recovery_code', 'level'];

    // get user by id
    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    // delete user
    public function deleteUser($id)
    {
        return $this->where(['id' => $id])->delete();
    }

    // search user
    public function search($input)
    {
        return $this->table('accounts')->like('id', $input)->orLike('email', $input)->orLike('phone', $input)->orLike('name', $input);
    }
}
