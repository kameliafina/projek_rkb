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
                      <a href="coba_beritapkl.html" class="btn-category active">Kota Pekalongan</a>
                      <a href="coba_beritapkl.html" class="btn-category">Jawa Tengah</a>
                      <a href="/kategori/nasional" class="btn-category">Nasional</a>
                      <a href="/kategori/internasional" class="btn-category">Internasional</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </div>
      </div>

      <div class="container my-5 d-flex flex-column flex-md-row gap-4">
    <!-- Konten Berita -->
    <div class="flex-grow-1">
        <h2 class="fw-bold"><?= esc($lifestyle['judul']) ?></h2>
        <p class="text-muted"><?= esc($lifestyle['penulis'] ?? 'Admin') ?> - <span class="text-primary"><?= esc($lifestyle['nama_kategori_l']) ?></span></p>
        <p><small><?= date('l, d F Y H:i', strtotime($lifestyle['created_at'])) ?> WIB</small></p>
        
        <?php if (!empty($lifestyle['gambar'])): ?>
            <img src="<?= base_url('upload/' . $lifestyle['foto']) ?>" alt="<?= esc($lifestyle['judul']) ?>" class="img-fluid rounded mb-3"/>
        <?php else: ?>
            <img src="<?= base_url('upload/' . $lifestyle['foto']) ?>" alt="Berita" class="img-fluid rounded mb-3"/>
        <?php endif; ?>
        
        <p class="caption"><?= esc($lifestyle['ket_foto'] ?? '') ?></p>
        <div class="isi-berita">
            <?= $lifestyle['deskripsi'] ?>
        </div>
    </div>

    <aside class="sidebar">
                <div class="row">
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
                </div>
                </div>
            </div>
        </div>
                      </aside>

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
            <a href="<?= site_url('/login') ?>">Radio Kota Batik</a>
          </div>
        </div>
        <div class="text-center mt-4">
          <strong>Radio Kota Batik Pekalongan. © 2025 copyright rkb.co.id</strong>
        </div>
      </div>
    </footer>    
    
</body>
</html>