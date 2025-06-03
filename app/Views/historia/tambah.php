<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Tambah Historia
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?= site_url('ctrlhistoria/datahistoria') ?>" class="btn btn-sm btn-primary">
        <img src="<?= base_url('asset-pelanggan/images/back.png') ?>" alt="Back"> Kembali
    </a>
</div>

<?= form_open_multipart('/ctrlhistoria/simpan') ?>
    <div class="mb-3">
        <label>Nama Reporter</label>
        <input type="text" name="nama_penyiar" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi Umum Historia</label>
        <textarea name="deskripsi" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label>Foto Cover</label>
        <input type="file" name="foto" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Keterangan Foto</label>
        <input type="text" name="ket_foto" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Upload Audio (Opsional)</label>
        <input type="file" name="audio" class="form-control" accept="audio/*">
    </div>

    <hr>
    <h5>Foto & Deskripsi Tambahan</h5>

    <div id="detail-container">
        <div class="detail-item mb-3">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <label>Foto</label>
                    <input type="file" name="foto_detail[]" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi_detail[]" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-success mb-3" onclick="tambahDetail()">+ Tambah Foto & Deskripsi</button>


    <button type="submit" class="btn btn-primary">Simpan</button>

    <script>
function tambahDetail() {
    let container = document.getElementById('detail-container');

    let html = `
        <div class="detail-item border rounded p-3 mb-3">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <label>Foto Tambahan</label>
                    <input type="file" name="foto_detail[]" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi_detail[]" class="form-control"></textarea>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.remove()">Hapus</button>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}

</script>


<?= form_close() ?>
<?= $this->endSection('isi') ?>


