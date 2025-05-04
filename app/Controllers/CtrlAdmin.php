<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlAdmin extends BaseController
{
    public function index()
    {
        return view('main/layout');
    }

    public function tambah_berita()
    {
        return view('admin/tambahberita');
    }

    public function iklan()
    {
        return view('admin/iklan');
    }

    public function petinggi()
    {
        return view('main/layout2');
    }
}
