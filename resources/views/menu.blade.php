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
                            <i class="fas fa-gift fa-3x" style="color: #001a12;"></i>
                        </div>
                        <h4 style="color: #001a12;">Diskon 20%</h4>
                        <p>Untuk pembelian pertama Anda</p>
                        <small class="text-muted">Berlaku hingga 31 Desember 2024</small>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="promo-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="promo-icon mb-3">
                            <i class="fas fa-users fa-3x" style="color: #001a12;"></i>
                        </div>
                        <h4 style="color: #001a12;">Buy 1 Get 1</h4>
                        <p>Untuk menu minuman setiap hari Jumat</p>
                        <small class="text-muted">Minimal pembelian Rp 50.000</small>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="promo-card text-center p-4 bg-white rounded shadow-sm">
                        <div class="promo-icon mb-3">
                            <i class="fas fa-star fa-3x" style="color: #001a12;"></i>
                        </div>
                        <h4 style="color: #001a12;">Member Loyalty</h4>
                        <p>Dapatkan poin untuk setiap pembelian</p>
                        <small class="text-muted">Tukar poin dengan menu gratis</small>
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
                <span class="cart-badge" style="right: 20px;" id="bottomBarCartCount">0</span>
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

   

    <!-- ===== SCRIPTS ===== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Menu Data -->
    <script src="{{ asset('js/menu.js')}}"></script>
</body>
</html>