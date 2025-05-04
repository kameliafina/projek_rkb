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


<?= form_open('/ctrljadwal/simpan', ['enctype' => 'multipart/form-data'])?>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Jam</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="jam">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Nama Acara</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="judul">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Pembawa Acara</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="pembawa">
    </div>
  </div>
  
  
  
  <button type="submit" class="btn btn-primary">Input </button>

</form>
<?= $this->endSection('form') ?>