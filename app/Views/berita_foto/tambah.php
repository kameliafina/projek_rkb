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

<?= form_open('/ctrlberitafoto/simpan', ['enctype' => 'multipart/form-data'])?>

  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Nama Penyiar</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama_penyiar">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Judul Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="judul">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Deskripsi Berita</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="deskripsi"></textarea>
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="foto">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Ket Foto</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ket_foto">
    </div>
  </div>
</div>
  
</div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>

<?= $this->endSection('form') ?>