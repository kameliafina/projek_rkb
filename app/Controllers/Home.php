<?php

namespace App\Controllers;

use App\Models\BeritaFotoModel;
use App\Models\BeritaModel;
use App\Models\IklanModel;
use App\Models\InfografisModel;
use App\Models\JadwalModel;
use App\Models\PengunjungModel;
use App\Models\StatementModel;

class Home extends BaseController
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

    
}
