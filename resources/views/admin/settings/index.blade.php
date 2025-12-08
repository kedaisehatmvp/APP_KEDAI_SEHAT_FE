@extends('layouts.app')

@section('title', 'Pengaturan - Kantin Sehat')
@section('page-title', 'Pengaturan Sistem')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
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
                <a href="{{ route('admin.settings.profile') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.settings.profile') ? 'active' : '' }}">
                    <i class="fas fa-user-circle me-2"></i> Profil Saya
                </a>
                <a href="{{ route('admin.settings.account') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.settings.account') ? 'active' : '' }}">
                    <i class="fas fa-user-cog me-2"></i> Akun
                </a>
                <a href="{{ route('admin.settings.security') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.settings.security') ? 'active' : '' }}">
                    <i class="fas fa-shield-alt me-2"></i> Keamanan
                </a>
                <a href="{{ route('admin.settings.notifications') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.settings.notifications') ? 'active' : '' }}">
                    <i class="fas fa-bell me-2"></i> Notifikasi
                </a>
                <a href="{{ route('admin.settings.restaurant') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.settings.restaurant') ? 'active' : '' }}">
                    <i class="fas fa-utensils me-2"></i> Kantin
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-palette me-2"></i> Tampilan
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-language me-2"></i> Bahasa
                </a>
            </div>
        </div>
        
        <div class="card card-kantin">
            <div class="card-body text-center">
                <i class="fas fa-cogs fa-3x text-primary mb-3"></i>
                <h6>Versi Sistem</h6>
                <p class="mb-1"><strong>v1.5.2</strong></p>
                <small class="text-muted">Kantin Sehat Management</small>
                <div class="mt-3">
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-sync-alt me-1"></i> Cek Update
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Settings Content -->
    <div class="col-md-9">
        <div class="card card-kantin">
            <div class="card-header">
                <h5 class="mb-0">Ringkasan Pengaturan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center">
                                <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-user text-white fa-2x"></i>
                                </div>
                                <h5>Profil</h5>
                                <p class="text-muted">Kelola informasi profil Anda</p>
                                <a href="{{ route('admin.settings.profile') }}" class="btn btn-sm btn-outline-primary">
                                    Atur Profil
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center">
                                <div class="rounded-circle bg-success d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-shield-alt text-white fa-2x"></i>
                                </div>
                                <h5>Keamanan</h5>
                                <p class="text-muted">Password & keamanan akun</p>
                                <a href="{{ route('admin.settings.security') }}" class="btn btn-sm btn-outline-success">
                                    Atur Keamanan
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center">
                                <div class="rounded-circle bg-warning d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-utensils text-white fa-2x"></i>
                                </div>
                                <h5>Kantin</h5>
                                <p class="text-muted">Pengaturan kantin</p>
                                <a href="{{ route('admin.settings.restaurant') }}" class="btn btn-sm btn-outline-warning">
                                    Atur Kantin
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Settings -->
                <div class="mt-4">
                    <h5 class="mb-3">Pengaturan Cepat</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Mode Tampilan</label>
                                <div class="btn-group w-100" role="group">
                                    <button type="button" class="btn btn-outline-primary active">
                                        <i class="fas fa-sun me-2"></i> Terang
                                    </button>
                                    <button type="button" class="btn btn-outline-primary">
                                        <i class="fas fa-moon me-2"></i> Gelap
                                    </button>
                                    <button type="button" class="btn btn-outline-primary">
                                        <i class="fas fa-adjust me-2"></i> Otomatis
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Notifikasi Email</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                    <label class="form-check-label" for="emailNotifications">
                                        Aktifkan notifikasi email
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Bahasa</label>
                                <select class="form-control form-control-kantin">
                                    <option value="id" selected>Bahasa Indonesia</option>
                                    <option value="en">English</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Zona Waktu</label>
                                <select class="form-control form-control-kantin">
                                    <option value="Asia/Jakarta" selected>WIB (Jakarta)</option>
                                    <option value="Asia/Makassar">WITA (Makassar)</option>
                                    <option value="Asia/Jayapura">WIT (Jayapura)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- System Info -->
                <div class="mt-5 pt-4 border-top">
                    <h5 class="mb-3">Informasi Sistem</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <td><strong>Nama Sistem</strong></td>
                                    <td>Kantin Sehat Management</td>
                                </tr>
                                <tr>
                                    <td><strong>Versi</strong></td>
                                    <td>v1.5.2</td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Update</strong></td>
                                    <td>15 November 2023</td>
                                </tr>
                                <tr>
                                    <td><strong>Pengembang</strong></td>
                                    <td>Tim Kantin Sehat</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <td><strong>Total Pengguna</strong></td>
                                    <td>124 users</td>
                                </tr>
                                <tr>
                                    <td><strong>Total Produk</strong></td>
                                    <td>28 produk</td>
                                </tr>
                                <tr>
                                    <td><strong>Total Pesanan</strong></td>
                                    <td>1,245 transaksi</td>
                                </tr>
                                <tr>
                                    <td><strong>Status Server</strong></td>
                                    <td><span class="badge bg-success">Online</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="mt-4 pt-3 border-top">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-secondary">
                            <i class="fas fa-download me-2"></i> Backup Data
                        </button>
                        <div class="btn-group">
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-save me-2"></i> Simpan Semua
                            </button>
                            <button class="btn btn-kantin">
                                <i class="fas fa-redo me-2"></i> Reset Default
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection