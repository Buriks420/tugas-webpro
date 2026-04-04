<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Alat Multimedia</h2>
    <a href="/alat/create" class="btn btn-primary">Tambah Alat</a>
</div>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nama Alat</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($alat as $a): ?>
        <tr>
            <td><?= $a['id_alat'] ?></td>
            <td><img src="/uploads/<?= $a['foto'] ?>" width="100"></td>
            <td><?= $a['nama_alat'] ?></td>
            <td><?= $a['nama_kategori'] ?></td>
            <td><?= $a['deskripsi'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>