@extends('layouts.app')

@section('title', 'Keamanan Akun - Kantin Sehat')
@section('page-title', 'Pengaturan Keamanan')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Pengaturan</a></li>
<li class="breadcrumb-item active">Keamanan Akun</li>
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
                <a href="{{ route('admin.settings.security') }}" class="list-group-item list-group-item-action active">
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
            <div class="card-body">
                <h6 class="mb-3">Status Keamanan</h6>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Kekuatan Akun</span>
                        <span>85%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 85%"></div>
                    </div>
                </div>
                <div class="mb-2">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    <span>Password kuat</span>
                </div>
                <div class="mb-2">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    <span>2FA aktif</span>
                </div>
                <div class="mb-2">
                    <i class="fas fa-times-circle text-warning me-2"></i>
                    <span>Belum verifikasi email</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Security Settings Content -->
    <div class="col-md-9">
        <!-- Change Password -->
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h5 class="mb-0">Ubah Password</h5>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Password Saat Ini <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-kantin" id="current_password" 
                                           name="current_password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Password Baru <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-kantin" id="new_password" 
                                           name="new_password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Minimal 8 karakter dengan huruf, angka, dan simbol</small>
                            </div>
                            
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-kantin" id="confirm_password" 
                                           name="confirm_password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body">
                                    <h6 class="mb-3">Tips Password Aman:</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            Minimal 8 karakter
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            Kombinasi huruf besar & kecil
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            Gunakan angka (0-9)
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            Tambahkan simbol (@#$%^&*)
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            Hindari informasi pribadi
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            Jangan gunakan password lama
                                        </li>
                                    </ul>
                                    
                                    <div class="mt-4">
                                        <h6>Kekuatan Password:</h6>
                                        <div class="progress mb-2" style="height: 10px;">
                                            <div class="progress-bar bg-danger" style="width: 30%" id="passwordStrengthBar"></div>
                                        </div>
                                        <small id="passwordStrengthText">Lemah</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-kantin">
                            <i class="fas fa-key me-2"></i> Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Two-Factor Authentication -->
        <div class="card card-kantin mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Two-Factor Authentication (2FA)</h5>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="2faToggle" checked style="width: 3em; height: 1.5em;">
                    <label class="form-check-label" for="2faToggle">Aktif</label>
                </div>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="text-success">
                            <i class="fas fa-check-circle me-2"></i>2FA Aktif
                        </h6>
                        <p class="mb-2">Two-factor authentication menambah lapisan keamanan ekstra pada akun Anda.</p>
                        <small class="text-muted">Terakhir digunakan: {{ date('d/m/Y H:i') }}</small>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-cog me-2"></i>Kelola 2FA
                        </button>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card border-0 bg-light">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt fa-2x text-primary mb-3"></i>
                                <h6>Aplikasi Authenticator</h6>
                                <small class="text-muted">Google Authenticator, Authy</small>
                                <div class="mt-3">
                                    <span class="badge bg-success">Aktif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card border-0 bg-light">
                            <div class="card-body text-center">
                                <i class="fas fa-sms fa-2x text-info mb-3"></i>
                                <h6>SMS</h6>
                                <small class="text-muted">Kode via SMS</small>
                                <div class="mt-3">
                                    <span class="badge bg-secondary">Nonaktif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card border-0 bg-light">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope fa-2x text-warning mb-3"></i>
                                <h6>Email</h6>
                                <small class="text-muted">Kode via Email</small>
                                <div class="mt-3">
                                    <span class="badge bg-secondary">Nonaktif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Session Management -->
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h5 class="mb-0">Sesi Aktif</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Device</th>
                                <th>Browser</th>
                                <th>IP Address</th>
                                <th>Lokasi</th>
                                <th>Terakhir Aktif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fas fa-laptop me-2"></i>Windows PC
                                </td>
                                <td>Chrome 118</td>
                                <td>192.168.1.100</td>
                                <td>Jakarta, Indonesia</td>
                                <td>Sekarang</td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-mobile-alt me-2"></i>iPhone 12
                                </td>
                                <td>Safari 16</td>
                                <td>192.168.1.101</td>
                                <td>Jakarta, Indonesia</td>
                                <td>2 jam lalu</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger">Logout</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-tablet-alt me-2"></i>iPad Pro
                                </td>
                                <td>Safari 15</td>
                                <td>103.10.100.50</td>
                                <td>Bandung, Indonesia</td>
                                <td>1 hari lalu</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger">Logout</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-outline-danger">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout Semua Sesi
                    </button>
                    <small class="text-muted">Total 3 sesi aktif</small>
                </div>
            </div>
        </div>
        
        <!-- Security Logs -->
        <div class="card card-kantin">
            <div class="card-header">
                <h5 class="mb-0">Log Keamanan</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                        <div>
                            <i class="fas fa-sign-in-alt text-success me-2"></i>
                            <span>Login berhasil</span>
                            <small class="text-muted d-block">Windows PC - Chrome</small>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">{{ date('d/m/Y H:i') }}</small>
                            <br>
                            <small>192.168.1.100</small>
                        </div>
                    </div>
                    
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                        <div>
                            <i class="fas fa-key text-warning me-2"></i>
                            <span>Password diubah</span>
                            <small class="text-muted d-block">Melalui pengaturan</small>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">15/11/2023 10:30</small>
                            <br>
                            <small>192.168.1.100</small>
                        </div>
                    </div>
                    
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                        <div>
                            <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                            <span>Percobaan login gagal</span>
                            <small class="text-muted d-block">Password salah</small>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">14/11/2023 22:15</small>
                            <br>
                            <small>103.10.100.50</small>
                        </div>
                    </div>
                    
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                        <div>
                            <i class="fas fa-user-check text-info me-2"></i>
                            <span>2FA diaktifkan</span>
                            <small class="text-muted d-block">Google Authenticator</small>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">10/11/2023 14:20</small>
                            <br>
                            <small>192.168.1.101</small>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-3">
                    <a href="#" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-history me-2"></i>Lihat Semua Log
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Toggle password visibility
        $('#toggleCurrentPassword').click(function() {
            const input = $('#current_password');
            const type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });
        
        $('#toggleNewPassword').click(function() {
            const input = $('#new_password');
            const type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });
        
        $('#toggleConfirmPassword').click(function() {
            const input = $('#confirm_password');
            const type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });
        
        // Password strength checker
        $('#new_password').on('input', function() {
            const password = $(this).val();
            let strength = 0;
            let text = 'Lemah';
            let color = 'bg-danger';
            let width = 30;
            
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            if (strength === 4) {
                text = 'Sangat Kuat';
                color = 'bg-success';
                width = 100;
            } else if (strength === 3) {
                text = 'Kuat';
                color = 'bg-info';
                width = 75;
            } else if (strength === 2) {
                text = 'Sedang';
                color = 'bg-warning';
                width = 50;
            }
            
            $('#passwordStrengthBar')
                .removeClass('bg-danger bg-warning bg-info bg-success')
                .addClass(color)
                .css('width', width + '%');
            $('#passwordStrengthText').text(text);
        });
        
        // 2FA toggle
        $('#2faToggle').change(function() {
            const isActive = $(this).is(':checked');
            if (isActive) {
                Swal.fire({
                    title: 'Aktifkan 2FA?',
                    text: 'Two-factor authentication akan diaktifkan untuk akun Anda.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'Ya, aktifkan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (!result.isConfirmed) {
                        $(this).prop('checked', false);
                    }
                });
            }
        });
    });
</script>
@endpush
@endsection