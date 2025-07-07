<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Berita;
use App\Models\BeritaModel;
use App\Models\HistoriaModel;
use App\Models\KategoriModel;
use App\Models\LifestyleModel;
use App\Models\ProgramModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlBerita extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);

        $db = \Config\Database::connect();

        $berita = new BeritaModel();
        $ambil = $berita->findAll();

        $data = [
            'databerita' => $ambil,
            'user' => $userData
        ];
        return view('berita/index', $data);
    }

    public function databerita()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);

        $db = \Config\Database::connect();

        $berita = new BeritaModel();
        $ambil = $berita->findAll();

        $data = [
            'databerita' => $ambil,
            'user' => $userData
        ];
        return view('berita/index', $data);
    }

    public function tambah_berita()
    {
        helper('form');
        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();

        $userModel = new UserModel();
        $id = session()->get('id');
        $data['user'] = $userModel->find($id);


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

        helper('text'); 
        $slug = url_title($this->request->getPost('judul'), '-', true);
    
        // Insert data into database
        $data = [
            'nama_penyiar' => $this->request->getVar('nama_penyiar'),
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
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
        $user = new UserModel();
        $id_user = session()->get('id');
        $userData = $user->find($id);

        $berita = new BeritaModel();
        $ambil = $berita->find($id);

        $kategori = new KategoriModel();
        $data['kategori'] = $kategori->findAll();

        $data = [
            'databerita' => $ambil,
            'user' => $userData,
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

    $beritaModel = new BeritaModel();
    $programModel = new ProgramModel();
    $kategoriModel = new KategoriModel();
    $historiaModel = new HistoriaModel();
    $lifeStyleModel = new LifestyleModel();

     $hasilBerita = $beritaModel
                    ->like('judul', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->findAll();

    $hasilProgram = $programModel
                    ->like('judul', $keyword)
                    ->findAll();

    $hasilHistoria = $historiaModel
                    ->like('judul', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->findAll();

    $hasilLifestyle = $lifeStyleModel
                    ->like('judul', $keyword)
                    ->orLike('deskripsi', $keyword)
                    ->findAll();

    $data = [
        'keyword' => $keyword,
        'hasilBerita' => $hasilBerita,
        'hasilProgram' => $hasilProgram,
        'hasilHistoria' => $hasilHistoria,
        'hasilLifestyle' => $hasilLifestyle
    ];

    return view('search_result', $data);
}

public function update_user($id)
    {
        $user = new UserModel();

        $validationRules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username,id,' . $id . ']',
            'password' => 'permit_empty|min_length[3]|max_length[255]',
            'level' => 'required|in_list[admin,petinggi,pendengar]'
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'level' => $this->request->getPost('level')
        ];
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $user->update($id, $data);
        session()->setFlashdata('success', 'User berhasil diperbarui');
        return redirect()->to('/admin');
    }


}
