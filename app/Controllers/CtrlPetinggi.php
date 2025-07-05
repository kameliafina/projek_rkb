<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlPetinggi extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('berita');
        
        
        $query = $builder
        ->select("MONTH(created_at) AS bulan, YEAR(created_at) AS tahun, COUNT(*) AS total")
        ->groupBy("YEAR(created_at), MONTH(created_at)")
        ->orderBy("tahun", "ASC")
        ->orderBy("bulan", "ASC")
        ->get();

        $data['laporan'] = $query->getResultArray();

        return view('super/laporan', $data);
    }

    public function user()
    {
        $user = new UserModel();
        $ambil = $user->whereIn('level', ['admin', 'petinggi'])->findAll();

        $data = [
            'datauser' => $ambil
        ];
        return view('super/user', $data);
    }

    public function tambah_user()
    {
        helper('form');

        return view('super/tambah_user');
    }

    public function simpan_user()
    {
        $user = new UserModel();

        $validationRules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
            'password' => 'required|min_length[3]|max_length[255]',
            'level' => 'required|in_list[admin,petinggi,pendengar]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getPost('level')
        ];

        $user->insert($data);

        session()->setFlashdata('success', 'User berhasil ditambahkan');
        return redirect()->to('/user');
    }

    public function delete_user($id)
    {
        $user = new UserModel();
        $user->delete($id);

        session()->setFlashdata('success', 'User berhasil dihapus');
        return redirect()->to('/user');
    }

    public function edit_user($id)
    {
        $user = new UserModel();
        $data['user'] = $user->find($id);

        if (!$data['user']) {
            throw new ModelException('User not found');
        }

        return view('super/edit_user', $data);
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
        return redirect()->to('/user');
    }
}
