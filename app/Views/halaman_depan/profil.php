<?= $this->extend('main/cihuy') ?>
<?= $this->section('isi') ?>

<style>
    /* Custom CSS untuk tampilan lebih "Mahal" */
    .section-title {
        color: #1B264F; /* Warna Navy dari logo */
        position: relative;
        padding-bottom: 10px;
        margin-bottom: 30px;
    }
    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 4px;
        background-color: #4F46E5; /* Aksen Indigo */
        border-radius: 2px;
    }
    .card-custom {
        border: none;
        border-radius: 20px;
        background: #9DBBF3;
        transition: transform 0.3s ease;
    }
    .card-custom:hover {
        transform: translateY(-5px);
    }
    .bg-soft-blue {
        background-color: #f8faff;
    }
    .vision-box {
        border-left: 4px solid #4F46E5;
        padding-left: 20px;
        background: #f0f4ff;
        border-radius: 0 15px 15px 0;
    }
    .mission-list {
        list-style: none;
        padding-left: 0;
    }
    .mission-list li {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
        display: flex;
        align-items: center;
    }
    .mission-list li:last-child { border-bottom: none; }
    .mission-list li::before {
        content: "\f058"; /* FontAwesome check circle jika ada */
        margin-right: 10px;
        color: #4F46E5;
    }
</style>

<section class="container mt-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #1B264F;">PROFIL</h2>
        <p class="text-muted">Mengenal lebih dekat Radio Kota Batik Pekalongan</p>
    </div>

    <div class="card card-custom shadow-sm p-4 mb-5">
        <div class="row align-items-center">
            <div class="col-md-5 mb-4 mb-md-0">
                <div class="position-relative">
                    <img src="<?php echo base_url('asset-radio') ?>/img/kantor radio.jpg" alt="Foto Sejarah" class="img-fluid rounded-4 shadow">
                    <div class="position-absolute bottom-0 start-0 translate-middle-x bg-primary p-3 rounded-4 d-none d-lg-block" style="z-index: -1; width: 100px; height: 100px; opacity: 0.2;"></div>
                </div>
            </div>
            <div class="col-md-7">
                <h3 class="fw-bold section-title">Sejarah Radio Kota Batik</h3>
                <p class="text-secondary style="line-height: 1.8; text-align: justify;">
                    Radio Kota Batik merupakan saksi bisu perkembangan informasi di Kota Pekalongan. Berawal dari semangat untuk menjembatani komunikasi antara pemerintah dan masyarakat, radio ini terus bertransformasi mengikuti arus digitalisasi tanpa meninggalkan nilai-nilai lokal.
                </p>
                <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                    Sejak masa awal berdirinya, kami berkomitmen menjadi wadah aspirasi publik yang terpercaya, menghadirkan konten berkualitas, serta melestarikan budaya batik sebagai identitas kebanggaan kota.
                </p>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card card-custom shadow-sm overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-4 bg-soft-blue d-flex align-items-center justify-content-center p-5">
                        <img src="<?php echo base_url('asset-radio') ?>/img/logo-rkb.png" alt="Logo RKB" class="img-fluid" style="max-height: 200px;">
                    </div>
                    <div class="col-md-8 p-4 p-lg-5">
                        <h3 class="fw-bold section-title">Visi & Misi</h3>
                        <p class="mb-4 text-muted italic font-sm">"Lembaga Penyiaran Publik Lokal yang menjembatani informasi antara pemerintah dan masyarakat Pekalongan."</p>
                        
                        <div class="vision-box p-3 mb-4">
                            <h6 class="fw-bold text-primary mb-1">VISI</h6>
                            <p class="mb-0 fw-medium">Terdepan dalam pelayanan informasi publik</p>
                        </div>

                        <h6 class="fw-bold text-primary mb-3">MISI</h6>
                        <ul class="mission-list">
                            <li>Mewujudkan program pelayanan informasi publik</li>
                            <li>Mengembangkan sistem peralatan broadcast</li>
                            <li>Mewujudkan manajemen profesional</li>
                            <li>Mewujudkan kapasitas dan kualitas sumber daya manusia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <h3 class="fw-bold section-title d-inline-block">Struktur Organisasi</h3>
        <div class="card card-custom shadow-sm p-3 mt-4">
            <div class="p-2 bg-light rounded-4">
                <?php foreach ($profil as $p): ?>
                    <img src="<?= base_url('upload/' . $p['foto']) ?>" alt="Struktur Organisasi" class="img-fluid rounded-3 mx-auto d-block shadow-sm">
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection('isi') ?>