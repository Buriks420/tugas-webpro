<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0ea5e9;
            --secondary-color: #38bdf8;
            --dark-bg: #0f172a;
            --card-bg: #ffffff;
            --text-dark: #1e293b;
            --text-light: #64748b;
        }

        body { 
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; 
            color: var(--text-dark);
        }

        h1, h2, h3, h4, h5, .navbar-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
        }

        /* Navbar Styling */
        .navbar {
            background-color: rgba(15, 23, 42, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
            color: white !important;
            display: flex;
            align-items: center;
        }

        .btn-outline-light {
            border-radius: 50px;
            padding: 8px 24px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero { 
            background: linear-gradient(135deg, var(--dark-bg) 0%, #1e1b4b 100%);
            color: white; 
            padding: 120px 0 80px; 
            text-align: center; 
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 50% 50%, rgba(56, 189, 248, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            background: linear-gradient(to right, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.2rem;
            color: #cbd5e1;
            max-width: 600px;
            margin: 0 auto 30px;
            line-height: 1.6;
        }

        /* Product Grid Container */
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
            font-weight: 800;
            color: var(--dark-bg);
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            margin: 15px auto 0;
            border-radius: 2px;
        }

        /* Card Styling */
        .product-card {
            background: var(--card-bg);
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        .card-img-wrapper {
            position: relative;
            overflow: hidden;
            padding-top: 60%; /* Aspect ratio */
            background: #f1f5f9;
        }

        .product-card .card-img-top { 
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .card-img-top {
            transform: scale(1.08);
        }

        .category-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(15, 23, 42, 0.8);
            color: white;
            backdrop-filter: blur(4px);
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .card-body {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.25rem;
            color: var(--text-dark);
            margin-bottom: 10px;
            font-weight: 700;
        }

        .card-text {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        /* Call to Action Button */
        .btn-rent {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 12px 20px;
            font-weight: 600;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-rent:hover {
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.3);
            transform: translateY(-2px);
            color: white;
        }

        /* Features Section */
        .features-section {
            background: white;
            padding: 60px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .feature-item {
            text-align: center;
            padding: 20px;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-bg);
        }
        
        .feature-desc {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        /* Footer */
        footer {
            background: var(--dark-bg);
            color: white;
            padding: 40px 0 20px;
            text-align: center;
        }
        
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#0ea5e9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2"><path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14v-4z"/><rect x="3" y="6" width="12" height="12" rx="2" ry="2"/></svg>
            Multimedia Rental
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item me-3">
                    <a class="nav-link active" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="/auth" class="btn btn-outline-light btn-sm px-4">Admin Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="hero">
    <div class="container">
        <h1>Katalog Alat Event & Multimedia</h1>
        <p>Sewa peralatan proyektor, kamera, sound system, dan LED TV berkualitas tinggi. Teknisi standby, pengiriman tepat waktu, dan harga transparan.</p>
        <a href="#katalog" class="btn btn-rent" style="max-width: 220px; margin: 0 auto; padding: 15px 30px; font-size: 1rem;">Lihat Katalog Produk</a>
    </div>
</div>

<div class="features-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-item">
                    <div class="feature-icon">🛡️</div>
                    <h3 class="feature-title">Peralatan Terawat</h3>
                    <p class="feature-desc">Semua unit alat multimedia dan AV kami dipelihara secara rutin dan selalu dalam kondisi prima sebelum disewakan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item">
                    <div class="feature-icon">👨‍🔧</div>
                    <h3 class="feature-title">Dukungan Teknisi</h3>
                    <p class="feature-desc">Teknisi berpengalaman kami siap membantu instalasi dan standby selama event Anda berlangsung.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item">
                    <div class="feature-icon">🚚</div>
                    <h3 class="feature-title">Pengiriman Cepat</h3>
                    <p class="feature-desc">Layanan pengantaran dan penjemputan alat ke lokasi acara agar aman dan tepat waktu.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5" id="katalog">
    <h2 class="section-title">Produk Tersedia</h2>
    
    <?php if(empty($alat)): ?>
        <div class="empty-state">
            <h4 class="text-muted">Belum ada produk yang tersedia.</h4>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach($alat as $a): ?>
            <div class="col-lg-4 col-md-6">
                <div class="product-card">
                    <div class="card-img-wrapper">
                        <span class="category-badge"><?= esc($a['nama_kategori']) ?></span>
                        <img src="/uploads/<?= esc($a['foto']) ?>" class="card-img-top" alt="<?= esc($a['nama_alat']) ?>" onerror="this.src='https://images.unsplash.com/photo-1542382257-80dedb725088?auto=format&fit=crop&q=80&w=800'">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?= esc($a['nama_alat']) ?></h3>
                        <p class="card-text"><?= esc($a['deskripsi']) ?></p>
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20info%20sewa%20<?= urlencode($a['nama_alat']) ?>" class="btn btn-rent" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                            Hubungi via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<footer>
    <div class="container">
        <p class="mb-0 text-white-50">&copy; <?= date('Y') ?> Sistem Penyewaan Multimedia. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>