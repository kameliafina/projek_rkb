<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Kota Batik</title>
    <link rel="stylesheet" href="<?php echo base_url('asset-radio') ?>/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <!-- navbar -->
  <header>
        <nav class="navbar navbar-expand-lg navbar-brand2">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= site_url('/halamanindex') ?>">
                    <img src="<?php echo base_url('asset-radio') ?>/img/logo-rkb.png" alt="" class="custom-logo">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul>
                    <li><a href="<?= site_url('/berita') ?>">Berita</a></li>
                    <li><a href="<?= site_url('/program') ?>">Program</a></li>
                    <li><a href="<?= site_url('/lifestyle2') ?>">Lifestyle</a></li>
                    <li><a href="<?= site_url('/profil') ?>">Profil</a></li>
                    <li><a href="<?= site_url('/historia') ?>">Historia</a></li>
                    <li><a href="<?= site_url('/ilm2') ?>">ILM</a></li>
                </ul>
                <form class="d-flex" action="<?= site_url('/berita/search') ?>" method="get">
                    <input class="form-control me-2" type="search" name="q" placeholder="" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
        <div class="col-12 p-3 jadwal-radio">
    Jadwal Hari Ini
    <div class="jadwal-wrapper">
        <div class="jadwal-scroll">
            <div class="jadwal-track">
                <?php foreach ($jadwal as $j) : ?>
                    <div class="jadwal-item">
                        <div class="p-3 border rounded-4">
                            <?= esc($j['jam']) ?><br><br><?= esc($j['judul']) ?><br>
                            <span class="pembawa-acara">(Pembawa acara: <?= esc($j['pembawa']) ?>)</span>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php foreach ($jadwal as $j) : ?>
                    <div class="jadwal-item">
                        <div class="p-3 border rounded-4">
                            <?= esc($j['jam']) ?><br><br><?= esc($j['judul']) ?><br>
                            <span class="pembawa-acara">(Pembawa acara: <?= esc($j['pembawa']) ?>)</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

            <div class="radio-wrapper">
              <div class="radio-container">
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

              <div class="radio-container2">
                  <div class="row g-2">
  <div class="col-6">
    <div class="radio-card p-3 border rounded-5">
      <audio id="radio-player" src="https://studio1.indostreamers.com:8010/stream/1/" type="audio/mpeg"></audio>
      <a class="navbar-brand" href='https://www.youtube.com/@radiokotabatikpekalongan/streams' target="_blank" rel="noopener noreferrer">
        <img src="<?php echo base_url('asset-radio') ?>/img/streaming_yt.png" alt="Radio Kota Batik" class="radio-logo">
        </a>
      <div class="radio-info">
        <p id="live-schedule" class="text-danger fw-bold"></p> <!-- Tampilkan waktu live -->
      </div>
    </div>
  </div>
</div>
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
        
      

        <!-- berita -->
        <div class="row">
          <div class="col-12 col-md-6 p-3">
            <div class="container">
                <div class="row g-2">
                    <?php foreach ($databerita as $b) : ?>
                      <div class="col-12">
                        <a href="<?= site_url('/detail/' . $b['id']) ?>" class="text-decoration-none text-dark">
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
                <div class="row">
                  <div class="popular-news">
                    <div class="title">
                        <h2>BERITA POPULER</h2>
                    </div>
                    <div class="news-list">
                        <div class="news-list">
                      <?php $no = 1; foreach ($beritaPopuler as $berita): ?>
                        <div class="news-item">
                          <span class="rank"><?= $no++; ?></span>
                          <img src="<?= base_url('upload/' . $berita['foto']) ?>" alt="Berita" class="news-img"> <!-- Pastikan kolom gambar ada -->
                          <div class="news-content">
                            <h4><?= $berita['judul']; ?></h4>
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
                
                </div>
                
            </div>
        </div>

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

        <!-- berita foto -->
        <div class="photo-news">
          <h2 class="section-title">BERITA FOTO</h2>
          <div class="photo-grid">
          <?php foreach ($beritafoto as $beritafoto) : ?>
              <div class="photo-item">
                  <img src="<?= base_url('upload/' . $beritafoto['foto']) ?>" alt="Berita Foto">
                  <div class="overlay">
                      <h4><?= esc($beritafoto['judul']) ?></h4>
                      <a href="<?= site_url('/detail/' . $beritafoto['id']) ?>">selengkapnya →</a>
                  </div>
              </div>
                <?php endforeach; ?>
          </div>
      </div>

        <div class="row">
    <div class="col-lg-6">
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
            <h2 class="section-title">Infografis</h2>
            <div class="col-md-8 d-flex justify-content-center mt-4">
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

<div class="mt-4">
    <h2 class="section-title">Pengunjung hari ini</h2>
    <div class="photo-grid">
            <p class="mb-1">Total Pengunjung Hari Ini: <strong><?= $pengunjungHariIni ?></strong></p>
            <p class="mb-0">Sedang Online: <strong><?= $pengunjungOnline ?></strong></p>
    </div>
</div>

</div>


  <div class="">
          <h2 class="section-title"></h2>
          <div class="photo-grid">
          </div>
      </div>




</div>


    </div>

    
    

    <!-- footer -->
    <footer class="footer">
      <div class="container text-white">
        <div class="row">
          <div class="col-md-4 text-start">
            <div class="logo-box mb-3">
              <img src="<?php echo base_url('asset-radio') ?>/img/logo-rkb.png" alt="Radio Kota Batik" class="logo-img">
            </div>            
            <p class="fw-bold mb-0">Kantor Pusat Radio Kota Batik</p>
            <p class="mb-2">Jl. Kurinci No.7, Podosugih, Kec. Pekalongan Barat., Kota Pekalongan, Jawa Tengah 51111</p>
            <p class="fw-bold">hubungi kami</p>
            <div class="social-icons">
              <i class="bi bi-twitter"></i>
              <i class="bi bi-instagram"></i>
              <i class="bi bi-facebook"></i>
              <i class="bi bi-tiktok"></i>
              <i class="bi bi-envelope"></i>
              <i class="bi bi-whatsapp"></i>
            </div>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4 text-end">
            <p class="fw-bold mb-0">Link Terkait</p>
            <p class="mb-1">Kominfo Pekalongan</p>
            <p><a href="<?= site_url('/login') ?>" class="text-dark text-decoration-none" target="_blank">
                Radio Kota Batik
            </a>
            </p>
            <p><a href="https://forms.gle/NnuF3Jk3cv3D9icJ7" class="text-dark text-decoration-none" target="_blank">
                Kritik Saran dan Bug Aplikasi
            </a>
            </p>
          </div>
        </div>
        <div class="text-center mt-4">
          <strong>Radio Kota Batik Pekalongan. © 2025 copyright rkb.co.id</strong>
        </div>
      </div>
    </footer>    
    
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
</script>

</body>
</html>


