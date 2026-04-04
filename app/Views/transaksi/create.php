<h2>Proses Penyewaan Baru</h2>
<form action="/transaksi/store" method="post" class="w-50">
    <div class="mb-3">
        <label>Pilih Alat</label>
        <select name="id_alat" class="form-select" required>
            <?php foreach($alat as $a): ?>
                <option value="<?= $a['id_alat'] ?>"><?= $a['nama_alat'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Pilih Penyewa</label>
        <select name="id_penyewa" class="form-select" required>
            <?php foreach($penyewa as $p): ?>
                <option value="<?= $p['id_penyewa'] ?>"><?= $p['nama_penyewa'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Tanggal Sewa</label>
        <input type="date" name="tanggal_sewa" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Proses Sewa</button>
    <a href="/transaksi" class="btn btn-secondary">Batal</a>
</form>