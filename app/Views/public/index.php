<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <style>
        :root {
            --primary-color: #4f46e5;      /* Indigo instead of Red */
            --secondary-color: #4338ca;    /* Darker Indigo */
            --accent-color: #0ea5e9;       /* Bright Blue */
            --dark-bg: #1e293b;
            --text-dark: #334155;
            --text-light: #64748b;
            --sidebar-bg: #f8fafc;
            --body-bg: #f1f5f9;
            --border-color: #e2e8f0;
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
        }

        /* Left Sidebar */
        .sidebar {
            width: 280px;
            flex-shrink: 0;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar-menu a {
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

        .sidebar-menu a i {
            margin-right: 15px;
            color: var(--primary-color);
            font-size: 1.1rem;
            opacity: 0.7;
        }

        .sidebar-menu a:hover {
            background: #ffffff;
            color: var(--primary-color);
            padding-left: 25px;
        }
        
        .sidebar-menu a::after {
            content: '\F285'; /* bi-chevron-right */
            font-family: 'bootstrap-icons';
            margin-left: auto;
            font-size: 0.8rem;
            opacity: 0.3;
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            overflow: hidden;
            background: #ffffff;
        }

        /* Banner Carousel */
        .hero-banner {
            background: linear-gradient(to right, #f8fafc, #e2e8f0);
            min-height: 500px;
            position: relative;
            display: flex;
            align-items: center;
            padding: 40px;
            overflow: hidden;
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
        }

        .product-card:hover {
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border-color: transparent;
            transform: translateY(-5px);
        }

        .product-img {
            padding: 20px;
            text-align: center;
            background: #f8fafc;
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
            color: #94a3b8;
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
            color: #94a3b8;
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
            color: #64748b;
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
                    <i class="bi bi-camera-reels-fill me-2 text-primary"></i> MS-Rent
                </a>
            </div>
            <div class="col-md-6">
                <div class="input-group search-box">
                    <input type="text" class="form-control search-input" placeholder="Search for products...">
                    <button class="btn search-btn" type="button"><i class="bi bi-search"></i></button>
                </div>
            </div>
            <div class="col-md-3 text-end d-none d-md-block">
                <!-- Additional top header items if needed -->
            </div>
        </div>
    </div>
</div>

<!-- Main Nav -->
<div class="main-nav">
    <div class="container-fluid p-0" style="max-width: 1400px; display: flex;">
        <div style="width: 280px; flex-shrink: 0;">
            <div class="category-header">
                <i class="bi bi-list fs-4 me-3"></i> BROWSE CATEGORIES
            </div>
        </div>
        <div class="d-flex flex-grow-1 align-items-center justify-content-between px-3">
            <div class="nav-links d-flex">
                <a href="/" class="active">HOME</a>
                <a href="#about">ABOUT US</a>
                <a href="#contact">CONTACT US</a>
            </div>
            <div class="nav-right d-flex align-items-center">
                <a href="/auth"><i class="bi bi-person me-2 fs-5"></i> ADMIN LOGIN</a>
                <a href="#company" class="btn-profile d-none d-lg-block">COMPANY PROFILE</a>
            </div>
        </div>
    </div>
</div>

<!-- Layout Wrapper -->
<div class="page-wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="sidebar-menu">
            <?php if(!empty($kategori)): ?>
                <?php foreach($kategori as $k): ?>
                    <li>
                        <a href="#<?= esc($k['id_kategori']) ?>">
                            <!-- Adding a dynamic icon based on common names, or default to circle -->
                            <?php 
                                $icon = 'bi-record-circle';
                                $lowerName = strtolower($k['nama_kategori']);
                                if(strpos($lowerName, 'kamera') !== false) $icon = 'bi-camera-video';
                                elseif(strpos($lowerName, 'lensa') !== false) $icon = 'bi-camera';
                                elseif(strpos($lowerName, 'sound') !== false) $icon = 'bi-speaker';
                                elseif(strpos($lowerName, 'proyektor') !== false) $icon = 'bi-projector';
                                elseif(strpos($lowerName, 'lighting') !== false) $icon = 'bi-lightbulb';
                                elseif(strpos($lowerName, 'komunikasi') !== false || strpos($lowerName, 'ht') !== false) $icon = 'bi-headset';
                            ?>
                            <i class="bi <?= $icon ?>"></i> <?= esc($k['nama_kategori']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li><a href="#"><i class="bi bi-info-circle"></i> Kategori Kosong</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Banner Carousel -->
        <div class="hero-banner">
            <div class="banner-text">
                <h1>High Quality Multimedia Equipment</h1>
                <p>MS-Rent provides various types of professional equipment for your events. Cameras, Sound Systems, Lighting, and others. Ready to deploy across the region.</p>
                <div class="mt-4">
                    <span class="badge bg-white text-dark border p-2 me-2 shadow-sm">Kamera</span>
                    <span class="badge bg-white text-dark border p-2 me-2 shadow-sm">Sound System</span>
                    <span class="badge bg-white text-dark border p-2 shadow-sm">Lighting</span>
                </div>
            </div>
            <!-- Decorative Graphic / Hero Image Placeholder -->
            <div style="position: absolute; right: -50px; top: 50%; transform: translateY(-50%); opacity: 0.8;">
                 <!-- Abstract geometric shapes mimicking the conveyor belts on Makitech, but abstract -->
                 <svg width="600" height="400" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50 350 L450 100 L550 150 L150 400 Z" fill="#cbd5e1" opacity="0.5"/>
                    <path d="M100 350 L500 100 L600 150 L200 400 Z" fill="#94a3b8" opacity="0.3"/>
                    <circle cx="450" cy="125" r="40" fill="var(--primary-color)" opacity="0.8"/>
                    <circle cx="350" cy="187" r="40" fill="var(--primary-color)" opacity="0.9"/>
                    <circle cx="250" cy="250" r="40" fill="var(--primary-color)"/>
                 </svg>
            </div>
        </div>

        <!-- Featured Products -->
        <div class="featured-section">
            <div class="section-header">
                <h4>MS-Rent Collections</h4>
                <h2>Featured Equipment</h2>
                <p class="text-muted">We provide premium gear for professional productions</p>
            </div>

            <?php if(empty($alat)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-box-seam text-muted" style="font-size: 4rem;"></i>
                    <h4 class="mt-3 text-muted">Belum ada produk yang tersedia.</h4>
                </div>
            <?php else: ?>
                <div class="row g-0">
                    <?php foreach($alat as $a): ?>
                    <div class="col-lg-4 col-md-6 border-end border-bottom border-color">
                        <div class="product-card">
                            <div class="product-img">
                                <img src="/uploads/<?= esc($a['foto']) ?>" alt="<?= esc($a['nama_alat']) ?>" onerror="this.src='https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&q=80&w=400'">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title"><?= esc($a['nama_alat']) ?></h3>
                                <p class="text-muted small mb-3"><?= esc($a['nama_kategori']) ?></p>
                                <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20menyewa%20<?= urlencode($a['nama_alat']) ?>" target="_blank" class="btn btn-outline-dark btn-sm text-uppercase px-4 rounded-0 fw-bold w-100">Inquire Now</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <div class="container-fluid" style="max-width: 1400px; padding: 0 40px;">
        <div class="row">
            <div class="col-lg-5 pe-5">
                <a href="/" class="footer-logo">
                    <i class="bi bi-camera-reels-fill text-primary"></i> MS-Rent
                </a>
                <p style="color: #cbd5e1; line-height: 1.6; margin-bottom: 30px;">
                    MS-Rent empower the creative, production, and event industries through integrated high-quality multimedia and AV equipment rentals.
                </p>
                <div class="footer-info">
                    <p><i class="bi bi-geo-alt-fill"></i> Kawasan Bisnis Sudirman, Jakarta Selatan 12190</p>
                    <p><i class="bi bi-telephone-fill"></i> PHONE : (+62) 21-1234-5678</p>
                    <p><i class="bi bi-whatsapp"></i> WA : (+62) 812-3456-7890</p>
                </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
                <div class="footer-nav">
                    <h5>Navigation</h5>
                    <a href="/">Home</a>
                    <a href="#about">About Us</a>
                    <a href="#contact">Contact Us</a>
                    <a href="#products">Products</a>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="footer-nav">
                    <h5>Categories</h5>
                    <?php $count=0; foreach($kategori as $k): if($count>=4) break; ?>
                        <a href="#"><?= esc($k['nama_kategori']) ?></a>
                    <?php $count++; endforeach; ?>
                </div>
            </div>
        </div>
        <div class="copyright d-flex justify-content-between align-items-center">
            <div>&copy; <?= date('Y') ?> <strong>PT Multimedia Sistem Rent</strong>. All Rights Reserved.</div>
        </div>
    </div>
</div>

<a href="https://wa.me/6281234567890" target="_blank" class="floating-wa">
    <i class="bi bi-whatsapp"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>