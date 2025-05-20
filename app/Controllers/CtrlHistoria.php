<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoriaDetailModel;
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

        // Setelah insert ke historia utama
$idHistoria = $historia->insertID();

// Ambil array foto & deskripsi detail
$fotoDetail = $this->request->getFiles()['foto_detail'];
$deskripsiDetail = $this->request->getVar('deskripsi_detail');

foreach ($fotoDetail as $i => $foto) {
    if ($foto->isValid() && !$foto->hasMoved()) {
        $namaFile = $foto->getRandomName();
        $foto->move('upload', $namaFile);

        // Simpan ke tabel historia_detail
        $db = \Config\Database::connect();
        $db->table('historia_detail')->insert([
            'historia_id' => $idHistoria,
            'foto' => $namaFile,
            'deskripsi' => $deskripsiDetail[$i],
        ]);
    }
}


        // Set flashdata for success message
        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        date_default_timezone_set('Asia/Jakarta');

        // Redirect to the data list page
        return redirect()->to(site_url('/datahistoria'));
    }

    public function edit($id)
    {
        $historia = new HistoriaModel();
        $detailModel = new HistoriaDetailModel();

        $datahistoria = $historia->find($id);
        $detailHistoria = $detailModel->where('historia_id', $id)->findAll();

    $data = [
        'datahistoria' => $datahistoria,
        'detailHistoria' => $detailHistoria
    ];
    return view('historia/edit', $data);
    }

    public function update($id)
{
    $historiaModel = new HistoriaModel();
    $detailModel = new HistoriaDetailModel();

    $historiaLama = $historiaModel->find($id);

    // Validation rules utama
    $validationRules = [
        'nama_penyiar' => 'required',
        'judul' => 'required',
        'deskripsi' => 'required',
        'ket_foto' => 'required',
    ];

    // Jika upload foto cover baru
    if ($this->request->getFile('foto')->isValid() && !$this->request->getFile('foto')->hasMoved()) {
        $validationRules['foto'] = 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]';
    }

    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Handle foto cover baru (jika ada)
    if ($this->request->getFile('foto')->isValid() && !$this->request->getFile('foto')->hasMoved()) {
        $fotoCover = $this->request->getFile('foto');
        $namaFotoCover = $fotoCover->getRandomName();
        $fotoCover->move('upload', $namaFotoCover);

        // Hapus foto lama
        if ($historiaLama['foto'] && file_exists('upload/' . $historiaLama['foto'])) {
            unlink('upload/' . $historiaLama['foto']);
        }
    } else {
        $namaFotoCover = $historiaLama['foto']; // pakai foto lama jika tidak diganti
    }

    // Update data utama historia
    $historiaModel->update($id, [
        'nama_penyiar' => $this->request->getVar('nama_penyiar'),
        'judul' => $this->request->getVar('judul'),
        'deskripsi' => $this->request->getVar('deskripsi'),
        'ket_foto' => $this->request->getVar('ket_foto'),
        'foto' => $namaFotoCover
    ]);

    // --- Proses hapus foto detail yang ditandai ---
    $hapusIds = $this->request->getVar('hapus_detail_ids'); // contoh: "2,5,9"
    if (!empty($hapusIds)) {
        $idsToDelete = explode(',', $hapusIds);
        foreach ($idsToDelete as $detailId) {
            $detail = $detailModel->find($detailId);
            if ($detail) {
                // Hapus file foto detail lama
                if ($detail['foto'] && file_exists('upload/' . $detail['foto'])) {
                    unlink('upload/' . $detail['foto']);
                }
                // Hapus record
                $detailModel->delete($detailId);
            }
        }
    }

    // --- Proses update foto & deskripsi detail lama ---
    $detailExistingIds = array_keys($this->request->getVar() ?? []);
    // Untuk ambil id detail lama dari form, kita bisa scan input 'deskripsi_detail_existing_{id}'
    // Jadi kita ambil semua key input, cari yg mulai dgn deskripsi_detail_existing_

    $allInput = $this->request->getVar();

    foreach ($allInput as $key => $value) {
        if (strpos($key, 'deskripsi_detail_existing_') === 0) {
            // Ambil id detail dari key, misal deskripsi_detail_existing_7 -> id = 7
            $detailId = str_replace('deskripsi_detail_existing_', '', $key);

            $deskripsiBaru = $value;

            // Ambil file foto detail baru jika ada
            $inputFotoName = 'foto_detail_existing_' . $detailId;
            $fileFotoDetailBaru = $this->request->getFile($inputFotoName);

            $detailLama = $detailModel->find($detailId);
            if (!$detailLama) continue;

            if ($fileFotoDetailBaru && $fileFotoDetailBaru->isValid() && !$fileFotoDetailBaru->hasMoved()) {
                $namaFileBaru = $fileFotoDetailBaru->getRandomName();
                $fileFotoDetailBaru->move('upload', $namaFileBaru);

                // Hapus foto lama
                if ($detailLama['foto'] && file_exists('upload/' . $detailLama['foto'])) {
                    unlink('upload/' . $detailLama['foto']);
                }
            } else {
                $namaFileBaru = $detailLama['foto']; // pakai foto lama jika tidak diganti
            }

            // Update record detail
            $detailModel->update($detailId, [
                'foto' => $namaFileBaru,
                'deskripsi' => $deskripsiBaru
            ]);
        }
    }

    // --- Proses simpan foto & deskripsi detail baru ---
    $fotoDetailBaruFiles = $this->request->getFiles()['foto_detail_new'] ?? [];
    $deskripsiDetailBaruArr = $this->request->getVar('deskripsi_detail_new') ?? [];

    foreach ($fotoDetailBaruFiles as $i => $fotoDetailBaru) {
        if ($fotoDetailBaru->isValid() && !$fotoDetailBaru->hasMoved()) {
            $namaFileBaru = $fotoDetailBaru->getRandomName();
            $fotoDetailBaru->move('upload', $namaFileBaru);

            $deskripsiBaru = $deskripsiDetailBaruArr[$i] ?? '';

            $detailModel->insert([
                'historia_id' => $id,
                'foto' => $namaFileBaru,
                'deskripsi' => $deskripsiBaru
            ]);
        }
    }

    // Set pesan sukses dan redirect
    session()->setFlashdata('pesan', 'Data berhasil diupdate');
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
