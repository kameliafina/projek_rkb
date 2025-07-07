<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlJadwal extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);
        $db = \Config\Database::connect();

        $jadwal = new JadwalModel();
        $ambil = $jadwal->findAll();

        $data = [
            'datajadwal' => $ambil,
            'user' => $userData
        ];

        return view('jadwal/index', $data);
    }

    public function datajadwal()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);

        $jadwal = new JadwalModel();
        $ambil = $jadwal->findAll();

        $data = [
            'datajadwal' => $ambil,
            'user' => $userData
        ];
        return view('jadwal/index', $data);
    }

    public function tambah()
    {
        $userModel = new UserModel();
        $id = session()->get('id');
        $data['user'] = $userModel->find($id);

        helper('form');
        $jadwal = new JadwalModel();
        $data['jadwal'] = $jadwal->findAll();

        return view('jadwal/tambah', $data);
    }

    public function simpan()
    {
        $jadwal = new JadwalModel();

        // Validation rules
        $validationRules = [
            'jam' => 'required',
            'judul' => 'required',
            'pembawa' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // Redirect back with validation errors and old input
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Insert data into the database
        $jadwal->insert([
            'jam' => $this->request->getVar('jam'),
            'judul' => $this->request->getVar('judul'),
            'pembawa' => $this->request->getVar('pembawa')
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        date_default_timezone_set('Asia/Jakarta');

        // Redirect to the data list page
        return redirect()->to(site_url('/datajadwal'));
    }

    public function edit($id)
    {
        $user = new UserModel();
        $id_user = session()->get('id');
        $userData = $user->find($id_user);

        $jadwal = new JadwalModel();
        $ambil = $jadwal->find($id);

        $data = [
            'datajadwal' => $ambil,
            'user' => $userData
        ];

        return view('jadwal/edit', $data);
    }

    public function update($id)
    {
        $jadwal = new JadwalModel();

        // Validation rules
        $validationRules = [
            'jam' => 'required',
            'judul' => 'required',
            'pembawa' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // Redirect back with validation errors and old input
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data in the database
        $jadwal->update($id, [
            'jam' => $this->request->getVar('jam'),
            'judul' => $this->request->getVar('judul'),
            'pembawa' => $this->request->getVar('pembawa')
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil diupdate');

        // Redirect to the data list page
        return redirect()->to(site_url('/datajadwal'));
    }

    public function delete($id)
    {
        $jadwal = new JadwalModel();
        $jadwal->delete($id);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        // Redirect to the data list page
        return redirect()->to(site_url('/datajadwal'));
    }
}
