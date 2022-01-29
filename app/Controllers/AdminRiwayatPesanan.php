<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;

class AdminRiwayatPesanan extends BaseController
{
    public function index()
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $orders = new OrdersModel;
        $input = $this->request->getVar('search');
        if ($input) {
            $order = $orders->search($input)->orderBy('order_id', 'DESC')->findAll();
        } else {
            $order = $orders->orderBy('order_id', 'DESC')->findAll();
        }

        $data = [
            'title' => 'Riwayat Pesanan',
            'orders' => $order,
            'input' => $input
        ];

        return view('admin/riwayat-pesanan', $data);
    }
}
