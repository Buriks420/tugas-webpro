<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Penyewaan' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/css/adminlte.min.css">
    <style>
        /* Custom Admin Theme */
        body {
            background-color: #f8fafc;
        }
        .app-sidebar {
            background: linear-gradient(180deg, #1c1917 0%, #292524 100%) !important;
            border-right: 1px solid rgba(255,255,255,0.05);
        }
        .sidebar-brand {
            border-bottom: 1px solid rgba(255,255,255,0.1) !important;
            background-color: rgba(0,0,0,0.15) !important;
        }
        .sidebar-brand .brand-link {
            color: #fff !important;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .sidebar-menu .nav-item {
            margin-bottom: 2px;
        }
        .sidebar-menu .nav-link {
            color: rgba(255,255,255,0.7) !important;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 10px;
        }
        .sidebar-menu .nav-link:hover {
            background-color: rgba(249, 115, 22, 0.15) !important;
            color: #f97316 !important;
        }
        .sidebar-menu .nav-link.active {
            background: linear-gradient(135deg, #f97316, #ea580c) !important;
            color: #fff !important;
            box-shadow: 0 4px 10px rgba(249, 115, 22, 0.3);
        }
        .sidebar-menu .nav-link.text-danger {
            color: #ef4444 !important;
        }
        .sidebar-menu .nav-link.text-danger:hover {
            background-color: rgba(239, 68, 68, 0.15) !important;
            color: #f87171 !important;
        }
        .app-header {
            background-color: #ffffff !important;
            box-shadow: 0 2px 15px rgba(0,0,0,0.03);
            border-bottom: none !important;
        }
        .app-wrapper {
            background-color: #f8fafc;
        }
        .app-content-header {
            padding-top: 20px;
        }
    </style>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-list"></i></a>
                </li>
            </ul>
        </div>
    </nav>