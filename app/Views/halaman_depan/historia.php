<?= $this->extend('main/cihuy') ?>
<?= $this->section('isi') ?>
<style>
    /* Custom CSS untuk tampilan lebih "Mahal" */
    .section-title {
        color: #1B264F; /* Warna Navy dari logo */
        position: relative;
        padding-bottom: 10px;
        margin-bottom: 30px;
    }
    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 4px;
        background-color: #4F46E5; /* Aksen Indigo */
        border-radius: 2px;
    }
    .card-custom {
        border: none;
        border-radius: 20px;
        background: #9DBBF3;
        transition: transform 0.3s ease;
    }
    .card-custom:hover {
        transform: translateY(-5px);
    }
    .bg-soft-blue {
        background-color: #f8faff;
    }
    
    
    .photo-item .overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(27, 38, 79, 0.9), transparent 70%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 15px;
        color: white;
    }
    .photo-item .overlay h4 {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .photo-item .overlay a {
        color: #4ed8ef;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: bold;
    }
</style>

<section class="container mt-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #1B264F;">HISTORIA</h2>
        <p class="text-muted">Menilik masa lalu, merayakan identitas, dan melestarikan sejarah lokal Pekalongan</p>
    </div>

    <div class="card card-custom shadow-sm p-4 mb-5">
        <div class="row align-items-center">
            <div class="photo-grid">
          <?php foreach ($historia as $historia) : ?>
              <div class="photo-item">
                  <img src="<?= base_url('upload/' . $historia['foto']) ?>" alt="historia">
                  <div class="overlay">
                      <h4><?= esc($historia['judul']) ?></h4>
                      <a href="<?= site_url('/detail_his/' . $historia['slug']) ?>">selengkapnya →</a>
                  </div>
              </div>
                <?php endforeach; ?>
          </div>
          <div class="pagination justify-content-center mt-4">
        <?php if ($pager) : ?>
            <?= $pager->links('default', 'pager_baru') ?>
        <?php endif; ?>
    </div>
        </div>
    </div>

</section>
            
<?= $this->endSection('isi') ?>