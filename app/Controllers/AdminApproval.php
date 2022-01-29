<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;

class AdminApproval extends BaseController
{
    public function index()
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $orders = new OrdersModel;

        $input = $this->request->getVar('search');
        if ($input) {
            $order = $orders->approval($input)->orderBy('order_id', 'DESC')->findAll();
        } else {
            $order = $orders->where('status', 'Menunggu Verifikasi Admin')->orderBy('order_id', 'DESC')->findAll();
        }

        $data = [
            'title' => 'Approval',
            'orders' => $order,
            'input' => $input
        ];
        return view('admin/approval', $data);
    }

    // halaman upload bukti pembayaran
    public function buktiPembayaran($id)
    {
        // cek session login
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $data = new OrdersModel;
        // $check = $data->where('order_id', $id)->first()['user_id'];

        $data = [
            'title' => 'Upload Bukti Pembayaran',
            'order' => $data->getOrderAdmin($id)
        ];

        return view('/admin/bukti-pembayaran', $data);
    }

    // halaman approval
    public function halamanApprove($id)
    {
        // cek session login
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $data = new OrdersModel;
        $status = $data->where('order_id', $id)->findColumn('status')[0];

        if ($status != 'Menunggu Verifikasi Admin') {
            return redirect()->to('/Admin/approval');
        }

        $data = [
            'title' => 'Upload Bukti Pembayaran',
            'order' => $data->getOrderAdmin($id)
        ];

        return view('/admin/terima-pesanan', $data);
    }

    // halaman penolakan
    public function halamanTolak($id)
    {
        // cek session login
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $data = new OrdersModel;
        $status = $data->where('order_id', $id)->findColumn('status')[0];

        if ($status != 'Menunggu Verifikasi Admin') {
            return redirect()->to('/Admin/approval');
        }

        $data = [
            'title' => 'Upload Bukti Pembayaran',
            'order' => $data->getOrderAdmin($id)
        ];

        return view('/admin/tolak-pesanan', $data);
    }

    // approve pesanan dengan method post dari halaman approval
    public function approve($id)
    {
        $order = new OrdersModel;

        $input = [
            'status' => 'Sedang Dikirim',
            'tracking_number' => $this->request->getVar('resi')
        ];

        $order->update($id, $input);

        return redirect()->to('/Admin/approval');
    }

    // tolak pesanan dengan method post dari halaman penolakan
    public function tolak($id)
    {
        $order = new OrdersModel;

        $input = [
            'status' => 'Pesanan Gagal',
            'admin_message' => $this->request->getVar('alasan')
        ];

        $order->update($id, $input);

        return redirect()->to('/Admin/approval');
    }
}
