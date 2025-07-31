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
      <th scope="col">Nama</th>
      <th scope="col">Komentar</th>
      <th scope="col">Yang Dikomentari</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1 + (10 * ($pager->getCurrentPage() - 1));
    foreach ($komentar as $komen) :
    ?>
    <tr>
        <th scope="row"><?= $nomor++;?></th>
        <td><?=  $komen['nama'] ?></td>
        <td><?=  $komen['komentar'] ?></td>
        <td><?=  $komen['target_type'] ?></td>
        <td><?=  $komen['created_at'] ?></td>
        <td>
            <a href="/ctrladmin/hapus_komentar/<?= $komen['id'] ?>" class="btn btn-danger btn-circle">
            <i class="fas fa-trash"></i></a>
        </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
<?= $pager->links('default', 'bootstrap') ?>

</div>

<?= $this->endSection('form') ?>