<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlPetinggi extends BaseController
{
    public function index()
    {
        return view('petinggi/index');
    }
}
