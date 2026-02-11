<?= $this->extend('main/cihuy') ?>

<?= $this->section('isi') ?>

<style>
    /* 1. Header Styling */
    .section-title {
        color: #1B264F;
        font-weight: 800;
        position: relative;
        padding-bottom: 10px;
        margin-bottom: 40px;
        display: inline-block;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 60px;
        height: 5px;
        background: linear-gradient(90deg, #4F46E5, #9DBBF3);
        border-radius: 10px;
    }

    /* 2. Grid Layout (PASTI KE KIRI) */
    .ilm-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 15px;
        justify-content: start;
        width: 100%;
    }

    /* 3. Card Styling */
    .ilm-card {
        background: #ffffff;
        border: none;
        border-radius: 20px; /* Lebih bulat agar modern */
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 25px rgba(27, 38, 79, 0.05);
    }

    .ilm-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(27, 38, 79, 0.15);
    }

    .ilm-img-wrapper {
        position: relative;
        width: 100%;
        aspect-ratio: 1 / 1;
        overflow: hidden;
    }

    .ilm-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .ilm-card:hover .ilm-img-wrapper img {
        transform: scale(1.1);
    }

    /* Label melayang di atas gambar */
    .ilm-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(79, 70, 229, 0.9);
        color: white;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 0.65rem;
        font-weight: bold;
        backdrop-filter: blur(5px);

        max-width: 80%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    

    .ilm-content {
        padding: 15px;
    }

    .ilm-title {
        color: #1B264F;
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 10px;
        display: block;
        overflow: visible;
        white-space: normal;
    }

    .ilm-text {
        color: #6c757d;
        font-size: 0.75rem;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Custom Audio Player */
    audio {
        width: 100%;
        height: 30px;
        filter: sepia(20%) saturate(70%) grayscale(1) contrast(90%) invert(10%); /* Membuat player terlihat lebih elegan */
        border-radius: 50px;
    }

    .no-audio {
        background: #f8f9fa;
        padding: 10px;
        border-radius: 10px;
        text-align: center;
        font-size: 0.8rem;
        color: #adb5bd;
    }
</style>

<div class="container mt-5 pb-5">
    <div class="photo-news2">
        <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #1B264F;">IKLAN LAYANAN MASYARAKAT</h2>
        <p class="text-muted">Suara perubahan, layanan edukasi, dan wujud nyata kontribusi sosial untuk Pekalongan</p>
    </div>
        
        <div class="ilm-grid">
            <?php foreach ($datailm as $item): ?>
            <div class="ilm-card">
                <div class="ilm-img-wrapper">
                    <div class="ilm-badge"><?= esc($item['sumber']) ?></div>
                    <img src="<?= base_url('upload/gambar/' . $item['gambar']) ?>" alt="<?= esc($item['judul']) ?>">
                </div>
                
                <div class="ilm-content">
                    <h6 class="ilm-title"><?= esc($item['judul']) ?></h6>
                    <p class="ilm-text"><?= esc($item['keterangan']) ?></p>

                    <div class="audio-wrapper">
                        <?php if ($item['audio']): ?>
                            <audio controls>
                                <source src="<?= base_url('uploads/audio/' . $item['audio']) ?>" type="audio/mpeg">
                                Browser tidak mendukung pemutar audio.
                            </audio>
                        <?php else: ?>
                            <div class="no-audio italic">
                                <i class="fas fa-volume-mute me-2"></i>Audio tidak tersedia
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection('isi') ?>