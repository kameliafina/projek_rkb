<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StatementModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlStatement extends BaseController
{
    public function index()
    {
        $st = new StatementModel();
        $ambil = $st->findAll();

        $data = [
            'datast' => $ambil
        ];
        return view('statement/index', $data);
    }

    public function datast()
    {
        $st = new StatementModel();
        $ambil = $st->findAll();

        $data = [
            'datast' => $ambil
        ];
        return view('statement/index', $data);
    }

    public function tambah()
    {
        helper('form');

        return view('statement/tambah');
    }

    public function simpan()
    {
        $st = new StatementModel();

        // Validation rules
        $validationRules = [
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]'
        ];

        if (!$this->validate($validationRules)) {
            // Redirect back with validation errors and old input
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName(); // Generate a random name for the file
        $foto->move('upload', $namafoto); // Move the file to the 'upload' directory

        // Insert data into the database
        $st->insert([
            'foto' => $namafoto
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        // Redirect to the data list page
        return redirect()->to(site_url('/datast'));
    }

    public function edit($id)
    {
        $st = new StatementModel();
        $ambil = $st->find($id);

        $data = [
            'datast' => $ambil
        ];
        return view('statement/edit', $data);
    }

    public function update($id)
{
    $st = new StatementModel();

    // Siapkan array data yang akan diupdate
    $dataUpdate = [];

    // Validasi jika ada file foto yang diupload
    if ($this->request->getFile('foto')->isValid()) {
        $validationRules = [
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload file dan simpan nama file baru
        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName();
        $foto->move('upload', $namafoto);
        $dataUpdate['foto'] = $namafoto;
    }

    // Jika $dataUpdate tidak kosong, maka lakukan update
    if (!empty($dataUpdate)) {
        $st->update($id, $dataUpdate);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
    } else {
        session()->setFlashdata('pesan', 'Tidak ada perubahan data');
    }

    return redirect()->to(site_url('/datast'));
}

    public function delete($id)
    {
        $st = new StatementModel();
        $st->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(site_url('/datainfografis'));
    }
}
