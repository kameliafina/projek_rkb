<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaFotoModel;
use App\Models\BeritaModel;
use App\Models\HistoriaDetailModel;
use App\Models\HistoriaModel;
use App\Models\IklanModel;
use App\Models\IlmModel;
use App\Models\InfografisModel;
use App\Models\JadwalModel;
use App\Models\KomentarModel;
use App\Models\LifestyleModel;
use App\Models\PengunjungModel;
use App\Models\ProfilModel;
use App\Models\ProgramModel;
use App\Models\StatementModel;
use CodeIgniter\HTTP\ResponseInterface;

class CtrlHalamanDepan extends BaseController
{
    public function index()
    {
        $beritaModel = new BeritaModel();
        $berita = $beritaModel->orderBy('created_at', 'DESC')->findAll(5); 
        $berita = $beritaModel->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.created_at', 'DESC')
                ->paginate(5, 'berita');

        $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();

        $beritafoto = new BeritaFotoModel();
        $ambil = $beritafoto->findAll();

        $infografisModel = new InfografisModel();
        $infografis = $infografisModel->orderBy('id', 'DESC')->findAll();
        
        $statement = new StatementModel();
        $statement = $statement->orderBy('id', 'DESC')->findAll();

        $iklan = new IklanModel();
        $iklan = $iklan->orderBy('id', 'DESC')->findAll();
        
        $jadwal = new JadwalModel();
        $jadwal = $jadwal->orderBy('id', 'DESC')->findAll();

        $apiKey = 'AIzaSyB7ueBHS8NGCzIdL0i46dPMYJJeqGEbHtA';
        $channelId = 'UCbeghIwxvjCV2zsRUhrD1aQ';
        $maxResults = 6;

        $url = "https://www.googleapis.com/youtube/v3/search?key={$apiKey}&channelId={$channelId}&order=date&part=snippet&type=video&maxResults={$maxResults}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // bisa dihilangkan di server production
        $response = curl_exec($ch);
        curl_close($ch);
        
        $dataArray = json_decode($response, true);

        $youtubeVideos = [];

//         echo '<pre>';
// print_r($dataArray);
// echo '</pre>';
// exit;

        if (!empty($dataArray['items'])) {
            foreach ($dataArray['items'] as $item) {
                $youtubeVideos[] = [
                    'title' => $item['snippet']['title'],
                    'thumbnail' => $item['snippet']['thumbnails']['medium']['url'],
                    'videoId' => $item['id']['videoId'],
                    'channelTitle' => $item['snippet']['channelTitle']
                ];
            }
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

            // Hitung pengunjung hari ini
            $today = date('Y-m-d');
            $pengunjungHariIni = $pengunjungModel
                ->where('last_activity >=', $today . ' 00:00:00')
                ->countAllResults();
                
                // Hitung pengunjung online
                $pengunjungOnline = $pengunjungModel
                    ->where('last_activity >=', date('Y-m-d H:i:s', strtotime('-5 minutes')))
                    ->countAllResults();


    $data = [
        'databerita' => $berita,
        'beritaPopuler' => $beritaPopuler,
        'beritafoto' => $ambil,
        'infografis' => $infografis,
        'statement' => $statement,
        'iklan' => $iklan,
        'jadwal' => $jadwal,
        'youtubeVideos' => $youtubeVideos,
        'pengunjungHariIni' => $pengunjungHariIni,
        'pengunjungOnline' => $pengunjungOnline,
        'pager' => $beritaModel->pager
    ];

    
        return view('halaman_depan/index', $data);
}

    private function fetchYoutubeData($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_SSL_VERIFYPEER => false
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function berita()
    {
        $beritaModel = new BeritaModel();
        $berita = $beritaModel->orderBy('created_at', 'DESC')->findAll(5); // ambil 5 berita terbaru
        $berita = $beritaModel->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.created_at', 'DESC')
                ->paginate(5, 'berita');

        $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();

    $data = [
        'databerita' => $berita,
        'beritaPopuler' => $beritaPopuler,
        'pager' => $beritaModel->pager
    ];
        return view('halaman_depan/berita', $data);
    }

    public function detail($slug)
{
    $beritaModel = new BeritaModel();
    $komentarModel = new KomentarModel();

    $berita = $beritaModel
        ->select('berita.*, kategori_berita.nama_kategori_b')
        ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
        ->where('berita.slug', $slug)
        ->first();

    if (!$berita) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan.');
    }

    $beritaPopuler = $beritaModel
        ->select('berita.*, kategori_berita.nama_kategori_b')
        ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
        ->orderBy('berita.views', 'DESC')
        ->findAll(5);

    $beritaModel->update($berita['id'], ['views' => $berita['views'] + 1]);

    $komentar = (new \App\Models\KomentarModel())
        ->where('target_id', $berita['id'])
        ->where('target_type', 'berita')
        ->orderBy('created_at', 'desc')
        ->paginate(5, 'komentar');

    $pager = \Config\Services::pager();

    return view('halaman_depan/detail_berita', [
        'berita' => $berita, 
        'beritaPopuler' => $beritaPopuler,
        'komentar' => $komentar,
        'pager' => $pager,
        'target_type' => 'berita'
    ]);
}


public function detail_foto($slug)
    {
    $beritafotoModel = new BeritaFotoModel();
    $beritaModel = new BeritaModel();
    $komentarModel = new KomentarModel();

    $berita = $beritafotoModel
    ->where('slug', $slug)
    ->first();

    $beritaPopuler = $beritaModel
        ->select('berita.*, kategori_berita.nama_kategori_b')
        ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
        ->orderBy('berita.views', 'DESC')
        ->findAll(5);

    if (!$berita) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan.');
    }

    $komentar = $komentarModel
        ->where('target_id', $berita['id'])
        ->where('target_type', 'berita_foto')
        ->orderBy('created_at', 'desc')
        ->paginate(5, 'komentar');

        $pager = \Config\Services::pager();


    return view('halaman_depan/detail_foto', [
        'berita' => $berita, 
        'beritaPopuler' => $beritaPopuler,
        'komentar' => $komentar,
        'pager' => $pager
    ]);
}


    public function berita_pkl()
    {
    $beritaModel = new BeritaModel();

    // ambil berita dengan kategori nama 'Pekalongan'
    $beritaPekalongan = $beritaModel
        ->select('berita.*, kategori_berita.nama_kategori_b')
        ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
        ->where('kategori_berita.nama_kategori_b', 'Kota Pekalongan') // filter berdasarkan nama kategori Pekalongan
        ->orderBy('berita.created_at', 'DESC')
        ->paginate(5, 'beritaPekalongan');

    $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();

    $data = [
        'databerita' => $beritaPekalongan,
        'beritaPopuler' => $beritaPopuler,
        'pager' => $beritaModel->pager
    ];

    return view('halaman_depan/berita_pkl', $data);
    }

    public function berita_nasional()
    {
        $beritaModel = new BeritaModel();

        // ambil berita dengan kategori nama 'Nasional'
        $beritaNasional = $beritaModel
            ->select('berita.*, kategori_berita.nama_kategori_b')
            ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
            ->where('kategori_berita.nama_kategori_b', 'Nasional') // filter berdasarkan nama kategori Nasional
            ->orderBy('berita.created_at', 'DESC')
            ->paginate(5, 'beritaNasional');

        $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();

        $data = [
            'databerita' => $beritaNasional,
            'beritaPopuler' => $beritaPopuler,
            'pager' => $beritaModel->pager
        ];

        return view('halaman_depan/berita_nasional', $data);
    }
    public function berita_internasional()
    {
        $beritaModel = new BeritaModel();

        // ambil berita dengan kategori nama 'Internasional'
        $beritaInternasional = $beritaModel
            ->select('berita.*, kategori_berita.nama_kategori_b')
            ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
            ->where('kategori_berita.nama_kategori_b', 'Internasional') // filter berdasarkan nama kategori Internasional
            ->orderBy('berita.created_at', 'DESC')
            ->paginate(5, 'beritaInternasional');

            $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();

        $data = [
            'databerita' => $beritaInternasional,
            'beritaPopuler' => $beritaPopuler,
            'pager' => $beritaModel->pager
        ];

        return view('halaman_depan/berita_internasional', $data);
    }

    public function berita_jateng()
    {
        $beritaModel = new BeritaModel();

        // ambil berita dengan kategori nama 'Jawa Tengah'
        $beritaJateng = $beritaModel
            ->select('berita.*, kategori_berita.nama_kategori_b')
            ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
            ->where('kategori_berita.nama_kategori_b', 'Jawa Tengah') // filter berdasarkan nama kategori Jawa Tengah
            ->orderBy('berita.created_at', 'DESC')
            ->paginate(5, 'beritaJateng');
            
        $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();

        $data = [
            'databerita' => $beritaJateng,
            'beritaPopuler' => $beritaPopuler,
            'pager' => $beritaModel->pager
        ];

        return view('halaman_depan/berita_jateng', $data);
    }

    public function berita_olahraga()
    {
        $beritaModel = new BeritaModel();

        $beritaOlahraga = $beritaModel
            ->select('berita.*, kategori_berita.nama_kategori_b')
            ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
            ->where('kategori_berita.nama_kategori_b', 'Olahraga') // filter berdasarkan nama kategori Jawa Tengah
            ->orderBy('berita.created_at', 'DESC')
            ->paginate(5, 'beritaOlahraga');

        $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();

        $data = [
            'databerita' => $beritaOlahraga,
            'beritaPopuler' => $beritaPopuler,
            'pager' => $beritaModel->pager
        ];

        return view('halaman_depan/berita_olahraga', $data);
    }


    

    public function historia()
    {
        $historia = new HistoriaModel();
        $ambil = $historia->findAll();
        $data = [
            'historia' => $ambil
        ];

        return view('halaman_depan/historia', $data);
    }

    public function detail_his($slug)
{
    $historiaModel = new HistoriaModel();
    $historiaFotoModel = new HistoriaDetailModel();
    $beritaModel = new BeritaModel();
    $komentarModel = new KomentarModel();

    // Ambil satu historia berdasarkan slug
    $historia = $historiaModel
        ->where('slug', $slug)
        ->first();

    if (!$historia) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Historia tidak ditemukan.");
    }

    // Ambil daftar foto berdasarkan historia_id
    $fotoDeskripsi = $historiaFotoModel
        ->where('historia_id', $historia['id'])
        ->findAll();

    $beritaPopuler = $beritaModel
        ->select('berita.*, kategori_berita.nama_kategori_b')
        ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
        ->orderBy('berita.views', 'DESC')
        ->findAll(5);

    $komentar = $komentarModel
        ->where('target_id', $historia['id'])
        ->where('target_type', 'historia')
        ->orderBy('created_at', 'desc')
        ->paginate(5, 'komentar');

    $pager = \Config\Services::pager();

    $data = [
        'historia' => $historia,
        'fotoDeskripsi' => $fotoDeskripsi,
        'beritaPopuler' => $beritaPopuler,
        'komentar' => $komentar,
        'pager' => $pager,
        'target_type' => 'historia'
    ];

    return view('halaman_depan/detail_historia', $data);
}



    public function lifestyle()
    {
        return view('halaman_depan/lifestyle');
    }

     public function wisata()
    {
        $lifestyleModel = new LifestyleModel();
        $beritaModel = new BeritaModel();
        
        $wisata = $lifestyleModel
            ->select('lifestyle.*, kategori_lifestyle.nama_kategori_l')
            ->join('kategori_lifestyle', 'kategori_lifestyle.id = lifestyle.kategori_id')
            ->where('kategori_lifestyle.nama_kategori_l', 'Wisata') // filter berdasarkan nama kategori Jawa Tengah
            ->orderBy('lifestyle.created_at', 'DESC')
            ->paginate(5, 'lifestyle');

        $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();

        $data = [
            'datalifestyle' => $wisata,
            'beritaPopuler' => $beritaPopuler,
            'pager' => $lifestyleModel->pager
        ];
        return view('halaman_depan/wisata', $data);
            
    }

    public function hiburan()
    {
        $lifestyleModel = new LifestyleModel();
        $beritaModel = new BeritaModel();

        // ambil berita dengan kategori nama 'Jawa Tengah'
        $wisata = $lifestyleModel
            ->select('lifestyle.*, kategori_lifestyle.nama_kategori_l')
            ->join('kategori_lifestyle', 'kategori_lifestyle.id = lifestyle.kategori_id')
            ->where('kategori_lifestyle.nama_kategori_l', 'hiburan') // filter berdasarkan nama kategori Jawa Tengah
            ->orderBy('lifestyle.created_at', 'DESC')
            ->paginate(5, 'wisata');

        $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();
        
        $data = [
            'datalifestyle' => $wisata,
            'beritaPopuler' => $beritaPopuler,
            'pager' => $lifestyleModel->pager
        ];
        return view('halaman_depan/hiburan', $data);
            
    }

    public function kesehatan()
    {
        $lifestyleModel = new LifestyleModel();
        $beritaModel = new BeritaModel();

        // ambil berita dengan kategori nama 'Jawa Tengah'
        $wisata = $lifestyleModel
            ->select('lifestyle.*, kategori_lifestyle.nama_kategori_l')
            ->join('kategori_lifestyle', 'kategori_lifestyle.id = lifestyle.kategori_id')
            ->where('kategori_lifestyle.nama_kategori_l', 'kesehatan') // filter berdasarkan nama kategori Jawa Tengah
            ->orderBy('lifestyle.created_at', 'DESC')
            ->paginate(5, 'wisata');

        $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();

        
        $data = [
            'datalifestyle' => $wisata,
            'beritaPopuler' => $beritaPopuler,
            'pager' => $lifestyleModel->pager
        ];
        return view('halaman_depan/kesehatan', $data);
            
    }

    public function tips()
    {
        $lifestyleModel = new LifestyleModel();
        $beritaModel = new BeritaModel();

        // ambil berita dengan kategori nama 'Jawa Tengah'
        $wisata = $lifestyleModel
            ->select('lifestyle.*, kategori_lifestyle.nama_kategori_l')
            ->join('kategori_lifestyle', 'kategori_lifestyle.id = lifestyle.kategori_id')
            ->where('kategori_lifestyle.nama_kategori_l', 'tips dan trik') // filter berdasarkan nama kategori Jawa Tengah
            ->orderBy('lifestyle.created_at', 'DESC')
            ->paginate(5, 'wisata');

        $beritaPopuler = $beritaModel
                ->select('berita.*, kategori_berita.nama_kategori_b')
                ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                ->orderBy('berita.views', 'DESC')
                ->findAll(5);

        $pager = \Config\Services::pager();
            
        $data = [
            'datalifestyle' => $wisata,
            'beritaPopuler' => $beritaPopuler,
            'pager' => $lifestyleModel->pager
        ];
        return view('halaman_depan/tips', $data);
            
    }

    public function detail_l($slug)
    {
        $lifestyleModel = new LifestyleModel();
        $komentarModel = new KomentarModel();

        $lifestyle = $lifestyleModel
            ->select('lifestyle.*, kategori_lifestyle.nama_kategori_l')
            ->join('kategori_lifestyle', 'kategori_lifestyle.id = lifestyle.kategori_id')
            ->where('slug', $slug)
            ->first();


    $beritaModel = new BeritaModel();
    $beritaPopuler = $beritaModel
        ->select('berita.*, kategori_berita.nama_kategori_b')
        ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
        ->orderBy('berita.views', 'DESC')
        ->findAll(5);

        $komentar = $komentarModel
        ->where('target_id', $lifestyle['id'])
        ->where('target_type', 'lifestyle')
        ->orderBy('created_at', 'desc')
        ->paginate(5, 'komentar');

        $pager = \Config\Services::pager();

    if (!$lifestyle) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita tidak ditemukan.');
    }

    return view('halaman_depan/detail_l', [
        'lifestyle' => $lifestyle, 
        'beritaPopuler' => $beritaPopuler,
        'komentar' => $komentar,
        'pager' => $pager,
        'target_type' => 'lifestyle'
    ]);
}

    public function profil()
    {
        $profil = new ProfilModel();
        $ambil = $profil->findAll();

        $data = [
            'profil' => $ambil
        ];
        return view('halaman_depan/profil', $data);
    }
    public function program()
    {
        $program = new ProgramModel();
        $ambil = $program->findAll();
        $data = [
            'program' => $ambil
        ];

        return view('halaman_depan/program', $data);
    }

    public function ilm()
    {
        $ilm = new IlmModel();
        $ambil = $ilm->findAll();

        $data = [
            'datailm' => $ambil
        ];

        return view('halaman_depan/ilm', $data);
    }

    public function simpankomentar()
    {
        $komentarModel = new KomentarModel();

        $data = [
            'nama' => session()->get('name'),
            'komentar' => $this->request->getPost('komentar'),
            'target_id' => $this->request->getPost('target_id'),
            'target_type' => $this->request->getPost('target_type'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $komentarModel->insert($data);

        // Redirect balik ke halaman detail
        $targetType = $data['target_type'];
        $targetId = $data['target_id'];

        if ($targetType === 'berita') {
            $beritaModel = new \App\Models\BeritaModel();
            $slug = $beritaModel->find($targetId)['slug'];
            return redirect()->to(site_url('detail/' . $slug));
        } elseif ($targetType === 'lifestyle') {
            $lifestyleModel = new \App\Models\LifestyleModel();
            $slug = $lifestyleModel->find($targetId)['slug'];
            return redirect()->to(site_url('detail_l/' . $slug));
        } elseif ($targetType === 'historia') {
            $historiaModel = new \App\Models\HistoriaModel();
            $slug = $historiaModel->find($targetId)['slug'];
            return redirect()->to(site_url('detail_his/' . $slug));
        }

        // Jika target_type tidak dikenal
        return redirect()->back()->with('error', 'Tipe komentar tidak dikenali.');
    }

    public function tes()
    {
        return view('halaman_depan/tes');
    }


}
