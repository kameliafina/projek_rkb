<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
JADWAL
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>


<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<a href="<?= site_url('/tambahjadwal') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<div class="table-responsive">
<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Jam</th>
      <th scope="col">Nama Acara</th>
      <th scope="col">Pembawa Acara</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($datajadwal as $jadwal) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $jadwal['jam']?></td>
      <td><?= $jadwal['judul']?></td>
      <td><?= $jadwal['pembawa']?></td>
      <td>
    <?php if ($jadwal['foto']): ?>
        <img src="<?= base_url('uploads/jadwal/' . $jadwal['foto']) ?>" width="100">
    <?php else: ?>
        <span class="text-muted">Tidak ada foto</span>
    <?php endif; ?>
</td>

      <td>
      <a href="/ctrljadwal/delete/<?= $jadwal['id'] ?>" class="btn btn-danger btn-circle">
          <i class="fas fa-trash"></i></a>
        <a href="/ctrljadwal/edit/<?= $jadwal['id'] ?>" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
  
</table>
</div>

<?= $this->endSection('form') ?>