<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Edit Historia
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?= site_url('ctrlhistoria/datahistoria') ?>" class="btn btn-sm btn-primary">
        <img src="<?= base_url('asset-pelanggan/images/back.png') ?>" alt="Back"> Kembali
    </a>
</div>

<?php helper('form'); ?>

<?php if(session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?= form_open_multipart('/ctrlhistoria/update/' . $datahistoria['id']) ?>

    <div class="mb-3">
        <label>Nama Reporter</label>
        <input type="text" name="nama_penyiar" class="form-control" required value="<?= set_value('nama_penyiar', $datahistoria['nama_penyiar']) ?>">
    </div>

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required value="<?= set_value('judul', $datahistoria['judul']) ?>">
    </div>

    <div class="mb-3">
        <label>Deskripsi Umum Historia</label>
        <textarea name="deskripsi" class="form-control" required><?= set_value('deskripsi', $datahistoria['deskripsi']) ?></textarea>
    </div>

    <div class="mb-3">
        <label>Foto Cover Lama</label><br>
        <?php if ($datahistoria['foto'] && file_exists('upload/' . $datahistoria['foto'])): ?>
            <img src="<?= base_url('upload/' . $datahistoria['foto']) ?>" alt="Foto Cover" width="200">
        <?php else: ?>
            <p>Tidak ada foto cover.</p>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label>Ganti Foto Cover (Kosongkan jika tidak diubah)</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="mb-3">
        <label>Keterangan Foto</label>
        <input type="text" name="ket_foto" class="form-control" required value="<?= set_value('ket_foto', $datahistoria['ket_foto']) ?>">
    </div>

    <hr>
    <h5>Foto & Deskripsi Tambahan</h5>

    <div id="detail-container">
        <?php if (!empty($detailHistoria)): ?>
            <?php foreach($detailHistoria as $detail): ?>
                <div class="detail-item border rounded p-3 mb-3" data-id="<?= $detail['id'] ?>">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <label>Foto Lama</label><br>
                            <?php if ($detail['foto'] && file_exists('upload/' . $detail['foto'])): ?>
                                <img src="<?= base_url('upload/' . $detail['foto']) ?>" alt="Foto Detail" width="150" class="mb-2">
                            <?php else: ?>
                                <p>Tidak ada foto</p>
                            <?php endif; ?>
                            <br>
                            <label>Ganti Foto (Kosongkan jika tidak diubah)</label>
                            <input type="file" name="foto_detail_existing_<?= $detail['id'] ?>" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi_detail_existing_<?= $detail['id'] ?>" class="form-control"><?= esc($detail['deskripsi']) ?></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm btn-hapus-detail" data-id="<?= $detail['id'] ?>">Hapus</button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="detail-item mb-3">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <label>Foto</label>
                        <input type="file" name="foto_detail_new[]" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi_detail_new[]" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <button type="button" class="btn btn-success mb-3" onclick="tambahDetail()">+ Tambah Foto & Deskripsi</button>

    <input type="hidden" name="hapus_detail_ids" id="hapus_detail_ids" value="">

    <button type="submit" class="btn btn-primary">Update</button>

<?= form_close() ?>

<script>
let hapusDetailIds = [];

function tambahDetail() {
    let container = document.getElementById('detail-container');

    let html = `
        <div class="detail-item border rounded p-3 mb-3">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <label>Foto Tambahan</label>
                    <input type="file" name="foto_detail_new[]" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi_detail_new[]" class="form-control"></textarea>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.remove()">Hapus</button>
        </div>
    `;

    container.insertAdjacentHTML('beforeend', html);
}

document.querySelectorAll('.btn-hapus-detail').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        if (confirm('Yakin ingin menghapus foto & deskripsi tambahan ini?')) {
            // Tandai id yang akan dihapus
            hapusDetailIds.push(id);
            document.getElementById('hapus_detail_ids').value = hapusDetailIds.join(',');
            // Hapus dari DOM
            this.parentElement.remove();
        }
    });
});
</script>

<?= $this->endSection('isi') ?>
