<?php

namespace App\Validation;

class CaptchaRules
{
    public function check_captcha(string $str, string &$error = null): bool
    {
        $session = session();
        $code = $session->get('captcha_code');

        if ($str === $code) {
            return true;
        }

        $error = "Kode captcha yang Anda masukkan salah.";
        return false;
    }
}