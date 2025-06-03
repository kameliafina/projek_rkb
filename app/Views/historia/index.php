<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
HISTORIA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Historia

<div class="d-flex justify-content-end">
<a href="<?= site_url('/datahistoria') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<a href="<?= site_url('/tambahhistoria') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Penyiar</th>
      <th scope="col">Judul</th>
      <th scope="col">Foto</th>
      <th scope="col">Ket Foto</th>
      <th scope="col">Audio</th>
      <th scope="col">Dibuat</th>
      <th scope="col">Diupdate</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($datahistoria as $his) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $his['nama_penyiar']?></td>
      <td><?= $his['judul']?></td>
      <td>
      <img src="<?= base_url('upload/' . $his['foto']) ?>"  width="100" height="auto">
      </td>
      <td><?= $his['ket_foto']?></td>
      <td>
        <?php if ($his['audio']): ?>
          <audio controls>
            <source src="<?= base_url('upload/audio/' . $his['audio']) ?>" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
        <?php else: ?>
          Tidak ada audio
        <?php endif; ?>
      <td><?= $his['created_at']?></td>
      <td><?= $his['updated_at']?></td>
      <td>
        <a href="/ctrlhistoria/delete/<?= $his['id'] ?>" class="btn btn-danger btn-circle">
          <i class="fas fa-trash"></i></a>
        <a href="/ctrlhistoria/edit/<?= $his['id'] ?>" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>

<?= $this->endSection('form') ?>