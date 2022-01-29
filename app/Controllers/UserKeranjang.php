<?php

namespace App\Controllers;

class UserKeranjang extends BaseController
{
    public function index()
    {
        if (empty($_SESSION['logedin'])) {
            return redirect()->to('/');
        }

        return view('/user/keranjang', ['title' => 'Keranjang']);
    }
}
