<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AccountsModel;

class UserBuatAkun extends BaseController
{
    public function index()
    {

        if (!empty($_SESSION['rc'])) {
            unset($_SESSION['rc']);
        }

        $data = ['title' => 'Buat Akun'];
        return view('auth/buat-akun', $data);
    }

    public function buatAkun()
    {

        $data = new AccountsModel;

        $email = $this->request->getVar('email');

        $accounts_detail = $data->where('email', $email)->first();

        if ($accounts_detail != null) {

            $_SESSION['notempty'] = 'Email sudah terdaftar';
            return redirect()->back()->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $rc = random_int(111111111111, 999999999999);

        $data->save([
            'name' => $this->request->getVar('nama-lengkap'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('nomor-telpon'),
            'password' => $password,
            'recovery_code' => $rc,
            'level' => 'user'

        ]);

        echo "<script>alert('Recovery Code Anda Adalah : $rc\\nKode Tersebut Diperlukan Apabila Anda Ingin Merubah Password Anda \\nDan Sangat Penting Jika Anda Lupa Password Anda, Simpan Dengan Baik Recovery Code Anda.')</script>";

        if (!empty($_SESSION['notempty'])) {
            unset($_SESSION['notempty']);
        }

        $id = $data->where('email', $email)->first();

        $_SESSION['user'] = $id['id'];
        $_SESSION['logedin'] = 'Anda Sudah Masuk';

        return view('/user/home', $data = ['title' => 'Home']);
    }
}
