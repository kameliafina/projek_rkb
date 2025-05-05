<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
HISTORIA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Historia

<div class="d-flex justify-content-end">
<a href="<?= site_url('/dataprogram') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<a href="<?= site_url('/tambahprogram') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Link</th>
      <th scope="col">Foto</th>
      <th scope="col">Dibuat</th>
      <th scope="col">Diupdate</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($dataprogram as $pr) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $pr['judul']?></td>
      <td><?= $pr['link']?></td>
      <td>
      <img src="<?= base_url('upload/' . $pr['foto']) ?>"  width="100" height="auto">
      </td>
      <td><?= $pr['created_at']?></td>
      <td><?= $pr['updated_at']?></td>
      <td>
        <a href="/ctrlhistoria/delete/<?= $pr['id'] ?>" class="btn btn-danger btn-circle">
          <i class="fas fa-trash"></i></a>
        <a href="/ctrlhistoria/edit/<?= $pr['id'] ?>" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>

<?= $this->endSection('form') ?>