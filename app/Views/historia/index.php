<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
HISTORIA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>

<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<a href="<?= site_url('/tambahhistoria') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<div class="table-responsive">
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
    $nomor = 1 + (10 * ($pager->getCurrentPage() - 1));
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
        <a href="/ctrlhistoria/delete/<?= $his['id'] ?>" class="btn btn-danger btn-circle btn-hapus">
          <i class="fas fa-trash"></i></a>
        <a href="/ctrlhistoria/edit/<?= $his['id'] ?>" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
</div>
<?= $pager->links('default', 'bootstrap') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Tunggu sampai halaman selesai dimuat
    document.addEventListener('DOMContentLoaded', function() {
        
        // Cek apakah ada flashdata 'pesan' dari Controller
        <?php if (session()->getFlashdata('pesan')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('pesan'); ?>',
                showConfirmButton: false,
                timer: 3000, // Hilang dalam 3 detik
                timerProgressBar: true
            });
        <?php endif; ?>

        // Cek jika ada error (opsional)
        <?php if (session()->getFlashdata('errors')) : ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Periksa kembali inputan Anda.',
                confirmButtonColor: '#d33'
            });
        <?php endif; ?>
    });
</script>

<script>
    document.querySelectorAll('.btn-hapus').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah link langsung terbuka
            const href = this.getAttribute('href');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data berita yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user klik Ya, arahkan ke URL hapus
                    window.location.href = href;
                }
            });
        });
    });
</script>

<?php if (session()->getFlashdata('pesan')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= session()->getFlashdata('pesan'); ?>',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>

<?= $this->endSection('form') ?>