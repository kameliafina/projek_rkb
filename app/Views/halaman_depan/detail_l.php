<?= $this->extend('main/cihuy') ?>

<?= $this->section('isi') ?>
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
          <?= nl2br(sensorBintang($lifestyle['deskripsi'])) ?>
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
                              <?= $populer['judul']; ?>
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

                      <?= $this->endSection('isi') ?>

