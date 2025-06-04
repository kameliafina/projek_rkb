<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IlmModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlIlm extends BaseController
{
    public function index()
    {
        $ilm = new IlmModel();
        $ambil = $ilm->findAll();

        $data = [
            'datailm' => $ambil
        ];

        return view('ilm/index', $data);
    }

    public function datailm()
    {
        $ilm = new IlmModel();
        $ambil = $ilm->findAll();

        $data = [
            'datailm' => $ambil
        ];
        return view('ilm/index', $data);
    }

    public function tambah()
    {
        return view('ilm/tambah');
    }

    public function simpan()
{
    helper(['form', 'url']);
    $model = new \App\Models\IlmModel();

    $judul = $this->request->getPost('judul');
    $keterangan = $this->request->getPost('keterangan');

    $audioFile = $this->request->getFile('audio');
    $gambarFile = $this->request->getFile('gambar');

    // Inisialisasi variabel agar tidak undefined
    $namaAudio = null;
    $namaGambar = null;

    // Proses audio
    if ($audioFile && $audioFile->isValid() && !$audioFile->hasMoved()) {
        $namaAudio = $audioFile->getRandomName();
        $audioFile->move('uploads/audio', $namaAudio);

        // Re-encode agar bisa di-seek
        $inputPath = FCPATH . 'uploads/audio/' . $namaAudio;
        $outputPath = FCPATH . 'uploads/audio/fixed_' . $namaAudio;

        exec("ffmpeg -i \"$inputPath\" -c copy -map 0 -movflags faststart \"$outputPath\"");

        if (file_exists($outputPath)) {
            unlink($inputPath);
            rename($outputPath, $inputPath);
        }
    }

    // Proses gambar
    if ($gambarFile && $gambarFile->isValid() && !$gambarFile->hasMoved()) {
        $namaGambar = $gambarFile->getRandomName();
        $gambarFile->move('upload/gambar', $namaGambar);
    }

    // Simpan ke database
    $model->save([
        'judul' => $judul,
        'keterangan' => $keterangan,
        'audio' => $namaAudio,
        'gambar' => $namaGambar
    ]);

    return redirect()->to('/ilm', )->with('message', 'Data berhasil ditambahkan!');
}

public function hapus($id)
{
    $ilm = new IlmModel();
    $ilm->delete($id);

    return redirect()->to('/ilm')->with('message', 'Data berhasil dihapus!');

}

public function edit($id)
{
    $ilm = new IlmModel();
    $data = $ilm->find($id);

    if (!$data) {
        return redirect()->to('/ilm')->with('error', 'Data tidak ditemukan!');
    }

    return view('ilm/edit', ['data' => $data]);
}

public function update($id)
{
    helper(['form', 'url']);
    $model = new \App\Models\IlmModel();

    // Ambil data lama
    $dataLama = $model->find($id);

    $judul = $this->request->getPost('judul');
    $keterangan = $this->request->getPost('keterangan');

    $audioFile = $this->request->getFile('audio');
    $gambarFile = $this->request->getFile('gambar');

    // Default: pakai data lama
    $namaAudio = $dataLama['audio'];
    $namaGambar = $dataLama['gambar'];

    // Proses audio jika ada file baru
    if ($audioFile && $audioFile->isValid() && !$audioFile->hasMoved()) {
        $namaAudio = $audioFile->getRandomName();
        $audioFile->move('uploads/audio', $namaAudio);

        // Re-encode agar bisa di-seek
        $inputPath = FCPATH . 'uploads/audio/' . $namaAudio;
        $outputPath = FCPATH . 'uploads/audio/fixed_' . $namaAudio;

        exec("ffmpeg -i \"$inputPath\" -c copy -map 0 -movflags faststart \"$outputPath\"");
        if (file_exists($outputPath)) {
            unlink($inputPath);
            rename($outputPath, $inputPath);
        }

        // Hapus audio lama jika ada
        if ($dataLama['audio']) {
            @unlink(FCPATH . 'uploads/audio/' . $dataLama['audio']);
        }
    }

    // Proses gambar jika ada file baru
    if ($gambarFile && $gambarFile->isValid() && !$gambarFile->hasMoved()) {
        $namaGambar = $gambarFile->getRandomName();
        $gambarFile->move('upload/gambar', $namaGambar);

        // Hapus gambar lama jika ada
        if ($dataLama['gambar']) {
            @unlink(FCPATH . 'upload/gambar/' . $dataLama['gambar']);
        }
    }

    // Update ke database
    $model->update($id, [
        'judul' => $judul,
        'keterangan' => $keterangan,
        'audio' => $namaAudio,
        'gambar' => $namaGambar
    ]);

    return redirect()->to('/ilm')->with('message', 'Data berhasil diupdate!');
}

}
