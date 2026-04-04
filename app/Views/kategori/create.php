<h2>Tambah Kategori</h2>
<form action="/kategori/store" method="post" class="w-50">
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/kategori" class="btn btn-secondary">Batal</a>
</form>