<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('asset-radio') ?>/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
                </ul>
                <form class="d-flex" action="<?= site_url('/berita/search') ?>" method="get">
                    <input class="form-control me-2" type="search" name="q" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
          </div>
        </div>
      </nav>
  </header>

      <div class="container">
        <!-- jadwal radio -->
        <div class="row">
            
        </div>

        <!-- play -->
        <div class="row">
            <div class="col-12 p-3">
              <div class="container">
                <div class="row g-2">
                  <div class="col-12">
                    <div class="category-buttons d-flex flex-wrap gap-3">
                      <a href="<?= site_url('/wisata') ?>" class="btn-category">Wisata</a>
                      <a href="<?= site_url('/hiburan') ?>" class="btn-category">Hiburan</a>
                      <a href="<?= site_url('/kesehatan') ?>" class="btn-category">Kesehatan</a>
                      <a href="<?= site_url('/tips') ?>" class="btn-category">Tips & Trik</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          
          
        <!-- berita -->
        <div class="row">
          <div class="col-12 col-md-6 p-3">
            <div class="container">
                <div class="row g-2">
                <?php foreach ($datalifestyle as $b) : ?>
                      <div class="col-12">
                        <a href="<?= site_url('/detail_l/' . $b['id']) ?>" class="text-decoration-none text-dark">
                          <div class="news-card p-3 border bg-light rounded-4 d-flex">
                            <img src="<?= base_url('upload/' . $b['foto']) ?>" alt="Berita" class="berita rounded-4">
                            <div class="news-content">
                              <span class="kategori"><?= esc($b['nama_kategori_l']) ?></span>
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
                        <div class="news-item">
                            <span class="rank">1</span>
                            <img src="<?php echo base_url('asset-radio') ?>/img/berita3.jpeg" alt="Berita" class="news-img">
                            <div class="news-content">
                                <h4>Penggerudukan Rapat RUU TNI di Fairmont Berujung Laporan ke Polisi</h4>
                                <p class="views">
                                    <img src="<?php echo base_url('asset-radio') ?>/img/mata.png" alt="Views" class="icon-view"> 20
                                </p>
                            </div>
                        </div>
                        <div class="news-item">
                            <span class="rank">2</span>
                            <img src="<?php echo base_url('asset-radio') ?>/img/berita3.jpeg" alt="Berita" class="news-img">
                            <div class="news-content">
                                <h4>Penggerudukan Rapat RUU TNI di Fairmont Berujung Laporan ke Polisi</h4>
                                <p class="views">
                                    <img src="<?php echo base_url('asset-radio') ?>/img/mata.png" alt="Views" class="icon-view"> 20
                                </p>
                            </div>
                        </div>
                        <div class="news-item">
                            <span class="rank">3</span>
                            <img src="<?php echo base_url('asset-radio') ?>/img/berita3.jpeg" alt="Berita" class="news-img">
                            <div class="news-content">
                                <h4>Penggerudukan Rapat RUU TNI di Fairmont Berujung Laporan ke Polisi</h4>
                                <p class="views">
                                    <img src="<?php echo base_url('asset-radio') ?>/img/mata.png" alt="Views" class="icon-view"> 20
                                </p>
                            </div>
                        </div>
                        <div class="news-item">
                            <span class="rank">4</span>
                            <img src="<?php echo base_url('asset-radio') ?>/img/berita3.jpeg" alt="Berita" class="news-img">
                            <div class="news-content">
                                <h4>Penggerudukan Rapat RUU TNI di Fairmont Berujung Laporan ke Polisi</h4>
                                <p class="views">
                                    <img src="<?php echo base_url('asset-radio') ?>/img/mata.png" alt="Views" class="icon-view"> 20
                                </p>
                            </div>
                        </div>
                        <div class="news-item">
                            <span class="rank">5</span>
                            <img src="<?php echo base_url('asset-radio') ?>/img/berita3.jpeg" alt="Berita" class="news-img">
                            <div class="news-content">
                                <h4>Penggerudukan Rapat RUU TNI di Fairmont Berujung Laporan ke Polisi</h4>
                                <p class="views">
                                    <img src="<?php echo base_url('asset-radio') ?>/img/mata.png" alt="Views" class="icon-view"> 20
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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
    
</body>
</html>