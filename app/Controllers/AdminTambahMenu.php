<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class AdminTambahMenu extends BaseController
{
    public function index()
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        return view('/admin/tambah-menu', ['title' => 'Tambah Menu']);
    }

    public function tambahMenu()
    {
        $menu = new ProductModel;

        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move('images/menu', $imageName);

        $data = [
            'image' => $imageName,
            'product_name' => $this->request->getVar('nama-menu'),
            'product_description' => $this->request->getVar('deskripsi'),
            'product_price' => $this->request->getVar('harga')
        ];

        $menu->save($data);

        return redirect()->to('/Admin/daftarMenu');
    }
}
