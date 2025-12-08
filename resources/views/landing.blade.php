<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Sehat - Makanan Sehat untuk Semua</title>

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
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: white;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s;
        }

        .navbar.scrolled {
            padding: 10px 0;
            background: rgba(255, 255, 255, 0.95);
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
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary);
            left: 0;
            bottom: 0;
            transition: width 0.3s;
        }

        .nav-link:hover::after {
            width: 100%;
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
            display: inline-block;
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

        /* ===== PROFILE DROPDOWN STYLES ===== */
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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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

        /* Cart badge */
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--danger);
            color: white;
            font-size: 0.7rem;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Cart button with badge */
        .cart-btn-wrapper {
            position: relative;
            display: inline-block;
        }

        /* Profile info in dropdown */
        .profile-name {
            font-size: 0.9rem;
            line-height: 1.2;
        }

        .profile-role {
            font-size: 0.75rem;
        }

        /* ===== HERO SECTION ===== */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 180px 0 100px;
            margin-top: 80px;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-hero {
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s;
        }

        .btn-hero-primary {
            background: var(--primary);
            color: white;
            border: 2px solid var(--primary);
        }

        .btn-hero-primary:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(40, 167, 69, 0.4);
        }

        .btn-hero-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-hero-outline:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-3px);
        }

        /* ===== FEATURES SECTION ===== */
        .features {
            padding: 100px 0;
            background: var(--light);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
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

        .feature-card {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }

        .feature-icon i {
            font-size: 2rem;
            color: var(--primary);
        }

        .feature-card h4 {
            color: var(--dark);
            margin-bottom: 15px;
            font-weight: 600;
        }

        /* ===== MENU SECTION ===== */
        .menu {
            padding: 100px 0;
        }

        .menu-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            margin-bottom: 30px;
            height: 100%;
        }

        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .menu-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .menu-content {
            padding: 25px;
        }

        .menu-category {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .menu-category.minuman {
            background: var(--info);
        }

        .menu-category.cemilan {
            background: var(--warning);
        }

        .menu-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .menu-description {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 15px;
        }

        .menu-price {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .menu-rating {
            color: var(--warning);
            margin-bottom: 15px;
        }

        .btn-menu {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 500;
            width: 100%;
            transition: all 0.3s;
        }

        .btn-menu:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* ===== TESTIMONIALS ===== */
        .testimonials {
            padding: 100px 0;
            background: var(--light);
        }

        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin: 15px;
            height: 100%;
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .testimonial-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 3px solid var(--primary);
        }

        .testimonial-info h5 {
            margin: 0;
            font-weight: 600;
        }

        .testimonial-info p {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
        }

        .testimonial-rating {
            color: var(--warning);
            margin-bottom: 15px;
        }

        /* ===== ABOUT SECTION ===== */
        .about {
            padding: 100px 0;
        }

        .about-img {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 20px 20px 0 rgba(40, 167, 69, 0.1);
        }

        .about-img img {
            width: 100%;
            height: auto;
            transition: transform 0.5s;
        }

        .about-img:hover img {
            transform: scale(1.05);
        }

        .about-content h3 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 20px;
        }

        .about-features {
            list-style: none;
            padding: 0;
        }

        .about-features li {
            padding: 10px 0;
            display: flex;
            align-items: center;
        }

        .about-features li i {
            color: var(--primary);
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* ===== CONTACT SECTION ===== */
        .contact {
            padding: 100px 0;
            background: var(--light);
        }

        .contact-info {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            height: 100%;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .contact-icon i {
            font-size: 1.2rem;
            color: var(--primary);
        }

        .contact-details h5 {
            color: var(--dark);
            margin-bottom: 5px;
            font-weight: 600;
        }

        .contact-details p {
            color: #666;
            margin: 0;
        }

        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .form-control {
            border: 1px solid #ddd;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }

        .form-control textarea {
            min-height: 150px;
            resize: vertical;
        }

        .btn-submit {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }

        /* ===== LOCATION SECTION ===== */
        .location-info {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-top: 30px;
        }

        .location-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .location-icon {
            width: 60px;
            height: 60px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .location-icon i {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .location-details h4 {
            color: var(--primary);
            margin-bottom: 5px;
            font-weight: 700;
        }

        .location-features {
            list-style: none;
            padding: 0;
            margin-top: 25px;
        }

        .location-features li {
            padding: 8px 0;
            display: flex;
            align-items: center;
            color: #666;
        }

        .location-features li i {
            color: var(--primary);
            margin-right: 10px;
            font-size: 1.1rem;
        }

        /* ===== CTA SECTION ===== */
        .cta {
            background: linear-gradient(rgba(40, 167, 69, 0.9), rgba(40, 167, 69, 0.9)),
                url('https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 40px;
            opacity: 0.9;
        }

        .btn-cta {
            background: white;
            color: var(--primary);
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            border: 2px solid white;
        }

        .btn-cta:hover {
            background: transparent;
            color: white;
            transform: translateY(-3px);
        }

        /* ===== FOOTER ===== */
        footer {
            background: var(--dark);
            color: white;
            padding: 80px 0 20px;
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

        .footer-links h5,
        .footer-contact h5 {
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
            padding-left: 5px;
        }

        .footer-contact p {
            color: #bbb;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .footer-contact i {
            color: var(--primary);
            margin-right: 10px;
            width: 20px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #bbb;
            font-size: 0.9rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero {
                padding: 150px 0 80px;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero-btns {
                flex-direction: column;
                align-items: flex-start;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .cta h2 {
                font-size: 2rem;
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
            .hero h1 {
                font-size: 2rem;
            }

            .feature-card,
            .menu-card,
            .testimonial-card,
            .contact-info,
            .contact-form,
            .location-info {
                padding: 25px 20px;
            }

            .dropdown-menu {
                min-width: 180px;
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
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>

                    <!-- Profile Dropdown (Tampil jika sudah login) -->
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
                                    height="40">
                            </div>
                            <div class="text-start d-none d-md-block">
                                <div class="profile-name fw-bold text-dark" id="userName">Nama User</div>
                                <small class="profile-role text-muted" id="userRole">Siswa</small>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="{{ route('pembeli.profile') }}">
                                    <i class="fas fa-user me-2"></i> Profile Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/order-history">
                                    <i class="fas fa-history me-2"></i> Riwayat Transaksi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/settings">
                                    <i class="fas fa-cog me-2"></i> Pengaturan
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="logout()">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Login Button (Tampil jika belum login) -->
                    <div id="loginButton" class="d-none">
                        <a href="/login" class="nav-link">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </div>

                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <div class="cart-btn-wrapper">
                            <a href="/menu" class="btn-order">
                                <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                            </a>
                            <span class="cart-badge d-none" id="cartBadge">0</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== HERO SECTION ===== -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Makanan Sehat untuk Hidup Lebih Baik</h1>
                    <p>Kantin Sehat menyediakan berbagai pilihan makanan dan minuman sehat dengan bahan-bahan organik terbaik. Rasakan manfaat makanan sehat setiap hari!</p>
                    <div class="hero-btns">
                        <a href="/menu" class="btn-hero btn-hero-primary">
                            <i class="fas fa-utensils me-2"></i> Lihat Menu
                        </a>
                        <a href="#about" class="btn-hero btn-hero-outline">
                            <i class="fas fa-play-circle me-2"></i> Tentang Kami
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center mt-5 mt-lg-0">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                        alt="Makanan Sehat"
                        class="img-fluid rounded-circle shadow-lg"
                        style="max-width: 400px; border: 10px solid rgba(255,255,255,0.2);">
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FEATURES SECTION ===== -->
    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Mengapa Memilih Kantin Sehat?</h2>
                <p>Kami berkomitmen memberikan pengalaman makan sehat terbaik untuk Anda</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h4>Bahan Organik</h4>
                        <p>Semua bahan kami berasal dari petani lokal dengan sertifikasi organik, bebas pestisida dan bahan kimia berbahaya.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Menu Sehat</h4>
                        <p>Menu kami dirancang oleh ahli gizi, rendah kalori, tinggi serat, dan penuh nutrisi untuk mendukung kesehatan Anda.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4>Proses Cepat</h4>
                        <p>Pesanan Anda akan siap dalam 15-20 menit dengan tetap menjaga kualitas dan kesegaran makanan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== MENU SECTION ===== -->
    <section id="menu" class="menu">
        <div class="container">
            <div class="section-title">
                <h2>Menu Populer</h2>
                <p>Pilihan terbaik dari Kantin Sehat yang paling diminati</p>
            </div>

            <div class="row g-4">
                <!-- Menu 1 -->
                <div class="col-md-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Salad Sehat"
                            class="menu-img">
                        <div class="menu-content">
                            <span class="menu-category">Makanan</span>
                            <h5 class="menu-title">Salad Sehat Super</h5>
                            <div class="menu-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-2">4.8</span>
                            </div>
                            <p class="menu-description">Campuran sayuran organik segar dengan dressing khusus rendah kalori.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="menu-price">Rp 25.000</h4>
                                <button class="btn-menu" onclick="addToCart(this)">
                                    <i class="fas fa-cart-plus me-2"></i> Pesan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu 2 -->
                <div class="col-md-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Jus Buah"
                            class="menu-img">
                        <div class="menu-content">
                            <span class="menu-category minuman">Minuman</span>
                            <h5 class="menu-title">Jus Detox Mix</h5>
                            <div class="menu-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-2">5.0</span>
                            </div>
                            <p class="menu-description">Campuran buah-buahan organik tanpa gula tambahan, kaya vitamin.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="menu-price">Rp 18.000</h4>
                                <button class="btn-menu" onclick="addToCart(this)">
                                    <i class="fas fa-cart-plus me-2"></i> Pesan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu 3 -->
                <div class="col-md-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Nasi Goreng Sehat"
                            class="menu-img">
                        <div class="menu-content">
                            <span class="menu-category">Makanan</span>
                            <h5 class="menu-title">Nasi Goreng Sehat</h5>
                            <div class="menu-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="ms-2">4.5</span>
                            </div>
                            <p class="menu-description">Nasi merah dengan sayuran organik dan protein rendah lemak.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="menu-price">Rp 28.000</h4>
                                <button class="btn-menu" onclick="addToCart(this)">
                                    <i class="fas fa-cart-plus me-2"></i> Pesan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="/menu" class="btn-order" style="padding: 15px 40px;">
                    <i class="fas fa-utensils me-2"></i> Lihat Semua Menu
                </a>
            </div>
        </div>
    </section>

    <!-- ===== TESTIMONIALS SECTION ===== -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Apa Kata Pelanggan Kami?</h2>
                <p>Testimoni dari mereka yang telah merasakan manfaat Kantin Sehat</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg"
                                alt="Sarah"
                                class="testimonial-avatar">
                            <div class="testimonial-info">
                                <h5>Sarah Wijaya</h5>
                                <p>Mahasiswa</p>
                            </div>
                        </div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Sejak makan di Kantin Sehat, energi saya meningkat drastis. Menu sehatnya enak dan terjangkau untuk mahasiswa!"</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <img src="https://randomuser.me/api/portraits/men/54.jpg"
                                alt="Budi"
                                class="testimonial-avatar">
                            <div class="testimonial-info">
                                <h5>Budi Santoso</h5>
                                <p>Karyawan Kantor</p>
                            </div>
                        </div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p>"Lunch time jadi lebih sehat dengan Kantin Sehat. Berat badan turun 5kg dalam 2 bulan tanpa diet ketat!"</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg"
                                alt="Rina"
                                class="testimonial-avatar">
                            <div class="testimonial-info">
                                <h5>Rina Melati</h5>
                                <p>Ibu Rumah Tangga</p>
                            </div>
                        </div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Anak-anak saya yang sulit makan sayur sekarang suka salad dari Kantin Sehat. Resepnya kreatif dan sehat!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== ABOUT SECTION ===== -->
    <section id="about" class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="about-img">
                        <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Tentang Kantin Sehat">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <h3>Tentang Kantin Sehat</h3>
                        <p>Kantin Sehat didirikan pada tahun 2020 dengan misi untuk menyediakan makanan sehat yang terjangkau bagi semua kalangan. Kami percaya bahwa makanan sehat adalah investasi terbaik untuk masa depan.</p>

                        <ul class="about-features">
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <strong>Bahan Organik:</strong> Semua bahan berasal dari petani lokal terpercaya
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <strong>Ahli Gizi:</strong> Menu dirancang oleh ahli gizi bersertifikat
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <strong>Harga Terjangkau:</strong> Makanan sehat untuk semua kalangan
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <strong>Lingkungan Ramah:</strong> Mengurangi plastik dan limbah makanan
                            </li>
                        </ul>

                        <a href="#contact" class="btn-order mt-4">
                            <i class="fas fa-comments me-2"></i> Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CONTACT SECTION ===== -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Hubungi Kantin Sehat</h2>
                <p>Punya pertanyaan atau saran? Hubungi pengelola kantin kami</p>
            </div>

            <div class="row g-4">
                <!-- Contact Information -->
                <div class="col-lg-5">
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Lokasi Kantin</h5>
                                <p>Gedung Kantin Utama<br>Lantai 1, SMK Negeri 1 Jakarta<br>Komplek Sekolah Blok A</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Telepon</h5>
                                <p>(021) 1234-5678 (Kantin)<br>0812-3456-7890 (WhatsApp)</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Email</h5>
                                <p>kantin@smkn1-jkt.sch.id<br>pengelola@kantinsehat.sch.id</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Jam Operasional</h5>
                                <p>Senin - Jumat: 07:00 - 15:00<br>Sabtu: 08:00 - 12:00<br>Minggu & Libur: Tutup</p>
                            </div>
                        </div>

                        <div class="social-links mt-4">
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-telegram"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="contact-form">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Nama Lengkap" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <select class="form-control" required>
                                            <option value="" disabled selected>Pilih Status</option>
                                            <option value="siswa">Siswa</option>
                                            <option value="guru">Guru / Staff</option>
                                            <option value="ortu">Orang Tua</option>
                                            <option value="umum">Umum</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Email Sekolah" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="tel" class="form-control" placeholder="Nomor Telepon" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <select class="form-control" required>
                                    <option value="" disabled selected>Pilih Kategori Pesan</option>
                                    <option value="keluhan">Keluhan / Masukan</option>
                                    <option value="saran">Saran Menu</option>
                                    <option value="kerjasama">Kerjasama</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control" placeholder="Isi pesan Anda" rows="5" required></textarea>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Location Information -->
                    <div class="location-info">
                        <div class="location-header">
                            <div class="location-icon">
                                <i class="fas fa-school"></i>
                            </div>
                            <div class="location-details">
                                <h4>Informasi Lokasi Sekolah</h4>
                                <p class="mb-0">SMK Negeri 1 Jakarta</p>
                            </div>
                        </div>

                        <ul class="location-features">
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <strong>Alamat Sekolah:</strong> Jl. Pendidikan No. 1, Jakarta Pusat 10110
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <strong>Telepon Sekolah:</strong> (021) 3456-7890
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <strong>Website Sekolah:</strong> www.smkn1-jakarta.sch.id
                            </li>
                            <li>
                                <i class="fas fa-check-circle"></i>
                                <strong>Kantin berada di:</strong> Gedung Utama, Lantai 1 (dekor hijau)
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA SECTION ===== -->
    <section class="cta">
        <div class="container">
            <h2>Siap Memulai Hidup Sehat?</h2>
            <p>Bergabunglah dengan ribuan siswa dan guru yang telah merasakan manfaat makanan sehat dari Kantin Sehat. Pesan sekarang dan dapatkan diskon khusus untuk siswa!</p>
            <div id="ctaButtons">
                <!-- Buttons akan di-generate oleh JavaScript -->
            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <a href="/" class="footer-logo">
                        <i class="fas fa-utensils me-2"></i>Kantin<span>Sehat</span>
                    </a>
                    <div class="footer-about">
                        <p>Kantin resmi SMK Negeri 1 Jakarta yang menyediakan makanan sehat dengan bahan organik untuk mendukung kegiatan belajar mengajar.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-telegram"></i></a>
                            <a href="#"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <h5>Menu Cepat</h5>
                    <ul class="footer-links">
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#testimonials">Testimoni</a></li>
                        <li><a href="#contact">Kontak</a></li>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Daftar</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h5>Kategori Menu</h5>
                    <ul class="footer-links">
                        <li><a href="#">Makanan Sehat</a></li>
                        <li><a href="#">Minuman Organik</a></li>
                        <li><a href="#">Cemilan Sehat</a></li>
                        <li><a href="#">Paket Makan Siang</a></li>
                        <li><a href="#">Menu Hari Ini</a></li>
                    </ul>
                </div>

                <div class="col-lg-2">
                    <h5>Kontak Kantin</h5>
                    <div class="footer-contact">
                        <p><i class="fas fa-map-marker-alt"></i> Gedung Kantin SMKN 1</p>
                        <p><i class="fas fa-phone"></i> (021) 1234-5678</p>
                        <p><i class="fas fa-envelope"></i> kantin@smkn1-jkt.sch.id</p>
                        <p><i class="fas fa-clock"></i> 07:00 - 15:00</p>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; 2024 Kantin Sehat SMKN 1 Jakarta. Semua hak dilindungi. | Dibuat untuk komunitas sekolah yang sehat</p>
            </div>
        </div>
    </footer>

    <!-- ===== SCRIPTS ===== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JS -->
    <script>
        // User data management
        let isLoggedIn = false;
        let userData = null;

        // Sample menu data for cart
        const menuItems = {
            "Salad Sehat Super": {
                price: 25000,
                image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            },
            "Jus Detox Mix": {
                price: 18000,
                image: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            },
            "Nasi Goreng Sehat": {
                price: 28000,
                image: "https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            }
        };

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            checkLoginStatus();
            updateCartBadge();
            setupEventListeners();

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Contact form submission
            document.getElementById('contactForm').addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Pesan Terkirim!',
                    text: 'Terima kasih telah menghubungi pengelola kantin. Pesan Anda akan segera kami proses.',
                    icon: 'success',
                    confirmButtonColor: '#28a745'
                }).then(() => {
                    // Reset form
                    this.reset();
                });
            });

            // Set current year in footer
            const yearElement = document.querySelector('.copyright p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
            }

            // Update CTA buttons based on login status
            updateCTAButtons();
        });

        // Check login status from localStorage
        function checkLoginStatus() {
            const user = localStorage.getItem('kantinSehatUser');
            const profileDropdown = document.getElementById('profileDropdown');
            const loginButton = document.getElementById('loginButton');

            if (user) {
                try {
                    userData = JSON.parse(user);
                    isLoggedIn = true;

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

            const userName = document.getElementById('userName');
            const userRole = document.getElementById('userRole');
            const profileAvatar = document.querySelector('.profile-avatar img');

            if (userName && userData.name) {
                userName.textContent = userData.name;
            }

            if (userRole && userData.role) {
                userRole.textContent = userData.role;
            }

            if (profileAvatar && userData.avatar) {
                profileAvatar.src = userData.avatar;
            } else if (profileAvatar && userData.name) {
                // Generate avatar from name
                const initials = userData.name.split(' ').map(n => n[0]).join('');
                profileAvatar.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.name)}&background=28a745&color=fff&size=40`;
            }
        }

        // Setup event listeners
        function setupEventListeners() {
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

                        // Update UI
                        checkLoginStatus();
                        updateCTAButtons();

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

            // Add to cart function
            window.addToCart = function(button) {
                const menuCard = button.closest('.menu-card');
                const menuTitle = menuCard.querySelector('.menu-title').textContent;
                const menuPrice = menuCard.querySelector('.menu-price').textContent;
                const menuImage = menuCard.querySelector('.menu-img').src;

                // Get price number from string
                const price = parseInt(menuPrice.replace('Rp ', '').replace(/\./g, ''));

                // Add to cart
                const item = {
                    id: Date.now(),
                    name: menuTitle,
                    price: price,
                    image: menuImage,
                    quantity: 1
                };

                addToCartStorage(item);

                Swal.fire({
                    title: 'Berhasil!',
                    text: `${menuTitle} telah ditambahkan ke keranjang`,
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });
            };
        }

        // Add item to cart storage
        function addToCartStorage(item) {
            let cart = JSON.parse(localStorage.getItem('kantinSehatCart')) || [];

            // Check if item already exists
            const existingItemIndex = cart.findIndex(cartItem => cartItem.name === item.name);

            if (existingItemIndex !== -1) {
                cart[existingItemIndex].quantity += 1;
            } else {
                cart.push(item);
            }

            // Save to localStorage
            localStorage.setItem('kantinSehatCart', JSON.stringify(cart));

            // Update cart badge
            updateCartBadge();
        }

        // Update cart badge
        function updateCartBadge() {
            const cart = JSON.parse(localStorage.getItem('kantinSehatCart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);

            const cartBadge = document.getElementById('cartBadge');
            if (cartBadge) {
                cartBadge.textContent = totalItems > 99 ? '99+' : totalItems;
                cartBadge.style.display = totalItems > 0 ? 'flex' : 'none';
            }
        }

        // Update CTA buttons based on login status
        function updateCTAButtons() {
            const ctaButtons = document.getElementById('ctaButtons');
            if (!ctaButtons) return;

            const user = localStorage.getItem('kantinSehatUser');

            if (user) {
                try {
                    const userData = JSON.parse(user);
                    ctaButtons.innerHTML = `
                        <a href="/menu" class="btn-cta">
                            <i class="fas fa-shopping-cart me-2"></i> Pesan Sekarang
                        </a>
                        <a href="{{ route('pembeli.profile') }}" class="btn-cta" style="margin-left: 15px; background: transparent; border: 2px solid white;">
                            <i class="fas fa-user me-2"></i> Lihat Profile
                        </a>
                    `;
                } catch (e) {
                    ctaButtons.innerHTML = `
                        <a href="/register" class="btn-cta">
                            <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                        </a>
                    `;
                }
            } else {
                ctaButtons.innerHTML = `
                    <a href="/register" class="btn-cta">
                        <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                    </a>
                    <a href="/login" class="btn-cta" style="margin-left: 15px; background: transparent; border: 2px solid white;">
                        <i class="fas fa-sign-in-alt me-2"></i> Login
                    </a>
                `;
            }
        }

        // For testing purposes - simulate login
        function simulateLogin(userType = 'siswa') {
            const users = {
                siswa: {
                    id: 1,
                    name: "Ahmad Fauzi",
                    email: "ahmad.fauzi@smkn1-jkt.sch.id",
                    role: "Siswa",
                    class: "XII TKJ 2",
                    nis: "20210001",
                    phone: "081234567890"
                },
                guru: {
                    id: 2,
                    name: "Budi Santoso, S.Pd",
                    email: "budi.santoso@smkn1-jkt.sch.id",
                    role: "Guru",
                    subject: "Matematika",
                    nip: "19801234567890",
                    phone: "081298765432"
                },
                admin: {
                    id: 3,
                    name: "Admin Kantin",
                    email: "admin@kantinsehat.sch.id",
                    role: "Admin Kantin",
                    position: "Pengelola",
                    phone: "081311223344"
                }
            };

            const user = users[userType];
            localStorage.setItem('kantinSehatUser', JSON.stringify(user));

            // Reload page to update UI
            setTimeout(() => {
                window.location.reload();
            }, 100);
        }

        // For testing purposes - simulate adding sample items to cart
        function addSampleItemsToCart() {
            const items = [{
                    id: 1,
                    name: "Salad Sehat Super",
                    price: 25000,
                    image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                    quantity: 2
                },
                {
                    id: 2,
                    name: "Jus Detox Mix",
                    price: 18000,
                    image: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                    quantity: 1
                }
            ];

            localStorage.setItem('kantinSehatCart', JSON.stringify(items));
            updateCartBadge();

            Swal.fire({
                title: 'Sample Items Added!',
                text: '2 sample items telah ditambahkan ke keranjang',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }

        // Clear cart for testing
        function clearCart() {
            localStorage.removeItem('kantinSehatCart');
            updateCartBadge();

            Swal.fire({
                title: 'Keranjang Dikosongkan!',
                text: 'Semua item telah dihapus dari keranjang',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }

        // Demo functions - remove in production
        console.log('Demo functions available:');
        console.log('1. simulateLogin("siswa") - Login sebagai siswa');
        console.log('2. simulateLogin("guru") - Login sebagai guru');
        console.log('3. simulateLogin("admin") - Login sebagai admin');
        console.log('4. addSampleItemsToCart() - Tambah sample items ke keranjang');
        console.log('5. clearCart() - Kosongkan keranjang');
        console.log('6. logout() - Logout dari sistem');
    </script>
</body>

</html>