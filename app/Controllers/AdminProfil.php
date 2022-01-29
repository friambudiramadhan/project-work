<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountsModel;

class AdminProfil extends BaseController
{
    public function index()
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        if (!empty($_SESSION['editadminnotnull'])) {

            unset($_SESSION['editadminnotnull']);
        }

        $id = $_SESSION['admin'];
        $admin = new AccountsModel;


        $data = [
            'title' => 'Profil',
            'admin' => $admin->getUser($id)
        ];
        return view('admin/profil', $data);
    }
}
