<aside class="app-sidebar shadow-sm" data-bs-theme="dark">
        <div class="sidebar-brand">
            <a href="/dashboard" class="brand-link">
                <span class="brand-text fw-light">Admin Panel</span>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                    <li class="nav-item"><a href="/dashboard" class="nav-link"><i class="nav-icon bi bi-speedometer"></i> <p>Dashboard</p></a></li>
                    <li class="nav-item"><a href="/kategori" class="nav-link"><i class="nav-icon bi bi-tags"></i> <p>Kategori Alat</p></a></li>
                    <li class="nav-item"><a href="/alat" class="nav-link"><i class="nav-icon bi bi-camera-video"></i> <p>Data Alat</p></a></li>
                    <li class="nav-item"><a href="/penyewa" class="nav-link"><i class="nav-icon bi bi-people-fill"></i> <p>Data Pengguna</p></a></li>
                    <li class="nav-item"><a href="/transaksi" class="nav-link"><i class="nav-icon bi bi-cart-check"></i> <p>Transaksi Penyewaan</p></a></li>
                    <li class="nav-item mt-4"><a href="/auth/logout" class="nav-link text-danger"><i class="nav-icon bi bi-box-arrow-right"></i> <p>Logout</p></a></li>
                </ul>
            </nav>
        </div>
    </aside>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0"><?= $title ?? '' ?></h3></div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card card-outline card-primary">
                    <div class="card-body">