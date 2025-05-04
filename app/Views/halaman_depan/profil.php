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

      <!-- Tambahkan ini di dalam <body> setelah navbar -->
<section class="container mt-5">
    <h5 class="fw-bold">PROFIL</h5>
  
    <!-- Sejarah -->
    <div class="card mb-4 shadow p-4" style="background-color: #87CEFA;">
      <h5 class="fw-bold">SEJARAH RADIO KOTA BATIK</h5>
      <div class="row mt-3">
        <div class="col-md-4">
          <img src="<?php echo base_url('asset-radio') ?>/img/kantor radio.jpg" alt="Foto Sejarah" class="img-fluid rounded">
        </div>
        <div class="col-md-8">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
      </div>
    </div>
  
    <!-- Visi Misi -->
    <div class="card mb-4 shadow p-4" style="background-color: #87CEFA;">
      <h5 class="fw-bold">VISI MISI</h5>
      <div class="row mt-3">
        <div class="col-md-4">
          <img src="<?php echo base_url('asset-radio') ?>/img/logo-rkb.png" alt="Logo RKB" class="img-fluid" style="max-width: 300px;">
        </div>
        <div class="col-md-8">
          <h6><strong>VISI dan MISI</strong></h6>
          <p>lembaga penyiara publik lokal radio kota batik pekalongan didirikan sebagai radio publik dengan maksud dan tujuan memberikan akses informasi dan komunikasi dari masyarakat kepada pemerintah dan sebaliknya dari pemerintah ke masyarakat. Adapun visi dan misi lembaga penyiaran publik lokal radio kota batik pekalongan sebagai berikut :</p>
          <h6><strong>VISI</strong></h6>
          <p>Terdepan dalam pelayanan informasi publik</p>
          <h6><strong>MISI</strong></h6>
          <p>1. mewujudkan program pelayanan informasi publik</p>
          <p>2. mengembangkan sistem peralatan broadcast</p>
          <p>3. mewujudkan manajemen profesional</p>
          <p>4. mewujudkan kapasitas dan kualitas sumber daya manusia</p>
        </div>
      </div>
    </div>
  
    <!-- Struktur Organisasi -->
    <div class="card mb-4 shadow p-4" style="background-color: #87CEFA;">
      <h5 class="fw-bold text-center">STRUKTUR ORGANISASI</h5>
      <div class="d-flex justify-content-center my-4">
        <div class="text-center">
          <div class="bg-white rounded-circle mx-auto" style="width: 60px; height: 60px;"></div>
          <p class="mt-2">Pimpinan</p>
        </div>
      </div>
      <div class="d-flex justify-content-around flex-wrap">
        <div class="text-center">
          <div class="bg-white rounded-circle mx-auto" style="width: 50px; height: 50px;"></div>
          <p class="mt-2">Pimpinan</p>
        </div>
        <div class="text-center">
          <div class="bg-white rounded-circle mx-auto" style="width: 50px; height: 50px;"></div>
          <p class="mt-2">Pimpinan</p>
        </div>
        <div class="text-center">
          <div class="bg-white rounded-circle mx-auto" style="width: 50px; height: 50px;"></div>
          <p class="mt-2">Pimpinan</p>
        </div>
        <div class="text-center">
          <div class="bg-white rounded-circle mx-auto" style="width: 50px; height: 50px;"></div>
          <p class="mt-2">Pimpinan</p>
        </div>
        <div class="text-center">
          <div class="bg-white rounded-circle mx-auto" style="width: 50px; height: 50px;"></div>
          <p class="mt-2">Pimpinan</p>
        </div>
      </div>
    </div>
  </section>
  

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
            <p>Radio Kota Batik</p>
          </div>
        </div>
        <div class="text-center mt-4">
          <strong>Radio Kota Batik Pekalongan. © 2025 copyright rkb.co.id</strong>
        </div>
      </div>
    </footer>    
    
</body>
</html>