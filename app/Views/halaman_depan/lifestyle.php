<?= $this->extend('main/lifestyle') ?>

<?= $this->section('isi') ?>

<?php foreach ($datalifestyle as $b) : ?>
                      <div class="col-12">
                        <a href="<?= site_url('/detail_l/' . $b['slug']) ?>" class="text-decoration-none text-dark">
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

                     <div class="col-12">
            <nav aria-label="Page navigation" class="d-flex justify-content-center">
                <?= $pager->links('beritaJateng', 'default_full') ?>
            </nav>
        </div>

<?= $this->endSection('isi') ?>