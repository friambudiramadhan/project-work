<?php

namespace App\Controllers;


class Halaman extends BaseController
{
    public function index()
    {
        if (!empty($_SESSION['logedin'])) {
            return redirect()->to('/home');
        }

        if (!empty($_SESSION['logedinadmin'])) {
            return redirect()->to('/Admin/home');
        }

        if (!empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/Admin/home');
        }

        if (!empty($_SESSION['notempty'])) {
            unset($_SESSION['notempty']);
        }

        if (!empty($_SESSION['rc'])) {
            unset($_SESSION['rc']);
        }

        // session gagal tambah produk ke keranjang
        if (!empty($_SESSION['productnotnull'])) {
            unset($_SESSION['productnotnull']);
        }

        // session berhasil tambah produk ke keranjang
        if (!empty($_SESSION['productsuccess'])) {
            unset($_SESSION['productsuccess']);
        }

        $data = ['title' => 'Masuk'];
        return view('auth/login', $data);
    }
}
