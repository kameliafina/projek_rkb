<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
HISTORIA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Historia

<div class="d-flex justify-content-end">
<a href="<?= site_url('/dataprogram') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<?= form_open('/ctrlprogram/simpan', ['enctype' => 'multipart/form-data'])?>

  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="judul">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Link</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="link">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="foto">
    </div>
  </div>
  
</div>
  
</div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>

<?= $this->endSection('form') ?>