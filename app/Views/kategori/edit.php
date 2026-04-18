<h2>Edit Kategori</h2>
<form action="/kategori/update/<?= $kategori['id_kategori'] ?>" method="post" class="w-50">
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="<?= esc($kategori['nama_kategori']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/kategori" class="btn btn-secondary">Batal</a>
</form>
