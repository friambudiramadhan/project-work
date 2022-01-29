<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminHome extends BaseController
{
    public function home()
    {

        if (empty($_SESSION['admin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $_SESSION['logedinadmin'] = 'Anda Sudah Masuk';

        return view('admin/home', ['title' => 'Home Admin']);
    }
}
