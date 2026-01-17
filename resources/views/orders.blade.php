<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - Kantin Sehat</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts - Lato -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    
 <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
</head>
<body>
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{asset('images/ks-h.png')}}" alt="">KantinSehat
            </a>
            
            <!-- Desktop Navigation -->
            <div class="collapse navbar-collapse d-none d-lg-block" id="desktopNavbar">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#promo">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/order-history">Pesanan</a>
                    </li>
                    
                    <!-- Profile Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-transparent dropdown-toggle" 
                                type="button" 
                                id="dropdownMenuButton" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false">
                            <div class="profile-avatar me-2">
                                <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=001a12&color=fff&size=40" 
                                     alt="Profile" 
                                     class="rounded-circle"
                                     width="40" 
                                     height="40">
                            </div>
                            <div class="text-start">
                                <div class="profile-name fw-bold">Budi Santoso</div>
                                <small class="profile-role text-muted">Siswa</small>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="/pembeli/profile">
                                    <i class="fas fa-user me-2"></i> Profile Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item active" href="/order-history">
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
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <li class="nav-item ms-3">
                        <a href="/menu" class="btn-order">
                            <i class="fas fa-shopping-cart"></i> Pesan
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Mobile Header (Profile + Order) -->
            <div class="d-flex align-items-center d-lg-none">
                <!-- Profile Dropdown (Mobile) -->
                <div class="dropdown">
                    <button class="btn btn-transparent dropdown-toggle" 
                            type="button" 
                            id="dropdownMenuButtonMobile" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                        <div class="profile-avatar">
                            <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=001a12&color=fff&size=40" 
                                 alt="Profile" 
                                 class="rounded-circle"
                                 width="40" 
                                 height="40">
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButtonMobile">
                        <li>
                            <a class="dropdown-item" href="/pembeli/profile">
                                <i class="fas fa-user me-2"></i> Profile Saya
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item active" href="/order-history">
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
                            <a class="dropdown-item text-danger" href="#">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Order Button (Mobile) -->
                <div class="ms-2">
                    <a href="/menu" class="btn-transparent">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ===== HEADER ===== -->
    <div class="history-header">
        <div class="container">
            <h1 class="mb-3">
                <i class="fas fa-history me-3"></i>Riwayat Pesanan
            </h1>
            <p class="lead mb-0">Semua transaksi Anda di Kantin Sehat</p>
        </div>
    </div>

    <!-- ===== STATS ===== -->
    <div class="container mt-4">
        <div class="row g-3">
            <div class="col-md-3 col-6">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-number">5</div>
                    <div class="text-muted">Total Pesanan</div>
                </div>
            </div>
            
            <div class="col-md-3 col-6">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="stat-number">Rp 209K</div>
                    <div class="text-muted">Total Belanja</div>
                </div>
            </div>
            
            <div class="col-md-3 col-6">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number">3</div>
                    <div class="text-muted">Selesai</div>
                </div>
            </div>
            
            <div class="col-md-3 col-6">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number">2</div>
                    <div class="text-muted">Proses</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== FILTER ===== -->
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Semua Pesanan</h5>
            <div class="d-flex gap-2">
                <select class="form-select w-auto" id="filterStatus">
                    <option value="all">Semua Status</option>
                    <option value="selesai">Selesai</option>
                    <option value="proses">Dalam Proses</option>
                    <option value="batal">Dibatalkan</option>
                </select>
                <button class="btn btn-outline-simple btn-simple" onclick="refreshData()">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- ===== TRANSACTIONS ===== -->
    <div class="container mt-3" id="transactionsList">
        <!-- Transaction cards will be loaded here -->
    </div>

    <!-- ===== EMPTY STATE ===== -->
    <div class="container mt-5 d-none" id="emptyState">
        <div class="empty-state">
            <i class="fas fa-receipt"></i>
            <h4 class="mb-3">Belum Ada Pesanan</h4>
            <p class="mb-4">Anda belum melakukan pemesanan di Kantin Sehat</p>
            <a href="/menu" class="btn btn-primary-simple btn-simple">
                <i class="fas fa-utensils me-2"></i>Pesan Sekarang
            </a>
        </div>
    </div>

    <!-- ===== MOBILE BOTTOM BAR ===== -->
    <div class="mobile-bottom-bar d-lg-none">
        <div class="bottom-bar-items">
            <a href="/" class="bottom-bar-item">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a>
            <a href="/menu" class="bottom-bar-item">
                <i class="fas fa-utensils"></i>
                <span>Menu</span>
            </a>
            <a href="#promo" class="bottom-bar-item">
                <i class="fas fa-tag"></i>
                <span>Promo</span>
            </a>
            <a href="/order-history" class="bottom-bar-item active">
                <i class="fas fa-history"></i>
                <span>Pesanan</span>
            </a>
        </div>
    </div>

    <!-- ===== MODAL CONTAINER ===== -->
    <div id="modalContainer"></div>
    
    

    <!-- ===== SCRIPTS ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="{{ asset('js/orders.js')}}"></script>
</body>
</html>