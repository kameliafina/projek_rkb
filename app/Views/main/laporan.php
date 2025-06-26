<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>

<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Laporan Berita


<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<div style="max-width: 400px; margin: auto;">
  <canvas id="beritaPieChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('beritaPieChart').getContext('2d');

    const beritaPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?= json_encode(array_map(fn($b) => date('M Y', mktime(0, 0, 0, $b['bulan'], 1, $b['tahun'])), $laporan)) ?>,
            datasets: [{
                label: 'Jumlah Berita',
                data: <?= json_encode(array_column($laporan, 'total')) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(199, 199, 199, 0.6)',
                    'rgba(83, 102, 255, 0.6)',
                    'rgba(255, 102, 255, 0.6)',
                    'rgba(100, 255, 218, 0.6)',
                    'rgba(255, 180, 102, 0.6)',
                    'rgba(140, 140, 255, 0.6)'
                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
</script>

<table class="table mt-4">
    <thead>
        <tr>
            <th>Bulan</th>
            <th>Jumlah Berita</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($laporan as $row): ?>
        <tr>
            <td><?= date('F Y', mktime(0, 0, 0, $row['bulan'], 1, $row['tahun'])) ?></td>
            <td><?= $row['total'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?= $this->endSection('form') ?>