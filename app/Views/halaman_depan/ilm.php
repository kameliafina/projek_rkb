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
                    <li><a href="<?= site_url('/ilm2') ?>">Ilm</a></li>
                </ul>
                <form class="d-flex" action="<?= site_url('/berita/search') ?>" method="get">
                    <input class="form-control me-2" type="search" name="q" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
          </div>
        </div>
      </nav>
  </header>

  <!-- berita foto -->
        <div class="photo-news2">
          <h2 class="section-title">HISTORIA</h2>
          <div class="photo-grid">
          
          <?php foreach ($datailm as $item): ?>
  <div class="card mb-3 shadow-sm" style="max-width: 400px; font-size: 0.9rem;">
    <img src="<?= base_url('upload/gambar/' . $item['gambar']) ?>" class="card-img-top" alt="gambar" style="height: 180px; object-fit: cover;">
    <div class="card-body p-2">
      <h6 class="card-title mb-1"><?= esc($item['judul']) ?></h6>
      <p class="card-text mb-2"><?= esc($item['keterangan']) ?></p>

      <?php if ($item['audio']): ?>
        <audio controls style="width: 100%; height: 30px;">
          <source src="<?= base_url('uploads/audio/' . $item['audio']) ?>" type="audio/mpeg">
          Browser tidak mendukung pemutar audio.
        </audio>
      <?php else: ?>
        <p class="text-muted">Tidak ada audio</p>
      <?php endif; ?>
    </div>
  </div>
<?php endforeach; ?>
          
          </div>
      </div>
              
          </div>
      </div>

      <div class="container">

        <div class="row">

    
</div>


        <!-- statement -->
        <div class="row">
            <div class="col-12 col-md-6 p-3">
                
            </div>
            <div class="col-12 col-md-6 p-3">
                
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