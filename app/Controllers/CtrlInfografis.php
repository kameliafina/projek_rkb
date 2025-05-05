<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InfografisModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlInfografis extends BaseController
{
    public function index()
    {
        $infografis = new InfografisModel();
        $ambil = $infografis->findAll();

        $data = [
            'datainfografis' => $ambil
        ];
        return view('infografis/index', $data);
    }

    public function datainfografis()
    {
        $infografis = new InfografisModel();
        $ambil = $infografis->findAll();

        $data = [
            'datainfografis' => $ambil
        ];
        return view('infografis/index', $data);
    }

    public function tambah()
    {
        helper('form');

        return view('infografis/tambah');
    }

    public function simpan()
    {
        $infografis = new InfografisModel();

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
        $infografis->insert([
            'foto' => $namafoto
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        date_default_timezone_set('Asia/Jakarta');

        // Redirect to the data list page
        return redirect()->to(site_url('/datainfografis'));
    }

    public function edit($id)
    {
        $infografis = new InfografisModel();
        $ambil = $infografis->find($id);

        $data = [
            'datainfografis' => $ambil
        ];
        return view('infografis/edit', $data);
    }

    public function update($id)
    {
        $infografis = new InfografisModel();
        
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
        $infografis->update($id, $dataUpdate);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
    } else {
        session()->setFlashdata('pesan', 'Tidak ada perubahan data');
    }

    return redirect()->to(site_url('/datainfografis'));
}

    public function delete($id)
    {
        $infografis = new InfografisModel();
        $infografis->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(site_url('/datainfografis'));
    }

}
