<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlAdmin extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $data['user'] = $user->find($id);

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

public function update_user($id)
    {
        $user = new UserModel();

        $validationRules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username,id,' . $id . ']',
            'password' => 'permit_empty|min_length[3]|max_length[255]',
            'level' => 'required|in_list[admin,petinggi,pendengar]'
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'level' => $this->request->getPost('level')
        ];
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $user->update($id, $data);
        session()->setFlashdata('success', 'User berhasil diperbarui');
        return redirect()->to('/admin');
    }

}
