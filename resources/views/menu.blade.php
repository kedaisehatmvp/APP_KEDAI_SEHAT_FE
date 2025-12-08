<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Kantin Sehat</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #28a745;
            --primary-dark: #218838;
            --secondary: #ffc107;
            --light: #f8f9fa;
            --dark: #343a40;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #17a2b8;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            line-height: 1.6;
            background-color: #f8f9fa;
        }
        
        /* ===== NAVBAR ===== */
        .navbar {
            background: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary);
        }
        
        .navbar-brand span {
            color: var(--secondary);
        }
        
        .navbar-brand i {
            color: var(--primary);
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 10px;
            color: var(--dark) !important;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        .btn-order {
            background: var(--primary);
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-order:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }
        
        .btn-order i {
            margin-right: 8px;
        }
        
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* ===== PROFILE DROPDOWN ===== */
        .profile-avatar img {
            object-fit: cover;
            border: 2px solid var(--primary);
            transition: all 0.3s;
        }
        
        .btn-transparent {
            background: transparent;
            border: none;
            color: var(--dark);
            transition: all 0.3s;
            display: flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 50px;
        }
        
        .btn-transparent:hover {
            background: rgba(40, 167, 69, 0.1);
        }
        
        .btn-transparent:focus {
            box-shadow: none;
        }
        
        .dropdown-menu {
            border: none;
            border-radius: 10px;
            min-width: 200px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .dropdown-item {
            padding: 10px 20px;
            border-radius: 8px;
            margin: 2px 10px;
            width: calc(100% - 20px);
            transition: all 0.3s;
        }
        
        .dropdown-item:hover {
            background: rgba(40, 167, 69, 0.1);
            color: var(--primary);
        }
        
        .dropdown-item i {
            width: 20px;
            text-align: center;
        }
        
        .profile-name {
            font-size: 0.9rem;
            line-height: 1.2;
        }
        
        .profile-role {
            font-size: 0.75rem;
        }
        
        /* ===== HERO MENU ===== */
        .menu-hero {
            background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), 
                        url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0 80px;
            text-align: center;
            margin-top: 80px;
        }
        
        .menu-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .menu-hero p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }
        
        .search-box {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .search-box input {
            padding: 15px 20px;
            border-radius: 50px;
            border: none;
            width: 100%;
            font-size: 1rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .search-box input:focus {
            outline: none;
            box-shadow: 0 5px 25px rgba(0,0,0,0.15);
        }
        
        /* ===== CATEGORY FILTER ===== */
        .category-filter {
            padding: 40px 0;
            background: white;
        }
        
        .category-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .category-btn {
            padding: 10px 25px;
            border: 2px solid var(--primary);
            background: transparent;
            color: var(--primary);
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .category-btn:hover,
        .category-btn.active {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        /* ===== MENU GRID ===== */
        .menu-section {
            padding: 60px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-title h2 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background: var(--secondary);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .section-title p {
            color: #666;
            max-width: 600px;
            margin: 20px auto 0;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .menu-item {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s;
            position: relative;
        }
        
        .menu-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }
        
        .menu-item.featured {
            border: 2px solid var(--primary);
        }
        
        .menu-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--primary);
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            z-index: 1;
        }
        
        .menu-badge.hot {
            background: var(--danger);
        }
        
        .menu-badge.new {
            background: var(--info);
        }
        
        .menu-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .menu-item:hover .menu-img {
            transform: scale(1.05);
        }
        
        .menu-content {
            padding: 25px;
        }
        
        .menu-category {
            display: inline-block;
            background: rgba(40, 167, 69, 0.1);
            color: var(--primary);
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 15px;
        }
        
        .menu-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--dark);
            font-size: 1.2rem;
        }
        
        .menu-description {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 15px;
            line-height: 1.5;
        }
        
        .menu-price {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.3rem;
        }
        
        .menu-old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 1rem;
            margin-left: 10px;
        }
        
        .menu-rating {
            color: var(--warning);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .menu-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .btn-add-to-cart {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 500;
            flex: 1;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-add-to-cart:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .btn-detail {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 8px 15px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        
        .btn-detail:hover {
            background: var(--primary);
            color: white;
        }
        
        .menu-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        
        .menu-calories {
            color: #666;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        /* ===== CART SIDEBAR ===== */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: -5px 0 30px rgba(0,0,0,0.1);
            z-index: 1100;
            transition: right 0.3s;
            display: flex;
            flex-direction: column;
        }
        
        .cart-sidebar.active {
            right: 0;
        }
        
        .cart-header {
            padding: 20px;
            background: var(--primary);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .cart-header h4 {
            margin: 0;
            font-weight: 600;
        }
        
        .cart-close {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        .cart-body {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        
        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
            gap: 15px;
        }
        
        .cart-item-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }
        
        .cart-item-details {
            flex: 1;
        }
        
        .cart-item-title {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .cart-item-price {
            color: var(--primary);
            font-weight: 600;
        }
        
        .cart-item-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .quantity-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .quantity-btn:hover {
            background: #f8f9fa;
        }
        
        .quantity {
            min-width: 30px;
            text-align: center;
        }
        
        .remove-item {
            color: var(--danger);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
        }
        
        .cart-footer {
            padding: 20px;
            border-top: 1px solid #eee;
        }
        
        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .cart-total-amount {
            color: var(--primary);
        }
        
        .btn-checkout {
            background: var(--primary);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .btn-checkout:hover {
            background: var(--primary-dark);
        }
        
        .cart-empty {
            text-align: center;
            padding: 50px 20px;
            color: #666;
        }
        
        .cart-empty i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 20px;
        }
        
        /* ===== OVERLAY ===== */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            display: none;
        }
        
        .overlay.active {
            display: block;
        }
        
        /* ===== PAGINATION ===== */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 50px;
            gap: 10px;
        }
        
        .page-link {
            padding: 10px 20px;
            border: 2px solid #ddd;
            background: white;
            color: var(--dark);
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .page-link:hover,
        .page-link.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        /* ===== FOOTER ===== */
        footer {
            background: var(--dark);
            color: white;
            padding: 60px 0 20px;
            margin-top: 80px;
        }
        
        .footer-logo {
            font-weight: 700;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 20px;
            display: inline-block;
        }
        
        .footer-logo span {
            color: var(--secondary);
        }
        
        .footer-about p {
            color: #bbb;
            margin-bottom: 20px;
        }
        
        .footer-links h5 {
            color: white;
            margin-bottom: 25px;
            font-weight: 600;
        }
        
        .footer-links ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--primary);
        }
        
        .copyright {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #bbb;
            font-size: 0.9rem;
        }
        
        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .menu-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
            
            .cart-sidebar {
                width: 350px;
            }
        }
        
        @media (max-width: 768px) {
            .menu-hero {
                padding: 100px 0 60px;
                margin-top: 60px;
            }
            
            .menu-hero h1 {
                font-size: 2.5rem;
            }
            
            .category-buttons {
                overflow-x: auto;
                justify-content: flex-start;
                padding-bottom: 10px;
            }
            
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
            
            .menu-actions {
                flex-direction: column;
            }
            
            .btn-transparent {
                padding: 5px;
            }
            
            .profile-name {
                font-size: 0.8rem;
            }
            
            .profile-role {
                font-size: 0.7rem;
            }
        }
        
        @media (max-width: 576px) {
            .menu-grid {
                grid-template-columns: 1fr;
            }
            
            .menu-hero h1 {
                font-size: 2rem;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-utensils me-2"></i>Kantin<span>Sehat</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#promo">Promo</a>
                    </li>
                    <!-- Profile Dropdown -->
                    <div id="profileDropdown" class="dropdown d-none">
                        <button class="btn btn-transparent dropdown-toggle" 
                                type="button" 
                                id="dropdownMenuButton" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false">
                            <div class="profile-avatar me-2">
                                <img src="https://ui-avatars.com/api/?name=User&background=28a745&color=fff&size=40" 
                                     alt="Profile" 
                                     class="rounded-circle"
                                     width="40" 
                                     height="40"
                                     id="navbarAvatar">
                            </div>
                            <div class="text-start d-none d-md-block">
                                <div class="profile-name fw-bold text-dark" id="navbarName">Nama User</div>
                                <small class="profile-role text-muted" id="navbarRole">Siswa</small>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="/pembeli/profile">
                                    <i class="fas fa-user me-2"></i> Profile Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/order-history">
                                    <i class="fas fa-history me-2"></i> Riwayat Transaksi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/pembeli/settings">
                                    <i class="fas fa-cog me-2"></i> Pengaturan
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="logout()">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Login Button -->
                    <div id="loginButton" class="d-none">
                        <a href="/login" class="nav-link">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </div>
                    
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0 position-relative">
                        <button class="btn-order" id="cartToggle">
                            <i class="fas fa-shopping-cart"></i> Keranjang
                            <span class="cart-badge" id="cartCount">0</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== HERO MENU ===== -->
    <section class="menu-hero">
        <div class="container">
            <h1>Menu Kantin Sehat</h1>
            <p>Temukan berbagai pilihan makanan dan minuman sehat dengan bahan organik terbaik untuk mendukung gaya hidup sehat Anda</p>
            
            <div class="search-box">
                <input type="text" id="searchMenu" placeholder="Cari menu favorit Anda...">
            </div>
        </div>
    </section>

    <!-- ===== CATEGORY FILTER ===== -->
    <section class="category-filter">
        <div class="container">
            <div class="category-buttons">
                <button class="category-btn active" data-category="all">Semua</button>
                <button class="category-btn" data-category="makanan">Makanan</button>
                <button class="category-btn" data-category="minuman">Minuman</button>
                <button class="category-btn" data-category="cemilan">Cemilan</button>
                <button class="category-btn" data-category="paket">Paket</button>
                <button class="category-btn" data-category="vegetarian">Vegetarian</button>
                <button class="category-btn" data-category="low-calorie">Low Calorie</button>
            </div>
        </div>
    </section>

    <!-- ===== MENU GRID ===== -->
    <section class="menu-section">
        <div class="container">
            <div class="section-title">
                <h2>Menu Terpopuler</h2>
                <p>Pilihan menu sehat favorit pelanggan kami</p>
            </div>
            
            <div class="menu-grid" id="menuGrid">
                <!-- Menu items will be loaded here by JavaScript -->
            </div>
            
            <div class="pagination">
                <a href="#" class="page-link active">1</a>
                <a href="#" class="page-link">2</a>
                <a href="#" class="page-link">3</a>
                <a href="#" class="page-link">4</a>
                <a href="#" class="page-link">5</a>
            </div>
        </div>
    </section>

    <!-- ===== PROMO SECTION ===== -->
    <section id="promo" class="menu-section" style="background: #f8f9fa;">
        <div class="container">
            <div class="section-title">
                <h2>Promo Spesial</h2>
                <p>Dapatkan penawaran terbaik untuk hidup sehat</p>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="promo-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="promo-icon mb-3">
                            <i class="fas fa-gift fa-3x text-primary"></i>
                        </div>
                        <h4>Diskon 20%</h4>
                        <p>Untuk pembelian pertama Anda</p>
                        <small class="text-muted">Berlaku hingga 31 Desember 2024</small>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="promo-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="promo-icon mb-3">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h4>Buy 1 Get 1</h4>
                        <p>Untuk menu minuman setiap hari Jumat</p>
                        <small class="text-muted">Minimal pembelian Rp 50.000</small>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="promo-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="promo-icon mb-3">
                            <i class="fas fa-star fa-3x text-primary"></i>
                        </div>
                        <h4>Member Loyalty</h4>
                        <p>Dapatkan poin untuk setiap pembelian</p>
                        <small class="text-muted">Tukar poin dengan menu gratis</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CART SIDEBAR ===== -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h4><i class="fas fa-shopping-cart me-2"></i>Keranjang Belanja</h4>
            <button class="cart-close" id="cartClose">&times;</button>
        </div>
        
        <div class="cart-body" id="cartBody">
            <!-- Cart items will be loaded here -->
            <div class="cart-empty">
                <i class="fas fa-shopping-cart"></i>
                <h5>Keranjang Kosong</h5>
                <p>Tambahkan menu favorit Anda ke keranjang</p>
            </div>
        </div>
        
        <div class="cart-footer">
            <div class="cart-total">
                <span>Total</span>
                <span class="cart-total-amount" id="cartTotal">Rp 0</span>
            </div>
            <button class="btn-checkout" onclick="goToCheckout()">
                <i class="fas fa-credit-card me-2"></i> Checkout
            </button>
        </div>
    </div>
    
    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- ===== FOOTER ===== -->
    <footer id="about">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <a href="/" class="footer-logo">
                        <i class="fas fa-utensils me-2"></i>Kantin<span>Sehat</span>
                    </a>
                    <div class="footer-about">
                        <p>Menyediakan makanan sehat dengan bahan organik terbaik untuk mendukung gaya hidup sehat Anda.</p>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <h5>Menu Cepat</h5>
                    <ul class="footer-links">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/menu">Menu</a></li>
                        <li><a href="#promo">Promo</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <h5>Kategori</h5>
                    <ul class="footer-links">
                        <li><a href="#makanan">Makanan Sehat</a></li>
                        <li><a href="#minuman">Minuman Organik</a></li>
                        <li><a href="#cemilan">Cemilan Sehat</a></li>
                        <li><a href="#paket">Paket Diet</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2">
                    <h5>Kontak</h5>
                    <div class="footer-contact">
                        <p><i class="fas fa-phone"></i> (021) 1234-5678</p>
                        <p><i class="fas fa-envelope"></i> info@kantinsehat.com</p>
                        <p><i class="fas fa-clock"></i> 08:00 - 20:00</p>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2024 Kantin Sehat. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- ===== SCRIPTS ===== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Menu Data -->
    <script>
        // Menu data dengan gambar yang diperbaiki
        const menuItems = [
            {
                id: 1,
                name: "Salad Sehat Super",
                category: ["makanan", "vegetarian", "low-calorie"],
                description: "Campuran sayuran organik segar dengan dressing khusus rendah kalori.",
                price: 25000,
                oldPrice: 30000,
                image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.8,
                calories: 180,
                featured: true,
                badge: "HOT"
            },
            {
                id: 2,
                name: "Jus Detox Mix",
                category: ["minuman", "vegetarian"],
                description: "Campuran buah-buahan organik tanpa gula tambahan, kaya vitamin.",
                price: 18000,
                image: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 5.0,
                calories: 120,
                featured: false,
                badge: "NEW"
            },
            {
                id: 3,
                name: "Nasi Goreng Sehat",
                category: ["makanan"],
                description: "Nasi merah dengan sayuran organik dan protein rendah lemak.",
                price: 28000,
                image: "https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.5,
                calories: 320,
                featured: true
            },
            {
                id: 4,
                name: "Smoothie Bowl Berry",
                category: ["makanan", "vegetarian", "low-calorie"],
                description: "Smoothie buah berry dengan topping granola dan buah segar.",
                price: 22000,
                image: "https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.7,
                calories: 210,
                featured: false
            },
            {
                id: 5,
                name: "Sandwich Ayam Sehat",
                category: ["makanan"],
                description: "Roti gandum dengan ayam panggang dan sayuran segar.",
                price: 20000,
                oldPrice: 25000,
                image: "https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.2,
                calories: 280,
                featured: false
            },
            {
                id: 6,
                name: "Teh Hijau Organik",
                category: ["minuman", "vegetarian", "low-calorie"],
                description: "Teh hijau premium tanpa gula, kaya antioksidan.",
                price: 12000,
                image: "https://images.unsplash.com/photo-1594631252845-29fc4cc8cde9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.9,
                calories: 5,
                featured: false,
                badge: "NEW"
            },
            {
                id: 7,
                name: "Paket Diet Sehat",
                category: ["paket", "vegetarian", "low-calorie"],
                description: "Paket lengkap untuk diet sehat selama 1 hari.",
                price: 75000,
                oldPrice: 90000,
                image: "https://images.unsplash.com/photo-1490818387583-1baba5e638af?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.9,
                calories: 450,
                featured: true,
                badge: "HOT"
            },
            {
                id: 8,
                name: "Yogurt Parfait",
                category: ["cemilan", "vegetarian", "low-calorie"],
                description: "Yogurt rendah lemak dengan buah segar dan granola.",
                price: 18000,
                image: "https://images.unsplash.com/photo-1488477181946-6428a0291777?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.6,
                calories: 160,
                featured: false
            },
            {
                id: 9,
                name: "Air Lemon Detox",
                category: ["minuman", "vegetarian", "low-calorie"],
                description: "Air lemon hangat untuk detox tubuh di pagi hari.",
                price: 8000,
                image: "https://images.unsplash.com/photo-1546171753-97d7676e4602?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.4,
                calories: 10,
                featured: false
            },
            {
                id: 10,
                name: "Oatmeal Pisang",
                category: ["makanan", "vegetarian"],
                description: "Oatmeal dengan potongan pisang dan madu organik.",
                price: 15000,
                image: "https://images.unsplash.com/photo-1610399214658-f8c4d66c8d0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.3,
                calories: 190,
                featured: false
            },
            {
                id: 11,
                name: "Cemilan Edamame",
                category: ["cemilan", "vegetarian", "low-calorie"],
                description: "Edamame rebus dengan sedikit garam laut.",
                price: 12000,
                image: "https://images.unsplash.com/photo-1578102487201-3c27b5e7f74c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.7,
                calories: 140,
                featured: false
            },
            {
                id: 12,
                name: "Paket Sehat 7 Hari",
                category: ["paket", "vegetarian"],
                description: "Paket menu sehat lengkap untuk 7 hari.",
                price: 350000,
                oldPrice: 420000,
                image: "https://images.unsplash.com/photo-1506084868230-bb9d95c24759?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.8,
                calories: 450,
                featured: true,
                badge: "HOT"
            }
        ];

        // Cart data
        let cart = JSON.parse(localStorage.getItem('kantinSehatCart')) || [];
        let userData = null;
        
        // DOM elements
        const menuGrid = document.getElementById('menuGrid');
        const categoryButtons = document.querySelectorAll('.category-btn');
        const searchInput = document.getElementById('searchMenu');
        const cartSidebar = document.getElementById('cartSidebar');
        const overlay = document.getElementById('overlay');
        const cartToggle = document.getElementById('cartToggle');
        const cartClose = document.getElementById('cartClose');
        const cartBody = document.getElementById('cartBody');
        const cartCount = document.getElementById('cartCount');
        const cartTotal = document.getElementById('cartTotal');
        const profileDropdown = document.getElementById('profileDropdown');
        const loginButton = document.getElementById('loginButton');

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            checkLoginStatus();
            renderMenu('all');
            updateCart();
            
            // Set current year in footer
            const yearElement = document.querySelector('.copyright p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
            }
        });

        // Check login status
        function checkLoginStatus() {
            const user = localStorage.getItem('kantinSehatUser');
            
            if (user) {
                try {
                    userData = JSON.parse(user);
                    
                    // Show profile dropdown, hide login button
                    profileDropdown.classList.remove('d-none');
                    profileDropdown.classList.add('d-block');
                    loginButton.classList.remove('d-block');
                    loginButton.classList.add('d-none');
                    
                    // Update user info
                    updateUserInfo();
                    
                } catch (e) {
                    console.error('Error parsing user data:', e);
                    logout();
                }
            } else {
                // Show login button, hide profile dropdown
                profileDropdown.classList.remove('d-block');
                profileDropdown.classList.add('d-none');
                loginButton.classList.remove('d-none');
                loginButton.classList.add('d-block');
            }
        }

        // Update user information in dropdown
        function updateUserInfo() {
            if (!userData) return;
            
            const navbarName = document.getElementById('navbarName');
            const navbarRole = document.getElementById('navbarRole');
            const navbarAvatar = document.getElementById('navbarAvatar');
            
            if (navbarName && userData.nama_lengkap) {
                navbarName.textContent = userData.nama_lengkap;
            }
            
            if (navbarRole && userData.role) {
                navbarRole.textContent = getRoleDisplay(userData.role);
            }
            
            if (navbarAvatar) {
                if (userData.foto) {
                    navbarAvatar.src = userData.foto;
                } else if (userData.nama_lengkap) {
                    navbarAvatar.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.nama_lengkap)}&background=28a745&color=fff&size=40`;
                }
            }
        }

        // Get role display text
        function getRoleDisplay(role) {
            const roles = {
                'siswa': 'Siswa',
                'guru': 'Guru',
                'admin': 'Admin Kantin'
            };
            return roles[role] || 'Pengguna';
        }

        // Render menu items
        function renderMenu(category) {
            menuGrid.innerHTML = '';
            
            const filteredItems = category === 'all' 
                ? menuItems 
                : menuItems.filter(item => item.category.includes(category));
            
            filteredItems.forEach(item => {
                const menuItem = document.createElement('div');
                menuItem.className = `menu-item ${item.featured ? 'featured' : ''}`;
                
                let badgeHtml = '';
                if (item.badge) {
                    const badgeClass = item.badge === 'HOT' ? 'hot' : 'new';
                    badgeHtml = `<span class="menu-badge ${badgeClass}">${item.badge}</span>`;
                }
                
                let oldPriceHtml = '';
                if (item.oldPrice) {
                    oldPriceHtml = `<span class="menu-old-price">Rp ${item.oldPrice.toLocaleString('id-ID')}</span>`;
                }
                
                const ratingStars = getStarRating(item.rating);
                
                menuItem.innerHTML = `
                    ${badgeHtml}
                    <img src="${item.image}" alt="${item.name}" class="menu-img">
                    <div class="menu-content">
                        <span class="menu-category">${getCategoryLabel(item.category[0])}</span>
                        <h3 class="menu-title">${item.name}</h3>
                        <div class="menu-rating">
                            ${ratingStars}
                            <span>${item.rating}</span>
                        </div>
                        <p class="menu-description">${item.description}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="menu-price">Rp ${item.price.toLocaleString('id-ID')}</span>
                                ${oldPriceHtml}
                            </div>
                            <div class="menu-calories">
                                <i class="fas fa-fire"></i>
                                <span>${item.calories} kalori</span>
                            </div>
                        </div>
                        <div class="menu-actions">
                            <button class="btn-add-to-cart" onclick="addToCart(${item.id})">
                                <i class="fas fa-cart-plus"></i> Tambah
                            </button>
                            <button class="btn-detail" onclick="showDetail(${item.id})">
                                <i class="fas fa-info-circle"></i> Detail
                            </button>
                        </div>
                    </div>
                `;
                
                menuGrid.appendChild(menuItem);
            });
        }

        // Get star rating HTML
        function getStarRating(rating) {
            let stars = '';
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 >= 0.5;
            
            for (let i = 1; i <= 5; i++) {
                if (i <= fullStars) {
                    stars += '<i class="fas fa-star"></i>';
                } else if (i === fullStars + 1 && hasHalfStar) {
                    stars += '<i class="fas fa-star-half-alt"></i>';
                } else {
                    stars += '<i class="far fa-star"></i>';
                }
            }
            return stars;
        }

        // Get category label
        function getCategoryLabel(category) {
            const labels = {
                'makanan': 'Makanan',
                'minuman': 'Minuman',
                'cemilan': 'Cemilan',
                'paket': 'Paket',
                'vegetarian': 'Vegetarian',
                'low-calorie': 'Low Calorie'
            };
            return labels[category] || category;
        }

        // Category filter
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                const category = this.getAttribute('data-category');
                renderMenu(category);
            });
        });

        // Search functionality
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const filteredItems = menuItems.filter(item => 
                item.name.toLowerCase().includes(searchTerm) ||
                item.description.toLowerCase().includes(searchTerm)
            );
            
            menuGrid.innerHTML = '';
            filteredItems.forEach(item => {
                const menuItem = document.createElement('div');
                menuItem.className = `menu-item ${item.featured ? 'featured' : ''}`;
                
                let badgeHtml = '';
                if (item.badge) {
                    const badgeClass = item.badge === 'HOT' ? 'hot' : 'new';
                    badgeHtml = `<span class="menu-badge ${badgeClass}">${item.badge}</span>`;
                }
                
                let oldPriceHtml = '';
                if (item.oldPrice) {
                    oldPriceHtml = `<span class="menu-old-price">Rp ${item.oldPrice.toLocaleString('id-ID')}</span>`;
                }
                
                const ratingStars = getStarRating(item.rating);
                
                menuItem.innerHTML = `
                    ${badgeHtml}
                    <img src="${item.image}" alt="${item.name}" class="menu-img">
                    <div class="menu-content">
                        <span class="menu-category">${getCategoryLabel(item.category[0])}</span>
                        <h3 class="menu-title">${item.name}</h3>
                        <div class="menu-rating">
                            ${ratingStars}
                            <span>${item.rating}</span>
                        </div>
                        <p class="menu-description">${item.description}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="menu-price">Rp ${item.price.toLocaleString('id-ID')}</span>
                                ${oldPriceHtml}
                            </div>
                            <div class="menu-calories">
                                <i class="fas fa-fire"></i>
                                <span>${item.calories} kalori</span>
                            </div>
                        </div>
                        <div class="menu-actions">
                            <button class="btn-add-to-cart" onclick="addToCart(${item.id})">
                                <i class="fas fa-cart-plus"></i> Tambah
                            </button>
                            <button class="btn-detail" onclick="showDetail(${item.id})">
                                <i class="fas fa-info-circle"></i> Detail
                            </button>
                        </div>
                    </div>
                `;
                
                menuGrid.appendChild(menuItem);
            });
        });

        // Add to cart function
        window.addToCart = function(itemId) {
            // Check if user is logged in
            if (!userData) {
                Swal.fire({
                    title: 'Login Diperlukan',
                    text: 'Anda harus login untuk menambahkan item ke keranjang',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Nanti'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/login';
                    }
                });
                return;
            }
            
            const item = menuItems.find(i => i.id === itemId);
            const existingItem = cart.find(i => i.id === itemId);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: item.id,
                    name: item.name,
                    price: item.price,
                    image: item.image,
                    quantity: 1
                });
            }
            
            updateCart();
            showNotification('success', `${item.name} ditambahkan ke keranjang`);
        }

        // Remove from cart
        window.removeFromCart = function(itemId) {
            cart = cart.filter(item => item.id !== itemId);
            updateCart();
            showNotification('info', 'Item dihapus dari keranjang');
        }

        // Update quantity
        window.updateQuantity = function(itemId, change) {
            const item = cart.find(i => i.id === itemId);
            if (item) {
                item.quantity += change;
                if (item.quantity < 1) {
                    removeFromCart(itemId);
                    return;
                }
                updateCart();
            }
        }

        // Update cart display
        function updateCart() {
            // Save to localStorage
            localStorage.setItem('kantinSehatCart', JSON.stringify(cart));
            
            // Update cart count
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
            
            // Update cart sidebar
            if (cart.length === 0) {
                cartBody.innerHTML = `
                    <div class="cart-empty">
                        <i class="fas fa-shopping-cart"></i>
                        <h5>Keranjang Kosong</h5>
                        <p>Tambahkan menu favorit Anda ke keranjang</p>
                    </div>
                `;
                cartTotal.textContent = 'Rp 0';
            } else {
                let cartHtml = '';
                let total = 0;
                
                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    
                    cartHtml += `
                        <div class="cart-item">
                            <img src="${item.image}" alt="${item.name}" class="cart-item-img">
                            <div class="cart-item-details">
                                <h6 class="cart-item-title">${item.name}</h6>
                                <div class="cart-item-price">Rp ${item.price.toLocaleString('id-ID')}</div>
                            </div>
                            <div class="cart-item-actions">
                                <div class="quantity-control">
                                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                                    <span class="quantity">${item.quantity}</span>
                                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
                                </div>
                                <button class="remove-item" onclick="removeFromCart(${item.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                });
                
                cartBody.innerHTML = cartHtml;
                cartTotal.textContent = `Rp ${total.toLocaleString('id-ID')}`;
            }
        }

        // Show item detail
        window.showDetail = function(itemId) {
            const item = menuItems.find(i => i.id === itemId);
            
            Swal.fire({
                title: item.name,
                html: `
                    <div class="text-center mb-3">
                        <img src="${item.image}" alt="${item.name}" style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <p><strong>Deskripsi:</strong> ${item.description}</p>
                    <p><strong>Kategori:</strong> ${item.category.map(c => getCategoryLabel(c)).join(', ')}</p>
                    <p><strong>Rating:</strong> ${item.rating} ⭐</p>
                    <p><strong>Kalori:</strong> ${item.calories} kalori</p>
                    <p><strong>Harga:</strong> Rp ${item.price.toLocaleString('id-ID')}</p>
                    ${item.oldPrice ? `<p><strong>Harga Lama:</strong> <del>Rp ${item.oldPrice.toLocaleString('id-ID')}</del></p>` : ''}
                `,
                showCancelButton: true,
                confirmButtonText: 'Tambah ke Keranjang',
                cancelButtonText: 'Tutup',
                confirmButtonColor: '#28a745',
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    addToCart(itemId);
                }
            });
        }

        // Go to checkout
        window.goToCheckout = function() {
            if (!userData) {
                Swal.fire({
                    title: 'Login Diperlukan',
                    text: 'Anda harus login untuk melakukan checkout',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Nanti'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/login';
                    }
                });
                return;
            }
            
            if (cart.length === 0) {
                Swal.fire({
                    title: 'Keranjang Kosong',
                    text: 'Tambahkan item terlebih dahulu sebelum checkout',
                    icon: 'warning'
                });
                return;
            }
            
            // Save cart data for checkout page
            localStorage.setItem('kantinSehatCheckout', JSON.stringify(cart));
            window.location.href = '/checkout';
        }

        // Show notification
        function showNotification(type, message) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });
        }

        // Cart toggle
        cartToggle.addEventListener('click', function() {
            cartSidebar.classList.add('active');
            overlay.classList.add('active');
        });

        cartClose.addEventListener('click', function() {
            cartSidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        overlay.addEventListener('click', function() {
            cartSidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        // Close cart with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                cartSidebar.classList.remove('active');
                overlay.classList.remove('active');
            }
        });

        // Logout function
        window.logout = function() {
            Swal.fire({
                title: 'Logout?',
                text: 'Anda yakin ingin keluar dari akun ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Clear user data from localStorage
                    localStorage.removeItem('kantinSehatUser');
                    
                    // Clear cart data (optional)
                    // localStorage.removeItem('kantinSehatCart');
                    
                    // Update UI
                    checkLoginStatus();
                    
                    Swal.fire({
                        title: 'Berhasil Logout!',
                        text: 'Anda telah keluar dari akun',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        };

        // Demo function for testing
        window.simulateLogin = function(role = 'siswa') {
            const users = {
                siswa: {
                    id_user: 1,
                    username: 'siswa001',
                    password: 'hashedpassword',
                    nama_lengkap: 'Budi Santoso',
                    role: 'siswa',
                    foto: null,
                    email: 'budi.santoso@smkn1.sch.id',
                    no_telepon: '81234567890',
                    id_siswa: 1,
                    last_login: new Date().toISOString(),
                    created_at: new Date('2024-01-01').toISOString(),
                    updated_at: new Date().toISOString()
                },
                guru: {
                    id_user: 2,
                    username: 'guru001',
                    password: 'hashedpassword',
                    nama_lengkap: 'Ibu Guru, S.Pd',
                    role: 'guru',
                    foto: null,
                    email: 'guru@smkn1.sch.id',
                    no_telepon: '81234567891',
                    id_siswa: null,
                    last_login: new Date().toISOString(),
                    created_at: new Date('2024-01-01').toISOString(),
                    updated_at: new Date().toISOString()
                },
                admin: {
                    id_user: 3,
                    username: 'admin001',
                    password: 'hashedpassword',
                    nama_lengkap: 'Admin Kantin',
                    role: 'admin',
                    foto: null,
                    email: 'admin@kantinsehat.sch.id',
                    no_telepon: '81234567892',
                    id_siswa: null,
                    last_login: new Date().toISOString(),
                    created_at: new Date('2024-01-01').toISOString(),
                    updated_at: new Date().toISOString()
                }
            };
            
            localStorage.setItem('kantinSehatUser', JSON.stringify(users[role]));
            alert(`Login sebagai ${role} berhasil!`);
            location.reload();
        };
    </script>
</body>
</html>