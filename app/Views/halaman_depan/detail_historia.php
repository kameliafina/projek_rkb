<!-- app/Views/halaman_depan/detail_historia.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= esc($historia['judul']) ?> - Historia</title>
  <link rel="stylesheet" href="<?= base_url('asset-radio/style.css') ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
<!-- Navbar -->
<header>
  <nav class="navbar navbar-expand-lg navbar-brand2">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= site_url('/halamanindex') ?>">
        <img src="<?= base_url('asset-radio/img/logo-rkb.png') ?>" alt="Logo" class="custom-logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
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
      </div>
    </div>
  </nav>
</header>

<!-- Konten -->
<div class="container my-5">
  <div class="row">
    <!-- Konten Utama -->
    <div class="col-md-8">
      <h2 class="fw-bold"><?= esc($historia['judul']) ?></h2>
      <p><small><?= date('l, d F Y H:i', strtotime($historia['created_at'])) ?> WIB</small></p>

      <?php if (!empty($historia['foto'])): ?>
        <img src="<?= base_url('upload/' . $historia['foto']) ?>" alt="<?= esc($historia['judul']) ?>" class="img-fluid rounded mb-3"/>
      <?php endif; ?>

      <div class="mb-4">
        <?= $historia['deskripsi'] ?>
      </div>

      <?php foreach ($fotoDeskripsi as $item): ?>
        <div class="mb-4">
          <?php if (!empty($item['foto'])): ?>
            <img src="<?= base_url('upload/' . $item['foto']) ?>" class="img-fluid rounded mb-2" alt="Foto Historia">
          <?php endif; ?>
          <?php if (!empty($item['deskripsi'])): ?>
            <p><?= $item['deskripsi'] ?></p>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Sidebar -->
    <div class="col-md-4">
      <aside class="sidebar">
        <div class="popular-news">
          <div class="title">
            <h2>BERITA POPULER</h2>
          </div>
          <div class="news-list">
            <?php $no = 1; foreach ($beritaPopuler as $berita): ?>
              <div class="news-item" style="display: flex; align-items: center; height: 80px; overflow: hidden; padding: 4px;">
                <span class="rank" style="margin-right: 6px; font-size: 16px; color: purple; flex-shrink: 0;"><?= $no++; ?></span>
                <img src="<?= base_url('upload/' . $berita['foto']) ?>" alt="Berita" class="news-img"
                  style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; flex-shrink: 0; margin-right: 6px;">
                
                <div class="news-content" style="max-width: 120px; overflow: hidden;">
                  <h4 style="font-size: 13px; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <?= $berita['judul']; ?>
                  </h4>
                  
                  <p class="views" style="font-size: 12px; color: #777; margin: 0;">
                    <img src="<?= base_url('asset-radio') ?>/img/mata.png" alt="Views" class="icon-view" style="width: 14px; height: 14px; margin-right: 3px;">
                    <?= $berita['views']; ?>
                  </p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>


<!-- Footer -->
<footer class="footer bg-dark text-white py-4 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 text-start">
        <img src="<?= base_url('asset-radio/img/logo-rkb.png') ?>" class="logo-img mb-3">
        <p class="fw-bold mb-0">Kantor Pusat Radio Kota Batik</p>
        <p>Jl. Kurinci No.7, Podosugih, Pekalongan Barat, Kota Pekalongan, Jawa Tengah 51111</p>
        <p class="fw-bold">Hubungi Kami</p>
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
        <p>Kominfo Pekalongan</p>
        <a href="<?= site_url('/login') ?>" class="text-white">Radio Kota Batik</a>
      </div>
    </div>
    <div class="text-center mt-4">
      <strong>Radio Kota Batik Pekalongan. © 2025 copyright rkb.co.id</strong>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
