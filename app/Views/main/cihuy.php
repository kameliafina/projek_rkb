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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
                    <li><a href="<?= site_url('/berita') ?>"><strong>Berita</strong></a></li>
                    <li><a href="<?= site_url('/program') ?>"><strong>Program</strong></a></li>
                    <li><a href="<?= site_url('/lifestyle2') ?>"><strong>Lifestyle</strong></a></li>
                    <li><a href="<?= site_url('/profil') ?>"><strong>Profil</strong></a></li>
                    <li><a href="<?= site_url('/historia') ?>"><strong>Historia</strong></a></li>
                    <li><a href="<?= site_url('/ilm2') ?>"><strong>ILM</strong></a></li>
                </ul>
                <form class="d-flex ms-auto" action="<?= site_url('/berita/search') ?>" method="get">
                    <input class="form-control me-2" type="search" name="q" placeholder="" aria-label="Search" style="width: 150px;">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fa fa-search text-white"></i>
                    </button>
                </form>
                </div>
            </div>
        </nav>
       

<?= $this->renderSection('isi') ?>    


    <!-- footer -->
    <footer class="footer">
      <div class="container text-white">
        <div class="row">
  <!-- Kolom kiri -->
  <div class="col-md-4 text-start">
    <div class="logo-box mb-3">
      <img src="<?php echo base_url('asset-radio') ?>/img/logo-rkb.png" alt="Radio Kota Batik" class="logo-img">
    </div>            
    <p class="fw-bold mb-0">Kantor Pusat Radio Kota Batik</p>
    <p class="mb-2">Jl. Kurinci No.7, Podosugih, Kec. Pekalongan Barat., Kota Pekalongan, Jawa Tengah 51111</p>
    <p class="mb-2">telp : 0285428900</p>
    <p class="fw-bold">hubungi kami</p>
    <div class="social-icons">
        <a href="https://x.com/radio_kotabatik" target="_blank"><i class="fa-brands fa-x-twitter" style="color: white"></i></a>
        <a href="https://www.instagram.com/radio_kotabatik/" target="_blank"><i class="fa-brands fa-instagram" style="color: white"></i></a>
        <a href="https://www.facebook.com/RadioKotaBatikOfficial" target="_blank"><i class="fa-brands fa-facebook" style="color: white"></i></a>
        <a href="https://www.tiktok.com/@radio_kotabatik" target="_blank"><i class="fa-brands fa-tiktok" style="color: white"></i></a>
        <a href="https://whatsapp.com/channel/0029VatYubX7z4khJcd4NG3S" target="_blank"><i class="fa-brands fa-whatsapp" style="color: white"></i></a>
    </div>
  </div>

<div class="col-md-4 text-center text-white visitor-section">
    <p><img src="<?= base_url('asset-radio/img/hari.png') ?>" width="20"> Pengunjung Hari Ini: <?= $pengunjungHariIni ?></p>
    <p><img src="<?= base_url('asset-radio/img/total.png') ?>" width="20"> Total Pengunjung: <?= $totalPengunjung ?></p>
    <p><img src="<?= base_url('asset-radio/img/online.png') ?>" width="20"> Pengunjung Online: <?= $pengunjungOnline ?></p>
</div>


  <!-- Kolom kanan -->
  <div class="col-md-4 text-end">
    <p class="fw-bold mb-0">Link Terkait</p>
    <p class="mb-1">Kominfo Pekalongan</p>
  </div>
</div>

        <div class="text-center mt-4">
          <strong>Radio Kota Batik Pekalongan. © 2025 copyright rkb.co.id</strong>
        </div>
      </div>
    </footer>    
    
    