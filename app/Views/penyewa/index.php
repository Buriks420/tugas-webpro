<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Pengguna</h2>
    <div>
        <a href="/penyewa/create" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Tambah Penyewa</a>
        <a href="/penyewa/createUser" class="btn btn-success"><i class="bi bi-person-plus me-1"></i> Tambah Akun User</a>
    </div>
</div>
<div class="card card-outline card-primary shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover table-striped m-0">
            <thead class="table-dark">
                <tr>
                    <th width="5%" class="text-center">No</th>
                    <th>Nama</th>
                    <th>Email / Kontak</th>
                    <th width="15%" class="text-center">Status</th>
                    <th class="text-center" width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($pengguna as $p): ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="fw-bold"><?= esc($p['nama']) ?></td>
                    <td><?= esc($p['kontak']) ?></td>
                    <td class="text-center">
                        <?php if($p['tipe'] == 'Penyewa'): ?>
                            <span class="badge bg-warning text-dark"><i class="bi bi-star-fill me-1"></i> Penyewa</span>
                        <?php else: ?>
                            <?php if($p['is_admin'] == 1): ?>
                                <span class="badge bg-danger text-white"><i class="bi bi-shield-lock-fill me-1"></i> Admin</span>
                            <?php else: ?>
                                <span class="badge bg-info text-dark"><i class="bi bi-person-fill me-1"></i> User Register</span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle border" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li><a class="dropdown-item" href="/penyewa/edit/<?= $p['type_id'] ?>/<?= $p['id'] ?>"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit</a></li>
                                <?php if($p['type_id'] == 'user'): ?>
                                    <li>
                                        <a class="dropdown-item" href="/penyewa/toggleRole/<?= $p['id'] ?>">
                                            <?php if($p['is_admin'] == 1): ?>
                                                <i class="bi bi-person-down me-2 text-warning"></i> Jadikan User Biasa
                                            <?php else: ?>
                                                <i class="bi bi-shield-check me-2 text-success"></i> Jadikan Admin
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="/penyewa/delete/<?= $p['type_id'] ?>/<?= $p['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="bi bi-trash me-2"></i> Hapus</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($pengguna)): ?>
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Belum ada data pengguna.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>