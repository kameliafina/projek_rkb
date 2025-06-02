<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori2Model;
use App\Models\LifestyleModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlLifestyle extends BaseController
{
    public function index()
    {
        $lifestyle = new LifestyleModel();
        $ambil = $lifestyle->findAll();

        $data = [
            'datalifestyle' => $ambil
        ];
        return view('lifestyle/index', $data);
    }
    public function datalifestyle()
    {
        $lifestyle = new LifestyleModel();
        $ambil = $lifestyle->findAll();

        $data = [
            'datalifestyle' => $ambil
        ];
        return view('lifestyle/index', $data);
    }

    public function tambah()
    {
        helper('form');
        $kategori = new Kategori2Model();
        $data['kategori'] = $kategori->findAll();

        return view('lifestyle/tambahlifestyle', $data);
    }

    public function simpan()
    {
        $lifestyle = new LifestyleModel();

        // Validation rules
        $validationRules = [
            'nama_penyiar' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'ket_foto' => 'required',
            'kategori_id' => 'required',
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
        $lifestyle->insert([
            'nama_penyiar' => $this->request->getVar('nama_penyiar'),
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ket_foto' => $this->request->getVar('ket_foto'),
            'kategori_id' => $this->request->getVar('kategori_id'),
            'foto' => $namafoto
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        date_default_timezone_set('Asia/Jakarta');

        // Redirect to the data list page
        return redirect()->to(site_url('/datalifestyle'));
    }

    public function edit($id)
    {
        $lifestyle = new LifestyleModel();
        $ambil = $lifestyle->find($id);

        $kategori = new Kategori2Model();
        $data['kategori'] = $kategori->findAll();

        $data = [
            'datalifestyle' => $ambil,
            'kategori' => $data['kategori']
        ];
        return view('lifestyle/editlifestyle', $data);
    }

    public function update($id)
    {
        $lifestyle = new LifestyleModel();

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
            $lifestyle->update($id, [
                'foto' => $namafoto
            ]);
        }

        // Update other fields in the database
        $lifestyle->update($id, [
            'nama_penyiar' => $this->request->getVar('nama_penyiar'),
            'judul' => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ket_foto' => $this->request->getVar('ket_foto'),
            'kategori_id' => $this->request->getVar('kategori_id')
        ]);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil diupdate');

        // Redirect to the data list page
        return redirect()->to(site_url('/datalifestyle'));
    }

    public function delete($id)
    {
        $lifestyle = new LifestyleModel();
        $lifestyle->delete($id);

        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        // Redirect to the data list page
        return redirect()->to(site_url('/datalifestyle'));
    }


    public function lifestyle2()
    {
        $lifestyleModel = new LifestyleModel();

        // Lifestyle terbaru (dengan pagination)
        $lifestyle = $lifestyleModel
            ->select('lifestyle.*, kategori_lifestyle.nama_kategori_l')
            ->join('kategori_lifestyle', 'kategori_lifestyle.id = lifestyle.kategori_id')
            ->orderBy('lifestyle.created_at', 'DESC')
            ->paginate(5, 'lifestyle');



        $data = [
            'datalifestyle' => $lifestyle,
            'pager' => $lifestyleModel->pager
        ];

        return view('halaman_depan/lifestyle', $data);
    }

    public function detail($id)
    {
        $lifestyleModel = new LifestyleModel();

        $lifestyle = $lifestyleModel
            ->select('lifestyle.*, kategori_lifestyle.nama_kategori_l')
            ->join('kategori_lifestyle', 'kategori_lifestyle.id = lifestyle.kategori_id')
            ->where('lifestyle.id', $id)
            ->first();


        if (!$lifestyle) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Lifestyle tidak ditemukan.');
        }


        return view('halaman_depan/detail_lifestyle', [
            'lifestyle' => $lifestyle
        ]);
    }

    public function kategori($kategori)
    {
        $lifestyleModel = new LifestyleModel();

        // ambil data berdasarkan kategori (wisata, hiburan, kesehatan, tips dan trik)
        $dataKategori = $lifestyleModel
            ->select('lifestyle.*, kategori_lifestyle.nama_kategori_l')
            ->join('kategori_lifestyle', 'kategori_lifestyle.id = lifestyle.kategori_id')
            ->where('kategori_lifestyle.nama_kategori_l', strtolower($kategori))
            ->orderBy('lifestyle.created_at', 'DESC')
            ->findAll();

        $data = [
            'datalifestyle' => $dataKategori,
            'kategori' => ucfirst($kategori)
        ];

        return view('halaman_depan/lifestyle_kategori', $data);
    }
}
