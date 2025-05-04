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

<a href="<?= site_url('/tambahberita') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Berita</th>
      <th scope="col">Nama Reporter</th>
      <th scope="col">Judul Berita</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Foto</th>
      <th scope="col">Ket Foto</th>
      <th scope="col">Kategori</th>
      <th scope="col">Dibuat</th>
      <th scope="col">Diupdate</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($databerita as $berita) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $berita['id']?></td>
      <td><?= $berita['nama_penyiar']?></td>
      <td><?= $berita['judul']?></td>
      <td><?= $berita['deskripsi']?></td>
      <td>
      <img src="<?= base_url('upload/' . $berita['foto']) ?>"  width="100" height="auto">
      </td>
      <td><?= $berita['ket_foto']?></td>
      <td><?= $berita['kategori_id']?></td>
      <td><?= $berita['created_at']?></td>
      <td><?= $berita['updated_at']?></td>
      <td>
        <a href="/ctrlberita/delete/<?= $berita['id'] ?>" class="btn btn-danger btn-circle">
          <i class="fas fa-trash"></i></a>
        <a href="/ctrlberita/edit/<?= $berita['id'] ?>" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>

<?= $this->endSection('form') ?>