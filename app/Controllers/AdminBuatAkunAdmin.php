<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountsModel;

class AdminBuatAkunAdmin extends BaseController
{
    public function index()
    {
        if (empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $data = ['title' => 'Buat Akun Admin'];
        return view('auth/buat-akun-admin', $data);
    }

    // method untuk buat akun admin
    public function buatAkunAdmin()
    {
        $model = new AccountsModel;

        $email = $this->request->getVar('email');
        $nama = $this->request->getVar('nama-lengkap');

        $accounts_detail = $model->where('email', $email)->first();

        if ($accounts_detail != null) {

            $_SESSION['notempty'] = 'Email sudah terdaftar';
            return redirect()->back()->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $rc = random_int(111111111111, 999999999999);

        $model->save([
            'name' => $nama,
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('nomor-telpon'),
            'password' => $password,
            'recovery_code' => $rc,
            'level' => 'admin'

        ]);

        echo "<script>alert('Recovery Code Admin $nama Adalah : $rc\\nKode Tersebut Diperlukan Apabila Anda Ingin Merubah Password Anda \\nDan Sangat Penting Jika Anda Lupa Password Anda, Simpan Dengan Baik Recovery Code Anda.')</script>";

        if (!empty($_SESSION['notempty'])) {
            unset($_SESSION['notempty']);
        }

        return view('/admin/home', $data = ['title' => 'Home']);
        
    }
}
