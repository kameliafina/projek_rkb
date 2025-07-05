<?= $this->extend('petinggi/index') ?>

<?= $this->section('judul') ?>
DAFTAR USER
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah User
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<a href="<?= site_url('/tambahuser') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah User</a>

<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Username</th>
      <th scope="col">Level</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($datauser as $user) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $user['name']?></td>
      <td><?= $user['username']?></td>
      <td><?= $user['level']?></td>
      <td>
        <a href="/ctrlpetinggi/delete_user/<?= $user['id'] ?>" class="btn btn-danger btn-circle">
          <i class="fas fa-trash"></i></a>
        <a href="/ctrlpetinggi/edit_user/<?= $user['id'] ?>" class="btn btn-success btn-circle">
          <i class="fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>

<?= $this->endSection('form') ?>