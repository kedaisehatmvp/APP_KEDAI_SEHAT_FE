<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Saya - Kantin Sehat</title>
    
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
            display: inline-block;
        }
        
        .btn-order:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }
        
        /* ===== PROFILE CONTENT ===== */
        .profile-container {
            padding: 100px 0 50px;
            min-height: calc(100vh - 200px);
        }
        
        .profile-header {
            margin-bottom: 40px;
        }
        
        .profile-header h1 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .profile-header p {
            color: #666;
            font-size: 1.1rem;
        }
        
        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .profile-avatar-section {
            text-align: center;
            padding: 30px 0;
            border-bottom: 1px solid #eee;
            margin-bottom: 30px;
        }
        
        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid var(--primary);
            margin-bottom: 20px;
        }
        
        .profile-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        .profile-role {
            display: inline-block;
            background: rgba(40, 167, 69, 0.1);
            color: var(--primary);
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 15px;
        }
        
        /* Profile Info */
        .profile-info-section {
            margin-bottom: 30px;
        }
        
        .info-item {
            display: flex;
            align-items: flex-start;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .info-icon i {
            color: var(--primary);
            font-size: 1.2rem;
        }
        
        .info-content h5 {
            margin: 0 0 5px;
            font-weight: 600;
            color: var(--dark);
        }
        
        .info-content p {
            margin: 0;
            color: #666;
            font-size: 0.95rem;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        
        .stat-icon i {
            font-size: 1.5rem;
            color: var(--primary);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
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
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary:hover {
            background: var(--primary-dark);
            color: white;
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
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Recent Orders */
        .orders-section {
            margin-top: 50px;
        }
        
        .order-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 10px;
            background: white;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        
        .order-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        
        .order-status {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-left: auto;
        }
        
        .status-success {
            background: rgba(40, 167, 69, 0.1);
            color: var(--success);
        }
        
        .status-warning {
            background: rgba(255, 193, 7, 0.1);
            color: var(--warning);
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
            .profile-container {
                padding: 80px 0 30px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .profile-name {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .profile-card {
                padding: 20px;
            }
            
            .profile-header h1 {
                font-size: 1.8rem;
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
                        <a class="nav-link" href="/order-history">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/pembeli/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pembeli/settings">Pengaturan</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a href="/menu" class="btn-order">
                            <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== PROFILE CONTENT ===== -->
    <section class="profile-container">
        <div class="container">
            <div class="profile-header">
                <h1><i class="fas fa-user-circle me-2"></i>Profile Saya</h1>
                <p>Informasi dan statistik akun Anda</p>
            </div>
            
            <div class="row">
                <!-- Left Column: Profile Info -->
                <div class="col-lg-8">
                    <div class="profile-card">
                        <div class="profile-avatar-section">
                            <img src="https://ui-avatars.com/api/?name=User&background=28a745&color=fff&size=150" 
                                 alt="Profile Avatar" 
                                 class="profile-avatar"
                                 id="profileAvatar">
                            <h2 class="profile-name" id="profileName">Nama Pengguna</h2>
                            <span class="profile-role" id="profileRole">Siswa</span>
                            <div class="mt-3">
                                <a href="/pembeli/profile/edit" class="btn-primary">
                                    <i class="fas fa-edit me-2"></i> Edit Profile
                                </a>
                                <a href="/pembeli/settings" class="btn-outline-primary ms-2">
                                    <i class="fas fa-cog me-2"></i> Pengaturan
                                </a>
                            </div>
                        </div>
                        
                        <div class="profile-info-section">
                            <h4 class="mb-4"><i class="fas fa-info-circle me-2"></i>Informasi Personal</h4>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Email</h5>
                                    <p id="profileEmail">email@example.com</p>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Telepon</h5>
                                    <p id="profilePhone">-</p>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Alamat</h5>
                                    <p id="profileAddress">-</p>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-school"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Kelas</h5>
                                    <p id="profileClass">-</p>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Bergabung Sejak</h5>
                                    <p id="profileJoinDate">-</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Orders -->
                    <div class="orders-section">
                        <h4 class="mb-4"><i class="fas fa-history me-2"></i>Pesanan Terakhir</h4>
                        <div id="recentOrders">
                            <!-- Orders will be loaded here -->
                            <div class="text-center py-5">
                                <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada pesanan</p>
                                <a href="/menu" class="btn-primary mt-3">
                                    <i class="fas fa-utensils me-2"></i> Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column: Stats -->
                <div class="col-lg-4">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="stat-number" id="totalOrders">0</div>
                            <div class="stat-label">Total Pesanan</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="stat-number" id="totalSpent">Rp 0</div>
                            <div class="stat-label">Total Pengeluaran</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="stat-number" id="avgRating">0.0</div>
                            <div class="stat-label">Rating Rata-rata</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stat-number" id="successRate">0%</div>
                            <div class="stat-label">Tingkat Keberhasilan</div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="profile-card mt-4">
                        <h5 class="mb-3"><i class="fas fa-bolt me-2"></i>Aksi Cepat</h5>
                        <div class="d-grid gap-2">
                            <a href="/menu" class="btn btn-outline-primary text-start">
                                <i class="fas fa-plus me-2"></i> Pesan Makanan Baru
                            </a>
                            <a href="/order-history" class="btn btn-outline-primary text-start">
                                <i class="fas fa-history me-2"></i> Lihat Riwayat Pesanan
                            </a>
                            <a href="/pembeli/settings/security" class="btn btn-outline-primary text-start">
                                <i class="fas fa-key me-2"></i> Ubah Password
                            </a>
                            <a href="#" class="btn btn-outline-danger text-start" onclick="logout()">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
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
                        <li><a href="/order-history">Pesanan</a></li>
                        <li><a href="/pembeli/profile">Profile</a></li>
                        <li><a href="/pembeli/settings">Pengaturan</a></li>
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
                <p>&copy; 2024 Kantin Sehat SMKN 1 Jakarta. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- ===== SCRIPTS ===== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Load user data
        document.addEventListener('DOMContentLoaded', function() {
            loadProfileData();
            loadStats();
            loadRecentOrders();
            
            // Set current year in footer
            const yearElement = document.querySelector('.copyright p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
            }
        });
        
        // Load profile data
        function loadProfileData() {
            const userData = JSON.parse(localStorage.getItem('kantinSehatUser') || '{}');
            
            if (userData) {
                // Update profile info
                document.getElementById('profileName').textContent = userData.name || 'Nama Pengguna';
                document.getElementById('profileRole').textContent = getRoleDisplay(userData.role);
                document.getElementById('profileEmail').textContent = userData.email || '-';
                document.getElementById('profilePhone').textContent = userData.phone || '-';
                document.getElementById('profileAddress').textContent = userData.address || '-';
                document.getElementById('profileClass').textContent = userData.class || '-';
                
                // Update avatar
                const avatar = document.getElementById('profileAvatar');
                if (userData.avatar) {
                    avatar.src = userData.avatar;
                } else if (userData.name) {
                    avatar.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.name)}&background=28a745&color=fff&size=150`;
                }
                
                // Update join date
                if (userData.createdAt) {
                    const joinDate = new Date(userData.createdAt).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    document.getElementById('profileJoinDate').textContent = joinDate;
                }
            }
        }
        
        // Load stats
        function loadStats() {
            const userData = JSON.parse(localStorage.getItem('kantinSehatUser') || '{}');
            const orders = JSON.parse(localStorage.getItem('kantinSehatOrders')) || [];
            
            // Filter user's orders
            const userOrders = orders.filter(order => order.customer && order.customer.email === userData.email);
            
            // Calculate stats
            const totalOrders = userOrders.length;
            const totalSpent = userOrders.reduce((total, order) => {
                return total + (order.items ? order.items.reduce((sum, item) => sum + (item.price * item.quantity), 0) : 0);
            }, 0);
            
            // Calculate success rate (completed orders)
            const completedOrders = userOrders.filter(order => order.status === 'completed' || order.status === 'success').length;
            const successRate = totalOrders > 0 ? Math.round((completedOrders / totalOrders) * 100) : 0;
            
            // Update stats
            document.getElementById('totalOrders').textContent = totalOrders;
            document.getElementById('totalSpent').textContent = `Rp ${totalSpent.toLocaleString('id-ID')}`;
            document.getElementById('successRate').textContent = `${successRate}%`;
            
            // Calculate average rating
            let totalRating = 0;
            let ratingCount = 0;
            
            userOrders.forEach(order => {
                if (order.rating) {
                    totalRating += order.rating;
                    ratingCount++;
                }
            });
            
            const avgRating = ratingCount > 0 ? (totalRating / ratingCount).toFixed(1) : '0.0';
            document.getElementById('avgRating').textContent = avgRating;
        }
        
        // Load recent orders
        function loadRecentOrders() {
            const userData = JSON.parse(localStorage.getItem('kantinSehatUser') || '{}');
            const orders = JSON.parse(localStorage.getItem('kantinSehatOrders')) || [];
            
            // Filter user's orders and sort by date (newest first)
            const userOrders = orders
                .filter(order => order.customer && order.customer.email === userData.email)
                .sort((a, b) => new Date(b.date || b.createdAt) - new Date(a.date || a.createdAt))
                .slice(0, 5); // Get only 5 most recent
            
            const ordersContainer = document.getElementById('recentOrders');
            
            if (userOrders.length === 0) {
                return; // Keep default message
            }
            
            let ordersHtml = '';
            
            userOrders.forEach(order => {
                // Calculate total
                const total = order.items ? order.items.reduce((sum, item) => sum + (item.price * item.quantity), 0) : 0;
                const date = new Date(order.date || order.createdAt).toLocaleDateString('id-ID');
                const status = getStatusDisplay(order.status);
                
                ordersHtml += `
                    <div class="order-item">
                        <div>
                            <h6 class="mb-1">${order.id || 'Pesanan'}</h6>
                            <small class="text-muted">${date} • ${order.items ? order.items.length : 0} item</small>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="fw-bold text-primary">Rp ${total.toLocaleString('id-ID')}</div>
                            <span class="order-status ${getStatusClass(order.status)}">${status}</span>
                        </div>
                    </div>
                `;
            });
            
            ordersContainer.innerHTML = ordersHtml;
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
        
        // Get status display
        function getStatusDisplay(status) {
            const statuses = {
                'pending': 'Menunggu',
                'processing': 'Diproses',
                'completed': 'Selesai',
                'cancelled': 'Dibatalkan',
                'success': 'Berhasil'
            };
            return statuses[status] || status || 'Menunggu';
        }
        
        // Get status class
        function getStatusClass(status) {
            const classes = {
                'pending': 'status-warning',
                'processing': 'status-warning',
                'completed': 'status-success',
                'success': 'status-success',
                'cancelled': 'status-danger'
            };
            return classes[status] || 'status-warning';
        }
        
        // Logout function
        function logout() {
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
                    localStorage.removeItem('kantinSehatUser');
                    window.location.href = '/login';
                }
            });
        }
    </script>
</body>
</html>