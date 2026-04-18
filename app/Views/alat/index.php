<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Alat Multimedia</h2>
    <a href="/alat/create" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Alat</a>
</div>
<div class="card shadow-sm border-0">
    <div class="card-body p-0 table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Foto</th>
                    <th>Nama Alat</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th class="text-center" width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alat as $a): ?>
                <tr>
                    <td class="ps-4"><?= $a['id_alat'] ?></td>
                    <td>
                        <img src="/uploads/<?= esc($a['foto']) ?>" width="80" class="rounded shadow-sm" style="object-fit:cover; height:60px;" onerror="this.src='https://images.unsplash.com/photo-1542382257-80dedb725088?auto=format&fit=crop&q=80&w=800'">
                    </td>
                    <td class="fw-medium"><?= esc($a['nama_alat']) ?></td>
                    <td><span class="badge bg-info text-dark"><?= esc($a['nama_kategori']) ?></span></td>
                    <td><small class="text-muted text-truncate d-inline-block" style="max-width: 200px;"><?= esc($a['deskripsi']) ?></small></td>
                    <td>
                        <?php if($a['is_hidden']): ?>
                            <span class="badge bg-secondary"><i class="bi bi-eye-slash me-1"></i> Disembunyikan</span>
                        <?php else: ?>
                            <span class="badge bg-success"><i class="bi bi-eye me-1"></i> Tampil</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle border" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Aksi
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li><a class="dropdown-item" href="/alat/edit/<?= $a['id_alat'] ?>"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit</a></li>
                                <li>
                                    <a class="dropdown-item" href="/alat/toggleHide/<?= $a['id_alat'] ?>">
                                        <?php if($a['is_hidden']): ?>
                                            <i class="bi bi-eye me-2 text-success"></i> Tampilkan
                                        <?php else: ?>
                                            <i class="bi bi-eye-slash me-2 text-warning"></i> Sembunyikan
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="/alat/delete/<?= $a['id_alat'] ?>" onclick="return confirm('Yakin ingin menghapus alat ini?');"><i class="bi bi-trash me-2"></i> Hapus</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($alat)): ?>
                    <tr><td colspan="7" class="text-center py-4 text-muted">Belum ada data alat multimedia.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>