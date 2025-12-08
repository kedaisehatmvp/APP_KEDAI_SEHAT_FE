<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Kantin Sehat</title>
    
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
        
        /* ===== EDIT PROFILE CONTENT ===== */
        .edit-profile-container {
            padding: 100px 0 50px;
            min-height: calc(100vh - 200px);
        }
        
        .edit-profile-header {
            margin-bottom: 40px;
        }
        
        .edit-profile-header h1 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .edit-profile-header p {
            color: #666;
            font-size: 1.1rem;
        }
        
        /* Edit Profile Card */
        .edit-profile-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .back-link:hover {
            color: var(--primary-dark);
            transform: translateX(-5px);
        }
        
        .back-link i {
            margin-right: 8px;
        }
        
        /* Avatar Upload */
        .avatar-upload-section {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eee;
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
        
        .avatar-upload-label {
            color: var(--primary);
            cursor: pointer;
            font-weight: 500;
        }
        
        .avatar-upload-label:hover {
            text-decoration: underline;
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
            .edit-profile-container {
                padding: 80px 0 30px;
            }
            
            .edit-profile-card {
                padding: 20px;
            }
        }
        
        @media (max-width: 576px) {
            .edit-profile-header h1 {
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
                        <a class="nav-link" href="/order-history">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pembeli/profile">Profile</a>
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

    <!-- ===== EDIT PROFILE CONTENT ===== -->
    <section class="edit-profile-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="edit-profile-card">
                        <a href="/pembeli/profile" class="back-link">
                            <i class="fas fa-arrow-left"></i> Kembali ke Profile
                        </a>
                        
                        <div class="edit-profile-header">
                            <h1><i class="fas fa-user-edit me-2"></i>Edit Profile</h1>
                            <p>Perbarui informasi personal Anda</p>
                        </div>
                        
                        <!-- Avatar Upload -->
                        <div class="avatar-upload-section">
                            <div class="avatar-preview" onclick="document.getElementById('avatarInput').click()">
                                <img src="https://ui-avatars.com/api/?name=User&background=28a745&color=fff&size=150" 
                                     id="avatarPreview"
                                     alt="Profile Picture">
                                <div class="avatar-overlay">
                                    <i class="fas fa-camera fa-2x"></i>
                                </div>
                            </div>
                            <input type="file" id="avatarInput" accept="image/*" class="d-none" onchange="previewAvatar()">
                            <label for="avatarInput" class="avatar-upload-label">
                                <i class="fas fa-camera me-2"></i> Ubah Foto Profile
                            </label>
                            <p class="text-muted mt-2">Klik foto untuk upload (JPG/PNG, max 2MB)</p>
                        </div>
                        
                        <!-- Edit Form -->
                        <form id="editProfileForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName" class="form-label">Nama Depan *</label>
                                        <input type="text" id="firstName" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName" class="form-label">Nama Belakang *</label>
                                        <input type="text" id="lastName" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label">Email *</label>
                                <div class="input-group">
                                    <span class="input-group-text">@</span>
                                    <input type="email" id="email" class="form-control" required>
                                </div>
                                <small class="text-muted">Email digunakan untuk login dan notifikasi</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text">+62</span>
                                    <input type="tel" id="phone" class="form-control" placeholder="81234567890">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea id="address" class="form-control" rows="3" placeholder="Alamat lengkap"></textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birthDate" class="form-label">Tanggal Lahir</label>
                                        <input type="date" id="birthDate" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select id="gender" class="form-select">
                                            <option value="">Pilih</option>
                                            <option value="male">Laki-laki</option>
                                            <option value="female">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class" class="form-label">Kelas</label>
                                        <select id="class" class="form-select">
                                            <option value="">Pilih Kelas</option>
                                            <option value="X">X (Sepuluh)</option>
                                            <option value="XI">XI (Sebelas)</option>
                                            <option value="XII">XII (Dua Belas)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="major" class="form-label">Jurusan</label>
                                        <input type="text" id="major" class="form-control" placeholder="Contoh: TKJ, RPL, MM">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="bio" class="form-label">Bio Singkat</label>
                                <textarea id="bio" class="form-control" rows="3" placeholder="Ceritakan sedikit tentang diri Anda" maxlength="150"></textarea>
                                <small class="text-muted">Maksimal 150 karakter</small>
                            </div>
                            
                            <div class="d-flex justify-content-between gap-2 mt-4">
                                <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/pembeli/profile'">
                                    <i class="fas fa-times me-2"></i> Batal
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
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
            loadUserData();
            
            // Set current year in footer
            const yearElement = document.querySelector('.copyright p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
            }
            
            // Form submission
            document.getElementById('editProfileForm').addEventListener('submit', function(e) {
                e.preventDefault();
                saveProfile();
            });
        });
        
        // Load user data into form
        function loadUserData() {
            const userData = JSON.parse(localStorage.getItem('kantinSehatUser') || '{}');
            
            if (userData) {
                // Split name into first and last
                const nameParts = (userData.name || '').split(' ');
                document.getElementById('firstName').value = nameParts[0] || '';
                document.getElementById('lastName').value = nameParts.slice(1).join(' ') || '';
                
                // Fill other fields
                document.getElementById('email').value = userData.email || '';
                document.getElementById('phone').value = userData.phone || '';
                document.getElementById('address').value = userData.address || '';
                document.getElementById('birthDate').value = userData.birthDate || '';
                document.getElementById('gender').value = userData.gender || '';
                document.getElementById('class').value = userData.class || '';
                document.getElementById('major').value = userData.major || '';
                document.getElementById('bio').value = userData.bio || '';
                
                // Set avatar preview
                const avatarPreview = document.getElementById('avatarPreview');
                if (userData.avatar) {
                    avatarPreview.src = userData.avatar;
                } else if (userData.name) {
                    avatarPreview.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.name)}&background=28a745&color=fff&size=150`;
                }
            }
        }
        
        // Preview avatar
        function previewAvatar() {
            const input = document.getElementById('avatarInput');
            const preview = document.getElementById('avatarPreview');
            
            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Validate file size (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    Swal.fire({
                        title: 'File Terlalu Besar',
                        text: 'Ukuran file maksimal 2MB',
                        icon: 'error'
                    });
                    return;
                }
                
                // Validate file type
                if (!file.type.match('image.*')) {
                    Swal.fire({
                        title: 'Format Tidak Didukung',
                        text: 'Hanya file gambar yang diperbolehkan',
                        icon: 'error'
                    });
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                
                reader.readAsDataURL(file);
            }
        }
        
        // Save profile
        function saveProfile() {
            // Collect form data
            const firstName = document.getElementById('firstName').value.trim();
            const lastName = document.getElementById('lastName').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const address = document.getElementById('address').value.trim();
            const birthDate = document.getElementById('birthDate').value;
            const gender = document.getElementById('gender').value;
            const userClass = document.getElementById('class').value;
            const major = document.getElementById('major').value.trim();
            const bio = document.getElementById('bio').value.trim();
            
            // Validation
            if (!firstName || !lastName) {
                Swal.fire({
                    title: 'Perhatian',
                    text: 'Nama depan dan belakang harus diisi',
                    icon: 'warning'
                });
                return;
            }
            
            if (!email) {
                Swal.fire({
                    title: 'Perhatian',
                    text: 'Email harus diisi',
                    icon: 'warning'
                });
                return;
            }
            
            // Get existing user data
            const userData = JSON.parse(localStorage.getItem('kantinSehatUser') || '{}');
            
            // Update user data
            const updatedUser = {
                ...userData,
                name: `${firstName} ${lastName}`.trim(),
                email: email,
                phone: phone,
                address: address,
                birthDate: birthDate,
                gender: gender,
                class: userClass,
                major: major,
                bio: bio,
                updatedAt: new Date().toISOString()
            };
            
            // Update avatar if changed
            const avatarInput = document.getElementById('avatarInput');
            if (avatarInput.files && avatarInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    updatedUser.avatar = e.target.result;
                    saveToStorage(updatedUser);
                };
                reader.readAsDataURL(avatarInput.files[0]);
            } else {
                saveToStorage(updatedUser);
            }
        }
        
        // Save to storage and redirect
        function saveToStorage(userData) {
            // Save to localStorage
            localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            
            // Show success message
            Swal.fire({
                title: 'Berhasil!',
                text: 'Profile berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                // Redirect to profile page
                window.location.href = '/pembeli/profile';
            });
        }
    </script>
</body>
</html>