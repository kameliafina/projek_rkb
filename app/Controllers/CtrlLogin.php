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
        $userInputCaptcha = $this->request->getPost('captcha_input');
        $sessionCaptcha = session()->get('captcha_code');

    // 2. Verifikasi CAPTCHA (Gantiin logika reCAPTCHA Google)
        if ($userInputCaptcha === null || $userInputCaptcha !== $sessionCaptcha) {
            session()->setFlashdata('pesan', 'Kode CAPTCHA salah atau belum diisi.');
            return redirect()->to('/login')->withInput();
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

                session()->setFlashdata('login_sukses', $cek['name']);
                
                switch($cek['level']){
                    case 'admin':
                        return redirect()->to('/news-center');
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
        'level' => 'pendengar' // default 
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

    public function auth()
{
    $rules = [
        'username'      => 'required',
        'password'      => 'required',
        'captcha_input' => 'required|check_captcha' // Pakai rule kustom kita!
    ];

    if (!$this->validate($rules)) {
        // Jika gagal, kembali ke form dengan pesan error
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Jika lolos validasi
    return "Login Berhasil dan Captcha Cocok!";
}
}

