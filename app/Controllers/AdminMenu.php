<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class AdminMenu extends BaseController
{

    // =====================================================Menu Admin=========================================================

    public function index()
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $product = new ProductModel();
        $data = [
            "title" => "Daftar Menu",
            "products" => $product->getProduct()
        ];
        return view('admin/daftar-menu', $data);
    }

    public function editMenu($id)
    {

        if (empty($_SESSION['logedinadmin'])) {
            return redirect()->to('/');
        }

        $product = new ProductModel;

        $data = [
            "title" => "Edit Menu",
            "product" => $product->getProduct($id)
        ];

        return view('admin/edit-menu', $data);
    }

    public function postEditMenu($id)
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $product = new ProductModel;

        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();

        $data = [
            'product_name' => $this->request->getVar('nama-menu'),
            'product_description' => $this->request->getVar('deskripsi'),
            'product_price' => $this->request->getVar('harga'),
            'image' => $imageName
        ];

        $data2 = [
            'product_name' => $this->request->getVar('nama-menu'),
            'product_description' => $this->request->getVar('deskripsi'),
            'product_price' => $this->request->getVar('harga'),
        ];

        // jika image kosong
        if ($image->getName() == '') {
            $product->update($id, $data2);
            return redirect()->to('/Admin/daftarMenu');
        }

        $image->move('images/menu', $imageName);

        $product->update($id, $data);

        return redirect()->to('/Admin/daftarMenu');
    }

    public function hapusMenu($id)
    {

        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $product = new ProductModel;
        $product->deleteProduct($id);

        return redirect()->to('/Admin/daftarMenu');
    }
}
