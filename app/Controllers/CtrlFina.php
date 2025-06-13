<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlFina extends BaseController
{
    public function index()
    {
        return view('fina/index');
    }
}
