<?= $this->extend('main/layout2') ?>

<?= $this->section('isi') ?>
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

      <?php if ($historia['audio']): ?>
        <audio controls style="width: 100%; height: 30px;">
          <source src="<?= base_url('upload/audio/' . $historia['audio']) ?>" type="audio/mpeg">
          Browser tidak mendukung pemutar audio.
        </audio>
      <?php else: ?>
        <p class="text-muted">Tidak ada audio</p>
      <?php endif; ?>

      <div class="mb-4">
        <?= nl2br($historia['deskripsi']) ?>
      </div>

      <?php foreach ($fotoDeskripsi as $item): ?>
        <div class="mb-4">
          <?php if (!empty($item['foto'])): ?>
            <img src="<?= base_url('upload/' . $item['foto']) ?>" class="img-fluid rounded mb-2" alt="Foto Historia">
          <?php endif; ?>
          <?php if (!empty($item['deskripsi'])): ?>
            <p><?= nl2br(sensorBintang($item['deskripsi'])) ?></p>
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
            <?php $no = 1; foreach ($beritaPopuler as $populer): ?>
              <div class="news-item" style="display: flex; align-items: center; height: 80px; overflow: hidden; padding: 4px;">
                <span class="rank" style="margin-right: 6px; font-size: 16px; color: purple; flex-shrink: 0;"><?= $no++; ?></span>
                <img src="<?= base_url('upload/' . $populer['foto']) ?>" alt="Berita" class="news-img"
                  style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; flex-shrink: 0; margin-right: 6px;">
                
                <div class="news-content" style="max-width: 120px; overflow: hidden;">
                  <h4 style="font-size: 13px; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <a href="<?= site_url('/detail/' . $populer['slug']) ?>" class="text-decoration-none text-dark">
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
      </aside>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
