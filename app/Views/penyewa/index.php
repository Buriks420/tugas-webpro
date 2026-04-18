<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Pengguna</h2>
    <a href="/penyewa/create" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Tambah Penyewa</a>
</div>
<div class="card card-outline card-primary shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover table-striped m-0">
            <thead class="table-dark">
                <tr>
                    <th width="5%" class="text-center">No</th>
                    <th>Nama</th>
                    <th>Email / Kontak</th>
                    <th>Info Tambahan</th>
                    <th width="15%" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($pengguna as $p): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="fw-bold"><?= esc($p['nama']) ?></td>
                    <td><?= esc($p['kontak']) ?></td>
                    <td><small class="text-muted"><?= esc($p['info']) ?></small></td>
                    <td class="text-center">
                        <?php if($p['tipe'] == 'Penyewa'): ?>
                            <span class="badge bg-warning text-dark"><i class="bi bi-star-fill me-1"></i> Penyewa</span>
                        <?php else: ?>
                            <span class="badge bg-info text-dark"><i class="bi bi-person-fill me-1"></i> User Register</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($pengguna)): ?>
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">Belum ada data pengguna.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>