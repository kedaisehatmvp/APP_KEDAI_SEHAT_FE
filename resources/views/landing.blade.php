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
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body>
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/ks-h.png')}}" alt="">KantinSehat
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
    <script src="{{ asset('js/landing.js')}}"></script>
</body>

</html>