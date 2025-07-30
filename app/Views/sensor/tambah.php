<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
SENSOR KATA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Kata Terlarang

<div class="d-flex justify-content-end">
<a href="<?= site_url('/kata') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<?= form_open('/ctrladmin/simpan', ['enctype' => 'multipart/form-data'])?>

  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Tulis Kata</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kata">
    </div>
  </div>
  
</div>
  
</div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>

<?= $this->endSection('form') ?>