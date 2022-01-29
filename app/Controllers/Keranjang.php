<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;

class Keranjang extends BaseController
{


    // halaman pesananku
    public function index()
    {

        if (empty($_SESSION['user'])) {
            return redirect()->to('/');
        }

        // cek apakah session gagal tambah produk ke cart masih ada
        if (!empty($_SESSION['productnotnull'])) {
            unset($_SESSION['productnotnull']);
        }

        // cek apakah session berhasil tambah produk masih ada
        if (!empty($_SESSION['productsuccess'])) {
            unset($_SESSION['productsuccess']);
        }


        $cart = new CartModel;
        $id = $_SESSION['user'];

        $data = [
            'title' => 'Keranjang',
            'carts' => $cart->getCart($id),
        ];

        return view('user/keranjang', $data);
    }

    // hapus menu dari keranjang
    public function delete($id)
    {
        if (empty($_SESSION['user'])) {
            return redirect()->to('/');
        }

        $cart = new CartModel;

        $cart->where('cart_id', $id)->delete();

        return redirect()->to('/keranjang');
    }

    // update kuantitas menu
    public function update($id, $product_id)
    {
        $product = new CartModel;

        // instansi object untuk mendapatkan harga awal dari sebuah produk
        $product2 = new ProductModel;
        $product_data = $product2->where('product_id', $product_id)->first();
        $base_price = $product_data['product_price'];

        $value = $this->request->getVar('quantity');
        $total_price = $base_price * $value;

        $data = [
            'quantity' => $value,
            'product_price' => $total_price
        ];

        $product->update($id, $data);

        return redirect()->to('/keranjang');
    }

    // halaman pesananku
    public function checkout()
    {
        $data = ['title' => 'Checkout'];
        return view('user/checkout', $data);
    }
}
