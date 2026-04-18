<h2>Edit Alat Multimedia</h2>
<form action="/alat/update/<?= $alat['id_alat'] ?>" method="post" enctype="multipart/form-data" class="w-50">
    <div class="mb-3">
        <label>Nama Alat</label>
        <input type="text" name="nama_alat" class="form-control" value="<?= esc($alat['nama_alat']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="id_kategori" class="form-select" required>
            <?php foreach($kategori as $k): ?>
                <option value="<?= $k['id_kategori'] ?>" <?= $k['id_kategori'] == $alat['id_kategori'] ? 'selected' : '' ?>><?= esc($k['nama_kategori']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"><?= esc($alat['deskripsi']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Foto Saat Ini</label><br>
        <img src="/uploads/<?= esc($alat['foto']) ?>" width="150" class="mb-2 rounded shadow-sm">
    </div>
    <div class="mb-3">
        <label>Ganti Foto Alat (Kosongkan jika tidak ingin diubah)</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="mb-4">
        <label class="d-block mb-2">Tags (Opsional)</label>
        <?php $currentTags = isset($alat['tags']) ? explode(',', $alat['tags']) : []; ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="featured" id="tagFeatured" <?= in_array('featured', $currentTags) ? 'checked' : '' ?>>
            <label class="form-check-label" for="tagFeatured">Featured (Tampil di Beranda)</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="hot" id="tagHot" <?= in_array('hot', $currentTags) ? 'checked' : '' ?>>
            <label class="form-check-label" for="tagHot">Hot</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="sale" id="tagSale" <?= in_array('sale', $currentTags) ? 'checked' : '' ?>>
            <label class="form-check-label" for="tagSale">Sale / Off %</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/alat" class="btn btn-secondary">Batal</a>
</form>
