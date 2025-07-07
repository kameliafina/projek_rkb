<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlFina extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);

        $data = ['user' => $userData];
        
        return view('fina/index', $data);
    }
}
