<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
HISTORIA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Historia

<div class="d-flex justify-content-end">
<a href="<?= site_url('dataprogram') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<form action="<?= site_url('/ctrlprogram/update/' . $dataprogram['id']) ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $dataprogram['id'] ?>">

  <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="judul" name="judul" value="<?= esc($dataprogram['judul']) ?>" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="link" class="col-sm-2 col-form-label">Link</label>
    <div class="col-sm-10">
        <textarea class="form-control" id="link" name="link" required><?= esc($dataprogram['link']) ?></textarea>
    </div>
  </div>
  <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
        <?php if ($dataprogram['foto']): ?>
            <img src="<?= base_url('upload/' . $dataprogram['foto']) ?>" alt="<?= esc($dataprogram['ket_foto']) ?>" width="150">
        <?php endif; ?>
    </div>

    
    </div>
</div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>

            </form>
<?= $this->endSection('form') ?>