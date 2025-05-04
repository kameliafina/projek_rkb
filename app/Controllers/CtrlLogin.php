<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlLogin extends BaseController
{
    public function index()
    {
        return view('login/login');
    }

    public function LoginAction()
    {
        // //untuk mengecek apakah datanya masuk saat login
        // $data = [
        //     'username' => $this->request->getPost('username'),
        //     'password' => $this->request->getPost('password'),
        // ];
        // dd($data);

        $session = session();
        $username = $this->request->getPost('username'); //mengambil rewues dari username
        $password = $this->request->getPost('password'); //mengambil rewues dari username
        $userCek = new UserModel();
        $cek = $userCek->where('username', $username)->first(); //mencocokan antara username dan password
        
        if($cek){
            //jika username valid
            $cekpassword = password_verify($password, $cek['password']); //mengecek apakah password dari user dan database sama
            if($cekpassword){
                //jika passwordnya sama
                $ses_data = [ //mengambil session data
                    'id' => $cek['id'],
                    'username' => $cek['username'],
                    'name' => $cek['name'],
                    'level' => $cek['level'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data); //mengeset session data
                switch($cek['level']){
                    case 'admin':
                        return redirect()->to('/admin');
                        break;
                    case 'petinggi':
                        return redirect()->to('/petinggi');
                        break;
                    default:
                        session()->setFlashdata('pesan', 'yahh akunmu belum terdaftar nih, hubungi admin ya'); //menampilkan pesan error
                        return redirect()->to('/login');
                } //untuk mengecek level nya
            }else {
                //jika passwordnya tidak sama
                session()->setFlashdata('pesan', 'yahh password kamu salah nih'); //menampilkan pesan error
                return redirect()->to('/login');
            }
        }else{
            //jika username tidak valid
            session()->setFlashdata('pesan', 'yahh username kamu salah nih'); //menampilkan pesan error
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function hash()
    {
        return view('login/hash');
    }
}

