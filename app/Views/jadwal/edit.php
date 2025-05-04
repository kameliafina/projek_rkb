<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
BERITA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Berita

<div class="d-flex justify-content-end">
<a href="<?= site_url('barangctrl/databarang') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<form action="<?= site_url('/ctrljadwal/update/' . $datajadwal['id']) ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $datajadwal['id'] ?>">

  <div class="row mb-3">
    <label for="jam" class="col-sm-2 col-form-label">Jam</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jam" name="jam" value="<?= esc($datajadwal['jam']) ?>" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="judul" name="judul" value="<?= esc($datajadwal['judul']) ?>" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="pembawa" class="col-sm-2 col-form-label">Pembawa Acara</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pembawa" name="pembawa" value="<?= esc($datajadwal['pembawa']) ?>" required>
    </div>
  </div>
</div>

  
</div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>

            </form>
<?= $this->endSection('form') ?>