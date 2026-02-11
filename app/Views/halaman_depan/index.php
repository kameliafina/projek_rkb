<?= $this->extend('main/cihuy') ?>

<?= $this->section('isi') ?>
        <div class="col-12 p-3 jadwal-radio"> 
    <div class="jadwal-container">
        <div class="jadwal-wrapper">
            <div class="jadwal-track">
                <?php 
                // Kita gabungkan loop agar kode lebih ringkas jika tujuannya untuk infinite scroll
                $displayJadwal = array_merge($jadwal, $jadwal); 
                foreach ($displayJadwal as $j) : 
                ?>
                    <div class="jadwal-card">
                        <div class="card-inner">
                            <div class="image-box">
                                <img src="<?= base_url('uploads/jadwal/' . $j['foto']) ?>" alt="<?= esc($j['judul']) ?>">
                                <div class="time-badge"><?= esc($j['jam']) ?></div>
                            </div>
                            <div class="content-box"> 
                                <h5 class="program-title"><?= esc($j['judul']) ?></h5>
                                <p class="host-name">
                                    <i class="fas fa-microphone-alt"></i> <?= esc($j['pembawa']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>



    <!-- <div class="radio-container">
        <div class="row g-2">
            <div class="col-6">
                <div class="radio-card p-3 border rounded-5">
                    <audio id="radio-player" src="https://studio1.indostreamers.com:8010/stream/1/" type="audio/mpeg"></audio>
                    <img src="<?php echo base_url('asset-radio') ?>/img/streaming.png" alt="Radio Kota Batik" class="radio-logo">
                    <div class="radio-info">
                        <h4>Radio Kota Batik</h4>
                        <p>91.2 FM</p>
                    </div>
                    <img src="<?php echo base_url('asset-radio') ?>/img/play.png" alt="Play Button" class="play-button">
                    <div class="audio-controls">
                        <img src="<?php echo base_url('asset-radio') ?>/img/volume.png" alt="Volume" class="volume-icon">
                        <input type="range" class="volume-slider" min="0" max="100">
                    </div>
                </div>
            </div>
        </div>
    </div>

                  <div class="row g-2">
  <div class="col-6">
    <div class="radio-card p-3 border rounded-5">
      <audio id="radio-player" src="https://studio1.indostreamers.com:8010/stream/1/" type="audio/mpeg"></audio>
      <a class="navbar-brand" href='https://www.youtube.com/@radiokotabatikpekalongan/streams' target="_blank" rel="noopener noreferrer">
        <img src="<?php echo base_url('asset-radio') ?>/img/streaming_yt.png" alt="Radio Kota Batik" class="radio-logo">
        </a>
      <div class="radio-info">
        <p id="live-schedule" class="text-danger fw-bold"></p> <!-- Tampilkan waktu live -->
      <!-- </div>
    </div>
  </div>  -->
  
              </div>

              </div>
              


    </header>

      <div class="container">
        <!-- jadwal radio -->
        <div class="row">
        <div class="col-12 p-3 jadwal-radio">
    
</div>


</div>

        <!-- play -->
        
      

       <div class="row">
    <div class="col-12 col-md-6 p-3">
        <div class="container">
            <div class="row g-2">
                <?php foreach ($databerita as $b) : ?>
                    <div class="col-12">
                        <a href="<?= site_url('/detail/' . $b['slug']) ?>" class="text-decoration-none text-dark">
                            <div class="news-card p-3 border bg-light rounded-4 d-flex">
                                <img src="<?= base_url('upload/' . $b['foto']) ?>" alt="Berita" class="berita rounded-4">
                                <div class="news-content">
                                    <span class="kategori"><?= esc($b['nama_kategori_b']) ?></span>
                                    <h4 class="judul-berita"><?= esc($b['judul']) ?></h4>
                                    <p class="waktu">
                                        <img src="<?php echo base_url('asset-radio') ?>/img/jam.png" alt="Jam" class="icon-jam">
                                        <?= time_elapsed_string($b['created_at']) ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        
        <div class="row mb-4"> <div class="popular-news">
                <div class="title">
                    <h2>BERITA POPULER</h2>
                </div>
                <div class="news-list">
                    <?php $no = 1; foreach ($beritaPopuler as $berita): ?>
                        <div class="news-item">
                            <span class="rank"><?= $no++; ?></span>
                            <img src="<?= base_url('upload/' . $berita['foto']) ?>" alt="Berita" class="news-img">
                            <div class="news-content">
                                <h4>
                                    <a href="<?= site_url('/detail/' . $berita['slug']) ?>" class="text-decoration-none text-dark">
                                        <?= esc($berita['judul']) ?>
                                    </a>
                                </h4>
                                <p class="views">
                                    <img src="<?= base_url('asset-radio') ?>/img/mata.png" alt="Views" class="icon-view">
                                    <?= $berita['views']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="radio-wrapper mb-3">

            <div class="radio-card2 w-100 mb-3 p-3 border rounded-4"> 
        <div class="card-header">
            <audio id="radio-player" src="https://studio1.indostreamers.com:8010/stream/1/" type="audio/mpeg"></audio>
            <img src="<?php echo base_url('asset-radio') ?>/img/streaming.png" alt="Radio Kota Batik" class="radio-logo">
        </div>
        <div class="card-body"> 
            <div class="radio-info">
                <h4>Radio Kota Batik</h4>
                <p>91.2 FM</p>
            </div>
        </div>
        <div class="card-body">
            <center>
                <img src="<?php echo base_url('asset-radio') ?>/img/play.png" alt="Play Button" class="play-button">
                <div class="audio-controls">
                    <img src="<?php echo base_url('asset-radio') ?>/img/volume.png" alt="Volume" class="volume-icon">
                    <input type="range" class="volume-slider" min="0" max="100">
                </div>
            </center>
        </div>
    </div>
        </div>

        <div class="radio-card text-center w-100 mb-3 border rounded-4">
        <div class="card-header">
            <div id="youtube-live-container" class="mb-3"></div>

            <a class="navbar-brand" 
                href="https://www.youtube.com/@radiokotabatikpekalongan/streams" 
                target="_blank" rel="noopener noreferrer">
                <img src="<?= base_url('asset-radio') ?>/img/streaming_yt.png" 
                    alt="Radio Kota Batik" class="radio-logo mt-2">
            </a>
        </div>
            <div class="card-body">
                <div class="radio-info">
                    <p id="live-status" class="text-danger fw-bold"></p>
                </div>
            </div>
        </div>

    </div> </div> ```



        <div class="row">
    <div class="col-12 col-md-6 p-3">
        <div class="row g-2">
            <?php if (!empty($iklan)):?>
                <?php if (!empty($iklan[0])): ?>
            <div class="col-6">
                <div class="border bg-light rounded-4">
                    <img src="<?= base_url('upload/' . $iklan[0]['foto']) ?>" alt="iklan" class="custom-img2">
                </div>
            </div>
            <?php endif; ?>
            <?php if (!empty($iklan[1])): ?>
            <div class="col-6">
                <div class="border bg-light rounded-4">
                    <img src="<?= base_url('upload/' . $iklan[1]['foto']) ?>" alt="iklan" class="custom-img2">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if (!empty($iklan[2])): ?>
    <div class="col-12 col-md-6 p-3 d-flex justify-content-end"> <!-- Menggunakan d-flex dan justify-content-end untuk memindahkan ke kanan -->
        <div class="border bg-light rounded-4">
            <img src="<?= base_url('upload/' . $iklan[2]['foto']) ?>" alt="iklan" class="custom-img2">
        </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>
</div>

        

        <div class="row">
    <div class="col-lg-6 text-center">
        <h2 class="section-title">Infografis</h2>

        <div class="row g-2 justify-content-center">
            <!-- Gambar pertama -->
            <div class="col-md-8 d-flex justify-content-center">
                <div id="infografisCarousel" class="carousel slide" data-bs-ride="carousel" style="width: 100%; max-width: 400px;">
                    <?php if (!empty($infografis)): ?>
                        <div class="carousel-inner rounded-4 shadow">
                            <?php if (!empty($infografis[0])): ?>
                                <div class="carousel-item active">
                                    <img src="<?= base_url('upload/' . $infografis[0]['foto']) ?>" class="d-block w-100" style="max-height: 700px; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($infografis[1])): ?>
                                <div class="carousel-item">
                                    <img src="<?= base_url('upload/' . $infografis[1]['foto']) ?>" class="d-block w-100" style="max-height: 700px; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($infografis[2])): ?>
                                <div class="carousel-item">
                                    <img src="<?= base_url('upload/' . $infografis[2]['foto']) ?>" class="d-block w-100" style="max-height: 700px; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Kontrol Geser -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#infografisCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Sebelumnya</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#infografisCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Berikutnya</span>
                    </button>
                </div>
            </div>

            <!-- Gambar kedua -->
            <div class="col-12 text-center">
                <h2 class="section-title">Statement</h2>
            </div>
            <div class="col-md-8 d-flex justify-content-center">
                <div id="infografisCarousel2" class="carousel slide" data-bs-ride="carousel" style="width: 100%; max-width: 400px;">
                    <?php if (!empty($statement)): ?>
                        <div class="carousel-inner rounded-4 shadow">
                            <?php if (!empty($statement[0])): ?>
                                <div class="carousel-item active">
                                    <img src="<?= base_url('upload/' . $statement[0]['foto']) ?>" class="d-block w-100" style="max-height: 700px; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($statement[1])): ?>
                                <div class="carousel-item">
                                    <img src="<?= base_url('upload/' . $statement[1]['foto']) ?>" class="d-block w-100" style="max-height: 700px; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($statement[2])): ?>
                                <div class="carousel-item">
                                    <img src="<?= base_url('upload/' . $statement[2]['foto']) ?>" class="d-block w-100" style="max-height: 700px; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Kontrol Geser -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#infografisCarousel2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Sebelumnya</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#infografisCarousel2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Berikutnya</span>
                    </button>
                </div>
            </div>            
        </div>
    </div>

    

    <!-- Youtube -->
     <div class="col-lg-6 p-3">
        <h2 class="section-title">Youtube</h2>
        <div class="row g-2">
            <?php foreach ($youtubeVideos as $video): ?>
                <div class="col-12">
                    <div class="news-card d-flex border bg-light rounded-4 youtube-item shadow p-2 align-items-start">
                        <a href="https://www.youtube.com/watch?v=<?= $video['videoId'] ?>" target="_blank">
                <img src="<?= $video['thumbnail'] ?>" class="rounded-4 me-3" style="width: 40%; object-fit: cover;">
            </a>
            <div class="youtube-info w-100">
                <h6 class="video-title mb-1"><?= esc($video['title']) ?></h6>
                <div class="channel-info d-flex align-items-center mt-1">
                    <img src="<?= base_url('asset-radio/img/logo-rkb.png') ?>" class="channel-logo me-2" style="width: 25px; height: 25px;">
                    <span class="channel-name small text-muted"><?= esc($video['channelTitle']) ?></span>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>




</div>

<div class="">
          <h2></h2>
          
          </div>
      </div>

<!-- berita foto -->
        <section class="photo-news">
    <div class="container">
        <h2 class="section-title">ALBUM</h2>
        <div class="photo-grid">
            <?php foreach ($beritafoto as $item) : ?>
                <div class="photo-card">
                    <div class="photo-wrapper">
                        <img src="<?= base_url('upload/' . $item['foto']) ?>" alt="<?= esc($item['judul']) ?>">
                        <div class="photo-overlay">
                            <div class="overlay-content">
                                <h4><?= esc($item['judul']) ?></h4>
                                <a href="<?= site_url('/detail_foto/' . $item['slug']) ?>" class="btn-detail">
                                    Lihat Detail →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

  <div class="">
          <h2></h2>
          <div>
          </div>
      </div>


</div>
    </div>

<style>
    /* Container Utama */
.photo-news {
    padding: 20px 0;
    background-color: #f8f9fa;
}

.section-title {
    text-align: left;
    font-weight: 800;
    margin-bottom: 10px;
    position: relative;
    text-transform: uppercase;
    letter-spacing: 2px;
}

/* Layout Grid yang Responsif */
.photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    padding: 15px;
}

/* Card Styling */
.photo-card {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    background: #fff;
    transition: transform 0.3s ease;
}

.photo-card:hover {
    transform: translateY(-10px);
}

/* Wrapper untuk Efek Zoom */
.photo-wrapper {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.photo-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.photo-card:hover .photo-wrapper img {
    transform: scale(1.15);
}

/* Overlay Transparan */
.photo-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 60%, transparent 100%);
    display: flex;
    align-items: flex-end;
    padding: 25px;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.photo-card:hover .photo-overlay {
    opacity: 1;
}

/* Konten di dalam Overlay */
.overlay-content h4 {
    color: #fff;
    font-size: 1rem;
    margin-bottom: 15px;
    transform: translateY(20px);
    transition: transform 0.4s ease;
}

.photo-card:hover .overlay-content h4 {
    transform: translateY(0);
}

.btn-detail {
    display: inline-block;
    color: #fff;
    text-decoration: none;
    font-size: 0.9rem;
    border: 1px solid #fff;
    padding: 8px 15px;
    border-radius: 25px;
    transition: all 0.3s ease;
}

.btn-detail:hover {
    background: #fff;
    color: #333;
}


</style>

   
    
    <script>
  const playButton = document.querySelector('.play-button');
  const volumeSlider = document.querySelector('.volume-slider');
  const audioPlayer = document.getElementById('radio-player');

  let isPlaying = false;

  playButton.addEventListener('click', () => {
    if (!isPlaying) {
      audioPlayer.play();
      isPlaying = true;
      playButton.src = "<?= base_url('asset-radio') ?>/img/pause.png"; // ganti ke ikon pause
    } else {
      audioPlayer.pause();
      isPlaying = false;
      playButton.src = "<?= base_url('asset-radio') ?>/img/play.png"; // ganti ke ikon play
    }
  });

  volumeSlider.addEventListener('input', () => {
    audioPlayer.volume = volumeSlider.value / 100;
  });

  



  const API_KEY = 'AIzaSyB7ueBHS8NGCzIdL0i46dPMYJJeqGEbHtA';
  const CHANNEL_ID = 'UCbeghIwxvjCV2zsRUhrD1aQ';
  const apiUrl = `https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=${CHANNEL_ID}&eventType=live&type=video&key=${API_KEY}`;

  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      console.log("DATA YOUTUBE:", data); // Untuk debugging

      if (data.items && data.items.length > 0) {
        const videoId = data.items[0].id.videoId;
        const title = data.items[0].snippet.title;
        const scheduleTime = new Date(data.items[0].snippet.publishedAt).toLocaleString('id-ID');

        document.getElementById('live-schedule').innerHTML =
          `<a href="https://www.youtube.com/watch?v=${videoId}" target="_blank" class="text-danger">Live : ${title} (${scheduleTime})</a>`;
      } else {
        document.getElementById('live-schedule').innerText = "Tidak ada live dijadwalkan.";
      }
    })
    .catch(error => {
      console.error('Error YouTube API:', error);
      document.getElementById('live-schedule').innerText = "Gagal memuat jadwal live.";
    });


    //baru
    const apiKey = "AIzaSyB7ueBHS8NGCzIdL0i46dPMYJJeqGEbHtA";
const channelId = "UCxxnxya_32jcKj4yN1_kD7A"; // Ganti sesuai channel kamu

async function checkLiveStatus() {
  const url = `https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=${channelId}&eventType=live&type=video&key=${apiKey}`;
  const response = await fetch(url);
  const data = await response.json();

  const liveContainer = document.getElementById('youtube-live-container');
  const statusText = document.getElementById('live-status');
  const radio = document.getElementById('radio-player');

  if (data.items && data.items.length > 0) {
    const liveVideoId = data.items[0].id.videoId;
    liveContainer.innerHTML = `
      <div class="ratio ratio-16x9">
        <iframe 
          src="https://www.youtube.com/embed/${liveVideoId}?autoplay=1" 
          frameborder="0" 
          allow="autoplay; encrypted-media" 
          allowfullscreen>
        </iframe>
      </div>
    `;
    statusText.textContent = "🔴 Sedang LIVE di YouTube";
    radio.pause(); // hentikan audio radio ketika video live tampil
  } else {
    liveContainer.innerHTML = `
      <p class="text-muted">🎧 Tidak ada siaran langsung di YouTube saat ini.</p>
    `;
    statusText.textContent = "Offline";
  }
}

checkLiveStatus();
</script>

</body>
</html>

<?= $this->endSection('isi') ?>
