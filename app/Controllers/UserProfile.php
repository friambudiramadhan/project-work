<?php

namespace App\Controllers;

use App\Models\AccountsModel;

class UserProfile extends BaseController
{
    public function index()
    {
        if (empty($_SESSION['logedin'])) {
            return redirect()->to('/');
        }

        if (!empty($_SESSION['productnotnull'])) {
            unset($_SESSION['productnotnull']);
        }

        $id = $_SESSION['user'];
        $user = new AccountsModel;
        $user = $user->getUser($id);

        $data = [
            'title' => 'Profil',
            'user' => $user
        ];

        return view('/user/profil', $data);
    }

    public function edit()
    {
        if (empty($_SESSION['logedin']) && empty($_SESSION['user'])) {
            return redirect()->to('/');
        }

        $id = $_SESSION['user'];
        $user = new AccountsModel;
        $user = $user->getUser($id);

        $data = [
            'title' => 'Profil',
            'user' => $user
        ];

        return view('/user/edit-profil', $data);
    }

    public function editProfil()
    {
        if (empty($_SESSION['logedin']) && empty($_SESSION['user'])) {
            return redirect()->to('/');
        }

        $id = $_SESSION['user'];
        $user = new AccountsModel;

        $email = $this->request->getVar('email');
        $accounts_detail = $user->where('email', $email)->first();
        $accounts_user = $user->where('id', $id)->first();

        if ($accounts_detail != null) {

            // cek apakah email sudah terdaftar
            if ($accounts_detail['email'] == $accounts_user['email']) {
                $inputt = [
                    'name' => $this->request->getVar('nama-lengkap'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('nomor-telpon')
                ];

                $user->update($id, $inputt);

                if (!empty($_SESSION['editusernotnull'])) {
                    unset($_SESSION['editusernotnull']);
                }


                return redirect()->to('/profil');
            }

            $_SESSION['editusernotnull'] = 'Email sudah terdaftar';

            return redirect()->back()->withInput();
        }

        $input = [
            'name' => $this->request->getVar('nama-lengkap'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('nomor-telpon')
        ];

        $user->update($id, $input);

        return redirect()->to('/profil');
    }
}
