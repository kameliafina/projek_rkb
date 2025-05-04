<h2>Hasil pencarian untuk: <?= esc($keyword) ?></h2>

<?php if ($results): ?>
    <ul>
        <?php foreach ($results as $item): ?>
            <li><a href="<?= site_url('/berita/detail/' . $item['id']) ?>"><?= esc($item['judul']) ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Tidak ditemukan hasil untuk "<?= esc($keyword) ?>".</p>
<?php endif; ?>
