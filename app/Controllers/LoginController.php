<?php

namespace App\Controllers;

use App\Models\AccountsModel;

class LoginController extends BaseController
{
    public function login()
    {
        $account = new AccountsModel;

        // data yang di inputkan di form html
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $account_detail = $account->where('email', $email)->first();


        if ($account_detail == null) {

            if (!empty($_SESSION['pass'])) {
                unset($_SESSION['pass']);
            }

            $_SESSION['empty'] = 'Email tidak terdaftar';
            return redirect()->back()->withInput();
        }

        // apakah login berada di level user
        if ($account_detail['level'] == 'user') {

            if ($account_detail['password'] == password_verify($password, $account_detail['password'])) {

                if (!empty($_SESSION['pass'])) {
                    unset($_SESSION['pass']);
                }

                if (!empty($_SESSION['empty'])) {
                    unset($_SESSION['empty']);
                }

                $_SESSION['user'] = $account_detail['id'];

                return redirect()->to('/home');
            }

            if (!empty($_SESSION['empty'])) {
                unset($_SESSION['empty']);
            }

            $_SESSION['pass'] = 'password';

            return redirect()->back()->withInput();
        }

        // apakah login berada di level admin
        if ($account_detail['level'] == 'admin') {

            if ($account_detail['password'] == password_verify($password, $account_detail['password'])) {

                if (!empty($_SESSION['pass'])) {
                    unset($_SESSION['pass']);
                }

                if (!empty($_SESSION['empty'])) {
                    unset($_SESSION['empty']);
                }

                $_SESSION['admin'] = $account_detail['id'];
                $_SESSION['logedinadmin'] = 'anda sudah login';

                return redirect()->to('/Admin/home');
            }

            if (!empty($_SESSION['empty'])) {
                unset($_SESSION['empty']);
            }

            $_SESSION['pass'] = 'password';

            return redirect()->back()->withInput();
        }

        // apakah login berada di level super admin
        if ($account_detail['level'] == 's-admin') {

            if ($account_detail['password'] == password_verify($password, $account_detail['password'])) {

                if (!empty($_SESSION['pass'])) {
                    unset($_SESSION['pass']);
                }

                if (!empty($_SESSION['empty'])) {
                    unset($_SESSION['empty']);
                }

                $_SESSION['admin'] = $account_detail['id'];
                $_SESSION['logedinsadmin'] = 'anda sudah login';

                return redirect()->to('/Admin/home');
            }

            if (!empty($_SESSION['empty'])) {
                unset($_SESSION['empty']);
            }

            $_SESSION['pass'] = 'password';

            return redirect()->back()->withInput();
        }
    }
}
