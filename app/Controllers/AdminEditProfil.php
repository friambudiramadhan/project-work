<?php

namespace App\Controllers;

use App\Models\AccountsModel;

class AdminEditProfil extends BaseController
{
    public function index()
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $admin = new AccountsModel;
        $id = $_SESSION['admin'];

        $data = [
            'title' => 'Edit Profil',
            'admin' => $admin->getUser($id)
        ];

        return view('/admin/edit-profil', $data);
    }

    public function editAdmin($id)
    {
        if (empty($_SESSION['logedinadmin']) && empty($_SESSION['logedinsadmin'])) {
            return redirect()->to('/');
        }

        $admin = new AccountsModel;

        $email = $this->request->getVar('email');
        $accounts_detail = $admin->where('email', $email)->first();
        $accounts_admin = $admin->where('id', $id)->first();

        if ($accounts_detail != null) {

            // cek apakah email sudah terdaftar
            if ($accounts_detail['email'] == $accounts_admin['email']) {
                $inputt = [
                    'name' => $this->request->getVar('nama-lengkap'),
                    'email' => $this->request->getVar('email'),
                    'phone' => $this->request->getVar('nomor-telpon')
                ];

                $admin->update($id, $inputt);


                return redirect()->to('/Admin/profil');
            }

            $_SESSION['editadminnotnull'] = 'Email sudah terdaftar';

            return redirect()->back()->withInput();
        }

        $input = [
            'name' => $this->request->getVar('nama-lengkap'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('nomor-telpon')
        ];




        $admin->update($id, $input);

        return redirect()->to('/Admin/profil');
    }
}
