<?= $this->extend('main/cihuy') ?>
<?= $this->section('isi') ?>

<style>
    /* 1. CSS Dasar Layout */
    .section-title {
        color: #1B264F;
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
        background-color: #4F46E5;
        border-radius: 2px;
    }
    .card-custom {
        border: none;
        border-radius: 20px;
        background: #9DBBF3;
        transition: transform 0.3s ease;
    }

    /* 2. CSS Grid Agar PASTI KE KIRI */
    .photo-grid {
        display: grid;
        /* auto-fill memastikan item mulai dari kiri dan tidak memaksa ke tengah */
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        width: 100%;
        justify-content: start; /* Ini kuncinya agar ke kiri */
    }

    /* 3. CSS Item & Overlay */
    .photo-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        height: 280px; /* Tinggi seragam agar rapi */
        background: #fff;
    }
    .photo-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }
    .photo-item:hover img {
        transform: scale(1.1);
    }
    .photo-item .overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(27, 38, 79, 0.9), transparent 70%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 15px;
        color: white;
    }
    .photo-item .overlay h4 {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .photo-item .overlay a {
        color: #4ed8ef;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: bold;
    }
</style>

<section class="container mt-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #1B264F;">PROGRAM</h2>
        <p class="text-muted">Ketinggalan siaran favorit di radio? Tenang, sekarang kamu bisa dengerin obrolan seru kami kapan saja dan di mana saja lewat Spotify!</p>
    </div>

    <div class="card card-custom shadow-sm p-4 mb-5">
        <div class="photo-grid">
            <?php foreach ($program as $p) : ?>
                <div class="photo-item">
                    <img src="<?= base_url('upload/' . $p['foto']) ?>" alt="program">
                    <div class="overlay">
                        <h4><?= esc($p['judul']) ?></h4>
                        <a href="<?= esc($p['link']) ?>" target="_blank" rel="noopener">selengkapnya →</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection('isi') ?>