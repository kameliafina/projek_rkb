<?= $this->extend('petinggi/index') ?>

<?= $this->section('judul') ?>
USER
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah User

<div class="d-flex justify-content-end">
<a href="<?= site_url('barangctrl/databarang') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<?= form_open('/ctrlpetinggi/simpan_user', ['enctype' => 'multipart/form-data'])?>

<div class="row mb-3">
  <label class="col-sm-2 col-form-label">Nama</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="name" required>
  </div>
</div>

<div class="row mb-3">
  <label class="col-sm-2 col-form-label">Username</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="username" required>
  </div>
</div>

<div class="row mb-3">
  <label class="col-sm-2 col-form-label">Password</label>
  <div class="col-sm-10">
    <input type="password" class="form-control" name="password" required>
  </div>
</div>

<div class="row mb-3">
  <label class="col-sm-2 col-form-label">Level</label>
  <div class="col-sm-10">
    <select name="level" class="form-control" required>
      <option value="">-- Pilih Level --</option>
      <option value="admin">Admin</option>
      <option value="petinggi">Petinggi</option>
      <option value="pendengar">Pendengar</option>
    </select>
  </div>
</div>

<button type="submit" class="btn btn-primary">Input</button>

<?= form_close() ?>

<?= $this->endSection('form') ?>
