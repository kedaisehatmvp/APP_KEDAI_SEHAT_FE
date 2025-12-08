<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Profile - Kantin Sehat</title>
    
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
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--dark);
            line-height: 1.6;
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
        
        /* Profile Dropdown */
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
        
        .cart-btn-wrapper {
            position: relative;
            display: inline-block;
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
        
        /* ===== SETTINGS CONTENT ===== */
        .settings-container {
            padding: 100px 0 50px;
            min-height: calc(100vh - 200px);
        }
        
        .settings-header {
            margin-bottom: 40px;
        }
        
        .settings-header h1 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .settings-header p {
            color: #666;
            font-size: 1.1rem;
        }
        
        /* Settings Card */
        .settings-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .settings-card h3 {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f1f1;
        }
        
        /* Profile Info */
        .profile-info {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eee;
        }
        
        .profile-avatar-large {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid var(--primary);
        }
        
        .profile-details h4 {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        .profile-details p {
            color: #666;
            margin-bottom: 8px;
        }
        
        .profile-badge {
            display: inline-block;
            background: rgba(40, 167, 69, 0.1);
            color: var(--primary);
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            transition: all 0.3s;
            width: 100%;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
            outline: none;
        }
        
        .form-select {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            transition: all 0.3s;
            width: 100%;
            background-color: white;
        }
        
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
            outline: none;
        }
        
        .input-group {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%;
        }
        
        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-right: none;
            padding: 12px 15px;
            border-radius: 10px 0 0 10px;
            color: #666;
        }
        
        /* Settings Tabs */
        .settings-tabs {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .tab-header {
            display: flex;
            border-bottom: 2px solid #f1f1f1;
        }
        
        .tab-button {
            flex: 1;
            padding: 20px;
            background: none;
            border: none;
            font-weight: 600;
            color: #666;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .tab-button:hover {
            background: #f8f9fa;
            color: var(--primary);
        }
        
        .tab-button.active {
            color: var(--primary);
            border-bottom: 3px solid var(--primary);
            background: rgba(40, 167, 69, 0.05);
        }
        
        .tab-content {
            padding: 30px;
        }
        
        .tab-pane {
            display: none;
        }
        
        .tab-pane.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Danger Zone */
        .danger-zone {
            background: linear-gradient(135deg, #ffefef, #ffeaea);
            border: 2px solid #f8d7da;
            border-radius: 15px;
            padding: 25px;
            margin-top: 40px;
        }
        
        .danger-zone h4 {
            color: var(--danger);
            margin-bottom: 15px;
        }
        
        .danger-zone p {
            color: #666;
            margin-bottom: 20px;
        }
        
        .btn-danger {
            background: var(--danger);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }
        
        /* Buttons */
        .btn-primary {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }
        
        .btn-outline-primary {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Avatar Upload */
        .avatar-upload {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .avatar-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 5px solid var(--primary);
            position: relative;
            cursor: pointer;
        }
        
        .avatar-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .avatar-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .avatar-preview:hover .avatar-overlay {
            opacity: 1;
        }
        
        /* Security Settings */
        .security-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .security-item:last-child {
            border-bottom: none;
        }
        
        .security-info h5 {
            margin: 0 0 5px;
            font-weight: 600;
        }
        
        .security-info p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }
        
        /* Notifications */
        .notification-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .notification-item:last-child {
            border-bottom: none;
        }
        
        .notification-info h5 {
            margin: 0 0 5px;
            font-weight: 600;
        }
        
        .notification-info p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
        }
        
        /* Switch Toggle */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 30px;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: var(--primary);
        }
        
        input:checked + .slider:before {
            transform: translateX(30px);
        }
        
        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 40px 0 20px;
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
        
        .copyright {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #bbb;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .settings-container {
                padding: 80px 0 30px;
            }
            
            .profile-info {
                flex-direction: column;
                text-align: center;
            }
            
            .tab-header {
                flex-direction: column;
            }
            
            .tab-button {
                padding: 15px;
                justify-content: flex-start;
            }
            
            .security-item,
            .notification-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .btn-transparent {
                padding: 5px;
            }
            
            .profile-name {
                font-size: 0.8rem;
            }
        }
        
        @media (max-width: 576px) {
            .settings-card,
            .tab-content {
                padding: 20px;
            }
            
            .settings-header h1 {
                font-size: 1.8rem;
            }
            
            .avatar-preview {
                width: 120px;
                height: 120px;
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
                        <a class="nav-link" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/orders">Pesanan</a>
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
                                <a class="dropdown-item" href="/profile">
                                    <i class="fas fa-user me-2"></i> Profile Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/orders">
                                    <i class="fas fa-history me-2"></i> Riwayat Transaksi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item active" href="/settings">
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

    <!-- ===== SETTINGS CONTENT ===== -->
    <section class="settings-container">
        <div class="container">
            <div class="settings-header">
                <h1><i class="fas fa-cog me-2"></i> Pengaturan Profile</h1>
                <p>Kelola informasi profile dan preferensi akun Anda</p>
            </div>
            
            <div class="row">
                <!-- Left Column: Profile Overview -->
                <div class="col-lg-4 mb-4">
                    <div class="settings-card">
                        <div class="profile-info">
                            <img src="https://ui-avatars.com/api/?name=User&background=28a745&color=fff&size=150" 
                                 alt="Profile Avatar" 
                                 class="profile-avatar-large"
                                 id="profileAvatar">
                            <div class="profile-details">
                                <h4 id="profileName">Nama Pengguna</h4>
                                <p id="profileEmail">email@example.com</p>
                                <p id="profileRole">Siswa</p>
                                <p id="profileNIS">NIS: -</p>
                                <span class="profile-badge" id="profileBadge">Siswa Aktif</span>
                            </div>
                        </div>
                        
                        <div class="account-stats">
                            <h5>Statistik Akun</h5>
                            <div class="row text-center mt-3">
                                <div class="col-6">
                                    <div class="p-3">
                                        <h4 class="text-primary" id="totalOrders">0</h4>
                                        <small>Total Pesanan</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3">
                                        <h4 class="text-success" id="totalSpent">Rp 0</h4>
                                        <small>Total Pengeluaran</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="settings-card">
                        <h3><i class="fas fa-shield-alt me-2"></i> Keamanan Akun</h3>
                        <p class="text-muted mb-4">Terakhir login: <span id="lastLogin">-</span></p>
                        
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" onclick="changeTab('security')">
                                <i class="fas fa-key me-2"></i> Ubah Password
                            </button>
                            <button class="btn btn-outline-primary" onclick="showSessionManagement()">
                                <i class="fas fa-desktop me-2"></i> Kelola Sesi
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column: Settings Tabs -->
                <div class="col-lg-8">
                    <div class="settings-tabs">
                        <div class="tab-header">
                            <button class="tab-button active" onclick="changeTab('profile')">
                                <i class="fas fa-user me-2"></i> Profile
                            </button>
                            <button class="tab-button" onclick="changeTab('account')">
                                <i class="fas fa-id-card me-2"></i> Akun
                            </button>
                            <button class="tab-button" onclick="changeTab('security')">
                                <i class="fas fa-shield-alt me-2"></i> Keamanan
                            </button>
                            <button class="tab-button" onclick="changeTab('notifications')">
                                <i class="fas fa-bell me-2"></i> Notifikasi
                            </button>
                        </div>
                        
                        <div class="tab-content">
                            <!-- Profile Tab -->
                            <div class="tab-pane active" id="profileTab">
                                <h3>Informasi Personal</h3>
                                <p class="text-muted mb-4">Kelola informasi personal dan data siswa</p>
                                
                                <form id="profileForm">
                                    <div class="avatar-upload mb-4">
                                        <div class="avatar-preview" onclick="document.getElementById('avatarInput').click()">
                                            <img src="https://ui-avatars.com/api/?name=User&background=28a745&color=fff&size=150" 
                                                 id="avatarPreview"
                                                 alt="Profile Picture">
                                            <div class="avatar-overlay">
                                                <i class="fas fa-camera fa-2x"></i>
                                            </div>
                                        </div>
                                        <input type="file" id="avatarInput" accept="image/*" class="d-none" onchange="previewAvatar()">
                                        <small class="text-muted">Klik gambar untuk upload foto profile (max 2MB)</small>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nis" class="form-label">NIS</label>
                                                <input type="text" id="nis" class="form-control" required readonly>
                                                <small class="text-muted">NIS tidak dapat diubah</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaSiswa" class="form-label">Nama Lengkap</label>
                                                <input type="text" id="namaSiswa" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kelas" class="form-label">Kelas</label>
                                                <select id="kelas" class="form-select" required>
                                                    <option value="">Pilih Kelas</option>
                                                    <option value="X">Kelas X</option>
                                                    <option value="XI">Kelas XI</option>
                                                    <option value="XII">Kelas XII</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jurusan" class="form-label">Jurusan</label>
                                                <select id="jurusan" class="form-select" required>
                                                    <option value="">Pilih Jurusan</option>
                                                    <option value="TKJ">Teknik Komputer dan Jaringan</option>
                                                    <option value="MM">Multimedia</option>
                                                    <option value="RPL">Rekayasa Perangkat Lunak</option>
                                                    <option value="TKRO">Teknik Kendaraan Ringan Otomotif</option>
                                                    <option value="TBSM">Teknik Bisnis Sepeda Motor</option>
                                                    <option value="AKL">Akuntansi dan Keuangan Lembaga</option>
                                                    <option value="OTKP">Otomatisasi dan Tata Kelola Perkantoran</option>
                                                    <option value="BDP">Bisnis Daring dan Pemasaran</option>
                                                    <option value="PM">Perhotelan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Nomor Telepon</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+62</span>
                                            <input type="tel" id="phone" class="form-control" placeholder="81234567890" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select id="gender" class="form-select" required>
                                            <option value="">Pilih</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end gap-2 mt-4">
                                        <button type="button" class="btn btn-outline-primary" onclick="cancelEdit()">
                                            Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Account Tab -->
                            <div class="tab-pane" id="accountTab">
                                <h3>Pengaturan Akun</h3>
                                <p class="text-muted mb-4">Kelola informasi login dan preferensi akun</p>
                                
                                <form id="accountForm">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text">@</span>
                                            <input type="email" id="email" class="form-control" required>
                                        </div>
                                        <small class="text-muted">Email digunakan untuk login dan notifikasi</small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="input-group">
                                            <span class="input-group-text">@</span>
                                            <input type="text" id="username" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userRole" class="form-label">Role</label>
                                                <select id="userRole" class="form-select" disabled>
                                                    <option value="siswa">Siswa</option>
                                                    <option value="guru">Guru</option>
                                                    <option value="admin">Admin Kantin</option>
                                                </select>
                                                <small class="text-muted">Role tidak dapat diubah</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tahunAjaran" class="form-label">Tahun Ajaran</label>
                                                <select id="tahunAjaran" class="form-select">
                                                    <option value="">Pilih Tahun Ajaran</option>
                                                    <option value="2023/2024">2023/2024</option>
                                                    <option value="2024/2025">2024/2025</option>
                                                    <option value="2025/2026">2025/2026</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="language" class="form-label">Bahasa</label>
                                        <select id="language" class="form-select">
                                            <option value="id">Bahasa Indonesia</option>
                                            <option value="en">English</option>
                                        </select>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end gap-2 mt-4">
                                        <button type="button" class="btn btn-outline-primary" onclick="cancelEdit()">
                                            Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Security Tab -->
                            <div class="tab-pane" id="securityTab">
                                <h3>Keamanan & Privasi</h3>
                                <p class="text-muted mb-4">Kelola keamanan akun dan privasi Anda</p>
                                
                                <form id="securityForm">
                                    <div class="form-group">
                                        <label for="currentPassword" class="form-label">Password Saat Ini</label>
                                        <input type="password" id="currentPassword" class="form-control" required>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="newPassword" class="form-label">Password Baru</label>
                                                <input type="password" id="newPassword" class="form-control" required>
                                                <small class="text-muted">Minimal 6 karakter</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                                                <input type="password" id="confirmPassword" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="mb-1">Verifikasi 2 Langkah</h5>
                                                <p class="text-muted mb-0">Tambah keamanan ekstra dengan kode verifikasi</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" id="twoFactor">
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end gap-2 mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i> Update Password
                                        </button>
                                    </div>
                                </form>
                                
                                <div class="security-settings mt-5">
                                    <h5 class="mb-3">Aktivitas Login</h5>
                                    <div class="security-item">
                                        <div class="security-info">
                                            <h5>Browser Chrome</h5>
                                            <p>Jakarta, Indonesia • Sekarang</p>
                                        </div>
                                        <span class="text-success">Aktif</span>
                                    </div>
                                    <div class="security-item">
                                        <div class="security-info">
                                            <h5>Mobile Safari</h5>
                                            <p>Jakarta, Indonesia • 2 jam yang lalu</p>
                                        </div>
                                        <button class="btn btn-sm btn-outline-danger" onclick="logoutDevice(this)">Logout</button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Notifications Tab -->
                            <div class="tab-pane" id="notificationsTab">
                                <h3>Preferensi Notifikasi</h3>
                                <p class="text-muted mb-4">Kelola cara Anda menerima notifikasi</p>
                                
                                <div class="notification-settings">
                                    <h5 class="mb-3">Notifikasi Email</h5>
                                    <div class="notification-item">
                                        <div class="notification-info">
                                            <h5>Pesanan Baru</h5>
                                            <p>Dapatkan notifikasi ketika pesanan diproses</p>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox" id="notifOrder" checked>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="notification-item">
                                        <div class="notification-info">
                                            <h5>Promo & Diskon</h5>
                                            <p>Informasi promo dan penawaran spesial</p>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox" id="notifPromo" checked>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="notification-item">
                                        <div class="notification-info">
                                            <h5>Pembaruan Sistem</h5>
                                            <p>Informasi update dan maintenance sistem</p>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox" id="notifUpdate">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    
                                    <h5 class="mb-3 mt-4">Notifikasi Aplikasi</h5>
                                    <div class="notification-item">
                                        <div class="notification-info">
                                            <h5>Suara Notifikasi</h5>
                                            <p>Putar suara ketika ada notifikasi baru</p>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox" id="notifSound" checked>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="notification-item">
                                        <div class="notification-info">
                                            <h5>Notifikasi Push</h5>
                                            <p>Terima notifikasi push di browser</p>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox" id="notifPush" checked>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end gap-2 mt-4">
                                    <button type="button" class="btn btn-outline-primary" onclick="resetNotifications()">
                                        Reset
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="saveNotifications()">
                                        <i class="fas fa-save me-2"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Danger Zone -->
                    <div class="danger-zone">
                        <h4><i class="fas fa-exclamation-triangle me-2"></i> Zona Berbahaya</h4>
                        <p>Tindakan ini bersifat permanen dan tidak dapat dibatalkan. Hapus akun Anda dan semua data yang terkait.</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-danger" onclick="exportData()">
                                <i class="fas fa-download me-2"></i> Ekspor Data
                            </button>
                            <button class="btn btn-danger" onclick="deleteAccount()">
                                <i class="fas fa-trash me-2"></i> Hapus Akun
                            </button>
                        </div>
                    </div>
                </div>
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
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <h5 class="text-white">Menu Cepat</h5>
                    <ul class="footer-links">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/menu">Menu</a></li>
                        <li><a href="/orders">Pesanan</a></li>
                        <li><a href="/profile">Profile</a></li>
                        <li><a href="/settings">Pengaturan</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <h5 class="text-white">Bantuan</h5>
                    <ul class="footer-links">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Bantuan</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2">
                    <h5 class="text-white">Kontak Kantin</h5>
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
    
    <script>
        // User management based on database tables
        let userData = null;
        let originalData = null;
        let siswaData = null;
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            checkLoginStatus();
            loadUserData();
            loadSiswaData();
            loadOrderHistory();
            setupFormListeners();
            
            // Set current year in footer
            const yearElement = document.querySelector('.copyright p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
            }
        });
        
        // Check login status based on tbl_users
        function checkLoginStatus() {
            const user = localStorage.getItem('kantinSehatUser');
            const profileDropdown = document.getElementById('profileDropdown');
            const loginButton = document.getElementById('loginButton');
            
            if (user) {
                try {
                    userData = JSON.parse(user);
                    
                    // Show profile dropdown, hide login button
                    profileDropdown.classList.remove('d-none');
                    profileDropdown.classList.add('d-block');
                    loginButton.classList.remove('d-block');
                    loginButton.classList.add('d-none');
                    
                    // Update navbar info
                    updateNavbarInfo();
                    
                } catch (e) {
                    console.error('Error parsing user data:', e);
                    logout();
                }
            } else {
                // Redirect to login if not logged in
                window.location.href = '/login';
            }
        }
        
        // Load user data from tbl_users
        function loadUserData() {
            if (!userData) {
                // For demo, create sample user data
                userData = {
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
                };
                localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            }
            
            // Update profile info
            document.getElementById('profileName').textContent = userData.nama_lengkap;
            document.getElementById('profileEmail').textContent = userData.email;
            document.getElementById('profileRole').textContent = getRoleDisplay(userData.role);
            document.getElementById('profileBadge').textContent = userData.role === 'siswa' ? 'Siswa Aktif' : getRoleDisplay(userData.role);
            
            // Update avatar
            const avatarUrl = userData.foto || `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.nama_lengkap)}&background=28a745&color=fff&size=150`;
            document.getElementById('profileAvatar').src = avatarUrl;
            document.getElementById('avatarPreview').src = avatarUrl;
            
            // Update last login
            const lastLogin = userData.last_login ? new Date(userData.last_login).toLocaleString('id-ID') : '-';
            document.getElementById('lastLogin').textContent = lastLogin;
            
            // Load form data
            loadFormData();
            
            // Save original data for comparison
            originalData = JSON.parse(JSON.stringify(userData));
        }
        
        // Load siswa data from tbl_siswa
        function loadSiswaData() {
            // For demo, create sample siswa data
            siswaData = {
                id_siswa: 1,
                nis: '20240001',
                nama_siswa: 'Budi Santoso',
                kelas: 'X',
                jurusan: 'TKJ',
                gender: 'L',
                created_at: new Date('2024-01-01').toISOString(),
                updated_at: new Date().toISOString()
            };
            
            // Update NIS display
            document.getElementById('profileNIS').textContent = `NIS: ${siswaData.nis}`;
        }
        
        // Load order history for stats from tbl_transaksi
        function loadOrderHistory() {
            // For demo, create sample transaction data
            const orders = [
                {
                    id_transaksi: 1,
                    id_user: 1,
                    id_menu: 1,
                    jumlah: 2,
                    total_harga: 30000,
                    status: 'selesai',
                    tanggal_transaksi: new Date('2024-03-01').toISOString()
                },
                {
                    id_transaksi: 2,
                    id_user: 1,
                    id_menu: 3,
                    jumlah: 1,
                    total_harga: 15000,
                    status: 'selesai',
                    tanggal_transaksi: new Date('2024-03-02').toISOString()
                }
            ];
            
            const totalOrders = orders.length;
            const totalSpent = orders.reduce((total, order) => total + order.total_harga, 0);
            
            document.getElementById('totalOrders').textContent = totalOrders;
            document.getElementById('totalSpent').textContent = `Rp ${totalSpent.toLocaleString('id-ID')}`;
        }
        
        // Load form data from both tbl_users and tbl_siswa
        function loadFormData() {
            if (!userData || !siswaData) return;
            
            // Profile form (from tbl_siswa)
            document.getElementById('nis').value = siswaData.nis || '';
            document.getElementById('namaSiswa').value = siswaData.nama_siswa || '';
            document.getElementById('kelas').value = siswaData.kelas || '';
            document.getElementById('jurusan').value = siswaData.jurusan || '';
            document.getElementById('phone').value = userData.no_telepon || '';
            document.getElementById('gender').value = siswaData.gender || '';
            
            // Account form (from tbl_users)
            document.getElementById('email').value = userData.email || '';
            document.getElementById('username').value = userData.username || '';
            document.getElementById('userRole').value = userData.role || 'siswa';
            document.getElementById('tahunAjaran').value = '2024/2025'; // Default
            document.getElementById('language').value = userData.language || 'id';
            
            // Security form
            document.getElementById('twoFactor').checked = userData.two_factor || false;
            
            // Notification settings
            document.getElementById('notifOrder').checked = userData.notif_order !== false;
            document.getElementById('notifPromo').checked = userData.notif_promo !== false;
            document.getElementById('notifUpdate').checked = userData.notif_update || false;
            document.getElementById('notifSound').checked = userData.notif_sound !== false;
            document.getElementById('notifPush').checked = userData.notif_push !== false;
        }
        
        // Setup form listeners
        function setupFormListeners() {
            // Profile form
            document.getElementById('profileForm').addEventListener('submit', function(e) {
                e.preventDefault();
                saveProfile();
            });
            
            // Account form
            document.getElementById('accountForm').addEventListener('submit', function(e) {
                e.preventDefault();
                saveAccount();
            });
            
            // Security form
            document.getElementById('securityForm').addEventListener('submit', function(e) {
                e.preventDefault();
                saveSecurity();
            });
        }
        
        // Update navbar info
        function updateNavbarInfo() {
            document.getElementById('navbarName').textContent = userData.nama_lengkap || 'Nama User';
            document.getElementById('navbarRole').textContent = getRoleDisplay(userData.role);
            
            const navbarAvatar = document.getElementById('navbarAvatar');
            if (navbarAvatar && userData.foto) {
                navbarAvatar.src = userData.foto;
            } else if (navbarAvatar && userData.nama_lengkap) {
                navbarAvatar.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.nama_lengkap)}&background=28a745&color=fff&size=40`;
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
        
        // Change tab
        function changeTab(tabName) {
            // Update active tab button
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
                if (btn.textContent.includes(tabName.charAt(0).toUpperCase() + tabName.slice(1))) {
                    btn.classList.add('active');
                }
            });
            
            // Show selected tab
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('active');
            });
            document.getElementById(`${tabName}Tab`).classList.add('active');
        }
        
        // Preview avatar
        function previewAvatar() {
            const input = document.getElementById('avatarInput');
            const preview = document.getElementById('avatarPreview');
            
            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Validate file size (2MB max)
                if (file.size > 2 * 1024 * 1024) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ukuran file maksimal 2MB',
                        icon: 'error'
                    });
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    
                    // Update navbar avatar too
                    const navbarAvatar = document.getElementById('navbarAvatar');
                    if (navbarAvatar) {
                        navbarAvatar.src = e.target.result;
                    }
                    
                    // Update profile avatar
                    const profileAvatar = document.getElementById('profileAvatar');
                    if (profileAvatar) {
                        profileAvatar.src = e.target.result;
                    }
                };
                
                reader.readAsDataURL(file);
            }
        }
        
        // Save profile (update tbl_siswa and tbl_users)
        function saveProfile() {
            // Collect form data
            const profileData = {
                // tbl_siswa data
                nama_siswa: document.getElementById('namaSiswa').value,
                kelas: document.getElementById('kelas').value,
                jurusan: document.getElementById('jurusan').value,
                gender: document.getElementById('gender').value,
                updated_at: new Date().toISOString(),
                
                // tbl_users data
                no_telepon: document.getElementById('phone').value,
                foto: document.getElementById('avatarPreview').src
            };
            
            // Validate required fields
            if (!profileData.nama_siswa || !profileData.kelas || !profileData.jurusan || !profileData.gender) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Harap isi semua field yang wajib diisi',
                    icon: 'error'
                });
                return;
            }
            
            // Update siswa data
            siswaData = { ...siswaData, ...profileData };
            
            // Update user data
            userData = { 
                ...userData, 
                nama_lengkap: profileData.nama_siswa,
                no_telepon: profileData.no_telepon,
                foto: profileData.foto,
                updated_at: new Date().toISOString()
            };
            
            // Save to localStorage (in real app, send to API)
            localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            
            // Update UI
            document.getElementById('profileName').textContent = siswaData.nama_siswa;
            document.getElementById('profileNIS').textContent = `NIS: ${siswaData.nis}`;
            updateNavbarInfo();
            
            // Show success message
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data profile berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
        
        // Save account settings (update tbl_users)
        function saveAccount() {
            const accountData = {
                email: document.getElementById('email').value,
                username: document.getElementById('username').value,
                language: document.getElementById('language').value,
                updated_at: new Date().toISOString()
            };
            
            // Validate email
            if (!accountData.email || !accountData.email.includes('@')) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Email tidak valid',
                    icon: 'error'
                });
                return;
            }
            
            // Update user data
            userData = { ...userData, ...accountData };
            
            // Save to localStorage
            localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            
            // Update UI
            document.getElementById('profileEmail').textContent = userData.email;
            
            Swal.fire({
                title: 'Berhasil!',
                text: 'Pengaturan akun berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
        
        // Save security settings (update tbl_users password)
        function saveSecurity() {
            const currentPassword = document.getElementById('currentPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            // Validate current password
            if (currentPassword !== 'password123') { // In real app, use hashed password comparison
                Swal.fire({
                    title: 'Error!',
                    text: 'Password saat ini salah',
                    icon: 'error'
                });
                return;
            }
            
            // Validate new password
            if (newPassword !== confirmPassword) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Password baru tidak cocok',
                    icon: 'error'
                });
                return;
            }
            
            if (newPassword.length < 6) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Password minimal 6 karakter',
                    icon: 'error'
                });
                return;
            }
            
            // Update user data
            userData = {
                ...userData,
                password: newPassword, // In real app, hash this!
                two_factor: document.getElementById('twoFactor').checked,
                updated_at: new Date().toISOString()
            };
            
            localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            
            // Clear form
            document.getElementById('currentPassword').value = '';
            document.getElementById('newPassword').value = '';
            document.getElementById('confirmPassword').value = '';
            
            Swal.fire({
                title: 'Berhasil!',
                text: 'Password berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
        
        // Save notification settings
        function saveNotifications() {
            const notifications = {
                notif_order: document.getElementById('notifOrder').checked,
                notif_promo: document.getElementById('notifPromo').checked,
                notif_update: document.getElementById('notifUpdate').checked,
                notif_sound: document.getElementById('notifSound').checked,
                notif_push: document.getElementById('notifPush').checked
            };
            
            userData = {
                ...userData,
                ...notifications,
                updated_at: new Date().toISOString()
            };
            
            localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            
            Swal.fire({
                title: 'Berhasil!',
                text: 'Pengaturan notifikasi berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
        
        // Reset notifications
        function resetNotifications() {
            document.getElementById('notifOrder').checked = true;
            document.getElementById('notifPromo').checked = true;
            document.getElementById('notifUpdate').checked = false;
            document.getElementById('notifSound').checked = true;
            document.getElementById('notifPush').checked = true;
        }
        
        // Cancel edit
        function cancelEdit() {
            loadFormData();
        }
        
        // Show session management
        function showSessionManagement() {
            Swal.fire({
                title: 'Kelola Sesi Login',
                html: `
                    <div class="text-start">
                        <p><strong>Sesi Aktif:</strong></p>
                        <ul class="mb-3">
                            <li>Browser Chrome - Jakarta (Sekarang)</li>
                            <li>Mobile Safari - Jakarta (2 jam lalu)</li>
                        </ul>
                        <p>Anda dapat logout dari semua perangkat lainnya.</p>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Logout Semua Sesi Lain',
                cancelButtonText: 'Tutup'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Semua sesi lain telah logout',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        }
        
        // Logout device
        function logoutDevice(button) {
            const securityItem = button.closest('.security-item');
            securityItem.style.opacity = '0.5';
            setTimeout(() => {
                securityItem.remove();
            }, 300);
        }
        
        // Export data
        function exportData() {
            const exportData = {
                user: userData,
                siswa: siswaData,
                exported_at: new Date().toISOString()
            };
            
            const dataStr = JSON.stringify(exportData, null, 2);
            const dataUri = 'data:application/json;charset=utf-8,'+ encodeURIComponent(dataStr);
            
            const exportFileDefaultName = `kantin-sehat-data-${new Date().toISOString().split('T')[0]}.json`;
            
            const linkElement = document.createElement('a');
            linkElement.setAttribute('href', dataUri);
            linkElement.setAttribute('download', exportFileDefaultName);
            linkElement.click();
            
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data telah diekspor',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
        
        // Delete account
        function deleteAccount() {
            Swal.fire({
                title: 'Hapus Akun?',
                text: "Tindakan ini tidak dapat dibatalkan! Semua data Anda akan dihapus permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus Akun',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Clear all user data
                    localStorage.removeItem('kantinSehatUser');
                    
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Akun Anda telah dihapus.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '/';
                    });
                }
            });
        }
        
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
                    
                    // Redirect to home
                    window.location.href = '/';
                }
            });
        };
        
        // Console log for debugging
        console.log('Settings Page Features:');
        console.log('1. Profile management based on tbl_siswa');
        console.log('2. Account settings based on tbl_users');
        console.log('3. Security settings with password change');
        console.log('4. Notification preferences');
        console.log('5. Data export and account deletion');
    </script>
</body>
</html>