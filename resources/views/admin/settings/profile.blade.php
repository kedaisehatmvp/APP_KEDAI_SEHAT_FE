@extends('layouts.app')

@section('title', 'Profil Saya - Kantin Sehat')
@section('page-title', 'Pengaturan Profil')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Pengaturan</a></li>
<li class="breadcrumb-item active">Profil Saya</li>
@endsection

@section('content')
<div class="row">
    <!-- Sidebar Settings Menu -->
    <div class="col-md-3">
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h6 class="mb-0">Menu Pengaturan</h6>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.settings.profile') }}" class="list-group-item list-group-item-action active">
                    <i class="fas fa-user-circle me-2"></i> Profil Saya
                </a>
                <a href="{{ route('admin.settings.account') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-user-cog me-2"></i> Akun
                </a>
                <a href="{{ route('admin.settings.security') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-shield-alt me-2"></i> Keamanan
                </a>
                <a href="{{ route('admin.settings.notifications') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-bell me-2"></i> Notifikasi
                </a>
                <a href="{{ route('admin.settings.restaurant') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-utensils me-2"></i> Kantin
                </a>
            </div>
        </div>
        
        <div class="card card-kantin">
            <div class="card-body text-center">
                <img src="https://ui-avatars.com/api/?name=Admin+Kantin&background=28a745&color=fff&size=150" 
                     class="rounded-circle border border-3 border-primary mb-3" 
                     alt="Profile Photo"
                     style="width: 100px; height: 100px; object-fit: cover;">
                <h6 class="mb-1">Admin Kantin</h6>
                <p class="text-muted mb-0">Administrator</p>
                <small class="text-muted">Bergabung: Jan 2023</small>
            </div>
        </div>
    </div>
    
    <!-- Profile Settings Form -->
    <div class="col-md-9">
        <div class="card card-kantin">
            <div class="card-header">
                <h5 class="mb-0">Informasi Profil</h5>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">Nama Depan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-kantin" id="first_name" name="first_name" 
                                               value="Admin" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Nama Belakang</label>
                                        <input type="text" class="form-control form-control-kantin" id="last_name" name="last_name" 
                                               value="Kantin">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-kantin" id="email" name="email" 
                                       value="admin@kantinsehat.com" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control form-control-kantin" id="phone" name="phone" 
                                       value="081234567890">
                            </div>
                            
                            <div class="mb-3">
                                <label for="position" class="form-label">Posisi/Jabatan</label>
                                <input type="text" class="form-control form-control-kantin" id="position" name="position" 
                                       value="Administrator Kantin">
                            </div>
                            
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio/Deskripsi</label>
                                <textarea class="form-control form-control-kantin" id="bio" name="bio" rows="4" 
                                          placeholder="Deskripsi singkat tentang Anda...">Administrator di Kantin Sehat dengan pengalaman 2 tahun dalam manajemen operasional dan pengelolaan sistem.</textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto Profil</label>
                                <div class="card border-dashed p-3 text-center">
                                    <img id="photoPreview" src="https://ui-avatars.com/api/?name=Admin+Kantin&background=28a745&color=fff&size=300" 
                                         class="img-fluid rounded-circle mb-3" alt="Preview" 
                                         style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto;">
                                    <input type="file" class="form-control form-control-kantin image-preview" 
                                           id="photo" name="photo" accept="image/*"
                                           data-preview="#photoPreview">
                                    <small class="text-muted d-block mt-2">Format: JPG, PNG. Max: 2MB</small>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-control form-control-kantin" name="gender">
                                    <option value="">Pilih</option>
                                    <option value="male" selected>Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control form-control-kantin" id="birth_date" name="birth_date" 
                                       value="1990-05-15">
                            </div>
                            
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" class="form-control form-control-kantin" id="website" name="website" 
                                       placeholder="https://">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control form-control-kantin" id="address" name="address" rows="3">Jl. Sehat No. 123, Jakarta Pusat</textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">Kota</label>
                                <input type="text" class="form-control form-control-kantin" id="city" name="city" 
                                       value="Jakarta Pusat">
                            </div>
                            
                            <div class="mb-3">
                                <label for="postal_code" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control form-control-kantin" id="postal_code" name="postal_code" 
                                       value="10110">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="mt-4">
                        <h5 class="mb-3">Media Sosial</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fab fa-facebook-f"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Facebook username" value="kantinsehat">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-info text-white">
                                        <i class="fab fa-twitter"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Twitter username" value="@kantinsehat">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d); color: white;">
                                        <i class="fab fa-instagram"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Instagram username" value="@kantin_sehat">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="fab fa-whatsapp"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="WhatsApp number" value="081234567890">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                        <div>
                            <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Kembali
                            </a>
                        </div>
                        
                        <div class="btn-group">
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-redo me-2"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-kantin">
                                <i class="fas fa-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Profile Statistics -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card card-kantin">
                    <div class="card-body text-center">
                        <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-calendar-alt text-white fa-2x"></i>
                        </div>
                        <h4 class="mb-1">24 Bulan</h4>
                        <p class="text-muted mb-0">Bergabung</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card card-kantin">
                    <div class="card-body text-center">
                        <div class="rounded-circle bg-success d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-chart-line text-white fa-2x"></i>
                        </div>
                        <h4 class="mb-1">1,245</h4>
                        <p class="text-muted mb-0">Pesanan Dikelola</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card card-kantin">
                    <div class="card-body text-center">
                        <div class="rounded-circle bg-warning d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-clock text-white fa-2x"></i>
                        </div>
                        <h4 class="mb-1">142 Hari</h4>
                        <p class="text-muted mb-0">Aktif Terakhir</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection