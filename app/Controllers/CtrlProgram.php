<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProgramModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlProgram extends BaseController
{
    public function index()
    {
        $program = new ProgramModel();
        $ambil = $program->findAll();

        $data = [
            'dataprogram' => $ambil
        ];
        return view('program/index', $data);
    }

    public function dataprogram()
    {
        $program = new ProgramModel();
        $ambil = $program->findAll();

        $data = [
            'dataprogram' => $ambil
        ];
        return view('program/index', $data);
    }

    public function tambah()
    {
        helper('form');

        return view('program/tambah');
    }

    public function simpan()
    {
        $program = new ProgramModel();

        // Validation rules
        $validationRules = [
            'judul' => 'required',
            'link' => 'required',
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
        $program->insert([
            'judul' => $this->request->getVar('judul'),
            'link' => $this->request->getVar('link'),
            'foto' => $namafoto
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        date_default_timezone_set('Asia/Jakarta');

        // Redirect to the data list page
        return redirect()->to(site_url('/dataprogram'));
    }

    public function edit($id)
    {
        $program = new ProgramModel();
        $ambil = $program->find($id);

        $data = [
            'dataprogram' => $ambil
        ];
        return view('program/edit', $data);
    }

    public function update($id)
    {
        $program = new ProgramModel();
        $ambil = $program->find($id);

        // Validation rules
        $validationRules = [
            'judul' => 'required',
            'link' => 'required'
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
        $program->update($id, [
            'judul' => $this->request->getVar('judul'),
            'link' => $this->request->getVar('link'),
            'foto' => $namafoto
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil diupdate');

        // Redirect to the data list page
        return redirect()->to(site_url('/dataprogram'));
    }

    public function delete($id)
    {
        $program = new ProgramModel();
        $ambil = $program->find($id);

        // Delete the file if it exists
        if (file_exists('upload/' . $ambil['foto'])) {
            unlink('upload/' . $ambil['foto']);
        }

        // Delete data from the database
        $program->delete($id);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        // Redirect to the data list page
        return redirect()->to(site_url('/dataprogram'));
    }

    public function detail($id)
    {
        $program = new ProgramModel();
        $ambil = $program->find($id);

        $data = [
            'dataprogram' => $ambil
        ];
        return view('historia/detail', $data);
    }

    public function hapus($id)
    {
        $program = new ProgramModel();
        $ambil = $program->find($id);

        // Delete the file if it exists
        if (file_exists('upload/' . $ambil['foto'])) {
            unlink('upload/' . $ambil['foto']);
        }

        // Delete data from the database
        $program->delete($id);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        // Redirect to the data list page
        return redirect()->to(site_url('/dataprogram'));
    }
}
