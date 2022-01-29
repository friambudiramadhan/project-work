<?php

namespace App\Controllers;

class UserHome extends BaseController
{
    // method menampilkan halaman home user
    public function index()
    {
        if (empty($_SESSION['user'])) {
            return redirect()->to('/');
        }

        $_SESSION['logedin'] = 'Anda Sudah Masuk';

        return view('/user/home', ['title' => 'Home']);
    }
}
