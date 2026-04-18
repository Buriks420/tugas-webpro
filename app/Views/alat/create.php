<h2>Tambah Alat</h2>
<form action="/alat/store" method="post" enctype="multipart/form-data" class="w-50">
    <div class="mb-3">
        <label>Nama Alat</label>
        <input type="text" name="nama_alat" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <select name="id_kategori" class="form-select" required>
            <?php foreach($kategori as $k): ?>
                <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Foto Alat</label>
        <input type="file" name="foto" class="form-control" required>
    </div>
    <div class="mb-4">
        <label class="d-block mb-2">Tags (Opsional)</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="featured" id="tagFeatured">
            <label class="form-check-label" for="tagFeatured">Featured (Tampil di Beranda)</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="hot" id="tagHot">
            <label class="form-check-label" for="tagHot">Hot</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="sale" id="tagSale">
            <label class="form-check-label" for="tagSale">Sale / Off %</label>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/alat" class="btn btn-secondary">Batal</a>
</form>