<?php

namespace App\Controllers;

use App\Models\BeritaFotoModel;
use App\Models\BeritaModel;
use App\Models\IklanModel;
use App\Models\InfografisModel;
use App\Models\JadwalModel;
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
        $maxResults = 4;

        $url = "https://www.googleapis.com/youtube/v3/search?key={$apiKey}&channelId={$channelId}&order=date&part=snippet&type=video&maxResults={$maxResults}";

        $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // bisa dihilangkan di server production
$response = curl_exec($ch);
curl_close($ch);

$dataArray = json_decode($response, true);

        
        
        $youtubeVideos = [];

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


    $data = [
        'databerita' => $berita,
        'beritaPopuler' => $beritaPopuler,
        'beritafoto' => $ambil,
        'infografis' => $infografis,
        'statement' => $statement,
        'iklan' => $iklan,
        'jadwal' => $jadwal,
        'youtubeVideos' => $youtubeVideos,
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
