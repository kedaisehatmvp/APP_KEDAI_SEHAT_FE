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
    
    <!-- Google Fonts - Lato -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>
<body>
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/ks-h.png')}}" alt="">KantinSehat
            </a>
            
            <!-- Desktop Navigation -->
            <div class="collapse navbar-collapse d-none d-lg-block" id="desktopNavbar">
                <ul class="navbar-nav ms-auto align-items-center">
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
                                <img src="https://ui-avatars.com/api/?name=User&background=001a12&color=fff&size=40" 
                                     alt="Profile" 
                                     class="rounded-circle"
                                     width="40" 
                                     height="40"
                                     id="navbarAvatar">
                            </div>
                            <div class="text-start">
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
                    
                  
                    
                    <li class="nav-item ms-2 position-relative">
                        <button class="btn-order" id="cartToggle">
                            <i class="fas fa-shopping-cart"></i> Keranjang
                            <span class="cart-badge" id="cartCount">0</span>
                        </button>
                    </li>

                      <!-- History Dropdown (Menu Sering Dibeli) -->
                    <li class="nav-item dropdown ms-2" id="historyDropdown">
                        <button class="btn btn-transparent dropdown-toggle position-relative" 
                                type="button" 
                                id="frequentMenuToggle" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false"
                                title="Menu Sering Dibeli">
                            <i class="fas fa-history"></i>
                            <span class="frequent-badge" id="frequentBadge">0</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end frequent-menu-dropdown shadow" 
                             aria-labelledby="frequentMenuToggle">
                            <div class="frequent-menu-header">
                                <h6><i class="fas fa-history me-2"></i>Menu Sering Dibeli</h6>
                                <button class="btn-clear-history" onclick="clearFrequentMenus()" title="Hapus Semua">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                            <div class="frequent-menu-body" id="frequentMenuBody">
                                <!-- Frequent menu items will be loaded here -->
                                <div class="frequent-menu-empty">
                                    <i class="fas fa-clock"></i>
                                    <p>Belum ada riwayat pembelian</p>
                                </div>
                            </div>
                            <div class="frequent-menu-footer">
                                <button class="btn-view-all" onclick="viewAllFrequentMenus()">
                                    <i class="fas fa-list me-1"></i> Lihat Semua
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
                
            </div>
            
            <!-- Mobile Header (Profile + Cart) -->
            <div class="d-flex align-items-center d-lg-none">
                <!-- Profile and Login (Mobile) -->
                <div id="mobileProfileDropdown" class="dropdown d-none">
                    <button class="btn btn-transparent dropdown-toggle" 
                            type="button" 
                            id="dropdownMenuButtonMobile" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                        <div class="profile-avatar">
                            <img src="https://ui-avatars.com/api/?name=User&background=001a12&color=fff&size=40" 
                                 alt="Profile" 
                                 class="rounded-circle"
                                 width="40" 
                                 height="40"
                                 id="mobileNavbarAvatar">
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButtonMobile">
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
                
                <!-- Login Button (Mobile) -->
                <div id="mobileLoginButton" class="d-none">
                    <a href="/login" class="btn-transparent">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                </div>
                
                <!-- Cart (Mobile) -->
                <div class="position-relative ms-2">
                    <button class="btn-transparent" id="mobileCartToggle">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-badge" id="mobileCartCount">0</span>
                    </button>
                </div>

                <!-- History Dropdown (Mobile) -->
                <div class="dropdown position-relative ms-2">
                    <button class="btn-transparent dropdown-toggle" 
                            type="button" 
                            id="mobileFrequentMenuToggle" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                        <i class="fas fa-history"></i>
                        <span class="frequent-badge" id="mobileFrequentBadge">0</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end frequent-menu-dropdown shadow" 
                         aria-labelledby="mobileFrequentMenuToggle">
                        <div class="frequent-menu-header">
                            <h6><i class="fas fa-history me-2"></i>Menu Sering Dibeli</h6>
                            <button class="btn-clear-history" onclick="clearFrequentMenus()" title="Hapus Semua">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                        <div class="frequent-menu-body" id="mobileFrequentMenuBody">
                            <!-- Frequent menu items will be loaded here -->
                            <div class="frequent-menu-empty">
                                <i class="fas fa-clock"></i>
                                <p>Belum ada riwayat pembelian</p>
                            </div>
                        </div>
                        <div class="frequent-menu-footer">
                            <button class="btn-view-all" onclick="viewAllFrequentMenus()">
                                <i class="fas fa-list me-1"></i> Lihat Semua
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- ===== HERO MENU ===== -->
    <section class="menu-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Menu Kantin Sehat</h1>
                    <p>Temukan berbagai pilihan makanan dan minuman sehat dengan bahan organik terbaik untuk mendukung gaya hidup sehat Anda</p>
                    
                    <div class="search-box">
                        <input type="text" id="searchMenu" placeholder="Cari menu favorit Anda...">
                        <button class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    
                    <div class="hero-stats mt-4">
                        <div class="stat-item">
                            <i class="fas fa-utensils"></i>
                            <div>
                                <h4>50+</h4>
                                <p>Menu Sehat</p>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-heart"></i>
                            <div>
                                <h4>4.8</h4>
                                <p>Rating Pelanggan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center d-none d-lg-block">
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Healthy Food">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CATEGORY FILTER ===== -->
    <section class="category-filter">
        <div class="container">
            <div class="section-title">
                <h3>Kategori Menu</h3>
                <p>Pilih kategori favorit Anda</p>
            </div>
            
            <div class="category-buttons">
                <button class="category-btn active" data-category="all">
                    <i class="fas fa-th-large"></i>
                    <span>Semua</span>
                </button>
                <button class="category-btn" data-category="makanan">
                    <i class="fas fa-utensils"></i>
                    <span>Makanan</span>
                </button>
                <button class="category-btn" data-category="minuman">
                    <i class="fas fa-glass-whiskey"></i>
                    <span>Minuman</span>
                </button>
                <button class="category-btn" data-category="cemilan">
                    <i class="fas fa-cookie-bite"></i>
                    <span>Cemilan</span>
                </button>
                <button class="category-btn" data-category="paket">
                    <i class="fas fa-box"></i>
                    <span>Paket</span>
                </button>
                <button class="category-btn" data-category="vegetarian">
                    <i class="fas fa-leaf"></i>
                    <span>Vegetarian</span>
                </button>
                <button class="category-btn" data-category="low-calorie">
                    <i class="fas fa-weight"></i>
                    <span>Low Calorie</span>
                </button>
            </div>
            
            <div class="category-info d-none d-md-block">
                <div class="info-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Semua bahan organik</span>
                </div>
                <div class="info-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Tanpa pengawet</span>
                </div>
                <div class="info-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Harga terjangkau</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== MENU GRID ===== -->
    <section class="menu-section">
        <div class="container">
            <div class="section-header">
                <div class="section-title">
                    <h2>Menu Terpopuler</h2>
                    <p>Pilihan menu sehat favorit pelanggan kami</p>
                </div>
                
                <div class="sort-options">
                    <select id="sortMenu" class="form-select">
                        <option value="default">Urutkan</option>
                        <option value="popular">Paling Populer</option>
                        <option value="rating">Rating Tertinggi</option>
                        <option value="price-low">Harga Terendah</option>
                        <option value="price-high">Harga Tertinggi</option>
                    </select>
                </div>
            </div>
            
            <div class="menu-grid" id="menuGrid">
                <!-- Menu items will be loaded here by JavaScript -->
            </div>
            
            <div class="load-more">
                <button class="btn-load-more" id="loadMore">
                    <i class="fas fa-plus-circle me-2"></i> Tampilkan Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <!-- ===== PROMO SECTION ===== -->
    <section id="promo" class="menu-section promo-section">
        <div class="container">
            <div class="section-title">
                <h2>Promo Spesial</h2>
                <p>Dapatkan penawaran terbaik untuk hidup sehat</p>
            </div>
            
            <div class="promo-grid">
                <div class="promo-card">
                    <div class="promo-badge">-20%</div>
                    <div class="promo-content">
                        <div class="promo-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h4>Diskon 20%</h4>
                        <p>Untuk pembelian pertama Anda</p>
                        <div class="promo-footer">
                            <small><i class="far fa-calendar-alt"></i> Berlaku hingga 31 Des 2024</small>
                            <button class="btn-promo">Klaim Sekarang</button>
                        </div>
                    </div>
                </div>
                
                <div class="promo-card">
                    <div class="promo-badge">BOGO</div>
                    <div class="promo-content">
                        <div class="promo-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Buy 1 Get 1</h4>
                        <p>Untuk menu minuman setiap hari Jumat</p>
                        <div class="promo-footer">
                            <small><i class="fas fa-info-circle"></i> Min. pembelian Rp 50.000</small>
                            <button class="btn-promo">Lihat Syarat</button>
                        </div>
                    </div>
                </div>
                
                <div class="promo-card">
                    <div class="promo-badge">POIN</div>
                    <div class="promo-content">
                        <div class="promo-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>Member Loyalty</h4>
                        <p>Dapatkan poin untuk setiap pembelian</p>
                        <div class="promo-footer">
                            <small><i class="fas fa-exchange-alt"></i> Tukar poin dengan menu gratis</small>
                            <button class="btn-promo">Cek Poin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== MOBILE BOTTOM BAR ===== -->
    <div class="mobile-bottom-bar d-lg-none">
        <div class="bottom-bar-items">
            <a href="/" class="bottom-bar-item">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a>
            <a href="/menu" class="bottom-bar-item active">
                <i class="fas fa-utensils"></i>
                <span>Menu</span>
            </a>
            <a href="#promo" class="bottom-bar-item">
                <i class="fas fa-tag"></i>
                <span>Promo</span>
            </a>
            <a href="#" class="bottom-bar-item" id="bottomBarCartToggle">
                <i class="fas fa-shopping-cart"></i>
                <span>Keranjang</span>
                <span class="cart-badge" id="bottomBarCartCount">0</span>
            </a>
        </div>
    </div>

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
            <div class="cart-summary">
                <div class="cart-summary-item">
                    <span>Subtotal</span>
                    <span id="cartSubtotal">Rp 0</span>
                </div>
                <div class="cart-summary-item">
                    <span>Diskon</span>
                    <span class="text-success">- Rp 0</span>
                </div>
                <div class="cart-summary-item total">
                    <span>Total</span>
                    <span class="cart-total-amount" id="cartTotal">Rp 0</span>
                </div>
            </div>
            <button class="btn-checkout" onclick="goToCheckout()">
                <i class="fas fa-credit-card me-2"></i> Checkout
            </button>
            <button class="btn-continue" onclick="closeCart()">
                <i class="fas fa-shopping-bag me-2"></i> Lanjut Belanja
            </button>
        </div>
    </div>
    
    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>



    <!-- ===== SCRIPTS ===== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Menu Data -->
    <script src="{{ asset('js/menu.js')}}"></script>
</body>
</html>