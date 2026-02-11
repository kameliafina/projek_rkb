<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
JADWAL
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>


<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<a href="<?= site_url('/tambahjadwal') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<div class="table-responsive">
<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Jam</th>
      <th scope="col">Nama Acara</th>
      <th scope="col">Pembawa Acara</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($datajadwal as $jadwal) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $jadwal['jam']?></td>
      <td><?= $jadwal['judul']?></td>
      <td><?= $jadwal['pembawa']?></td>
      <td>
    <?php if ($jadwal['foto']): ?>
        <img src="<?= base_url('uploads/jadwal/' . $jadwal['foto']) ?>" width="100">
    <?php else: ?>
        <span class="text-muted">Tidak ada foto</span>
    <?php endif; ?>
</td>

      <td>
      <a href="/ctrljadwal/delete/<?= $jadwal['id'] ?>" class="btn btn-danger btn-circle btn-hapus">
          <i class="fas fa-trash"></i></a>
        <a href="/ctrljadwal/edit/<?= $jadwal['id'] ?>" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
  
</table>
</div>

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