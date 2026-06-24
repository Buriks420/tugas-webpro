<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Edit Penyewa</h2>
</div>
<div class="card shadow-sm border-0 w-50">
    <div class="card-body">
        <form action="/penyewa/update/penyewa/<?= $penyewa['id_penyewa'] ?>" method="post">
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Penyewa</label>
                <input type="text" name="nama_penyewa" class="form-control" value="<?= esc($penyewa['nama_penyewa']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Kontak (HP/WA)</label>
                <input type="text" name="kontak" class="form-control" value="<?= esc($penyewa['kontak']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required><?= esc($penyewa['alamat']) ?></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
                <a href="/penyewa" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
