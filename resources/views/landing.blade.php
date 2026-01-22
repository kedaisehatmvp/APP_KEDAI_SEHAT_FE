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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
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
                        <a class="nav-link" href="#best-seller">Best Seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
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
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   <!-- ===== PROMO CAROUSEL ===== -->
<section id="home" class="promo-carousel">
    <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <a href="/menu?promo=diskon30">
                    <div class="carousel-image" style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')"></div>
                    <div class="carousel-caption">
                    </div>
                </a>
            </div>
            
            <!-- Slide 2 -->
            <div class="carousel-item">
                <a href="/menu?category=menu-baru">
                    <div class="carousel-image" style="background-image: url('https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')"></div>
                    <div class="carousel-caption">
                    </div>
                </a>
            </div>
            
            <!-- Slide 3 -->
            <div class="carousel-item">
                <a href="/register">
                    <div class="carousel-image" style="background-image: url('https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80')"></div>
                    <div class="carousel-caption">
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

    <!-- ===== BEST SELLER SECTION ===== -->
    <section id="best-seller" class="best-seller">
        <div class="container">
            <div class="section-title">
                <h2>Paling diminati!</h2>
                <p>Pilihan favorit pelanggan Kantin Sehat</p>
            </div>

            <div class="row g-4">
                <!-- Item 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="best-seller-card">
                        <div class="best-seller-badge">Terlaris</div>
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Salad Sehat"
                            class="best-seller-img">
                        <div class="best-seller-content">
                            <h5 class="best-seller-title">Salad Sehat Super</h5>
                            <div class="best-seller-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-2">4.8 (120)</span>
                            </div>
                            <p class="best-seller-description">Campuran sayuran organik segar</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="best-seller-price">Rp 25.000</h4>
                                <a href="/menu" class="btn-best-seller" onclick="addToCart(this)">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="best-seller-card">
                        <div class="best-seller-badge">Populer</div>
                        <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Jus Buah"
                            class="best-seller-img">
                        <div class="best-seller-content">
                            <h5 class="best-seller-title">Jus Detox Mix</h5>
                            <div class="best-seller-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-2">5.0 (98)</span>
                            </div>
                            <p class="best-seller-description">Campuran buah organik tanpa gula</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="best-seller-price">Rp 18.000</h4>
                                <a href="/menu" class="btn-best-seller" onclick="addToCart(this)">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="best-seller-card">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Nasi Goreng Sehat"
                            class="best-seller-img">
                        <div class="best-seller-content">
                            <h5 class="best-seller-title">Nasi Goreng Sehat</h5>
                            <div class="best-seller-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="ms-2">4.5 (85)</span>
                            </div>
                            <p class="best-seller-description">Nasi merah dengan sayuran organik</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="best-seller-price">Rp 28.000</h4>
                                <a href="/menu" class="btn-best-seller" onclick="addToCart(this)">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="best-seller-card">
                        <div class="best-seller-badge">Baru</div>
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Paket Makan Siang"
                            class="best-seller-img">
                        <div class="best-seller-content">
                            <h5 class="best-seller-title">Paket Makan Siang</h5>
                            <div class="best-seller-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-2">4.7 (65)</span>
                            </div>
                            <p class="best-seller-description">Makan lengkap + minuman sehat</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="best-seller-price">Rp 35.000</h4>
                                <a href="/menu" class="btn-best-seller" onclick="addToCart(this)">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="text-center mt-4">
                    <a href="/menu" class="btn-view-more">
                        Lihat Semua Menu
                    </a>
                </div>
        </div>
    </section>

    <!-- ===== CATEGORIES SECTION ===== -->
    <section id="categories" class="categories">
        <div class="container">
            <div class="section-title">
                <h2>Lagi pengen apa hari ini?</h2>
                <p>Pilih kategori yang sesuai dengan kebutuhan Anda</p>
            </div>

            <!-- Ganti dengan struktur grid CSS untuk 3 kolom di mobile -->
            <div class="categories-grid">
                <!-- Item 1 -->
                <a href="/menu?category=makanan" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="category-content">
                        <h4>Makanan Sehat</h4>
                        <span class="category-count">25+ Menu</span>
                    </div>
                </a>

                <!-- Item 2 -->
                <a href="/menu?category=minuman" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-glass-martini-alt"></i>
                    </div>
                    <div class="category-content">
                        <h4>Minuman Sehat</h4>
                        <span class="category-count">15+ Menu</span>
                    </div>
                </a>

                <!-- Item 3 -->
                <a href="/menu?category=cemilan" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-cookie-bite"></i>
                    </div>
                    <div class="category-content">
                        <h4>Cemilan Sehat</h4>
                        <span class="category-count">12+ Menu</span>
                    </div>
                </a>

                <!-- Item 4 -->
                <a href="/menu?category=paket" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="category-content">
                        <h4>Paket Hemat</h4>
                        <span class="category-count">8+ Paket</span>
                    </div>
                </a>

                <!-- Item 5 -->
                <a href="/menu?category=vegan" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <div class="category-content">
                        <h4>Menu Vegan</h4>
                        <span class="category-count">10+ Menu</span>
                    </div>
                </a>

                <!-- Item 6 -->
                <a href="/menu?category=spesial" class="category-card">
                    <div class="category-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="category-content">
                        <h4>Menu Spesial</h4>
                        <span class="category-count">5+ Menu</span>
                    </div>
                </a>
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
                        <li><a href="#best-seller">Best Seller</a></li>
                        <li><a href="#categories">Kategori</a></li>
                        <li><a href="#contact">Kontak</a></li>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Daftar</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <h5>Kategori Menu</h5>
                    <ul class="footer-links">
                        <li><a href="/menu?category=makanan">Makanan Sehat</a></li>
                        <li><a href="/menu?category=minuman">Minuman Organik</a></li>
                        <li><a href="/menu?category=cemilan">Cemilan Sehat</a></li>
                        <li><a href="/menu?category=paket">Paket Makan Siang</a></li>
                        <li><a href="/menu?category=spesial">Menu Spesial</a></li>
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