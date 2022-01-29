<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{

    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $allowedFields = ['admin_name', 'admin_email', 'phone', 'admin_password', 'admin_recovery_code', 'level'];

    public function getAdmin($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['admin_id' => $id])->first();
    }

    public function deleteUser($id)
    {
        return $this->where(['admin_id' => $id])->delete();
    }
}
