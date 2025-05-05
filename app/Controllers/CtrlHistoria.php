<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoriaModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlHistoria extends BaseController
{
    public function index()
    {
        $historia = new HistoriaModel();
        $ambil = $historia->findAll();

        $data = [
            'datahistoria' => $ambil
        ];
        return view('historia/index', $data);
    }

    public function datahistoria()
    {
        $historia = new HistoriaModel();
        $ambil = $historia->findAll();

        $data = [
            'datahistoria' => $ambil
        ];
        return view('historia/index', $data);
    }

    public function tambah()
    {
        helper('form');

        return view('historia/tambah');
    }

    public function simpan()
    {
        $historia = new HistoriaModel();

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
        $historia->insert([
            'nama_penyiar' => $this->request->getVar('nama_penyiar'),
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ket_foto' => $this->request->getVar('ket_foto'),
            'foto' => $namafoto
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        date_default_timezone_set('Asia/Jakarta');

        // Redirect to the data list page
        return redirect()->to(site_url('/datahistoria'));
    }

    public function edit($id)
    {
        $historia = new HistoriaModel();
        $ambil = $historia->find($id);

        $data = [
            'datahistoria' => $ambil
        ];
        return view('historia/edit', $data);
    }

    public function update($id)
    {
        $historia = new HistoriaModel();
        $ambil = $historia->find($id);

        // Validation rules
        $validationRules = [
            'nama_penyiar' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'ket_foto' => 'required'
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

            // Delete the old file if it exists
            if (file_exists('upload/' . $ambil['foto'])) {
                unlink('upload/' . $ambil['foto']);
            }
        } else {
            $namafoto = $ambil['foto']; // Keep the old file name
        }

        // Update data in the database
        $historia->update($id, [
            'nama_penyiar' => $this->request->getVar('nama_penyiar'),
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ket_foto' => $this->request->getVar('ket_foto'),
            'foto' => $namafoto
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil diupdate');

        // Redirect to the data list page
        return redirect()->to(site_url('/datahistoria'));
    }

    public function delete($id)
    {
        $historia = new HistoriaModel();
        $ambil = $historia->find($id);

        // Delete the file if it exists
        if (file_exists('upload/' . $ambil['foto'])) {
            unlink('upload/' . $ambil['foto']);
        }

        // Delete data from the database
        $historia->delete($id);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        // Redirect to the data list page
        return redirect()->to(site_url('/datahistoria'));
    }

    public function detail($id)
    {
        $historia = new HistoriaModel();
        $ambil = $historia->find($id);

        $data = [
            'datahistoria' => $ambil
        ];
        return view('historia/detail', $data);
    }

    public function hapus($id)
    {
        $historia = new HistoriaModel();
        $ambil = $historia->find($id);

        // Delete the file if it exists
        if (file_exists('upload/' . $ambil['foto'])) {
            unlink('upload/' . $ambil['foto']);
        }

        // Delete data from the database
        $historia->delete($id);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        // Redirect to the data list page
        return redirect()->to(site_url('/datahistoria'));
    }


}
