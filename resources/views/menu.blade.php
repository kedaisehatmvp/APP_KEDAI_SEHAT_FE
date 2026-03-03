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
    
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="images/ks-h.png" alt="">KantinSehat
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
                    <div id="loginButton" class="d-block">
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
                                <!-- Frequent menu items will be loaded here by JavaScript -->
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
                <div id="mobileLoginButton" class="d-block">
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
                            <!-- Frequent menu items will be loaded here by JavaScript -->
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
                <!-- Menu Item 1 -->
                <div class="menu-item featured" data-id="1" data-category="makanan vegetarian low-calorie" data-price="25000" data-rating="4.8" data-sold="342">
                    <span class="menu-badge hot"><i class="fas fa-fire"></i> HOT</span>
                    <div class="menu-img-container">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Salad Sehat Super" class="menu-img">
                    </div>
                    <div class="menu-content">
                        <span class="menu-category"><i class="fas fa-utensils"></i> Makanan</span>
                        <h3 class="menu-title">Salad Sehat Super</h3>
                        <p class="menu-description">Campuran sayuran organik segar (selada, tomat cherry, timun, wortel) dengan dressing khusus rendah kalori dan biji chia.</p>
                        
                        <div class="menu-footer">
                            <div class="menu-price-container">
                                <div>
                                    <span class="menu-price">Rp 25.000</span>
                                    <span class="old-price">
                                        <span class="menu-old-price">Rp 30.000</span>
                                    </span>
                                </div>
                                <div class="menu-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>4.8</span>
                                </div>
                            </div>
                            
                            <div class="menu-info">
                                <div class="menu-calories">
                                    <i class="fas fa-fire"></i> 180 kcal
                                </div>
                                <div class="menu-sold">
                                    <i class="fas fa-shopping-bag"></i> 342 terjual
                                </div>
                            </div>
                            
                            <div class="menu-actions">
                                <button class="btn-add-to-cart" onclick="addToCart(1, 'Salad Sehat Super', 25000, 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                                    <i class="fas fa-cart-plus"></i> Tambah
                                </button>
                                <button class="btn-detail" onclick="showDetail(1)" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 2 -->
                <div class="menu-item" data-id="2" data-category="minuman vegetarian" data-price="18000" data-rating="5.0" data-sold="215">
                    <span class="menu-badge new"><i class="fas fa-star"></i> NEW</span>
                    <div class="menu-img-container">
                        <img src="https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Jus Detox Mix" class="menu-img">
                    </div>
                    <div class="menu-content">
                        <span class="menu-category"><i class="fas fa-glass-whiskey"></i> Minuman</span>
                        <h3 class="menu-title">Jus Detox Mix</h3>
                        <p class="menu-description">Campuran buah-buahan organik (apel hijau, seledri, lemon, jahe) tanpa gula tambahan, kaya vitamin dan antioksidan.</p>
                        
                        <div class="menu-footer">
                            <div class="menu-price-container">
                                <div>
                                    <span class="menu-price">Rp 18.000</span>
                                </div>
                                <div class="menu-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>5.0</span>
                                </div>
                            </div>
                            
                            <div class="menu-info">
                                <div class="menu-calories">
                                    <i class="fas fa-fire"></i> 120 kcal
                                </div>
                                <div class="menu-sold">
                                    <i class="fas fa-shopping-bag"></i> 215 terjual
                                </div>
                            </div>
                            
                            <div class="menu-actions">
                                <button class="btn-add-to-cart" onclick="addToCart(2, 'Jus Detox Mix', 18000, 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                                    <i class="fas fa-cart-plus"></i> Tambah
                                </button>
                                <button class="btn-detail" onclick="showDetail(2)" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 3 -->
                <div class="menu-item featured" data-id="3" data-category="makanan" data-price="28000" data-rating="4.5" data-sold="478">
                    <div class="menu-img-container">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Nasi Goreng Sehat" class="menu-img">
                    </div>
                    <div class="menu-content">
                        <span class="menu-category"><i class="fas fa-utensils"></i> Makanan</span>
                        <h3 class="menu-title">Nasi Goreng Sehat</h3>
                        <p class="menu-description">Nasi merah dengan sayuran organik (wortel, buncis, jagung) dan dada ayam panggang tanpa kulit, dimasak dengan minyak zaitun.</p>
                        
                        <div class="menu-footer">
                            <div class="menu-price-container">
                                <div>
                                    <span class="menu-price">Rp 28.000</span>
                                </div>
                                <div class="menu-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>4.5</span>
                                </div>
                            </div>
                            
                            <div class="menu-info">
                                <div class="menu-calories">
                                    <i class="fas fa-fire"></i> 320 kcal
                                </div>
                                <div class="menu-sold">
                                    <i class="fas fa-shopping-bag"></i> 478 terjual
                                </div>
                            </div>
                            
                            <div class="menu-actions">
                                <button class="btn-add-to-cart" onclick="addToCart(3, 'Nasi Goreng Sehat', 28000, 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                                    <i class="fas fa-cart-plus"></i> Tambah
                                </button>
                                <button class="btn-detail" onclick="showDetail(3)" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 4 -->
                <div class="menu-item" data-id="4" data-category="makanan vegetarian low-calorie" data-price="22000" data-rating="4.7" data-sold="189">
                    <span class="menu-badge popular"><i class="fas fa-crown"></i> POPULAR</span>
                    <div class="menu-img-container">
                        <img src="https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Smoothie Bowl Berry" class="menu-img">
                    </div>
                    <div class="menu-content">
                        <span class="menu-category"><i class="fas fa-utensils"></i> Makanan</span>
                        <h3 class="menu-title">Smoothie Bowl Berry</h3>
                        <p class="menu-description">Smoothie buah berry (strawberry, blueberry, raspberry) dengan topping granola homemade, chia seed, dan potongan buah segar.</p>
                        
                        <div class="menu-footer">
                            <div class="menu-price-container">
                                <div>
                                    <span class="menu-price">Rp 22.000</span>
                                </div>
                                <div class="menu-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>4.7</span>
                                </div>
                            </div>
                            
                            <div class="menu-info">
                                <div class="menu-calories">
                                    <i class="fas fa-fire"></i> 210 kcal
                                </div>
                                <div class="menu-sold">
                                    <i class="fas fa-shopping-bag"></i> 189 terjual
                                </div>
                            </div>
                            
                            <div class="menu-actions">
                                <button class="btn-add-to-cart" onclick="addToCart(4, 'Smoothie Bowl Berry', 22000, 'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                                    <i class="fas fa-cart-plus"></i> Tambah
                                </button>
                                <button class="btn-detail" onclick="showDetail(4)" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 5 -->
                <div class="menu-item" data-id="5" data-category="makanan" data-price="20000" data-rating="4.2" data-sold="321">
                    <div class="menu-img-container">
                        <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Sandwich Ayam Sehat" class="menu-img">
                    </div>
                    <div class="menu-content">
                        <span class="menu-category"><i class="fas fa-utensils"></i> Makanan</span>
                        <h3 class="menu-title">Sandwich Ayam Sehat</h3>
                        <p class="menu-description">Roti gandum dengan ayam panggang, selada, tomat, mentimun, dan saus yogurt rendah lemak. Dikemas dengan rapi untuk dibawa.</p>
                        
                        <div class="menu-footer">
                            <div class="menu-price-container">
                                <div>
                                    <span class="menu-price">Rp 20.000</span>
                                    <span class="old-price">
                                        <span class="menu-old-price">Rp 25.000</span>
                                    </span>
                                </div>
                                <div class="menu-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>4.2</span>
                                </div>
                            </div>
                            
                            <div class="menu-info">
                                <div class="menu-calories">
                                    <i class="fas fa-fire"></i> 280 kcal
                                </div>
                                <div class="menu-sold">
                                    <i class="fas fa-shopping-bag"></i> 321 terjual
                                </div>
                            </div>
                            
                            <div class="menu-actions">
                                <button class="btn-add-to-cart" onclick="addToCart(5, 'Sandwich Ayam Sehat', 20000, 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                                    <i class="fas fa-cart-plus"></i> Tambah
                                </button>
                                <button class="btn-detail" onclick="showDetail(5)" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 6 -->
                <div class="menu-item" data-id="6" data-category="minuman vegetarian low-calorie" data-price="12000" data-rating="4.9" data-sold="567">
                    <span class="menu-badge new"><i class="fas fa-star"></i> NEW</span>
                    <div class="menu-img-container">
                        <img src="https://images.unsplash.com/photo-1594631252845-29fc4cc8cde9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Teh Hijau Organik" class="menu-img">
                    </div>
                    <div class="menu-content">
                        <span class="menu-category"><i class="fas fa-glass-whiskey"></i> Minuman</span>
                        <h3 class="menu-title">Teh Hijau Organik</h3>
                        <p class="menu-description">Teh hijau premium dari daun teh pilihan, diseduh dengan suhu tepat tanpa gula tambahan, kaya antioksidan dan baik untuk metabolisme.</p>
                        
                        <div class="menu-footer">
                            <div class="menu-price-container">
                                <div>
                                    <span class="menu-price">Rp 12.000</span>
                                </div>
                                <div class="menu-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>4.9</span>
                                </div>
                            </div>
                            
                            <div class="menu-info">
                                <div class="menu-calories">
                                    <i class="fas fa-fire"></i> 5 kcal
                                </div>
                                <div class="menu-sold">
                                    <i class="fas fa-shopping-bag"></i> 567 terjual
                                </div>
                            </div>
                            
                            <div class="menu-actions">
                                <button class="btn-add-to-cart" onclick="addToCart(6, 'Teh Hijau Organik', 12000, 'https://images.unsplash.com/photo-1594631252845-29fc4cc8cde9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                                    <i class="fas fa-cart-plus"></i> Tambah
                                </button>
                                <button class="btn-detail" onclick="showDetail(6)" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 7 -->
                <div class="menu-item featured" data-id="7" data-category="paket vegetarian low-calorie" data-price="75000" data-rating="4.9" data-sold="89">
                    <span class="menu-badge hot"><i class="fas fa-fire"></i> HOT</span>
                    <div class="menu-img-container">
                        <img src="https://images.unsplash.com/photo-1490818387583-1baba5e638af?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Paket Diet Sehat" class="menu-img">
                    </div>
                    <div class="menu-content">
                        <span class="menu-category"><i class="fas fa-box"></i> Paket</span>
                        <h3 class="menu-title">Paket Diet Sehat</h3>
                        <p class="menu-description">Paket lengkap untuk diet sehat selama 1 hari terdiri dari sarapan oatmeal, salad makan siang, cemilan edamame, dan makan malam sup sayur.</p>
                        
                        <div class="menu-footer">
                            <div class="menu-price-container">
                                <div>
                                    <span class="menu-price">Rp 75.000</span>
                                    <span class="old-price">
                                        <span class="menu-old-price">Rp 90.000</span>
                                    </span>
                                </div>
                                <div class="menu-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>4.9</span>
                                </div>
                            </div>
                            
                            <div class="menu-info">
                                <div class="menu-calories">
                                    <i class="fas fa-fire"></i> 450 kcal
                                </div>
                                <div class="menu-sold">
                                    <i class="fas fa-shopping-bag"></i> 89 terjual
                                </div>
                            </div>
                            
                            <div class="menu-actions">
                                <button class="btn-add-to-cart" onclick="addToCart(7, 'Paket Diet Sehat', 75000, 'https://images.unsplash.com/photo-1490818387583-1baba5e638af?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                                    <i class="fas fa-cart-plus"></i> Tambah
                                </button>
                                <button class="btn-detail" onclick="showDetail(7)" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 8 -->
                <div class="menu-item" data-id="8" data-category="cemilan vegetarian low-calorie" data-price="18000" data-rating="4.6" data-sold="234">
                    <div class="menu-img-container">
                        <img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Yogurt Parfait" class="menu-img">
                    </div>
                    <div class="menu-content">
                        <span class="menu-category"><i class="fas fa-cookie-bite"></i> Cemilan</span>
                        <h3 class="menu-title">Yogurt Parfait</h3>
                        <p class="menu-description">Yogurt rendah lemak dengan lapisan granola, buah berry segar, dan madu asli. Disajikan dalam gelas bening yang menarik.</p>
                        
                        <div class="menu-footer">
                            <div class="menu-price-container">
                                <div>
                                    <span class="menu-price">Rp 18.000</span>
                                </div>
                                <div class="menu-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>4.6</span>
                                </div>
                            </div>
                            
                            <div class="menu-info">
                                <div class="menu-calories">
                                    <i class="fas fa-fire"></i> 160 kcal
                                </div>
                                <div class="menu-sold">
                                    <i class="fas fa-shopping-bag"></i> 234 terjual
                                </div>
                            </div>
                            
                            <div class="menu-actions">
                                <button class="btn-add-to-cart" onclick="addToCart(8, 'Yogurt Parfait', 18000, 'https://images.unsplash.com/photo-1488477181946-6428a0291777?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                                    <i class="fas fa-cart-plus"></i> Tambah
                                </button>
                                <button class="btn-detail" onclick="showDetail(8)" title="Detail">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <button class="btn-promo" onclick="claimPromo(1)">Klaim Sekarang</button>
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
                            <button class="btn-promo" onclick="claimPromo(2)">Lihat Syarat</button>
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
                            <button class="btn-promo" onclick="claimPromo(3)">Cek Poin</button>
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
            <!-- Cart items will be loaded here by JavaScript -->
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

    <!-- ===== FOOTER ===== -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 footer-about">
                    <a href="/" class="footer-logo">
                        <i class="fas fa-leaf"></i> Kantin<span>Sehat</span>
                    </a>
                    <p>Kantin Sehat menyediakan berbagai pilihan makanan dan minuman sehat dengan bahan organik berkualitas untuk mendukung gaya hidup sehat Anda.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-4 footer-links">
                    <h5>Menu</h5>
                    <ul>
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/menu">Menu</a></li>
                        <li><a href="#promo">Promo</a></li>
                        <li><a href="/about">Tentang Kami</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-4 mb-4 footer-links">
                    <h5>Bantuan</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-4 mb-4 footer-links">
                    <h5>Kontak</h5>
                    <ul class="contact-info">
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Sehat No. 123, Jakarta</li>
                        <li><i class="fas fa-phone"></i> (021) 1234-5678</li>
                        <li><i class="fas fa-envelope"></i> info@kantinsehat.sch.id</li>
                    </ul>
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
    
    <!-- Menu JavaScript -->
    <script src="js/menu.js"></script>
    
    <script>
        // Function untuk claim promo (frontend only)
        function claimPromo(promoId) {
            Swal.fire({
                title: 'Informasi',
                text: 'Fitur claim promo akan segera tersedia',
                icon: 'info',
                confirmButtonColor: '#001a12'
            });
        }
        
        // Load more functionality (frontend only)
        document.getElementById('loadMore')?.addEventListener('click', function() {
            Swal.fire({
                title: 'Informasi',
                text: 'Fitur load more akan diimplementasikan oleh backend',
                icon: 'info',
                confirmButtonColor: '#001a12'
            });
        });
    </script>
</body>
</html>