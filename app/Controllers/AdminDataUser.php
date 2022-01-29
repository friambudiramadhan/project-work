<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountsModel;

class AdminDataUser extends BaseController
{
    public function index()
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        if (!empty($_SESSION['edituseremailnotnull'])) {
            unset($_SESSION['edituseremailnotnull']);
        }

        $accounts = new AccountsModel;

        $input = $this->request->getVar('search');
        if ($input) {
            $accounts = $accounts->search($input)->orderBy('id', 'DESC')->findAll();
        } else {
            $accounts = $accounts->orderBy('id', 'DESC')->findAll();
        }

        $data = [
            'title' => 'Data User',
            'users' => $accounts,
            'input' => $input
        ];
        return view('admin/data-user', $data);
    }

    public function hapusUser($id)
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $user = new AccountsModel;
        $user->deleteUser($id);


        return redirect()->to('/Admin/dataUser');
    }

    public function halamanEditUser($id)
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $user = new AccountsModel;
        $data = [
            'title' => 'Edit Data User',
            'user' => $user->getUser($id)
        ];

        return view('/admin/edit-profil-user', $data);
    }

    public function editUser($id)
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $user = new AccountsModel;
        $email = $this->request->getVar('email');
        $accounts_detail = $user->where('email', $email)->first();
        $accounts_user = $user->where('id', $id)->first();

        $input = [
            'name' => $this->request->getVar('nama-lengkap'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('nomor-telpon')
        ];


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


                return redirect()->to('/Admin/dataUser');
            }

            $_SESSION['edituseremailnotnull'] = 'Email sudah terdaftar';
            return redirect()->back()->withInput();
        }

        $user->update($id, $input);

        if (!empty($_SESSION['edituseremailnotnull'])) {
            unset($_SESSION['edituseremailnotnull']);
        }

        return redirect()->to('/Admin/dataUser');
    }
}
