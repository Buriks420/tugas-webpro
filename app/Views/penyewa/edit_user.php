<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Edit User Register</h2>
</div>
<div class="card shadow-sm border-0 w-50">
    <div class="card-body">
        <form action="/penyewa/update/user/<?= $user['id'] ?>" method="post">
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="<?= esc($user['nama_lengkap']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Username</label>
                <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Role / Peran</label>
                <select name="is_admin" class="form-select">
                    <option value="0" <?= $user['is_admin'] == 0 ? 'selected' : '' ?>>User Register (Biasa)</option>
                    <option value="1" <?= $user['is_admin'] == 1 ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
                <a href="/penyewa" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
