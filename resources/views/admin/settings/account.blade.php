@extends('layouts.app')

@section('title', 'Pengaturan Akun - Kantin Sehat')
@section('page-title', 'Pengaturan Akun')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Pengaturan</a></li>
<li class="breadcrumb-item active">Akun</li>
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
                <a href="{{ route('admin.settings.account') }}" class="list-group-item list-group-item-action active">
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
            <div class="card-body">
                <h6 class="mb-3">Status Akun</h6>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Verifikasi Akun</span>
                        <span class="text-success">✓</span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Role</span>
                        <span class="badge bg-danger">Admin</span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Bergabung</span>
                        <span>15 Jan 2023</span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Terakhir Login</span>
                        <span>{{ date('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Account Settings Content -->
    <div class="col-md-9">
        <!-- Account Information -->
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h5 class="mb-0">Informasi Akun</h5>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-kantin" id="username" name="username" 
                                       value="admin_kantin" required>
                                <small class="text-muted">Username untuk login sistem</small>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Utama <span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-kantin" id="email" name="email" 
                                       value="admin@kantinsehat.com" required>
                                <small class="text-muted">Email untuk notifikasi dan reset password</small>
                            </div>
                            
                            <div class="mb-3">
                                <label for="secondary_email" class="form-label">Email Alternatif</label>
                                <input type="email" class="form-control form-control-kantin" id="secondary_email" name="secondary_email" 
                                       placeholder="email@alternatif.com">
                                <small class="text-muted">Email cadangan (opsional)</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="account_type" class="form-label">Tipe Akun</label>
                                <select class="form-control form-control-kantin" id="account_type" name="account_type" disabled>
                                    <option value="admin" selected>Administrator</option>
                                    <option value="staff">Staff</option>
                                    <option value="customer">Pelanggan</option>
                                </select>
                                <small class="text-muted">Tipe akun tidak dapat diubah</small>
                            </div>
                            
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Akun</label>
                                <select class="form-control form-control-kantin" id="status" name="status">
                                    <option value="active" selected>Aktif</option>
                                    <option value="inactive">Nonaktif</option>
                                    <option value="suspended">Ditangguhkan</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="timezone" class="form-label">Zona Waktu</label>
                                <select class="form-control form-control-kantin" id="timezone" name="timezone">
                                    <option value="Asia/Jakarta" selected>WIB (Jakarta)</option>
                                    <option value="Asia/Makassar">WITA (Makassar)</option>
                                    <option value="Asia/Jayapura">WIT (Jayapura)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-kantin">
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Account Preferences -->
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h5 class="mb-0">Preferensi Akun</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Bahasa</label>
                            <select class="form-control form-control-kantin">
                                <option value="id" selected>Bahasa Indonesia</option>
                                <option value="en">English</option>
                                <option value="ja">日本語</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Format Tanggal</label>
                            <select class="form-control form-control-kantin">
                                <option value="d/m/Y" selected>DD/MM/YYYY</option>
                                <option value="m/d/Y">MM/DD/YYYY</option>
                                <option value="Y-m-d">YYYY-MM-DD</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Format Waktu</label>
                            <select class="form-control form-control-kantin">
                                <option value="24" selected>24 jam (14:30)</option>
                                <option value="12">12 jam (2:30 PM)</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Mata Uang</label>
                            <select class="form-control form-control-kantin">
                                <option value="IDR" selected>Rupiah (Rp)</option>
                                <option value="USD">US Dollar ($)</option>
                                <option value="EUR">Euro (€)</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Tampilan Data</label>
                            <select class="form-control form-control-kantin">
                                <option value="10" selected>10 items per halaman</option>
                                <option value="25">25 items per halaman</option>
                                <option value="50">50 items per halaman</option>
                                <option value="100">100 items per halaman</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Theme</label>
                            <select class="form-control form-control-kantin">
                                <option value="light" selected>Light Mode</option>
                                <option value="dark">Dark Mode</option>
                                <option value="auto">Auto (ikuti sistem)</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-kantin">
                        <i class="fas fa-save me-2"></i> Simpan Preferensi
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Account Actions -->
        <div class="card card-kantin">
            <div class="card-header">
                <h5 class="mb-0">Tindakan Akun</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body">
                                <h6 class="mb-3">
                                    <i class="fas fa-file-export text-primary me-2"></i>
                                    Ekspor Data
                                </h6>
                                <p class="text-muted">Ekspor semua data akun Anda dalam format JSON atau CSV.</p>
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-file-csv me-1"></i> CSV
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-file-code me-1"></i> JSON
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-file-pdf me-1"></i> PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="mb-3">
                                    <i class="fas fa-ban text-danger me-2"></i>
                                    Nonaktifkan Akun Sementara
                                </h6>
                                <p class="text-muted">Akun Anda akan dinonaktifkan sementara dan tidak dapat diakses.</p>
                                <button class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-pause me-1"></i> Nonaktifkan Sementara
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body">
                                <h6 class="mb-3">
                                    <i class="fas fa-trash-alt text-danger me-2"></i>
                                    Hapus Akun
                                </h6>
                                <p class="text-muted">
                                    <strong class="text-danger">Peringatan:</strong> Tindakan ini tidak dapat dibatalkan. 
                                    Semua data akun akan dihapus permanen.
                                </p>
                                <button class="btn btn-danger btn-sm" id="deleteAccountBtn">
                                    <i class="fas fa-trash me-1"></i> Hapus Akun Permanen
                                </button>
                            </div>
                        </div>
                        
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="mb-3">
                                    <i class="fas fa-user-plus text-success me-2"></i>
                                    Undang Pengguna Baru
                                </h6>
                                <p class="text-muted">Undang pengguna baru untuk bergabung dengan sistem Kantin Sehat.</p>
                                <button class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-envelope me-1"></i> Kirim Undangan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Penghapusan Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>PERINGATAN: Tindakan ini tidak dapat dibatalkan!</strong>
                </div>
                
                <p>Apakah Anda yakin ingin menghapus akun ini secara permanen?</p>
                
                <div class="mb-3">
                    <strong>Dampak penghapusan akun:</strong>
                    <ul class="mt-2">
                        <li>Semua data profil akan dihapus</li>
                        <li>Semua riwayat aktivitas akan hilang</li>
                        <li>Tidak dapat mengakses sistem lagi</li>
                        <li>Data tidak dapat dipulihkan</li>
                    </ul>
                </div>
                
                <div class="mb-3">
                    <label for="confirmDelete" class="form-label">
                        Ketik "HAPUS" untuk mengonfirmasi
                    </label>
                    <input type="text" class="form-control" id="confirmDelete" 
                           placeholder="HAPUS">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn" disabled>
                    <i class="fas fa-trash me-2"></i> Hapus Akun Permanen
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Delete account confirmation
        $('#deleteAccountBtn').click(function() {
            $('#deleteAccountModal').modal('show');
        });
        
        // Enable delete button only when "HAPUS" is typed
        $('#confirmDelete').on('input', function() {
            const confirmBtn = $('#confirmDeleteBtn');
            if ($(this).val() === 'HAPUS') {
                confirmBtn.prop('disabled', false);
            } else {
                confirmBtn.prop('disabled', true);
            }
        });
        
        // Confirm delete
        $('#confirmDeleteBtn').click(function() {
            Swal.fire({
                title: 'Akun Berhasil Dihapus',
                text: 'Akun Anda telah berhasil dihapus dari sistem.',
                icon: 'success',
                confirmButtonColor: '#28a745',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '/';
            });
        });
    });
</script>
@endpush
@endsection