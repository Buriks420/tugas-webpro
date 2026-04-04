<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .hero { background: #343a40; color: white; padding: 50px 0; text-align: center; }
        .card-img-top { height: 200px; object-fit: cover; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Sistem Penyewaan Multimedia</a>
        <div class="d-flex">
            <a href="/auth" class="btn btn-outline-light">Admin Login</a>
        </div>
    </div>
</nav>

<div class="hero">
    <div class="container">
        <h1>Katalog Alat Multimedia</h1>
        <p>Sewa peralatan kamera, proyektor, dan sound system berkualitas.</p>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <?php foreach($alat as $a): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="/uploads/<?= $a['foto'] ?>" class="card-img-top" alt="<?= $a['nama_alat'] ?>">
                <div class="card-body">
                    <span class="badge bg-primary mb-2"><?= $a['nama_kategori'] ?></span>
                    <h5 class="card-title"><?= $a['nama_alat'] ?></h5>
                    <p class="card-text text-muted"><?= $a['deskripsi'] ?></p>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20menyewa%20<?= urlencode($a['nama_alat']) ?>" class="btn btn-success w-100" target="_blank">Sewa via WhatsApp</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>