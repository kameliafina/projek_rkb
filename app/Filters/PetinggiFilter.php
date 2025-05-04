<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PetinggiFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('logged_in')){
            session()->setFlashdata('pesan', 'yahh kamu belum login nih'); //menampilkan pesan error
            return redirect()->to('/login');
        } //jika belum login maka akan diarahkan ke halaman login

        if(session()->get('level') != 'petinggi'){
            session()->setFlashdata('pesan', 'gabole dilihat yh'); //menampilkan pesan error
            return redirect()->to('/petinggi');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}