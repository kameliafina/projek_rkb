<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IklanModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlIklan extends BaseController
{
    public function index()
    {
        $iklan = new IklanModel();
        $ambil = $iklan->findAll();

        $data = [
            'dataiklan' => $ambil
        ];
        return view('iklan/index', $data);
    }

    public function dataiklan()
    {
        $iklan = new IklanModel();
        $ambil = $iklan->findAll();

        $data = [
            'dataiklan' => $ambil
        ];
        return view('iklan/index', $data);
    }

    public function tambah()
    {
        helper('form');

        return view('iklan/tambah');
    }

    public function simpan()
    {
        $iklan = new IklanModel();

        // Validation rules
        $validationRules = [
            'deskripsi' => 'required|min_length[5]|max_length[255]',
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
        $iklan->insert([
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $namafoto
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        // Redirect to the data list page
        return redirect()->to(site_url('/dataiklan'));
    }

    public function edit($id)
    {
        $iklan = new IklanModel();
        $ambil = $iklan->find($id);

        $data = [
            'dataiklan' => $ambil
        ];
        return view('iklan/edit', $data);
    }

    public function update($id)
    {
        $iklan = new IklanModel();
        
        $dataUpdate = [];
        
        if ($this->request->getFile('foto')->isValid()) {
        $validationRules = [
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName();
        $foto->move('upload', $namafoto);
        $dataUpdate['foto'] = $namafoto;
    }
    
    if (!empty($dataUpdate)) {
        $iklan->update($id, $dataUpdate);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
    } else {
        session()->setFlashdata('pesan', 'Tidak ada perubahan data');
    }

    return redirect()->to(site_url('/dataiklan'));
}

    public function delete($id)
    {
        $iklan = new IklanModel();
        $iklan->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(site_url('/dataiklan'));
    }
}
