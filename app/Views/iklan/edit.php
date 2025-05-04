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

<form action="<?= site_url('/ctrliklan/update/' . $dataiklan['id']) ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $dataiklan['id'] ?>">
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Berita</label>
    <div class="col-sm-10">
        <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= esc($dataiklan['deskripsi']) ?></textarea>
    </div>
  </div>
  <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
        <?php if ($dataiklan['foto']): ?>
            <img src="<?= base_url('upload/' . $dataiklan['foto']) ?>" width="150">
        <?php endif; ?>
    </div>
    </div>

    
    </div>
</div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>

            </form>
<?= $this->endSection('form') ?>