<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
INFOGRAFIS
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>

<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<!-- <a href="<?= site_url('/tambahinfografis') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a> -->

<div class="table-responsive">
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
    foreach ($datainfografis as $info) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td>
      <img src="<?= base_url('upload/' . $info['foto']) ?>"  width="100" height="auto">
      </td>
      <td>
        <a href="/ctrlinfografis/delete/<?= $info['id'] ?>" class="btn btn-danger btn-circle">
          <i class="fas fa-trash"></i></a>
        <a href="/ctrlinfografis/edit/<?= $info['id'] ?>" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
</div>

<?= $this->endSection('form') ?>