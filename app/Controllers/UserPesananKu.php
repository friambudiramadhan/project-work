<?php

namespace App\Controllers;

use App\Models\OrdersModel;

class UserPesananKu extends BaseController
{
    // halaman utama pesananku
    public function index()
    {
        if (empty($_SESSION['logedin'])) {
            return redirect()->to('/');
        }

        // session gagal tambah produk ke keranjang
        if (!empty($_SESSION['productnotnull'])) {
            unset($_SESSION['productnotnull']);
        }

        // session berhasil tambah produk ke keranjang
        if (!empty($_SESSION['productsuccess'])) {
            unset($_SESSION['productsuccess']);
        }

        $orders = new OrdersModel;

        $input = $this->request->getVar('search');
        if ($input) {
            $orders = $orders->search($input)->orderBy('order_id', 'DESC')->getOrders($_SESSION['user']);
        } else {
            $orders = $orders->orderBy('order_id', 'DESC')->getOrders($_SESSION['user']);
        }

        $data = [
            'title' => 'PesananKu',
            'orders' => $orders,
            'input' => $input
        ];

        return view('/user/pesananku', $data);
    }

    // halaman upload bukti pembayaran
    public function uploadBuktiPembayaran($id)
    {
        // cek session login
        if (empty($_SESSION['logedin']) && empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }


        $data = new OrdersModel;
        $check = $data->where('order_id', $id)->first()['user_id'];

        // cek session dengan pesanan apakah cocok
        if ($check != $_SESSION['user']) {
            return redirect()->to('/pesananku');
        }

        $data = [
            'title' => 'Upload Bukti Pembayaran',
            'order' => $data->getOrder($id, $_SESSION['user'])
        ];

        return view('/user/upload-bukti-pembayaran', $data);
    }

    // halaman lihat bukti pembayaran
    public function buktiPembayaran($id)
    {
        if (empty($_SESSION['logedin'])) {
            return redirect()->to('/');
        }

        $data = new OrdersModel;

        $data = [
            'title' => 'Upload Bukti Pembayaran',
            'order' => $data->getOrder($id, $_SESSION['user'])
        ];

        return view('/user/bukti-pembayaran', $data);
    }

    // upload bukti pembayaran dari method post
    public function upload($id)
    {
        $order = new OrdersModel;

        $image = $this->request->getFile('image_payment');
        $imageName = $image->getRandomName();
        $image->move('images/BuktiPembayaran', $imageName);

        $input = [
            'image_payment' => $imageName,
            'status' => 'Menunggu Verifikasi Admin'
        ];

        $order->update($id, $input);

        return redirect()->to('/pesananku');
    }

    // method selesai pesanan
    public function selesai($id)
    {
        // cek session login
        if (empty($_SESSION['logedin']) && empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $data = new OrdersModel;
        $check = $data->where('order_id', $id)->first()['user_id'];

        // cek session dengan pesanan apakah cocok
        if ($check != $_SESSION['user']) {
            return redirect()->to('/pesananku');
        }

        $data->update($id, ['status' => 'Selesai']);

        return redirect()->to('/pesananku');
    }

    // halaman lihat pesan dari admin
    public function pesanDariAdmin($id)
    {
        // cek session login
        if (empty($_SESSION['logedin']) && empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $object = new OrdersModel;
        $check = $object->where('order_id', $id)->first()['user_id'];

        // cek session dengan pesanan apakah cocok
        if ($check != $_SESSION['user']) {
            return redirect()->to('/pesananku');
        }

        $check = $object->getOrder($id, $_SESSION['user']);

        if ($check['admin_message'] == null) {
            dd("berhasil");
        }

        $data = [
            'title' => 'Pesan Dari Admin',
            'order' => $check
        ];

        return view('/user/pesan-dari-admin', $data);
    }
}
