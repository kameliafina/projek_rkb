<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlAdmin extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('berita');
        
        // Grouping by month and year
        $query = $builder
        ->select("MONTH(created_at) AS bulan, YEAR(created_at) AS tahun, COUNT(*) AS total")
        ->groupBy("YEAR(created_at), MONTH(created_at)")
        ->orderBy("tahun", "ASC")
        ->orderBy("bulan", "ASC")
        ->get();

        $data['laporan'] = $query->getResultArray();
        
        return view('main/laporan', $data);
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

    public function laporanBulanan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('berita');

    // Grouping by month and year
    $query = $builder
        ->select("MONTH(created_at) AS bulan, YEAR(created_at) AS tahun, COUNT(*) AS total")
        ->groupBy("YEAR(created_at), MONTH(created_at)")
        ->orderBy("tahun", "ASC")
        ->orderBy("bulan", "ASC")
        ->get();

    $data['laporan'] = $query->getResultArray();

    return view('main/laporan', $data);
}

}
