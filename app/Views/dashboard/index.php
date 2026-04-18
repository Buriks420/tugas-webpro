<style>
    /* Dashboard Custom Enhancements */
    .small-box {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease;
        border: none;
        margin-bottom: 25px;
    }

    .small-box:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .small-box.text-bg-primary {
        background: linear-gradient(135deg, #f97316, #ea580c) !important;
        color: white !important;
    }

    .small-box.text-bg-success {
        background: linear-gradient(135deg, #10b981, #059669) !important;
        color: white !important;
    }

    .small-box.text-bg-warning {
        background: linear-gradient(135deg, #eab308, #ca8a04) !important;
        color: white !important;
    }

    .small-box .small-box-icon {
        opacity: 0.3;
        transition: transform 0.4s ease;
    }

    .small-box:hover .small-box-icon {
        transform: scale(1.15) rotate(-10deg);
        opacity: 0.4;
    }

    .card {
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.04);
        border: none;
        overflow: hidden;
        margin-bottom: 25px;
    }

    .card-header {
        background-color: white;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 18px 20px;
    }

    .card-title {
        font-weight: 700;
        color: #1e293b;
        font-family: 'Outfit', sans-serif;
    }

    .card-outline.card-primary {
        border-top: 4px solid #f97316;
    }

    .card-outline.card-success {
        border-top: 4px solid #10b981;
    }

    .card-outline.card-info {
        border-top: 4px solid #ea580c;
    }

    .table thead th {
        background-color: #f8fafc;
        border-bottom: 2px solid #e2e8f0;
        color: #475569;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .table td {
        vertical-align: middle;
        color: #1e293b;
    }

    .badge {
        padding: 8px 12px;
        border-radius: 30px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .text-bg-warning {
        background-color: #fef3c7 !important;
        color: #d97706 !important;
        border: 1px solid #fde68a;
    }

    .text-bg-success {
        background-color: #d1fae5 !important;
        color: #059669 !important;
        border: 1px solid #a7f3d0;
    }
</style>

<div class="row">
    <div class="col-lg-4 col-12">
        <div class="small-box text-bg-primary">
            <div class="inner text-white">
                <h3><?= $total_alat ?></h3>
                <p>Total Alat Multimedia</p>
            </div>
            <i class="small-box-icon bi bi-camera-fill text-white"></i>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="small-box text-bg-success">
            <div class="inner text-white">
                <h3><?= $total_penyewa ?></h3>
                <p>Total Penyewa Terdaftar</p>
            </div>
            <i class="small-box-icon bi bi-people-fill text-white"></i>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="small-box text-bg-warning">
            <div class="inner text-white">
                <h3><?= $total_transaksi ?></h3>
                <p>Total Transaksi</p>
            </div>
            <i class="small-box-icon bi bi-cart-check-fill text-white"></i>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header d-flex align-items-center">
                <i class="bi bi-graph-up text-warning me-2 fs-5" style="color:#f97316 !important;"></i>
                <h3 class="card-title m-0">Statistik Pengunjung</h3>
            </div>
            <div class="card-body">
                <canvas id="visitorChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-success card-outline">
            <div class="card-header d-flex align-items-center">
                <i class="bi bi-bar-chart-fill text-success me-2 fs-5"></i>
                <h3 class="card-title m-0">Statistik Penyewaan</h3>
            </div>
            <div class="card-body">
                <canvas id="salesChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card card-info card-outline">
            <div class="card-header d-flex align-items-center">
                <i class="bi bi-clock-history me-2 fs-5" style="color:#ea580c;"></i>
                <h3 class="card-title m-0">Transaksi Terbaru</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-valign-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">ID Transaksi</th>
                            <th>Alat Disewa</th>
                            <th>Nama Penyewa</th>
                            <th>Tanggal Sewa</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recent_transaksi)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted"><i
                                        class="bi bi-inbox fs-3 d-block mb-2"></i> Belum ada transaksi.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recent_transaksi as $rt): ?>
                                <tr>
                                    <td class="ps-4 fw-bold text-secondary">TRX-<?= $rt['id_transaksi'] ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-light rounded p-2 me-2">
                                                <i class="bi bi-box-seam" style="color:#f97316;"></i>
                                            </div>
                                            <?= $rt['nama_alat'] ?>
                                        </div>
                                    </td>
                                    <td><?= $rt['nama_penyewa'] ?></td>
                                    <td><i class="bi bi-calendar-event text-muted me-1"></i>
                                        <?= date('d M Y', strtotime($rt['tanggal_sewa'])) ?></td>
                                    <td>
                                        <?php if ($rt['status'] == 'disewa'): ?>
                                            <span class="badge text-bg-warning"><i class="bi bi-hourglass-split me-1"></i>
                                                Disewa</span>
                                        <?php else: ?>
                                            <span class="badge text-bg-success"><i class="bi bi-check-circle me-1"></i>
                                                Dikembalikan</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>