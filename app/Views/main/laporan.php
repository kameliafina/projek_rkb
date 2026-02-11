<?= $this->extend('main/layout') ?>

<?= $this->section('isi') ?>
<div class="container mt-4">
    <h3>Laporan Berita Tahunan</h3>
    <hr>

    <div class="accordion" id="accordionLaporan">
        <?php foreach ($laporan as $tahun => $daftarBulan): ?>
            <div class="card mb-3">
                <div class="card-header" id="heading-<?= $tahun ?>">
                    <h5 class="mb-0">
                        <button class="btn btn-link w-100 text-left d-flex justify-content-between" type="button" data-toggle="collapse" data-target="#collapse-<?= $tahun ?>">
                            <span>Tahun <?= $tahun ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </h5>
                </div>

                <div id="collapse-<?= $tahun ?>" class="collapse" data-parent="#accordionLaporan">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div style="max-width: 550px; margin: auto;">
                                    <canvas id="chart-<?= $tahun ?>"></canvas>
                                </div>
                            </div>
                            
                            <div class="col-md-7">
                                <table class="table table-sm table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Bulan</th>
                                            <th>Jumlah Berita</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $totalSetahun = 0;
                                        foreach ($daftarBulan as $row): 
                                            $totalSetahun += $row['total'];
                                        ?>
                                        <tr>
                                            <td><?= date('F', mktime(0, 0, 0, $row['bulan'], 1)) ?></td>
                                            <td><?= $row['total'] ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="font-weight-bold bg-light">
                                            <td>TOTAL</td>
                                            <td><?= $totalSetahun ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorPalette = [
            'rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 
            'rgba(255, 206, 86, 0.7)', 'rgba(75, 192, 192, 0.7)',
            'rgba(153, 102, 255, 0.7)', 'rgba(255, 159, 64, 0.7)',
            'rgba(46, 204, 113, 0.7)', 'rgba(231, 76, 60, 0.7)',
            'rgba(52, 152, 219, 0.7)', 'rgba(241, 196, 15, 0.7)',
            'rgba(155, 89, 182, 0.7)', 'rgba(230, 126, 34, 0.7)'
        ];

        <?php foreach ($laporan as $tahun => $daftarBulan): ?>
            (function() {
                const ctx = document.getElementById('chart-<?= $tahun ?>').getContext('2d');
                
                const labels = [
                    <?php foreach ($daftarBulan as $row) {
                        echo "'" . date('M', mktime(0, 0, 0, $row['bulan'], 1)) . "',";
                    } ?>
                ];
                
                const data = [
                    <?php foreach ($daftarBulan as $row) {
                        echo $row['total'] . ",";
                    } ?>
                ];

                new Chart(ctx, {
                    type: 'pie', // Anda bisa ganti 'bar' jika ingin grafik batang
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Berita',
                            data: data,
                            backgroundColor: colorPalette,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { position: 'bottom' }
                        }
                    }
                });
            })();
        <?php endforeach; ?>
    });
</script>
<?= $this->endSection() ?>