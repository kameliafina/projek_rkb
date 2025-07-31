<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaFotoModel;
use App\Models\Kategori2Model;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlBeritaFoto extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);
        $db = \Config\Database::connect();

        $berita = new BeritaFotoModel();
        $ambil = $berita
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $data = [
            'databerita' => $ambil,
            'user' => $userData,
            'pager' => $berita->pager
        ];
        return view('berita_foto/index', $data);
    }

    public function databerita2()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);
        $db = \Config\Database::connect();


        $berita = new BeritaFotoModel();
        $ambil = $berita->findAll();

        $data = [
            'databerita' => $ambil
        ];
        return view('berita_foto/index', $data);
    }

    public function tambah()
    {
        $userModel = new UserModel();
        $id = session()->get('id');
        $data['user'] = $userModel->find($id);

        helper('form');

        return view('berita_foto/tambah', $data);
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

        
        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName(); 
        $foto->move('upload', $namafoto); 

        
        helper('text');
            $slug = url_title($this->request->getPost('judul'), '-', true);

        $berita->insert([
            'nama_penyiar' => $this->request->getVar('nama_penyiar'),
            'slug' => $slug,
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ket_foto' => $this->request->getVar('ket_foto'),
            'foto' => $namafoto
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        date_default_timezone_set('Asia/Jakarta');


        // Redirect to the data list page
        return redirect()->to(site_url('/databerita2'));
    }

    public function edit($id)
    {
        $user = new UserModel();
        $id_user = session()->get('id');
        $userData = $user->find($id);

        $berita = new BeritaFotoModel();
        $ambil = $berita->find($id);

        $data = [
            'databerita' => $ambil,
            'user' => $userData
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
