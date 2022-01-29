<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CartModel;

class UserMenu extends BaseController

{
    public function index()
    {
        if (empty($_SESSION['logedin'])) {
            return redirect()->to('/');
        }

        $product = new ProductModel;
        $data = [
            "title" => "Menu",
            "products" => $product->getProduct()
        ];

        return view('/user/menu', $data);
    }

    // tambah pesanan ke keranjang
    public function tambah()
    {
        $cart = new CartModel;
        $data = $this->request->getVar();
        $input = explode('-', $data['input']);
        $id = $_SESSION['user'];

        // data yang didapat dari input
        $var = [
            'product_id' => $input[0],
            'user_id' => $input[1],
            'product_grind' => $input[2],
            'product_name' => $input[3],
            'image' => $input[4],
            'product_price' => $input[5],
            'quantity' => 1

        ];

        $check = $cart->where('user_id', $id)->where('product_grind', $var['product_grind'])->where('product_id', $var['product_id'])->findAll();

        if ($check != null) {

            // cek apakah ada session berhasil tambah produk ke keranjang
            if (!empty($_SESSION['productsuccess'])) {
                unset($_SESSION['productsuccess']);
            }

            $_SESSION['productnotnull'] = 'Produk yang anda pilih sudah ada di keranjang belanja anda.';

            return redirect()->back();
        }


        $cart->save($var);

        if (!empty($_SESSION['productnotnull'])) {
            unset($_SESSION['productnotnull']);
        }

        $_SESSION['productsuccess'] = 'Produk berhasil ditambahkan ke keranjang belanja anda.';

        return redirect()->to('/menu');
    }
}
