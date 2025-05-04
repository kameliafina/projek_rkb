<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
HISTORIA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Historia

<div class="d-flex justify-content-end">
<a href="<?= site_url('barangctrl/databarang') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<form action="<?= site_url('/ctrlberitafoto/update/' . $databerita['id']) ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $databerita['id'] ?>">

  <div class="row mb-3">
    <label for="nama_penyiar" class="col-sm-2 col-form-label">Nama Penyiar</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_penyiar" name="nama_penyiar" value="<?= esc($databerita['nama_penyiar']) ?>" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="judul_berita" class="col-sm-2 col-form-label">Judul Berita</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="judul" name="judul" value="<?= esc($databerita['judul']) ?>" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Berita</label>
    <div class="col-sm-10">
        <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= esc($databerita['deskripsi']) ?></textarea>
    </div>
  </div>
  <div class="mb-3">
        <label for="foto" class="form-label">Foto Barang</label>
        <input type="file" class="form-control" id="foto" name="foto">
        <?php if ($databerita['foto']): ?>
            <img src="<?= base_url('upload/' . $databerita['foto']) ?>" alt="<?= esc($databerita['ket_foto']) ?>" width="150">
        <?php endif; ?>
    </div>
  <div class="row mb-3">
    <label for="ket_foto" class="col-sm-2 col-form-label">Ket Foto</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="ket_foto" name="ket_foto" value="<?= esc($databerita['ket_foto']) ?>" required>
    </div>
  </div>

    
    </div>
</div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>

            </form>
<?= $this->endSection('form') ?>