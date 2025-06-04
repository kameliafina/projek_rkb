<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
EDIT ILM
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?= site_url('ctrlilm/datailm') ?>" class="btn btn-sm btn-primary shadow-sm">
        <img src="<?= base_url('asset-pelanggan/images/back.png') ?>" alt="Kembali"> Kembali
    </a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>
<form action="<?= site_url('/ctrlilm/update/' . $data['id']) ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" name="judul" id="judul" value="<?= esc($data['judul']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="keterangan" rows="4" required><?= esc($data['keterangan']) ?></textarea>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar Saat Ini:</label><br>
        <?php if ($data['gambar']): ?>
            <img src="<?= base_url('upload/gambar/' . $data['gambar']) ?>" alt="Gambar ILM" width="200">
        <?php endif; ?>
        <input type="file" class="form-control mt-2" name="gambar" id="gambar">
    </div>

    <div class="mb-3">
        <label for="audio" class="form-label">Audio Saat Ini:</label><br>
        <?php if ($data['audio']): ?>
            <audio controls>
                <source src="<?= base_url('uploads/audio/' . $data['audio']) ?>" type="audio/mpeg">
                Browser Anda tidak mendukung audio.
            </audio>
        <?php endif; ?>
        <input type="file" class="form-control mt-2" name="audio" id="audio">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
<?= $this->endSection('form') ?>
