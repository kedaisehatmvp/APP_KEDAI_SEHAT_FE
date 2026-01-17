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
    
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>

    
    <!-- ===== NAVBAR ===== -->
    

    <!-- ===== PROFILE CONTENT ===== -->
    <section class="profile-container">
        <div class="container">
            <div class="profile-header">
                <a href="/pembeli/profile" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali ke Profile
                </a>
                <h1><i class="fas fa-user-circle "></i>Profile Saya</h1>
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
                                <a href="/pembeli/settings" class="btn-outline-primary mt-2">
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



    <!-- ===== SCRIPTS ===== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>