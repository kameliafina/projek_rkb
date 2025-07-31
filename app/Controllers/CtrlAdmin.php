<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomentarModel;
use App\Models\SensorModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlAdmin extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $data['user'] = $user->find($id);

        $db = \Config\Database::connect();
        $builder = $db->table('berita');
        
        // Grouping by month and year
        $query = $builder
        ->select("MONTH(created_at) AS bulan, YEAR(created_at) AS tahun, COUNT(*) AS total")
        ->groupBy("YEAR(created_at), MONTH(created_at)")
        ->orderBy("tahun", "ASC")
        ->orderBy("bulan", "ASC")
        ->get();

        $data['laporan'] = $query->getResultArray();
        
        return view('main/laporan', $data);
    }

    public function tambah_berita()
    {
        return view('admin/tambahberita');
    }

    public function iklan()
    {
        return view('admin/iklan');
    }

    public function petinggi()
    {
        return view('main/layout2');
    }

    public function laporanBulanan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('berita');

    // Grouping by month and year
    $query = $builder
        ->select("MONTH(created_at) AS bulan, YEAR(created_at) AS tahun, COUNT(*) AS total")
        ->groupBy("YEAR(created_at), MONTH(created_at)")
        ->orderBy("tahun", "ASC")
        ->orderBy("bulan", "ASC")
        ->get();

    $data['laporan'] = $query->getResultArray();

    return view('main/laporan', $data);
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

    public function sensor()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);

        $db = \Config\Database::connect();

        $model = new SensorModel();
        $data['kata'] = $model->findAll();
        $data['user'] = $userData;

        return view('sensor/index', $data);
    }

    public function tambah_sensor()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);

        $db = \Config\Database::connect();

        $data['user'] = $userData;
        $data['kata'] = [];

        return view('sensor/tambah', $data);
    }

    public function simpan()
    {
         $model = new SensorModel();
         $kata = $this->request->getPost('kata');

         if ($kata) {
            $model->save(['kata' => $kata]);
            return redirect()->to(site_url('/sensor'))->with('success', 'Kata berhasil ditambahkan.');
        }

        return redirect()->back()->with('error', 'Kata tidak boleh kosong.');
    }

    public function hapus_sensor($id)
    {
        $model = new SensorModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Kata berhasil dihapus');
        return redirect()->to('/admin/sensor');
    }

    public function edit_sensor($id)
    {
        $user = new UserModel();
        $idUser = session()->get('id');
        $userData = $user->find($idUser);
        $data['user'] = $userData;

        $model = new SensorModel();
        $data['kata'] = $model->find($id);

        if (!$data['kata']) {
            session()->setFlashdata('error', 'Kata tidak ditemukan');
            return redirect()->to('/admin/sensor');
        }

        return view('sensor/edit', $data);
    }

    public function update_sensor($id)
    {
        $kata = $this->request->getPost('kata');
        $db = \Config\Database::connect();
    
        $builder = $db->table('kata_terlarang');
        $updated = $builder->where('id', $id)->update(['kata' => $kata]);

        if ($updated) {
            return redirect()->to('/sensor')->with('succes', 'update berhasil');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui kata');
        }
        
        exit;
    }

    public function komentar()
    {
        $user = new UserModel();
        $id = session()->get('id');
        $userData = $user->find($id);

        $db = \Config\Database::connect();

        $model = new KomentarModel();
        $data['komentar'] = $model
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $data['pager'] = $model->pager;
        $data['user'] = $userData;

        return view('komentar/index', $data);
    }

    public function hapus_komentar($id)
    {
        $model = new KomentarModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Komentar berhasil dihapus');
        return redirect()->to('/komentar');
    }


   

}
