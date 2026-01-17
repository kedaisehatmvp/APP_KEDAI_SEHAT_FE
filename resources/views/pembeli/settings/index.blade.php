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
    
    <link rel="stylesheet" href="{{ asset('css/settings.css')}}">
</head>
<body>


    <!-- ===== SETTINGS CONTENT ===== -->
    <section class="settings-container">
        <div class="container">
            <div class="settings-header">
                    <a href="/pembeli/profile" class="back-link">
                        <i class="fas fa-arrow-left"></i> Kembali ke Profile
                    </a>
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

   

    <!-- ===== SCRIPTS ===== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="{{ asset('js/settings.js')}}"></script>
</body>
</html>