<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
BERITA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Berita

<div class="d-flex justify-content-end">
<a href="<?= site_url('/databerita') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<a href="<?= site_url('/tambahilm') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<table class="table table-hover mt-3">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Judul</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Audio</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($datailm)): ?>
      <?php $no = 1; foreach ($datailm as $item): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td>
            <?php if ($item['gambar']): ?>
              <img src="<?= base_url('upload/gambar/' . $item['gambar']) ?>" width="100">
              <?php else: ?>
                <span class="text-muted">Tidak ada gambar</span>
                <?php endif; ?>
              </td>

          <td><?= esc($item['judul']) ?></td>
          <td><?= esc($item['keterangan']) ?></td>
          <td>
            <?php if ($item['audio']): ?>
              <audio controls>
                <source src="<?= base_url('uploads/audio/' . $item['audio']) ?>" type="audio/mpeg">
                Browser tidak mendukung audio.
              </audio>
            <?php else: ?>
              <span class="text-muted">Tidak ada audio</span>
            <?php endif; ?>
          </td>
          <td>
            <a href="/ctrlilm/hapus/<?= $item['id'] ?>" class="btn btn-danger btn-circle">
              <i class="fas fa-trash"></i></a>
            <a href="/ctrlilm/edit/<?= $item['id'] ?>" class="btn btn-success btn-circle">
              <i class="fas fa-edit"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    <?php else: ?>
      <tr>
        <td colspan="5" class="text-center">Tidak ada data.</td>
      </tr>
    <?php endif ?>
  </tbody>
</table>
<?= $this->endSection('form') ?>