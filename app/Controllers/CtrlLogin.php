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
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        $secretKey = '6Lf4tgIsAAAAAPKKyBGobxe47Kidxpm64u9SeO-_';
        $userIP = $this->request->getIPAddress();

        // Verifikasi ke server Google
        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$userIP}"
        );
        $status = json_decode($response, true);

        if (!$status['success']) {
            session()->setFlashdata('pesan', 'Silakan centang reCAPTCHA terlebih dahulu.');
            return redirect()->to('/login');
        }

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
                    case 'pendengar':
                        return redirect()->to('/halamanindex');
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

    public function registerAction()
{
    $userModel = new \App\Models\UserModel();

    $name = $this->request->getPost('name');
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $password_confirm = $this->request->getPost('password_confirm');

    // Validasi sederhana
    if ($password !== $password_confirm) {
        return redirect()->back()->with('register_error', 'Password tidak cocok.');
    }

    // Cek apakah username sudah digunakan
    if ($userModel->where('username', $username)->first()) {
        return redirect()->back()->with('register_error', 'Username sudah digunakan.');
    }

    // Simpan user
    $userModel->save([
        'name' => $name,
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'level' => 'pendengar' // default level
    ]);

    return redirect()->to('/halaman_depan/index')->with('pesan', 'Akun berhasil dibuat, silakan login.');
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

