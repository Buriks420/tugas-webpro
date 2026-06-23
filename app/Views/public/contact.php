<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <style>
        :root {
            /* Brand Colors */
            --primary-color: #f97316;    /* Vibrant Orange (Orange-500) */
            --secondary-color: #ea580c;  /* Deep Orange (Orange-600) */
            --accent-color: #f59e0b;     /* Warm Amber for highlights */
            
            /* Neutral Surfaces */
            --dark-bg: #1c1917;          /* Stone-900 (Deep warm charcoal) */
            --sidebar-bg: #fafaf9;       /* Stone-50 (Very light warm grey) */
            --body-bg: #f5f5f4;          /* Stone-100 (Soft neutral base) */
            --border-color: #e7e5e4;     /* Stone-200 (Clean, warm divider) */

            /* Typography */
            --text-dark: #44403c;        /* Stone-700 (High readability) */
            --text-light: #78716c;       /* Stone-500 (Subtle secondary text) */
        }

        body { 
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg); 
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
        }

        /* Top Header Area */
        .top-header {
            background-color: #ffffff;
            padding: 20px 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .brand-logo {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            letter-spacing: -1px;
        }

        .search-box {
            position: relative;
        }
        
        .search-input {
            border-radius: 0;
            border: 1px solid var(--border-color);
            padding: 12px 20px;
            font-size: 0.95rem;
            box-shadow: none;
        }
        
        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: none;
        }
        
        .search-btn {
            border-radius: 0;
            background: transparent;
            border: 1px solid var(--border-color);
            border-left: none;
            color: var(--text-dark);
            padding: 0 20px;
        }

        /* Main Navigation Bar */
        .main-nav {
            background-color: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .category-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 16px 20px;
            font-weight: 600;
            font-size: 1rem;
            display: flex;
            align-items: center;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-links a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 16px 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: color 0.3s;
        }
        
        .nav-links a:hover, .nav-links a.active {
            color: var(--primary-color);
        }

        .nav-right a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            border-left: 1px solid var(--border-color);
        }

        .nav-right .btn-profile {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 24px;
            margin-left: 15px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .nav-right .btn-profile:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Layout Structure */
        .page-wrapper {
            display: flex;
            max-width: 1400px;
            margin: 0 auto;
            background: #ffffff;
            min-height: calc(100vh - 150px);
            box-shadow: 0 0 20px rgba(0,0,0,0.02);
            position: relative;
        }

        /* Left Sidebar & Mega Menu */
        .sidebar {
            width: 280px;
            flex-shrink: 0;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            position: relative; /* Key for absolute mega menu */
            z-index: 10;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar-menu a.cat-link {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.2s;
            background: transparent;
        }

        .sidebar-menu a.cat-link i {
            margin-right: 15px;
            color: var(--text-light);
            font-size: 1.1rem;
        }

        .sidebar-menu li:hover > a.cat-link {
            background: #ffffff;
            color: var(--primary-color);
            padding-left: 25px;
        }
        
        .sidebar-menu li:hover > a.cat-link i {
            color: var(--primary-color);
        }
        
        .sidebar-menu a.cat-link::after {
            content: '\F285'; /* bi-chevron-right */
            font-family: 'bootstrap-icons';
            margin-left: auto;
            font-size: 0.8rem;
            opacity: 0.3;
        }

        /* Mega Menu Content */
        .mega-menu-content {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            width: 700px;
            height: 100%;
            background: #ffffff;
            box-shadow: 10px 0 30px rgba(0,0,0,0.05);
            z-index: 100;
            padding: 30px;
            border-left: 1px solid var(--border-color);
            overflow-y: auto;
            background-image: url('data:image/svg+xml;utf8,<svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="1" fill="%23e7e5e4"/></pattern></defs><rect width="100%" height="100%" fill="url(%23dots)"/></svg>');
        }

        .sidebar-menu li:hover .mega-menu-content {
            display: flex;
            flex-direction: column;
        }

        .mega-menu-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 1.2rem;
            text-transform: uppercase;
            color: var(--dark-bg);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
            display: inline-block;
        }

        .mega-menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .mega-item {
            display: flex;
            flex-direction: column;
            background: rgba(255,255,255,0.8);
            padding: 10px;
            border-radius: 8px;
            transition: background 0.2s;
        }
        
        .mega-item:hover {
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .mega-item img {
            width: 100%;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .mega-item-name {
            font-size: 0.85rem;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 600;
            text-align: center;
        }
        
        .mega-item:hover .mega-item-name {
            color: var(--primary-color);
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            overflow: hidden;
            background: #ffffff;
        }

        /* Banner Carousel */
        .hero-banner {
            background: linear-gradient(135deg, var(--body-bg) 0%, #ffffff 100%);
            min-height: 500px;
            position: relative;
            display: flex;
            align-items: center;
            padding: 40px;
            overflow: hidden;
            border-bottom: 1px solid var(--border-color);
        }

        .banner-text {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }

        .banner-text h1 {
            font-size: 3.5rem;
            color: var(--dark-bg);
            line-height: 1.1;
            margin-bottom: 20px;
            font-weight: 800;
        }

        .banner-text p {
            font-size: 1.1rem;
            color: var(--text-light);
            line-height: 1.6;
        }

        /* Product Grid */
        .featured-section {
            padding: 50px 40px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-header h4 {
            color: var(--text-light);
            font-size: 0.85rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .section-header h2 {
            font-size: 2.2rem;
            color: var(--dark-bg);
            text-transform: uppercase;
        }

        .product-card {
            border: 1px solid var(--border-color);
            border-radius: 0;
            transition: all 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
            background: #fff;
            position: relative; /* For badges */
        }

        .product-card:hover {
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border-color: transparent;
            transform: translateY(-5px);
        }

        /* Tag Badges */
        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 2;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .badge-hot {
            background-color: #ef4444; /* Red */
            color: white;
        }
        
        .badge-sale {
            background-color: #22c55e; /* Green */
            color: white;
            top: 45px; /* offset if multiple */
        }

        .product-img {
            padding: 20px;
            text-align: center;
            background: var(--body-bg);
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid var(--border-color);
        }

        .product-img img {
            max-height: 180px;
            max-width: 100%;
            object-fit: contain;
        }

        .product-info {
            padding: 20px;
            flex-grow: 1;
            text-align: center;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-bg);
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        /* Footer */
        .footer {
            background: var(--dark-bg);
            color: #fff;
            padding: 60px 0 20px;
        }

        .footer-logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: white;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }

        .footer-info p {
            color: var(--text-light);
            margin-bottom: 10px;
            font-size: 0.95rem;
        }
        
        .footer-info i {
            width: 20px;
            color: var(--primary-color);
        }

        .footer-nav h5 {
            color: white;
            margin-bottom: 20px;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-nav a {
            color: var(--text-light);
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: color 0.3s;
        }

        .footer-nav a:hover {
            color: var(--accent-color);
        }

        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 40px;
            color: var(--text-light);
            font-size: 0.9rem;
            text-align: left;
        }

        /* Floating WhatsApp */
        .floating-wa {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #25D366;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3);
            z-index: 1000;
            text-decoration: none;
            transition: transform 0.3s;
        }

        .floating-wa:hover {
            transform: scale(1.1);
            color: white;
        }
    </style>
</head>
<body>

<!-- Top Header -->
<div class="top-header">
    <div class="container-fluid" style="max-width: 1400px;">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a href="/" class="brand-logo">
                    <i class="bi bi-layers-fill me-2 text-primary"></i> MS-Rent
                </a>
            </div>
            <div class="col-md-6">
                <div class="input-group search-box">
                    <input type="text" class="form-control search-input" placeholder="Cari produk...">
                    <button class="btn search-btn" type="button"><i class="bi bi-search"></i></button>
                </div>
            </div>
            <div class="col-md-3 text-end d-none d-md-block">
                <!-- Additional top header items -->
            </div>
        </div>
    </div>
</div>

<!-- Main Nav -->
<div class="main-nav">
    <div class="container-fluid p-0" style="max-width: 1400px; display: flex;">
        <div style="width: 280px; flex-shrink: 0;">
            <div class="category-header">
                <i class="bi bi-list fs-4 me-3"></i> JELAJAHI KATEGORI
            </div>
        </div>
        <div class="d-flex flex-grow-1 align-items-center justify-content-between px-3">
            <div class="nav-links d-flex">
                <a href="/">BERANDA</a>
                <a href="/about">TENTANG KAMI</a>
                <a href="/contact" class="active">HUBUNGI KAMI</a>
            </div>
            <div class="top-nav-right d-flex align-items-center">
                <?php if(session()->get('logged_in')): ?>
                    <?php if(session()->get('is_admin')): ?>
                        <a href="/dashboard" class="me-4 text-decoration-none text-dark" title="Dashboard">
                            <i class="bi bi-grid-fill fs-5" style="color: var(--primary-color);"></i>
                        </a>
                    <?php endif; ?>
                    
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-4 me-2" style="color: var(--primary-color);"></i>
                            <span class="text-dark fw-bold d-none d-md-inline" style="font-size:0.9rem;"><?= esc(session()->get('username')) ?></span>
                            <i class="bi bi-chevron-down ms-2 text-muted" style="font-size:0.7rem;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 rounded-3" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item py-2" href="/auth/profile"><i class="bi bi-person me-2 text-muted"></i> My Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="/auth/logout"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="/auth" class="text-decoration-none text-dark fw-bold hover-primary" style="font-size:0.9rem; transition: color 0.2s;"><i class="bi bi-person me-1 fs-5 align-middle"></i> LOGIN / REGISTER</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Layout Wrapper -->
<div class="page-wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="sidebar-menu">
            <?php if(!empty($kategoriWithAlat)): ?>
                <?php foreach($kategoriWithAlat as $k): ?>
                    <li>
                        <a href="#<?= esc($k['id_kategori']) ?>" class="cat-link">
                            <?php 
                                $icon = 'bi-record-circle';
                                $lowerName = strtolower($k['nama_kategori']);
                                if(strpos($lowerName, 'kamera') !== false) $icon = 'bi-camera-video';
                                elseif(strpos($lowerName, 'lensa') !== false) $icon = 'bi-camera';
                                elseif(strpos($lowerName, 'sound') !== false) $icon = 'bi-speaker';
                                elseif(strpos($lowerName, 'proyektor') !== false || strpos($lowerName, 'projector') !== false) $icon = 'bi-projector';
                                elseif(strpos($lowerName, 'lighting') !== false) $icon = 'bi-lightbulb';
                                elseif(strpos($lowerName, 'komunikasi') !== false || strpos($lowerName, 'communication') !== false || strpos($lowerName, 'ht') !== false) $icon = 'bi-headset';
                                elseif(strpos($lowerName, 'music') !== false || strpos($lowerName, 'musik') !== false) $icon = 'bi-music-note-beamed';
                                elseif(strpos($lowerName, 'wireless') !== false || strpos($lowerName, 'control') !== false) $icon = 'bi-broadcast';
                                elseif(strpos($lowerName, 'monitor') !== false || strpos($lowerName, 'tv') !== false) $icon = 'bi-tv';
                                elseif(strpos($lowerName, 'videotron') !== false || strpos($lowerName, 'led') !== false) $icon = 'bi-grid-3x3';
                                elseif(strpos($lowerName, 'rig') !== false || strpos($lowerName, 'stabilizer') !== false) $icon = 'bi-arrows-move';
                                elseif(strpos($lowerName, 'tripod') !== false || strpos($lowerName, 'monopod') !== false) $icon = 'bi-triangle';
                            ?>
                            <i class="bi <?= $icon ?>"></i> <?= esc($k['nama_kategori']) ?>
                        </a>
                        <!-- Mega Menu Panel -->
                        <div class="mega-menu-content">
                            <span class="mega-menu-title"><?= esc($k['nama_kategori']) ?></span>
                            <?php if(!empty($k['items'])): ?>
                                <div class="mega-menu-grid">
                                    <?php foreach($k['items'] as $item): ?>
                                        <a href="/item/<?= esc($item['id_alat']) ?>" class="mega-item text-decoration-none">
                                            <img src="/uploads/<?= esc($item['foto']) ?>" alt="<?= esc($item['nama_alat']) ?>" onerror="this.src='https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&q=80&w=200'">
                                            <span class="mega-item-name"><?= esc($item['nama_alat']) ?></span>
                                            <span class="text-primary fw-bold text-center mt-1" style="font-size:0.85rem;">Rp <?= number_format(isset($item['harga']) ? $item['harga'] : 0, 0, ',', '.') ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-muted">Belum ada item di kategori ini.</p>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li><a href="#" class="cat-link"><i class="bi bi-info-circle"></i> Kategori Kosong</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">


        <!-- Contact Us Section -->
        <div id="contact" class="contact-section py-5 px-4 mt-5" style="background-color: var(--sidebar-bg);">
            <div class="text-center mb-5">
                <h5 class="text-primary fw-bold text-uppercase tracking-wide mb-2">Hubungi Kami</h5>
                <h2 class="fw-bold" style="font-family: 'Outfit', sans-serif;">Hubungi Kami Untuk Pertanyaan Apapun</h2>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-5 bg-dark text-white p-5 d-flex flex-column justify-content-center">
                                <h4 class="fw-bold mb-4">Informasi Kontak</h4>
                                <div class="d-flex mb-4">
                                    <i class="bi bi-geo-alt-fill text-primary fs-4 me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Alamat</h6>
                                        <p class="text-white-50 small mb-0">Kawasan Bisnis Sudirman, Jakarta Selatan 12190</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <i class="bi bi-telephone-fill text-primary fs-4 me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Telepon</h6>
                                        <p class="text-white-50 small mb-0">088973335955</p>
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <i class="bi bi-envelope-fill text-primary fs-4 me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Email</h6>
                                        <p class="text-white-50 small mb-0">ms.rental.indonesia@gmail.com</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <i class="bi bi-whatsapp text-primary fs-4 me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">WhatsApp</h6>
                                        <p class="text-white-50 small mb-0">088973335955</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 p-5 bg-white">
                                <h4 class="fw-bold mb-4 text-dark">Kirimkan Pesan</h4>
                                <form>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-lg bg-light border-0" placeholder="Nama Anda" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control form-control-lg bg-light border-0" placeholder="Email Anda" required>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control form-control-lg bg-light border-0" placeholder="Subjek" required>
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control form-control-lg bg-light border-0" rows="4" placeholder="Pesan Anda" required></textarea>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm fw-bold">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <div class="container-fluid" style="max-width: 1400px; padding: 0 40px;">
        <div class="row">
            <div class="col-lg-5 pe-5">
                <a href="/" class="footer-logo">
                    <i class="bi bi-layers-fill text-primary"></i> MS-Rent
                </a>
                <p style="line-height: 1.6; margin-bottom: 30px;">
                    MS-Rent mendukung industri kreatif, produksi, dan acara melalui layanan penyewaan peralatan multimedia dan AV terintegrasi berkualitas tinggi.
                </p>
                <div class="footer-info">
                    <p><i class="bi bi-geo-alt-fill"></i> Kawasan Bisnis Sudirman, Jakarta Selatan 12190</p>
                    <p><i class="bi bi-telephone-fill"></i> PHONE : (+62) 889-7333-5955</p>
                    <p><i class="bi bi-whatsapp"></i> WA : (+62) 889-7333-5955</p>
                </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
                <div class="footer-nav">
                    <h5>Navigasi</h5>
                    <a href="/">Beranda</a>
                    <a href="/about">Tentang Kami</a>
                    <a href="/contact">Hubungi Kami</a>
                    <a href="#products">Produk</a>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="footer-nav">
                    <h5>Kategori</h5>
                    <?php $count=0; foreach($kategoriWithAlat as $k): if($count>=4) break; ?>
                        <a href="#"><?= esc($k['nama_kategori']) ?></a>
                    <?php $count++; endforeach; ?>
                </div>
            </div>
        </div>
        <div class="copyright d-flex justify-content-between align-items-center">
            <div>&copy; <?= date('Y') ?> <strong>PT Multimedia Sistem Rent</strong>. Hak Cipta Dilindungi.</div>
        </div>
    </div>
</div>

<a href="https://wa.me/6288973335955" target="_blank" class="floating-wa">
    <i class="bi bi-whatsapp"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>