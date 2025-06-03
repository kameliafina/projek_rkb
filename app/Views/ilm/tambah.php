<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
TAMBAH ILM
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<h3>Tambah Ilm</h3>

<div class="d-flex justify-content-end mb-3">
    <a href="<?= site_url('ctrlilm/index') ?>" class="btn btn-sm btn-primary">
        <img src="<?= base_url('asset-pelanggan/images/back.png') ?>" alt="Back"> Kembali
    </a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>
<?= form_open_multipart('/ctrlilm/simpan') ?>

<div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" class="form-control" name="judul" required>
</div>

<div class="mb-3">
    <label class="form-label">Keterangan</label>
    <textarea class="form-control" name="keterangan" rows="4"></textarea>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Gambar</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="gambar" accept="image/*">
    </div>
  </div>

<div class="mb-3">
    <label class="form-label">File Audio (MP3)</label>
    <input type="file" class="form-control" name="audio" accept="audio/mpeg" required>
</div>

<button type="submit" class="btn btn-success">Simpan</button>

</form>
<?= $this->endSection('form') ?>
