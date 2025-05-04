<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Ctrlyoutube extends BaseController
{
    public function index()
    {
        $apiKey = 'API_KEY_KAMU';
        $channelId = 'CHANNEL_ID_KAMU';
        $maxResults = 4;

        $url = "https://www.googleapis.com/youtube/v3/search?key={$apiKey}&channelId={$channelId}&order=date&part=snippet&type=video&maxResults={$maxResults}";

        $dataJson = file_get_contents($url);
        $dataArray = json_decode($dataJson, true);

        $videos = [];

        if (!empty($dataArray['items'])) {
            foreach ($dataArray['items'] as $item) {
                $videos[] = [
                    'title' => $item['snippet']['title'],
                    'thumbnail' => $item['snippet']['thumbnails']['medium']['url'],
                    'videoId' => $item['id']['videoId'],
                    'channelTitle' => $item['snippet']['channelTitle']
                ];
            }
        }

        return view('youtube_view', ['videos' => $videos]);
    }
}
