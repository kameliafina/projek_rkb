<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
INFOGRAFIS
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Infografis

<div class="d-flex justify-content-end">
<a href="<?= site_url('barangctrl/databarang') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<form action="<?= site_url('/ctrlinfografis/update/' . $datainfografis['id']) ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $datainfografis['id'] ?>">
  <div class="mb-3">
        <label for="foto" class="form-label">Foto Barang</label>
        <input type="file" class="form-control" id="foto" name="foto">
        <?php if ($datainfografis['foto']): ?>
            <img src="<?= base_url('upload/' . $datainfografis['foto']) ?>" width="150">
        <?php endif; ?>
    </div>
    </div>
</div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>

            </form>
<?= $this->endSection('form') ?>