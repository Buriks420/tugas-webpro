<div class="row">
    <div class="col-lg-4 col-12">
        <div class="small-box text-bg-primary">
            <div class="inner">
                <h3><?= $total_alat ?></h3>
                <p>Total Alat Multimedia</p>
            </div>
            <i class="small-box-icon bi bi-camera"></i>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="small-box text-bg-success">
            <div class="inner">
                <h3><?= $total_penyewa ?></h3>
                <p>Total Penyewa Terdaftar</p>
            </div>
            <i class="small-box-icon bi bi-people"></i>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="small-box text-bg-warning">
            <div class="inner">
                <h3><?= $total_transaksi ?></h3>
                <p>Total Transaksi</p>
            </div>
            <i class="small-box-icon bi bi-cart"></i>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Monthly User Visitors</h3>
            </div>
            <div class="card-body">
                <canvas id="visitorChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Monthly Rentals</h3>
            </div>
            <div class="card-body">
                <canvas id="salesChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">Recent Transactions</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Alat</th>
                            <th>Penyewa</th>
                            <th>Tanggal Sewa</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($recent_transaksi)): ?>
                            <tr><td colspan="5" class="text-center">Belum ada transaksi.</td></tr>
                        <?php else: ?>
                            <?php foreach($recent_transaksi as $rt): ?>
                            <tr>
                                <td>TRX-<?= $rt['id_transaksi'] ?></td>
                                <td><?= $rt['nama_alat'] ?></td>
                                <td><?= $rt['nama_penyewa'] ?></td>
                                <td><?= $rt['tanggal_sewa'] ?></td>
                                <td>
                                    <?php if($rt['status'] == 'disewa'): ?>
                                        <span class="badge text-bg-warning">Disewa</span>
                                    <?php else: ?>
                                        <span class="badge text-bg-success">Dikembalikan</span>
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