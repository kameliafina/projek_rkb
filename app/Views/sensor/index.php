<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
SENSOR KATA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Kata
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<a href="<?= site_url('/tambahsensor') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<div class="table-responsive">
<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kata</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($kata as $kata) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
    <td><?= sensorBintang (esc($kata['kata'])) ?></td>
      <td>
        <a href="/ctrlhistoria/delete/<?= $kata['id'] ?>" class="btn btn-danger btn-circle">
          <i class="fas fa-trash"></i></a>
        <a href="/ctrladmin/edit/<?= $kata['id'] ?>" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
</div>

<?= $this->endSection('form') ?>