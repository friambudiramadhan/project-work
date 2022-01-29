<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountsModel;

class LupaPassword extends BaseController
{
    function index()
    {
        if (!empty($_SESSION['notempty'])) {
            unset($_SESSION['notempty']);
        }

        return view('/auth/lupa-password', ['title' => 'Lupa Password']);
    }

    function lupaPassword()
    {
        $data = new AccountsModel;

        // data input dari form html
        $email = $this->request->getVar('email');
        $rc = $this->request->getVar('recovery-code');
        $password = $this->request->getVar('password-baru');
        $confirmPassword = $this->request->getVar('password-baru-konfirmasi');

        $account_detail = $data->where('email', $email)->first();


        // data yang ingin di input ke database
        $var = [
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        // data recovery code dengan email
        $validate = $data->where('email', $email)->findColumn('recovery_code');
        $id = $data->where('email', $email)->findColumn('id');

        // konfirmasi apakah password baru cocok
        if ($password != $confirmPassword) {

            $_SESSION['password'] = 'password';

            return redirect()->back()->withInput();
        }

        // konfirmasi apakah recovery code cocok dengan email
        if ($validate[0] != $rc) {

            $_SESSION['rc'] = 'rc';

            return redirect()->back()->withInput();
        }

        // cek level akun admin
        if ($account_detail['level'] == 'admin') {

            $data->update($id, $var);

            $_SESSION['logedinadmin'] = 'Anda sudah login';
            $_SESSION['admin'] = $account_detail['id'];

            unset($_SESSION['password']);
            unset($_SESSION['rc']);

            return redirect()->to('/Admin/home');
        }


        $data->update($id, $var);

        unset($_SESSION['password']);
        unset($_SESSION['rc']);

        $_SESSION['user'] = $account_detail['id'];
        // $_SESSION['logedin'] = 'anda sudah masuk';

        return redirect()->to('/home');
    }
}
