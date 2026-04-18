<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Kategori Alat</h2>
    <a href="/kategori/create" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Kategori</a>
</div>
<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Nama Kategori</th>
                    <th>Status</th>
                    <th class="text-center" width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($kategori as $k): ?>
                <tr>
                    <td class="ps-4"><?= $k['id_kategori'] ?></td>
                    <td class="fw-medium"><?= esc($k['nama_kategori']) ?></td>
                    <td>
                        <?php if($k['is_hidden']): ?>
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
                                <li><a class="dropdown-item" href="/kategori/edit/<?= $k['id_kategori'] ?>"><i class="bi bi-pencil-square me-2 text-primary"></i> Edit</a></li>
                                <li>
                                    <a class="dropdown-item" href="/kategori/toggleHide/<?= $k['id_kategori'] ?>">
                                        <?php if($k['is_hidden']): ?>
                                            <i class="bi bi-eye me-2 text-success"></i> Tampilkan
                                        <?php else: ?>
                                            <i class="bi bi-eye-slash me-2 text-warning"></i> Sembunyikan
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="/kategori/delete/<?= $k['id_kategori'] ?>" onclick="return confirm('Yakin ingin menghapus kategori ini?');"><i class="bi bi-trash me-2"></i> Hapus</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($kategori)): ?>
                    <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data kategori.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>