<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
IKLAN LAYANAN MASYARAKAT
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>

<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<a href="<?= site_url('/tambahilm') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<div class="table-responsive">
<table class="table table-hover mt-3">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Judul</th>
      <th scope="col">Narasumber</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Audio</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($datailm)): ?>
      <?php 
      $nomor = 1 + (10 * ($pager->getCurrentPage() - 1));
      foreach ($datailm as $item): ?>
        <tr>
          <td><?= $nomor++ ?></td>
          <td>
            <?php if ($item['gambar']): ?>
              <img src="<?= base_url('upload/gambar/' . $item['gambar']) ?>" width="100">
              <?php else: ?>
                <span class="text-muted">Tidak ada gambar</span>
                <?php endif; ?>
              </td>

          <td><?= esc($item['judul']) ?></td>
          <td><?= esc($item['sumber']) ?></td>
          <td><?= esc($item['keterangan']) ?></td>
          <td>
            <?php if ($item['audio']): ?>
              <audio controls>
                <source src="<?= base_url('uploads/audio/' . $item['audio']) ?>" type="audio/mpeg">
                Browser tidak mendukung audio.
              </audio>
            <?php else: ?>
              <span class="text-muted">Tidak ada audio</span>
            <?php endif; ?>
          </td>
          <td>
            <a href="/ctrlilm/hapus/<?= $item['id'] ?>" class="btn btn-danger btn-circle btn-hapus">
              <i class="fas fa-trash"></i></a>
            <a href="/ctrlilm/edit/<?= $item['id'] ?>" class="btn btn-success btn-circle">
              <i class="fas fa-edit"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    <?php else: ?>
      <tr>
        <td colspan="5" class="text-center">Tidak ada data.</td>
      </tr>
    <?php endif ?>
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