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

<form action="<?= site_url('/ctrladmin/update/' . $kata['id']) ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $kata['id'] ?>">

  <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Tambah Kata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kata" name="kata" value="<?= esc($kata['kata']) ?>" required>
    </div>
  </div>
  
    </div>
</div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>

            </form>
<?= $this->endSection('form') ?>