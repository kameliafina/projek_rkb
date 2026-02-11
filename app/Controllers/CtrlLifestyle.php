<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\Kategori2Model;
use App\Models\LifestyleModel;
use App\Models\PengunjungModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlLifestyle extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);
        $db = \Config\Database::connect();

        $lifestyle = new LifestyleModel();
        $ambil = $lifestyle
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $data = [
            'datalifestyle' => $ambil,
            'user' => $userData,
            'pager' => $lifestyle->pager
        ];
        return view('lifestyle/index', $data);
    }
    public function datalifestyle()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);
        $db = \Config\Database::connect();

        $lifestyle = new LifestyleModel();
        $ambil = $lifestyle->paginate(10);

        $data = [
            'datalifestyle' => $ambil,
            'user' => $userData,
            'pager' => $lifestyle->pager
        ];
        return view('lifestyle/index', $data);
    }

    public function tambah()
    {
        $userModel = new UserModel();
        $id = session()->get('id');
        $data['user'] = $userModel->find($id);

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

        helper('text'); 
        $slug = url_title($this->request->getPost('judul'), '-', true);

        // Insert data into the database
        $lifestyle->insert([
            'nama_penyiar' => $this->request->getVar('nama_penyiar'),
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug, 
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
        $user = new UserModel();
        $id_user = session()->get('id');
        $userData = $user->find($id_user);

        $lifestyle = new LifestyleModel();
        $ambil = $lifestyle->find($id);

        $kategori = new Kategori2Model();
        $data['kategori'] = $kategori->findAll();

        $data = [
            'datalifestyle' => $ambil,
            'user' => $userData,
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
        $beritaModel = new BeritaModel();

        // Lifestyle terbaru (dengan pagination)
        $lifestyle = $lifestyleModel
            ->select('lifestyle.*, kategori_lifestyle.nama_kategori_l')
            ->join('kategori_lifestyle', 'kategori_lifestyle.id = lifestyle.kategori_id')
            ->orderBy('lifestyle.created_at', 'DESC')
            ->paginate(5, 'lifestyle');

        $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();

        $pengunjungModel = new PengunjungModel();
        
        $ip = $this->request->getIPAddress();
        $agent = $this->request->getUserAgent();
        $user_agent = $agent->getAgentString();
        $now = date('Y-m-d H:i:s');

        // Hapus data pengunjung yang tidak aktif lebih dari 5 menit
        $pengunjungModel->where('last_activity <', date('Y-m-d H:i:s', strtotime('-5 minutes')))->delete();

        // Cek apakah sudah ada data untuk IP dan user agent
        $existing = $pengunjungModel
            ->where('ip_address', $ip)
            ->where('user_agent', $user_agent)
            ->first();

            if ($existing) {
                $pengunjungModel->update($existing['id'], ['last_activity' => $now]);
            
            } else {
                $pengunjungModel->insert([
                    'ip_address' => $ip,
                    'user_agent' => $user_agent,
                    'last_activity' => $now
                ]);
            }

        $pengunjungModel = new PengunjungModel();

        $ip = $this->request->getIPAddress();
        $tanggal = date('Y-m-d');
        $waktuSekarang = date('Y-m-d H:i:s');
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

        $cek = $pengunjungModel
            ->where('ip_address', $ip)
            ->where('tanggal', $tanggal)
            ->first();

        if ($cek) {
            $pengunjungModel->update($cek['id'], [
                'last_activity' => $waktuSekarang,
                'user_agent' => $userAgent
            ]);
        } else {
            $pengunjungModel->insert([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'last_activity' => $waktuSekarang,
                'tanggal' => $tanggal
            ]);
        }

        $pengunjungHariIni = $pengunjungModel
            ->where('tanggal', date('Y-m-d'))
            ->countAllResults();

        $totalPengunjung = $pengunjungModel->countAllResults();

        //menghitung pengunjung online
        $batasOnline = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $pengunjungOnline = $pengunjungModel
            ->where('last_activity >=', $batasOnline)
            ->countAllResults();

        $data = [
            'datalifestyle' => $lifestyle,
            'beritaPopuler' => $beritaPopuler,
            'pager' => $lifestyleModel->pager,
            'pengunjungHariIni' => $pengunjungHariIni,
            'totalPengunjung' => $totalPengunjung,
            'pengunjungOnline' => $pengunjungOnline
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

        $pengunjungModel = new PengunjungModel();
        
        $ip = $this->request->getIPAddress();
        $agent = $this->request->getUserAgent();
        $user_agent = $agent->getAgentString();
        $now = date('Y-m-d H:i:s');

        // Hapus data pengunjung yang tidak aktif lebih dari 5 menit
        $pengunjungModel->where('last_activity <', date('Y-m-d H:i:s', strtotime('-5 minutes')))->delete();

        // Cek apakah sudah ada data untuk IP dan user agent
        $existing = $pengunjungModel
            ->where('ip_address', $ip)
            ->where('user_agent', $user_agent)
            ->first();

            if ($existing) {
                $pengunjungModel->update($existing['id'], ['last_activity' => $now]);
            
            } else {
                $pengunjungModel->insert([
                    'ip_address' => $ip,
                    'user_agent' => $user_agent,
                    'last_activity' => $now
                ]);
            }

        $pengunjungModel = new PengunjungModel();

        $ip = $this->request->getIPAddress();
        $tanggal = date('Y-m-d');
        $waktuSekarang = date('Y-m-d H:i:s');
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

        $cek = $pengunjungModel
            ->where('ip_address', $ip)
            ->where('tanggal', $tanggal)
            ->first();

        if ($cek) {
            $pengunjungModel->update($cek['id'], [
                'last_activity' => $waktuSekarang,
                'user_agent' => $userAgent
            ]);
        } else {
            $pengunjungModel->insert([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'last_activity' => $waktuSekarang,
                'tanggal' => $tanggal
            ]);
        }

        $pengunjungHariIni = $pengunjungModel
            ->where('tanggal', date('Y-m-d'))
            ->countAllResults();

        $totalPengunjung = $pengunjungModel->countAllResults();

        //menghitung pengunjung online
        $batasOnline = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $pengunjungOnline = $pengunjungModel
            ->where('last_activity >=', $batasOnline)
            ->countAllResults();

        return view('halaman_depan/detail_lifestyle', [
            'lifestyle' => $lifestyle,
            'pengunjungHariIni' => $pengunjungHariIni,
            'totalPengunjung' => $totalPengunjung,
            'pengunjungOnline' => $pengunjungOnline
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

        $pengunjungModel = new PengunjungModel();
        
        $ip = $this->request->getIPAddress();
        $agent = $this->request->getUserAgent();
        $user_agent = $agent->getAgentString();
        $now = date('Y-m-d H:i:s');

        // Hapus data pengunjung yang tidak aktif lebih dari 5 menit
        $pengunjungModel->where('last_activity <', date('Y-m-d H:i:s', strtotime('-5 minutes')))->delete();

        // Cek apakah sudah ada data untuk IP dan user agent
        $existing = $pengunjungModel
            ->where('ip_address', $ip)
            ->where('user_agent', $user_agent)
            ->first();

            if ($existing) {
                $pengunjungModel->update($existing['id'], ['last_activity' => $now]);
            
            } else {
                $pengunjungModel->insert([
                    'ip_address' => $ip,
                    'user_agent' => $user_agent,
                    'last_activity' => $now
                ]);
            }

        $pengunjungModel = new PengunjungModel();

        $ip = $this->request->getIPAddress();
        $tanggal = date('Y-m-d');
        $waktuSekarang = date('Y-m-d H:i:s');
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

        $cek = $pengunjungModel
            ->where('ip_address', $ip)
            ->where('tanggal', $tanggal)
            ->first();

        if ($cek) {
            $pengunjungModel->update($cek['id'], [
                'last_activity' => $waktuSekarang,
                'user_agent' => $userAgent
            ]);
        } else {
            $pengunjungModel->insert([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'last_activity' => $waktuSekarang,
                'tanggal' => $tanggal
            ]);
        }

        $pengunjungHariIni = $pengunjungModel
            ->where('tanggal', date('Y-m-d'))
            ->countAllResults();

        $totalPengunjung = $pengunjungModel->countAllResults();

        //menghitung pengunjung online
        $batasOnline = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $pengunjungOnline = $pengunjungModel
            ->where('last_activity >=', $batasOnline)
            ->countAllResults();

        $data = [
            'datalifestyle' => $dataKategori,
            'kategori' => ucfirst($kategori),
            'pengunjungHariIni' => $pengunjungHariIni,
            'totalPengunjung' => $totalPengunjung,
            'pengunjungOnline' => $pengunjungOnline
        ];

        return view('halaman_depan/lifestyle_kategori', $data);
    }
}
