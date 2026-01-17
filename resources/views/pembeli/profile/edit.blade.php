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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/edit-profile.css')}}">
</head>
<body>


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



    <!-- ===== SCRIPTS ===== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="{{ asset('js/edit-profile.js')}}"></script>
</body>
</html>