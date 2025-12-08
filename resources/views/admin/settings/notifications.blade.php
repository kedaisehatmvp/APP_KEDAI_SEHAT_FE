@extends('layouts.app')

@section('title', 'Pengaturan Notifikasi - Kantin Sehat')
@section('page-title', 'Pengaturan Notifikasi')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Pengaturan</a></li>
<li class="breadcrumb-item active">Notifikasi</li>
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
                <a href="{{ route('admin.settings.profile') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-user-circle me-2"></i> Profil Saya
                </a>
                <a href="{{ route('admin.settings.account') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-user-cog me-2"></i> Akun
                </a>
                <a href="{{ route('admin.settings.security') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-shield-alt me-2"></i> Keamanan
                </a>
                <a href="{{ route('admin.settings.notifications') }}" class="list-group-item list-group-item-action active">
                    <i class="fas fa-bell me-2"></i> Notifikasi
                </a>
                <a href="{{ route('admin.settings.restaurant') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-utensils me-2"></i> Kantin
                </a>
            </div>
        </div>
        
        <div class="card card-kantin">
            <div class="card-body">
                <h6 class="mb-3">Ringkasan Notifikasi</h6>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Total Notifikasi</span>
                        <span class="badge bg-primary">24</span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Belum Dibaca</span>
                        <span class="badge bg-warning">3</span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Hari Ini</span>
                        <span class="badge bg-success">5</span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>7 Hari Terakhir</span>
                        <span class="badge bg-info">12</span>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button class="btn btn-sm btn-outline-primary w-100">
                        <i class="fas fa-check-circle me-2"></i> Tandai Semua Dibaca
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Notifications Settings Content -->
    <div class="col-md-9">
        <!-- Notification Channels -->
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h5 class="mb-0">Saluran Notifikasi</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <i class="fas fa-bell text-primary fa-2x me-3"></i>
                                        <h6 class="mb-0 d-inline">Notifikasi Sistem</h6>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="systemNotifications" checked>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Notifikasi langsung di dashboard sistem</p>
                            </div>
                        </div>
                        
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <i class="fas fa-envelope text-success fa-2x me-3"></i>
                                        <h6 class="mb-0 d-inline">Email</h6>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Notifikasi dikirim ke email: admin@kantinsehat.com</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <i class="fas fa-sms text-info fa-2x me-3"></i>
                                        <h6 class="mb-0 d-inline">SMS</h6>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="smsNotifications">
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Notifikasi via SMS ke: 081234567890</p>
                                <small class="text-muted">*Biaya SMS berlaku</small>
                            </div>
                        </div>
                        
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <i class="fab fa-whatsapp text-success fa-2x me-3"></i>
                                        <h6 class="mb-0 d-inline">WhatsApp</h6>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="whatsappNotifications" checked>
                                    </div>
                                </div>
                                <p class="text-muted mb-0">Notifikasi via WhatsApp Business</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end mt-3">
                    <button type="button" class="btn btn-kantin">
                        <i class="fas fa-save me-2"></i> Simpan Pengaturan
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Notification Types -->
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h5 class="mb-0">Jenis Notifikasi</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="40%">Jenis Notifikasi</th>
                                <th>Sistem</th>
                                <th>Email</th>
                                <th>SMS</th>
                                <th>WhatsApp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fas fa-shopping-cart text-primary me-2"></i>
                                    Pesanan Baru
                                </td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-money-bill-wave text-success me-2"></i>
                                    Pembayaran Berhasil
                                </td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-box text-warning me-2"></i>
                                    Stok Hampir Habis
                                </td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-user-plus text-info me-2"></i>
                                    Pengguna Baru
                                </td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-chart-line text-danger me-2"></i>
                                    Laporan Harian
                                </td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                                    Peringatan Sistem
                                </td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-star text-warning me-2"></i>
                                    Ulasan & Rating Baru
                                </td>
                                <td><input type="checkbox" class="form-check-input" checked></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                                <td><input type="checkbox" class="form-check-input"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-check-square me-2"></i> Pilih Semua
                    </button>
                    <button class="btn btn-kantin">
                        <i class="fas fa-save me-2"></i> Simpan Jenis Notifikasi
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Notification Schedule -->
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h5 class="mb-0">Jadwal Notifikasi</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Laporan Harian</label>
                            <select class="form-control form-control-kantin">
                                <option value="" selected>Pilih Waktu</option>
                                <option value="08:00">08:00 Pagi</option>
                                <option value="12:00">12:00 Siang</option>
                                <option value="18:00">18:00 Sore</option>
                                <option value="22:00">22:00 Malam</option>
                            </select>
                            <small class="text-muted">Waktu pengiriman laporan harian</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Notifikasi Stok</label>
                            <select class="form-control form-control-kantin">
                                <option value="once" selected>Sekali per hari</option>
                                <option value="realtime">Realtime</option>
                                <option value="hourly">Setiap jam</option>
                                <option value="disabled">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jam Kerja Notifikasi</label>
                            <div class="row">
                                <div class="col">
                                    <input type="time" class="form-control form-control-kantin" value="08:00">
                                </div>
                                <div class="col-auto align-self-center">s/d</div>
                                <div class="col">
                                    <input type="time" class="form-control form-control-kantin" value="22:00">
                                </div>
                            </div>
                            <small class="text-muted">Notifikasi hanya aktif dalam jam kerja</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Hari Nonaktif</label>
                            <div class="d-flex flex-wrap gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sunday">
                                    <label class="form-check-label" for="sunday">Minggu</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="saturday">
                                    <label class="form-check-label" for="saturday">Sabtu</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="holiday">
                                    <label class="form-check-label" for="holiday">Libur Nasional</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-kantin">
                        <i class="fas fa-save me-2"></i> Simpan Jadwal
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Recent Notifications -->
        <div class="card card-kantin">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Notifikasi Terbaru</h5>
                <button class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-sync-alt me-2"></i> Refresh
                </button>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex align-items-center border-0 px-0">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1">Pesanan Baru #ORD124</h6>
                                <small class="text-muted">5 menit lalu</small>
                            </div>
                            <p class="mb-1">Pelanggan: Budi Santoso - Total: Rp 85.000</p>
                            <div class="mt-2">
                                <button class="btn btn-sm btn-outline-primary btn-sm">Lihat Pesanan</button>
                                <button class="btn btn-sm btn-outline-secondary btn-sm">Tandai Dibaca</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="list-group-item d-flex align-items-center border-0 px-0">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle bg-warning d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1">Stok Hampir Habis</h6>
                                <small class="text-muted">1 jam lalu</small>
                            </div>
                            <p class="mb-1">Produk "Salad Buah" tersisa 2 porsi</p>
                        </div>
                    </div>
                    
                    <div class="list-group-item d-flex align-items-center border-0 px-0">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle bg-success d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-check-circle text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1">Pembayaran Berhasil</h6>
                                <small class="text-muted">2 jam lalu</small>
                            </div>
                            <p class="mb-1">Pesanan #ORD123 telah dibayar via QRIS</p>
                        </div>
                    </div>
                    
                    <div class="list-group-item d-flex align-items-center border-0 px-0">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle bg-info d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px;">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1">Laporan Harian Siap</h6>
                                <small class="text-muted">Kemarin, 22:00</small>
                            </div>
                            <p class="mb-1">Laporan penjualan 15 November 2023</p>
                            <button class="btn btn-sm btn-outline-info btn-sm mt-2">Download</button>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-3">
                    <a href="#" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list me-2"></i> Lihat Semua Notifikasi
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection