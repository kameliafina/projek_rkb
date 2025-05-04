<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaFotoModel;
use App\Models\Kategori2Model;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlBeritaFoto extends BaseController
{
    public function index()
    {
        $berita = new BeritaFotoModel();
        $ambil = $berita->findAll();

        $data = [
            'databerita' => $ambil
        ];
        return view('berita_foto/index', $data);
    }

    public function databerita2()
    {
        $berita = new BeritaFotoModel();
        $ambil = $berita->findAll();

        $data = [
            'databerita' => $ambil
        ];
        return view('berita_foto/index', $data);
    }

    public function tambah()
    {
        helper('form');

        return view('berita_foto/tambah');
    }

    public function simpan()
    {
        $berita = new BeritaFotoModel();

        // Validation rules
        $validationRules = [
            'nama_penyiar' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'ket_foto' => 'required',
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
        $berita->insert([
            'nama_penyiar' => $this->request->getVar('nama_penyiar'),
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ket_foto' => $this->request->getVar('ket_foto'),
            'foto' => $namafoto
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        // Redirect to the data list page
        return redirect()->to(site_url('/databerita2'));
    }

    public function edit($id)
    {
        $berita = new BeritaFotoModel();
        $ambil = $berita->find($id);

        $data = [
            'databerita' => $ambil
        ];
        return view('berita_foto/edit', $data);
    }

    public function update($id)
    {
        $berita = new BeritaFotoModel();

        // Validation rules
        $validationRules = [
            'nama_penyiar' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'ket_foto' => 'required',
        ];

        if ($this->request->getFile('foto')->isValid()) {
            $validationRules['foto'] = 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]';
        }

        if (!$this->validate($validationRules)) {
            // Redirect back with validation errors and old input
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload if a new file is uploaded
        if ($this->request->getFile('foto')->isValid()) {
            $foto = $this->request->getFile('foto');
            $namafoto = $foto->getRandomName(); // Generate a random name for the file
            $foto->move('upload', $namafoto); // Move the file to the 'upload' directory

            // Update the foto field in the database
            $berita->update($id, [
                'foto' => $namafoto
            ]);
        }

        // Update other fields in the database
        $berita->update($id, [
            'nama_penyiar' => $this->request->getVar('nama_penyiar'),
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ket_foto' => $this->request->getVar('ket_foto'),
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil diupdate');

        // Redirect to the data list page
        return redirect()->to(site_url('/databerita2'));
    }

    public function delete($id)
    {
        $berita = new BeritaFotoModel();
        $berita->delete($id);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        // Redirect to the data list page
        return redirect()->to(site_url('/databerita2'));
    }

}
