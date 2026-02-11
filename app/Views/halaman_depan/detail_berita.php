<?= $this->extend('main/cihuy') ?>

<?= $this->section('isi') ?>

      <div class="container">
        <!-- jadwal radio -->
        <div class="row">
            
        </div>

        

      <div class="container my-5 d-flex flex-column flex-md-row gap-4">
    <!-- Konten Berita -->
    <div class="flex-grow-1">
        <h2 class="fw-bold"><?= esc($berita['judul']) ?></h2>
        <p class="text-muted"><?= esc($berita['nama_penyiar'] ?? 'Admin') ?> - <span class="text-primary"><?= esc($berita['nama_kategori_b']) ?></span></p>
        <p><small><?= date('l, d F Y H:i', strtotime($berita['created_at'])) ?> WIB</small></p>
        
        <?php if (!empty($berita['gambar'])): ?>
            <img src="<?= base_url('upload/' . $berita['foto']) ?>" alt="<?= esc($berita['judul']) ?>" class="img-fluid rounded mb-3"/>
        <?php else: ?>
            <img src="<?= base_url('upload/' . $berita['foto']) ?>" alt="Berita" class="img-fluid rounded mb-3"/>
        <?php endif; ?>
        
        <p class="caption"><?= esc($berita['ket_foto'] ?? '') ?></p>
        <div class="isi-berita">
          <?= nl2br(sensorBintang($berita['deskripsi'])) ?>
        </div>
    </div>

    <aside class="sidebar">
                <div class="row">
                  <div class="popular-news">
                    <div class="title">
                        <h2>BERITA POPULER</h2>
                    </div>
                    <div class="news-list">
                      <?php $no = 1; foreach ($beritaPopuler as $populer): ?>
                        <div class="news-item" style="display: flex; align-items: center; height: 80px; overflow: hidden; padding: 4px;">
                          <span class="rank" style="margin-right: 6px; font-size: 16px; color: purple; flex-shrink: 0;"><?= $no++; ?></span>
                          <img src="<?= base_url('upload/' . $populer['foto']) ?>" alt="Berita" class="news-img"
                          style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; flex-shrink: 0; margin-right: 6px;">
                          
                          <div class="news-content" style="max-width: 120px; overflow: hidden;">
                            <h4 style="font-size: 13px; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                              <a href="<?= site_url('/detail/' . $berita['id']) ?>" class="text-decoration-none text-dark">
                                    <?= esc($populer['judul']) ?></a>
                            </h4>
                            
                            <p class="views" style="font-size: 12px; color: #777; margin: 0;">
                              <img src="<?= base_url('asset-radio') ?>/img/mata.png" alt="Views" class="icon-view" style="width: 14px; height: 14px; margin-right: 3px;">
                              <?= $populer['views']; ?>
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

     

    <!-- Modal Login -->
     <?php if (session()->getFlashdata('pesan')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
<?php endif; ?>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= site_url('/login/action') ?>" method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login untuk Komentar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('pesan') ?></div>
        <?php endif; ?>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>
</div>


<!-- Modal Daftar -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= site_url('/register-action') ?>" method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Buat Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <?php if (session()->getFlashdata('register_error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('register_error') ?></div>
        <?php endif; ?>
        <div class="mb-3">
          <label>Nama</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
          <label>Username</label>
          <input type="text" class="form-control" name="username" required>
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <div class="mb-3">
          <label>Ulangi Password</label>
          <input type="password" class="form-control" name="password_confirm" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Daftar</button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection('isi') ?>
