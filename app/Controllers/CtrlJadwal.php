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

    $validationRules = [
        'jam' => 'required',
        'judul' => 'required',
        'pembawa' => 'required',
        'foto' => [
            'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
            'errors' => [
                'is_image' => 'File harus berupa gambar.',
                'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.',
                'max_size' => 'Ukuran gambar maksimal 2MB.'
            ]
        ]
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Proses upload foto
    $foto = $this->request->getFile('foto');
    $namaFoto = null;

    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/jadwal/', $namaFoto);
    }

    // Simpan data
    $jadwal->insert([
        'jam' => $this->request->getVar('jam'),
        'judul' => $this->request->getVar('judul'),
        'pembawa' => $this->request->getVar('pembawa'),
        'foto' => $namaFoto
    ]);

    session()->setFlashdata('pesan', 'Data berhasil disimpan');
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

    $validationRules = [
        'jam' => 'required',
        'judul' => 'required',
        'pembawa' => 'required',
        'foto' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $foto = $this->request->getFile('foto');
    $namaFoto = null;

    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/jadwal/', $namaFoto);
    }

    $data = [
        'jam' => $this->request->getVar('jam'),
        'judul' => $this->request->getVar('judul'),
        'pembawa' => $this->request->getVar('pembawa')
    ];

    if ($namaFoto) {
        $data['foto'] = $namaFoto;
    }

    $jadwal->update($id, $data);
    session()->setFlashdata('pesan', 'Data berhasil diupdate');

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
