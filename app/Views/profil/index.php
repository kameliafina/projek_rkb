<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
PROFIL
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Edit Profil Disini

<div class="d-flex justify-content-end">
<a href="<?= site_url('/dataprogram') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>


<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Foto</th>
      <th scope="col">Dibuat</th>
      <th scope="col">Diupdate</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($dataprofil as $pr) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td>
      <img src="<?= base_url('upload/' . $pr['foto']) ?>"  width="100" height="auto">
      </td>
      <td><?= $pr['created_at']?></td>
      <td><?= $pr['updated_at']?></td>
      <td>
        <a href="/ctrlprofil/edit/<?= $pr['id'] ?>" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>

<?= $this->endSection('form') ?>