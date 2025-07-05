<?= $this->extend('petinggi/index') ?>

<?= $this->section('judul') ?>
PROFIL
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Edit Profil

<div class="d-flex justify-content-end">
<a href="<?= site_url('dataprogram') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<form action="<?= site_url('/ctrlpetinggi/update_user/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $user['id'] ?>">

<div class="mb-3">
    <label>Nama </label>
    <input type="text" name="name" class="form-control" required value="<?= set_value('name', $user['name']) ?>">
</div>

<div class="mb-3">
    <label>Username </label>
    <input type="text" name="username" class="form-control" required value="<?= set_value('username', $user['username']) ?>">
</div>

<div class="mb-3">
    <label>Password</label>
    <div class="input-group">
        <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">👁️</button>
    </div>
</div>

<div class="mb-3">
    <label>Level </label>
    <input type="text" name="level" class="form-control" required value="<?= set_value('level', $user['level']) ?>" readonly>
</div>


    </div>
</div>
  
  
  <button type="submit" class="btn btn-primary">simpan</button>

            </form>

            <script>
function togglePassword() {
    var pwd = document.getElementById("password");
    if (pwd.type === "password") {
        pwd.type = "text";
    } else {
        pwd.type = "password";
    }
}
</script>
<?= $this->endSection('form') ?>