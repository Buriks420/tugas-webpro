<h2>Tambah Penyewa</h2>
<form action="/penyewa/store" method="post" class="w-50">
    <div class="mb-3">
        <label>Nama Penyewa</label>
        <input type="text" name="nama_penyewa" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kontak (HP/WA)</label>
        <input type="text" name="kontak" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/penyewa" class="btn btn-secondary">Batal</a>
</form>