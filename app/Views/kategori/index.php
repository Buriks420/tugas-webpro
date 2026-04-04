<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Kategori Alat</h2>
    <a href="/kategori/create" class="btn btn-primary">Tambah Kategori</a>
</div>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($kategori as $k): ?>
        <tr>
            <td><?= $k['id_kategori'] ?></td>
            <td><?= $k['nama_kategori'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>