<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
STATEMENT
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Statement

<div class="d-flex justify-content-end">
<a href="<?= site_url('/datast') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<a href="<?= site_url('/tambahst') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($datast as $st) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td>
      <img src="<?= base_url('upload/' . $st['foto']) ?>"  width="100" height="auto">
      </td>
      <td>
        <a href="/ctrlstatement/delete/<?= $st['id'] ?>" class="btn btn-danger btn-circle">
          <i class="fas fa-trash"></i></a>
        <a href="/ctrlstatement/edit/<?= $st['id'] ?>" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>

<?= $this->endSection('form') ?>