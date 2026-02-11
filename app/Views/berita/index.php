<?= $this->extend('main/cihuy_berita') ?>

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

<div class="card mb-3">
    <div class="card-body">
        <form action="<?= site_url('berita2') ?>" method="get" class="row g-3">
            <div class="col-md-4">
                <label>Mulai Tanggal:</label>
                <input type="date" name="tgl_awal" class="form-control" value="<?= request()->getGet('tgl_awal') ?>">
            </div>
            <div class="col-md-4">
                <label>Sampai Tanggal:</label>
                <input type="date" name="tgl_akhir" class="form-control" value="<?= request()->getGet('tgl_akhir') ?>">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">Cari</button>
                <a href="<?= site_url('berita2') ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<a href="<?= site_url('/tambahberita') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-admin') ?>/img/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<div class="table-responsive">
<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">No</th>
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
    $nomor = 1 + (10 * ($pager->getCurrentPage() - 1));
    foreach ($databerita as $berita) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $berita['nama_penyiar']?></td>
      <td><?= $berita['judul']?></td>
      <td><?= esc(substr($berita['deskripsi'], 0, 50)) ?>...</td>
      <td>
      <img src="<?= base_url('upload/' . $berita['foto']) ?>"  width="100" height="auto">
      </td>
      <td><?= $berita['ket_foto']?></td>
      <td><?= $berita['kategori_id']?></td>
      <td><?= $berita['created_at']?></td>
      <td><?= $berita['updated_at']?></td>
      <td>
        <a href="/ctrlberita/delete/<?= $berita['id'] ?>" class="btn btn-danger btn-circle btn-hapus">
          <i class="fas fa-trash"></i>
        </a>
        <a href="/ctrlberita/edit/<?= $berita['id'] ?>" class="btn btn-success btn-circle">
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