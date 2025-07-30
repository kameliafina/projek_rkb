<?php

use App\Models\SensorModel;

function sensorBintang($teks)
{
    $sensorModel = new SensorModel();
    $kataTerlarang = $sensorModel->getSemuaKata();

    foreach ($kataTerlarang as $row) {
        $kata = $row['kata'];
        $panjang = mb_strlen($kata);

        if ($panjang > 1) {
            $hurufAwal = mb_substr($kata, 0, 1);
            $sensor = $hurufAwal . str_repeat('*', $panjang - 1);
        } else {
            $sensor = '*'; // Jika kata cuma 1 huruf
        }

        $teks = preg_replace('/\b' . preg_quote($kata, '/') . '\b/i', $sensor, $teks);
    }

    return $teks;
}
