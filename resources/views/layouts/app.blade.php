<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Kantin Sehat')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo-kantin.png') }}" type="image/png" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Animate.css for notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #17a2b8;
            --accent-color: #ffc107;
            --danger-color: #dc3545;
            --light-green: #d4edda;
            --light-blue: #d1ecf1;
            --light-yellow: #fff3cd;
            --light-red: #f8d7da;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        /* ===== SIDEBAR STYLES ===== */
        .sidebar {
            background: linear-gradient(180deg, #28a745 0%, #20c997 100%);
            min-height: 100vh;
            color: white;
            position: fixed;
            width: 250px;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar .logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.1);
        }

        .sidebar .logo h3 {
            color: white;
            font-weight: bold;
            margin: 0;
            font-size: 1.5rem;
        }

        .sidebar .logo span {
            color: var(--accent-color);
        }

        .sidebar .logo p {
            font-size: 0.85rem;
            opacity: 0.8;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(5px);
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .sidebar .nav-link .badge {
            margin-left: auto;
            font-size: 0.7rem;
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar-card {
            background: rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            margin: 20px 10px;
            padding: 15px;
            text-align: center;
        }

        /* ===== MAIN CONTENT STYLES ===== */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
            min-height: 100vh;
        }

        /* ===== NAVBAR STYLES ===== */
        .navbar-custom {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 999;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 15px 20px;
        }

        .navbar-custom .navbar-toggler {
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            background: var(--primary-color);
            color: white;
        }

        .navbar-custom .nav-user {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 8px 15px;
            border-radius: 50px;
            transition: all 0.3s;
            background: rgba(40, 167, 69, 0.1);
        }

        .navbar-custom .nav-user:hover {
            background: rgba(40, 167, 69, 0.2);
        }

        .navbar-custom .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-color);
            margin-right: 10px;
        }

        .navbar-custom .user-info {
            line-height: 1.2;
        }

        .navbar-custom .user-info .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: #333;
        }

        .navbar-custom .user-info .user-role {
            font-size: 0.8rem;
            color: var(--primary-color);
        }

        .navbar-custom .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 10px;
            margin-top: 10px;
        }

        .navbar-custom .dropdown-item {
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }

        .navbar-custom .dropdown-item i {
            width: 20px;
            margin-right: 10px;
            color: var(--primary-color);
        }

        .navbar-custom .dropdown-item:hover {
            background: rgba(40, 167, 69, 0.1);
            color: var(--primary-color);
        }

        /* ===== NOTIFICATION STYLES ===== */
        .nav-notification {
            position: relative;
            padding: 8px !important;
            border-radius: 50% !important;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .nav-notification:hover {
            background: rgba(40, 167, 69, 0.1);
        }

        .nav-notification i {
            font-size: 1.2rem;
        }

        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 0.6rem;
            padding: 3px 6px;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .notification-dropdown {
            width: 350px !important;
            max-height: 400px;
            overflow-y: auto;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-radius: 15px;
            padding: 0;
        }

        .notification-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 15px;
            border-radius: 15px 15px 0 0;
            margin: -1px;
        }

        .notification-body {
            max-height: 300px;
            overflow-y: auto;
            padding: 10px;
        }

        .notification-item {
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 8px;
            transition: all 0.3s;
            border: 1px solid #f1f1f1;
            background: white;
        }

        .notification-item:hover {
            background: rgba(40, 167, 69, 0.05);
            border-color: rgba(40, 167, 69, 0.2);
            transform: translateX(5px);
        }

        .notification-item.unread {
            background: rgba(13, 110, 253, 0.05);
            border-left: 3px solid #0d6efd;
        }

        .notification-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: white;
        }

        .notification-content {
            flex: 1;
            min-width: 0;
            margin-left: 12px;
        }

        .notification-title {
            font-weight: 600;
            font-size: 0.9rem;
            color: #333;
            margin-bottom: 3px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .notification-message {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 5px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .notification-time {
            font-size: 0.75rem;
            color: #adb5bd;
            white-space: nowrap;
            margin-left: 5px;
        }

        .notification-actions {
            margin-top: 5px;
        }

        .notification-footer {
            border-top: 1px solid #f1f1f1;
            padding: 12px;
            text-align: center;
        }

        /* ===== PAGE HEADER STYLES ===== */
        .page-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            right: 10%;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }

        .page-header h1 {
            position: relative;
            z-index: 1;
        }

        .page-header p {
            position: relative;
            z-index: 1;
            opacity: 0.9;
        }

        /* ===== CARD STYLES ===== */
        .card-kantin {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-kantin:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .card-kantin .card-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border: none;
            padding: 20px;
            border-radius: 15px 15px 0 0 !important;
        }

        .card-kantin .card-body {
            padding: 25px;
        }

        /* ===== BUTTON STYLES ===== */
        .btn-kantin {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-kantin:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
            color: white;
        }

        .btn-kantin i {
            margin-right: 8px;
        }

        .btn-outline-kantin {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-outline-kantin:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .btn-edit {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-edit:hover {
            background-color: #138496;
            color: white;
            transform: translateY(-2px);
        }

        .btn-delete {
            background-color: var(--danger-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-delete:hover {
            background-color: #c82333;
            color: white;
            transform: translateY(-2px);
        }

        .btn-view {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-view:hover {
            background-color: #5a6268;
            color: white;
            transform: translateY(-2px);
        }

        /* ===== TABLE STYLES ===== */
        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            background: white;
        }

        .table-custom thead {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
        }

        .table-custom thead th {
            border: none;
            padding: 15px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table-custom tbody tr {
            transition: all 0.3s;
        }

        .table-custom tbody tr:hover {
            background: rgba(40, 167, 69, 0.05);
            transform: scale(1.002);
        }

        .table-custom tbody td {
            padding: 15px;
            vertical-align: middle;
            border-color: #f1f1f1;
        }

        /* ===== FORM STYLES ===== */
        .form-control-custom {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s;
            font-size: 1rem;
        }

        .form-control-custom:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
            transform: translateY(-2px);
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        /* ===== BADGE STYLES ===== */
        .badge-kantin {
            padding: 6px 12px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.8rem;
        }

        .badge-success {
            background: rgba(40, 167, 69, 0.1);
            color: var(--primary-color);
        }

        .badge-warning {
            background: rgba(255, 193, 7, 0.1);
            color: #e0a800;
        }

        .badge-danger {
            background: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
        }

        .badge-info {
            background: rgba(23, 162, 184, 0.1);
            color: var(--secondary-color);
        }

        .badge-primary {
            background: rgba(0, 123, 255, 0.1);
            color: #007bff;
        }

        /* ===== ACTION BUTTONS STYLES ===== */
        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .action-buttons .btn {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.3s;
        }

        /* ===== FOOTER STYLES ===== */
        .footer-custom {
            margin-top: 50px;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            font-size: 0.9rem;
            border-top: 1px solid #e9ecef;
        }

        /* ===== RESPONSIVE STYLES ===== */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
                position: fixed;
                top: 0;
                left: 0;
            }

            .sidebar.active {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .main-content.active {
                margin-left: 250px;
            }

            .page-header {
                padding: 20px;
            }

            .page-header h1 {
                font-size: 1.5rem;
            }

            .notification-dropdown {
                width: 280px !important;
            }

            .navbar-custom .user-info {
                display: none;
            }

            .navbar-custom .nav-user {
                padding: 8px;
            }
        }

        /* ===== UTILITY CLASSES ===== */
        .text-primary-kantin {
            color: var(--primary-color) !important;
        }

        .bg-light-green {
            background-color: var(--light-green) !important;
        }

        .bg-light-blue {
            background-color: var(--light-blue) !important;
        }

        .rounded-kantin {
            border-radius: 15px !important;
        }

        .shadow-kantin {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08) !important;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        /* ===== STATS CARDS ===== */
        .stats-card {
            border-radius: 15px;
            color: white;
            padding: 20px;
            margin-bottom: 20px;
        }

        .stats-card .stats-icon {
            font-size: 2.5rem;
            opacity: 0.8;
            margin-bottom: 15px;
        }

        .stats-card .stats-number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stats-card .stats-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
    </style>
</head>

<body>
    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <h3><i class="fas fa-utensils"></i> Kantin<span>Sehat</span></h3>
            <p class="text-white-50 mb-0">Admin Panel</p>
        </div>

        <nav class="nav flex-column mt-4">
            <!-- Dashboard -->
            <a href="{{ url('/admin/dashboard') }}"
                class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>

            <!-- Data Users -->
            <a href="{{ url('/admin/users') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Data Users
                <span class="badge">24</span>
            </a>

            <!-- Data Siswa -->

            <a href="{{ url('/admin/siswa') }}" class="nav-link {{ request()->is('admin/siswa*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Data Siswa
                <span class="badge">11</span>
            </a>


            <!-- Data Produk -->
            <a href="{{ url('/admin/products') }}"
                class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                <i class="fas fa-utensils"></i> Data Produk
                <span class="badge">28</span>
            </a>

            <!-- Data Pesanan -->
            <a href="{{ url('/admin/orders') }}" class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart"></i> Data Pesanan
                <span class="badge bg-warning">5</span>
            </a>

            <!-- Laporan -->
            <a href="{{ url('/admin/reports') }}"
                class="nav-link {{ request()->is('admin/reports*') ? 'active' : '' }}">
                <i class="fas fa-chart-bar"></i> Laporan
            </a>

            <!-- Divider -->
            <div class="sidebar-card">
                <i class="fas fa-leaf fa-2x text-success mb-3"></i>
                <h6>Kantin Sehat</h6>
                <small class="text-white-50">Makanan sehat untuk semua</small>
            </div>
        </nav>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content" id="mainContent">
        <!-- ===== NAVBAR ===== -->
        <nav class="navbar navbar-custom navbar-expand-lg">
            <div class="container-fluid">
                <!-- Sidebar Toggle Button -->
                <button class="navbar-toggler d-lg-none" type="button" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Page Title -->
                <div class="navbar-brand d-none d-lg-block">
                    <h4 class="mb-0 text-primary-kantin">
                        <i class="fas @yield('title-icon', 'fa-tachometer-alt') me-2"></i>
                        @yield('title', 'Dashboard')
                    </h4>
                </div>

                <!-- User Menu -->
                <div class="navbar-nav ms-auto align-items-center">
                    <!-- NOTIFICATION BELL -->
                    <div class="nav-item dropdown me-3">
                        <a class="nav-link nav-notification position-relative" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell text-primary-kantin"></i>
                            <!-- Notification Badge -->
                            <span class="badge bg-danger rounded-pill notification-badge">3</span>
                        </a>

                        <!-- Notification Dropdown -->
                        <div class="dropdown-menu dropdown-menu-end notification-dropdown">
                            <!-- Header -->
                            <div class="notification-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 text-white">
                                        <i class="fas fa-bell me-2"></i> Notifikasi
                                    </h6>
                                    <a href="#" class="text-white-50 mark-all-read" style="font-size: 0.75rem;">
                                        <i class="fas fa-check-double me-1"></i> Tandai semua
                                    </a>
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="notification-body">
                                <!-- Unread Notifications -->
                                <div class="notification-item unread" data-id="1">
                                    <div class="d-flex align-items-start">
                                        <div class="notification-icon bg-primary">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                        <div class="notification-content">
                                            <div class="notification-title">
                                                <span>Pesanan Baru</span>
                                                <span class="notification-time">5m lalu</span>
                                            </div>
                                            <p class="notification-message">
                                                #ORD123 dari Budi Santoso • Total: Rp 85.000
                                            </p>
                                            <div class="notification-actions">
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-primary btn-sm py-0 px-2 me-1">
                                                    Lihat
                                                </a>
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-secondary btn-sm py-0 px-2 mark-as-read"
                                                    data-id="1">
                                                    Tandai
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="notification-item unread" data-id="2">
                                    <div class="d-flex align-items-start">
                                        <div class="notification-icon bg-warning">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="notification-content">
                                            <div class="notification-title">
                                                <span>Stok Hampir Habis</span>
                                                <span class="notification-time">1 jam lalu</span>
                                            </div>
                                            <p class="notification-message">
                                                Produk "Salad Buah" tersisa 2 porsi. Segera restok!
                                            </p>
                                            <div class="notification-actions">
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-warning btn-sm py-0 px-2 me-1">
                                                    Restok
                                                </a>
                                                <a href="#"
                                                    class="btn btn-sm btn-outline-secondary btn-sm py-0 px-2 mark-as-read"
                                                    data-id="2">
                                                    Tandai
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Read Notifications -->
                                <div class="notification-item" data-id="3">
                                    <div class="d-flex align-items-start">
                                        <div class="notification-icon bg-success">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="notification-content">
                                            <div class="notification-title">
                                                <span>Pembayaran Berhasil</span>
                                                <span class="notification-time">2 jam lalu</span>
                                            </div>
                                            <p class="notification-message">
                                                Pesanan #ORD122 telah dibayar via QRIS
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="notification-item" data-id="4">
                                    <div class="d-flex align-items-start">
                                        <div class="notification-icon bg-info">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="notification-content">
                                            <div class="notification-title">
                                                <span>Pengguna Baru</span>
                                                <span class="notification-time">Hari ini</span>
                                            </div>
                                            <p class="notification-message">
                                                Andi Wijaya telah mendaftar sebagai pelanggan
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="notification-item" data-id="5">
                                    <div class="d-flex align-items-start">
                                        <div class="notification-icon bg-secondary">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="notification-content">
                                            <div class="notification-title">
                                                <span>Ulasan Baru</span>
                                                <span class="notification-time">Kemarin</span>
                                            </div>
                                            <p class="notification-message">
                                                Siti Nurhaliza memberikan rating 5 ⭐ untuk Nasi Goreng
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="notification-footer">
                                <a href="#" class="btn btn-sm btn-outline-primary w-100">
                                    <i class="fas fa-list me-1"></i> Lihat Semua Notifikasi
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- USER MENU -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-user" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=Admin+Kantin&background=28a745&color=fff&size=64"
                                class="user-avatar" alt="Admin">
                            <div class="user-info d-none d-md-block">
                                <div class="user-name">Admin Kantin</div>
                                <div class="user-role">
                                    <i class="fas fa-user-shield me-1"></i> Administrator
                                </div>
                            </div>
                            <i class="fas fa-chevron-down ms-2 text-primary-kantin"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.settings.profile') }}">
                                    <i class="fas fa-user me-2"></i> Profil Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.settings.index') }}">
                                    <i class="fas fa-cog me-2"></i> Pengaturan
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/') }}">
                                    <i class="fas fa-home me-2"></i> Landing Page
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ url('/login') }}">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- ===== CONTENT AREA ===== -->
        <div class="container-fluid">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-kantin" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-2 fa-lg"></i>
                        <div class="flex-grow-1">{{ session('success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-kantin" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle me-2 fa-lg"></i>
                        <div class="flex-grow-1">{{ session('error') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            @if (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show shadow-kantin" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle me-2 fa-lg"></i>
                        <div class="flex-grow-1">{{ session('warning') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            <!-- Page Header (can be overridden by child views) -->
            @hasSection('page-header')
                @yield('page-header')
            @else
                <div class="page-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="mb-2">
                                <i class="fas @yield('title-icon', 'fa-tachometer-alt') me-2"></i>
                                @yield('title', 'Dashboard')
                            </h1>
                            <p class="mb-0">@yield('subtitle', 'Selamat datang di Kantin Sehat Admin Panel')</p>
                        </div>
                        @hasSection('header-button')
                            @yield('header-button')
                        @endif
                    </div>
                </div>
            @endif

            <!-- Main Content -->
            @yield('content')
        </div>

        <!-- ===== FOOTER ===== -->
        <footer class="footer-custom">
            <p class="mb-2">&copy; {{ date('Y') }} Kantin Sehat. Semua hak dilindungi.</p>
            <p class="mb-0 text-muted">
                <small>
                    <i class="fas fa-heart text-danger"></i>
                    Makanan sehat untuk hidup lebih baik
                </small>
            </p>
        </footer>
    </div>

    <!-- ===== SCRIPTS ===== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JS -->
    <script>
        // ===== SIDEBAR TOGGLE =====
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');

            // Toggle sidebar on button click
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                    mainContent.classList.toggle('active');
                });
            }

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) &&
                        !sidebarToggle.contains(event.target) &&
                        sidebar.classList.contains('active')) {
                        sidebar.classList.remove('active');
                        mainContent.classList.remove('active');
                    }
                }
            });

            // ===== DATATABLES INITIALIZATION =====
            if ($.fn.DataTable) {
                $('.data-table').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                    },
                    pageLength: 10,
                    responsive: true,
                    order: [
                        [0, 'asc']
                    ]
                });
            }

            // ===== SELECT2 INITIALIZATION =====
            if ($.fn.select2) {
                $('.select2').select2({
                    theme: 'bootstrap-5',
                    placeholder: 'Pilih opsi',
                    allowClear: true
                });
            }

            // ===== NOTIFICATION FUNCTIONALITY =====
            // Mark single notification as read
            $(document).on('click', '.mark-as-read', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const notificationId = $(this).data('id');
                const notificationItem = $(this).closest('.notification-item');

                // Remove unread styling
                notificationItem.removeClass('unread');

                // Update badge count
                updateNotificationCount(-1);

                // Show success feedback
                $(this).html('<i class="fas fa-check me-1"></i>Dibaca');
                $(this).removeClass('btn-outline-secondary').addClass('btn-success');

                // In real app, send AJAX request
                // $.ajax({
                //     url: '/api/notifications/' + notificationId + '/read',
                //     method: 'POST',
                //     success: function(response) {
                //         console.log('Notification marked as read');
                //     }
                // });

                showToast('success', 'Notifikasi ditandai sebagai dibaca');
            });

            // Mark all notifications as read
            $(document).on('click', '.mark-all-read', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Remove unread styling from all notifications
                $('.notification-item.unread').each(function() {
                    $(this).removeClass('unread');
                    $(this).find('.mark-as-read')
                        .html('<i class="fas fa-check me-1"></i>Dibaca')
                        .removeClass('btn-outline-secondary')
                        .addClass('btn-success');
                });

                // Reset badge count
                $('.notification-badge').text('0');
                $('.notification-badge').fadeOut();

                // In real app, send AJAX request
                // $.ajax({
                //     url: '/api/notifications/read-all',
                //     method: 'POST',
                //     success: function(response) {
                //         console.log('All notifications marked as read');
                //     }
                // });

                showToast('success', 'Semua notifikasi telah ditandai sebagai dibaca');
            });

            // Update notification badge count
            function updateNotificationCount(change) {
                const badge = $('.notification-badge');
                let currentCount = parseInt(badge.text()) || 0;
                let newCount = currentCount + change;

                if (newCount <= 0) {
                    badge.text('0');
                    badge.fadeOut();
                } else {
                    if (badge.is(':hidden')) {
                        badge.fadeIn();
                    }
                    badge.text(newCount);

                    // Add animation for new notification
                    if (change > 0) {
                        badge.addClass('animate__animated animate__bounce');
                        setTimeout(() => {
                            badge.removeClass('animate__animated animate__bounce');
                        }, 1000);
                    }
                }
            }

            // Simulate new notification (for demo purposes)
            let notificationCounter = 5;

            function addDemoNotification() {
                const notifications = [{
                        id: ++notificationCounter,
                        title: "Pesanan Baru",
                        message: `#ORD${100 + notificationCounter} dari pelanggan baru`,
                        icon: "shopping-cart",
                        color: "primary",
                        time: "Baru saja"
                    },
                    {
                        id: ++notificationCounter,
                        title: "Stok Produk",
                        message: `${['Nasi Goreng', 'Salad Buah', 'Jus Jeruk'][Math.floor(Math.random() * 3)]} hampir habis`,
                        icon: "exclamation-triangle",
                        color: "warning",
                        time: "Baru saja"
                    },
                    {
                        id: ++notificationCounter,
                        title: "Pembayaran Berhasil",
                        message: `Pembayaran untuk pesanan #ORD${80 + notificationCounter} telah diterima`,
                        icon: "check-circle",
                        color: "success",
                        time: "Baru saja"
                    }
                ];

                const notif = notifications[Math.floor(Math.random() * notifications.length)];

                // Add new notification to the top
                const newNotification = `
                    <div class="notification-item unread animate__animated animate__fadeIn" data-id="${notif.id}">
                        <div class="d-flex align-items-start">
                            <div class="notification-icon bg-${notif.color}">
                                <i class="fas fa-${notif.icon}"></i>
                            </div>
                            <div class="notification-content">
                                <div class="notification-title">
                                    <span>${notif.title}</span>
                                    <span class="notification-time">${notif.time}</span>
                                </div>
                                <p class="notification-message">${notif.message}</p>
                                <div class="notification-actions">
                                    <a href="#" class="btn btn-sm btn-outline-primary btn-sm py-0 px-2 me-1">
                                        Lihat
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary btn-sm py-0 px-2 mark-as-read" data-id="${notif.id}">
                                        Tandai
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                $('.notification-body').prepend(newNotification);
                updateNotificationCount(1);

                // Show desktop notification if supported
                if ("Notification" in window && Notification.permission === "granted") {
                    new Notification(notif.title, {
                        body: notif.message,
                        icon: '/images/logo-kantin.png'
                    });
                }
            }

            // Request notification permission
            if ("Notification" in window) {
                if (Notification.permission === "default") {
                    Notification.requestPermission();
                }
            }

            // ===== DELETE CONFIRMATION WITH AJAX (Simple Version) =====
            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();

                const button = $(this);
                const form = button.closest('form.delete-form');
                const url = form.attr('action');
                const itemName = button.data('name') || 'data ini';
                const row = button.closest('tr');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    html: `<strong>${itemName}</strong> akan dihapus permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show loading
                        Swal.fire({
                            title: 'Menghapus...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // AJAX Delete
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _token: form.find('input[name="_token"]').val(),
                                _method: 'DELETE'
                            },
                            success: function(response) {
                                if (response.success) {
                                    // Hapus row
                                    row.fadeOut(400, function() {
                                        $(this).remove();

                                        // Update stats
                                        const totalRows = $('tbody tr:visible')
                                            .length;
                                        $('.stats-number').first().text(
                                            totalRows);
                                    });

                                    // Success message
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: response.message ||
                                            'Data berhasil dihapus',
                                        timer: 2000,
                                        showConfirmButton: false
                                    });
                                }
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: xhr.responseJSON?.message ||
                                        'Terjadi kesalahan saat menghapus data'
                                });
                            }
                        });
                    }
                });
            });

            // ===== IMAGE PREVIEW =====
            $(document).on('change', '.image-upload', function() {
                const input = this;
                const preview = $(this).data('preview');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        $(preview).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            });

            // ===== FORM VALIDATION =====
            $(document).on('submit', 'form.needs-validation', function(e) {
                const form = this;
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');
            });

            // ===== TOAST NOTIFICATION =====
            window.showToast = function(type, message) {
                const toast = $(`
                    <div class="toast align-items-center text-white bg-${type} border-0" role="alert">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
                                ${message}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                `);

                // Create toast container if it doesn't exist
                if ($('.toast-container').length === 0) {
                    $('body').append('<div class="toast-container position-fixed bottom-0 end-0 p-3"></div>');
                }

                $('.toast-container').append(toast);
                const bsToast = new bootstrap.Toast(toast[0], {
                    autohide: true,
                    delay: 3000
                });
                bsToast.show();

                toast.on('hidden.bs.toast', function() {
                    $(this).remove();
                });
            };

            // ===== AUTO-DISMISS ALERTS =====
            setTimeout(function() {
                $('.alert:not(.alert-permanent)').alert('close');
            }, 5000);

            // ===== TOGGLE PASSWORD VISIBILITY =====
            $(document).on('click', '.toggle-password', function() {
                const input = $(this).parent().find('input');
                const icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // ===== COPY TO CLIPBOARD =====
            $(document).on('click', '.btn-copy', function() {
                const text = $(this).data('copy');
                navigator.clipboard.writeText(text).then(() => {
                    showToast('success', 'Teks berhasil disalin!');
                });
            });

            // Demo: Add notification every 30 seconds (for testing)
            setInterval(() => {
                // 20% chance to add notification
                if (Math.random() < 0.2) {
                    addDemoNotification();
                }
            }, 30000);
        });

        // ===== UTILITY FUNCTIONS =====
        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }

        function formatDateTime(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }
    </script>

    @stack('scripts')
</body>

</html>
