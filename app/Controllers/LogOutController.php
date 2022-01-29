<?php

namespace App\Controllers;

class LogOutController extends BaseController
{
    public function logout()
    {
        session_destroy();
        return redirect()->to('/');
    }
}
