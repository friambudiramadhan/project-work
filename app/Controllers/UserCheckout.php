<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\AccountsModel;
use App\Models\OrdersModel;
use CodeIgniter\I18n\Time;

class UserCheckout extends BaseController
{

    public function index($id)
    {

        if (empty($_SESSION['logedin'])) {
            return redirect()->to('/');
        }

        $cart = new CartModel;

        $check = $cart->where('cart_id', $id)->first()['user_id'];

        // cek session dengan pesanan apakah cocok
        if ($check != $_SESSION['user']) {
            return redirect()->to('/keranjang');
        }


        $time = Time::now('Asia/Jakarta', 'en_US')->format('d F Y');

        $data = [
            'title' => 'checkout',
            'product' => $cart->getCartProduct($id),
            'date' => $time
        ];



        return view('/user/checkout', $data);
    }

    public function checkout($datas)
    {
        if (empty($_SESSION['logedin'])) {
            return redirect()->to('/');
        }

        $account = new AccountsModel;
        $order = new OrdersModel;
        $cart = new CartModel;

        $datas = explode('-', $datas);
        $data = [
            'product_id' => $datas[0],
            'user_id' => $datas[1],
            'image' => $datas[2],
            'product_name' => $datas[3],
            'product_grind' => $datas[4],
            'product_price' => $datas[5],
            'quantity' => $datas[6],
            'date' => $datas[7],
            'cart_id' => $datas[8]
        ];

        $input = [
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
            'status' => 'Menunggu Pembayaran',
            'date' => $data['date'],
            'user_email' => $account->getUser($data['user_id'])['email'],
            'image' => $data['image'],
            'product_name' => $data['product_name'],
            'product_grind' => $data['product_grind'],
            'quantity' => $data['quantity'],
            'tracking_number' => '',
            'recepient_name' => $this->request->getVar('name'),
            'recepient_phone' => $this->request->getVar('phone'),
            'address' => $this->request->getVar('address'),
            'city' => $this->request->getVar('city'),
            'zip_code' => $this->request->getVar('post-code'),
            'total_price' => $data['product_price']
        ];


        $order->save($input);

        $cart->where('cart_id', $data['cart_id'])->delete();

        return redirect()->to('/pesananku');
    }
}
