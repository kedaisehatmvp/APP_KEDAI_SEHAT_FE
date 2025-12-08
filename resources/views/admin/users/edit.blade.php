@extends('layouts.app')

@section('title', 'Edit Pengguna - Kantin Sehat')
@section('page-title', 'Edit Pengguna')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Data Pengguna</a></li>
<li class="breadcrumb-item active">Edit Pengguna</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin">
            <div class="card-header">
                <h5 class="mb-0">Edit Data Pengguna #{{ $id ?? 'USR001' }}</h5>
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
                                        <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-kantin" id="name" name="name" 
                                               value="Ahmad Budiman" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control form-control-kantin" id="email" name="email" 
                                               value="ahmad@kantinsehat.com" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">No. Telepon</label>
                                        <input type="text" class="form-control form-control-kantin" id="phone" name="phone" 
                                               value="081234567890">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                        <select class="form-control form-control-kantin select2" id="role" name="role" required>
                                            <option value="">Pilih Role</option>
                                            <option value="admin" selected>Admin</option>
                                            <option value="kasir">Kasir</option>
                                            <option value="koki">Koki</option>
                                            <option value="pelanggan">Pelanggan</option>
                                            <option value="supplier">Supplier</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password Baru</label>
                                        <input type="password" class="form-control form-control-kantin" id="password" name="password" 
                                               placeholder="Kosongkan jika tidak diubah">
                                        <small class="text-muted">Minimal 8 karakter</small>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control form-control-kantin" id="password_confirmation" 
                                               name="password_confirmation" placeholder="Ulangi password baru">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control form-control-kantin" id="address" name="address" 
                                          rows="3">Jl. Sehat No. 123, Jakarta Pusat</textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control form-control-kantin" id="birth_date" name="birth_date" 
                                               value="1990-05-15">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="form-control form-control-kantin" id="gender" name="gender">
                                            <option value="">Pilih</option>
                                            <option value="male" selected>Laki-laki</option>
                                            <option value="female">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto Profil</label>
                                <div class="card border-dashed p-3 text-center">
                                    <img id="photoPreview" src="https://ui-avatars.com/api/?name=Ahmad+Budiman&background=28a745&color=fff&size=200" 
                                         class="img-fluid rounded-circle mb-3" alt="Preview" 
                                         style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto;">
                                    <input type="file" class="form-control form-control-kantin image-preview" 
                                           id="photo" name="photo" accept="image/*"
                                           data-preview="#photoPreview">
                                    <small class="text-muted d-block mt-2">Format: JPG, PNG. Max: 1MB</small>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Status Akun</label>
                                <div class="border rounded p-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="active" checked>
                                        <label class="form-check-label text-success" for="status_active">
                                            <i class="fas fa-check-circle me-1"></i> Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="inactive">
                                        <label class="form-check-label text-secondary" for="status_inactive">
                                            <i class="fas fa-times-circle me-1"></i> Nonaktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_suspended" value="suspended">
                                        <label class="form-check-label text-danger" for="status_suspended">
                                            <i class="fas fa-ban me-1"></i> Ditangguhkan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Izin Akses</label>
                                <div class="border rounded p-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="permission_products" name="permissions[]" value="products" checked>
                                        <label class="form-check-label" for="permission_products">
                                            <i class="fas fa-utensils me-1"></i> Manajemen Produk
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="permission_orders" name="permissions[]" value="orders" checked>
                                        <label class="form-check-label" for="permission_orders">
                                            <i class="fas fa-shopping-cart me-1"></i> Manajemen Pesanan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="permission_users" name="permissions[]" value="users">
                                        <label class="form-check-label" for="permission_users">
                                            <i class="fas fa-users me-1"></i> Manajemen Pengguna
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="permission_reports" name="permissions[]" value="reports">
                                        <label class="form-check-label" for="permission_reports">
                                            <i class="fas fa-chart-bar me-1"></i> Laporan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="permission_settings" name="permissions[]" value="settings">
                                        <label class="form-check-label" for="permission_settings">
                                            <i class="fas fa-cog me-1"></i> Pengaturan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="join_date" class="form-label">Tanggal Bergabung</label>
                                <input type="date" class="form-control form-control-kantin" id="join_date" name="join_date" 
                                       value="2023-01-15" readonly>
                            </div>
                            
                            <div class="mb-3">
                                <label for="last_login" class="form-label">Login Terakhir</label>
                                <input type="text" class="form-control form-control-kantin" id="last_login" 
                                       value="{{ date('d/m/Y H:i') }}" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <div>
                            <button type="button" class="btn btn-danger btn-delete" data-id="{{ $id ?? 1 }}">
                                <i class="fas fa-trash me-2"></i> Hapus Pengguna
                            </button>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-kantin-outline">
                                <i class="fas fa-arrow-left me-2"></i> Kembali
                            </a>
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
    </div>
</div>

<!-- User Stats -->
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card card-kantin">
            <div class="card-body text-center">
                <div class="mb-3">
                    <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-shopping-cart fa-2x text-white"></i>
                    </div>
                </div>
                <h4 class="mb-1">124</h4>
                <p class="text-muted mb-0">Total Pesanan</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card card-kantin">
            <div class="card-body text-center">
                <div class="mb-3">
                    <div class="rounded-circle bg-success d-inline-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-money-bill-wave fa-2x text-white"></i>
                    </div>
                </div>
                <h4 class="mb-1">Rp 8.5JT</h4>
                <p class="text-muted mb-0">Total Pengeluaran</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card card-kantin">
            <div class="card-body text-center">
                <div class="mb-3">
                    <div class="rounded-circle bg-warning d-inline-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-star fa-2x text-white"></i>
                    </div>
                </div>
                <h4 class="mb-1">4.8</h4>
                <p class="text-muted mb-0">Rating Pengguna</p>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                <p class="text-danger"><strong>Data pengguna yang dihapus tidak dapat dikembalikan!</strong></p>
                <p><strong>Catatan:</strong> Semua data terkait pengguna ini akan terpengaruh.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" action="#" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Handle delete button click
        $('.btn-delete').click(function() {
            const id = $(this).data('id');
            $('#deleteForm').attr('action', '/admin/users/' + id);
            $('#deleteModal').modal('show');
        });
        
        // Role-based permission toggle
        $('#role').change(function() {
            const role = $(this).val();
            
            // Reset all permissions
            $('input[name="permissions[]"]').prop('checked', false);
            
            // Set permissions based on role
            switch(role) {
                case 'admin':
                    $('input[name="permissions[]"]').prop('checked', true);
                    break;
                case 'kasir':
                    $('#permission_orders').prop('checked', true);
                    $('#permission_reports').prop('checked', true);
                    break;
                case 'koki':
                    $('#permission_products').prop('checked', true);
                    break;
                case 'pelanggan':
                    // No permissions for customers
                    break;
                case 'supplier':
                    $('#permission_products').prop('checked', true);
                    break;
            }
        });
    });
</script>
@endpush