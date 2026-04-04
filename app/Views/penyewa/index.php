<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Penyewa</h2>
    <a href="/penyewa/create" class="btn btn-primary">Tambah Penyewa</a>
</div>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Penyewa</th>
            <th>Kontak</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($penyewa as $p): ?>
        <tr>
            <td><?= $p['id_penyewa'] ?></td>
            <td><?= $p['nama_penyewa'] ?></td>
            <td><?= $p['kontak'] ?></td>
            <td><?= $p['alamat'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>