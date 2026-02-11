<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CaptchaCtrl extends BaseController
{
    public function index()
    {
        // 1. Generate kode
    $code = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 6);
    session()->set('captcha_code', $code);

    // 2. Buat gambar
    $image = imagecreatetruecolor(120, 40);
    $background = imagecolorallocate($image, 225, 225, 225);
    $textColor = imagecolorallocate($image, 0, 0, 0);
    
    imagefilledrectangle($image, 0, 0, 120, 40, $background);
    
    for ($i=0; $i<5; $i++) {
        imagesetthickness($image, rand(1, 3));
        $lineColor = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
        imageline($image, rand(0, 120), rand(0, 40), rand(0, 120), rand(0, 40), $lineColor);
    }

    imagestring($image, 5, 30, 12, $code, $textColor);

    // 3. Tangkap output gambar ke buffer (CARA PRO CI4)
    ob_start();
    imagepng($image);
    $imageData = ob_get_clean();
    imagedestroy($image);

    // 4. Kirim sebagai response
    return $this->response
                ->setHeader('Content-Type', 'image/png')
                ->setBody($imageData);
    }

    public function verify()
{
    $userInput = $this->request->getPost('captcha_input');
    $sessionCode = session()->get('captcha_code');

    if ($userInput === $sessionCode) {
        // Berhasil! Lanjutkan proses login
        echo "Captcha Benar!";
    } else {
        // Gagal!
        return redirect()->back()->with('error', 'Kode Captcha salah!');
    }
}           
}
