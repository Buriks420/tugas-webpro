<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Riwayat Penyewaan</h2>
    <a href="/transaksi/create" class="btn btn-primary">Proses Sewa Baru</a>
</div>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Alat</th>
            <th>Nama Penyewa</th>
            <th>Tanggal Sewa</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($transaksi as $t): ?>
        <tr>
            <td><?= $t['id_transaksi'] ?></td>
            <td><?= $t['nama_alat'] ?></td>
            <td><?= $t['nama_penyewa'] ?></td>
            <td><?= $t['tanggal_sewa'] ?></td>
            <td><?= $t['tanggal_kembali'] ?></td>
            <td>
                <?php if($t['status'] == 'disewa'): ?>
                    <span class="badge bg-warning text-dark">Disewa</span>
                <?php else: ?>
                    <span class="badge bg-success">Dikembalikan</span>
                <?php endif; ?>
            </td>
            <td>
                <?php if($t['status'] == 'disewa'): ?>
                    <a href="/transaksi/kembalikan/<?= $t['id_transaksi'] ?>" class="btn btn-sm btn-primary">Kembalikan Alat</a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>