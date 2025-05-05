<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Berita;
use App\Models\BeritaModel;
use App\Models\KategoriModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlBerita extends BaseController
{
    public function index()
    {
        $berita = new BeritaModel();
        $ambil = $berita->findAll();

        $data = [
            'databerita' => $ambil
        ];
        return view('berita/index', $data);
    }

    public function databerita()
    {
        $berita = new BeritaModel();
        $ambil = $berita->findAll();

        $data = [
            'databerita' => $ambil
        ];
        return view('berita/index', $data);
    }

    public function tambah_berita()
    {
        helper('form');
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();

        return view('berita/tambahberita', $data);
    }

    public function simpan()
    {
        $berita = new BeritaModel();
    
        // Validasi rules
        $validationRules = [
            'nama_penyiar' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'ket_foto' => 'required',
            'kategori_id' => 'required',
            'views' => 'permit_empty|integer',
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]'
        ];
    
        if (!$this->validate($validationRules)) {
            log_message('error', 'Validasi gagal: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Handle file upload
        $foto = $this->request->getFile('foto');
        if (!$foto->isValid()) {
            log_message('error', 'Gagal upload foto: ' . $foto->getErrorString());
            return redirect()->back()->withInput()->with('errors', ['foto' => 'Gagal upload foto.']);
        }
    
        $namafoto = $foto->getRandomName();
        if (!$foto->move('upload', $namafoto)) {
            log_message('error', 'Gagal memindahkan file foto ke folder upload.');
            return redirect()->back()->withInput()->with('errors', ['foto' => 'Gagal memindahkan file foto.']);
        }
    
        // Insert data into database
        $data = [
            'nama_penyiar' => $this->request->getVar('nama_penyiar'),
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ket_foto' => $this->request->getVar('ket_foto'),
            'kategori_id' => $this->request->getVar('kategori_id'),
            'views' => 0,
            'foto' => $namafoto
        ];
    
        // Insert berita data
        if ($berita->insert($data) === false) {
            log_message('error', 'Gagal simpan data berita: ' . json_encode($berita->errors()));
            return redirect()->back()->withInput()->with('errors', ['general' => 'Gagal menyimpan data.']);
        }

        date_default_timezone_set('Asia/Jakarta');

    
        // Success, redirect
        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to(site_url('/databerita'));
    }
    
    

    public function edit($id)
    {
        $berita = new BeritaModel();
        $ambil = $berita->find($id);

        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();

        $data = [
            'databerita' => $ambil,
            'kategori' => $data['kategori']
        ];
        return view('berita/editberita', $data);
    }

    public function update($id)
    {
        $berita = new BeritaModel();

        // Validation rules
        $validationRules = [
            'nama_penyiar' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'ket_foto' => 'required',
            'kategori_id' => 'required'
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
            'kategori_id' => $this->request->getVar('kategori_id')
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil diupdate');

        // Redirect to the data list page
        return redirect()->to(site_url('/databerita'));
    }

    public function delete($id)
    {
        $berita = new BeritaModel();
        $berita->delete($id);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        // Redirect to the data list page
        return redirect()->to(site_url('/databerita'));
    }

    public function search()
{
    $keyword = $this->request->getGet('q');

    $beritaModel = new \App\Models\BeritaModel();
    $results = $beritaModel
                ->like('judul', $keyword)
                ->orLike('deskripsi', $keyword)
                ->findAll();

    return view('search_result', ['results' => $results, 'keyword' => $keyword]);
}

}
