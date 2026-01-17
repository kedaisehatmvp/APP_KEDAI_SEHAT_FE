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
                <h5 class="mb-0">Edit Data Pengguna #{{ $user->id ?? $id ?? '' }}</h5>
            </div>
            <div class="card-body">
                {{-- PERBAIKAN PADA ACTION FORM --}}
                <form action="{{ route('admin.users.update', $user->id ?? $id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    id="editUserForm">
                    @csrf
                    @method('PUT') {{-- Laravel tetap butuh ini untuk update --}}

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $user->name ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $user->email ?? '') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">No. Telepon</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ old('phone', $user->phone ?? '') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                        <select class="form-select" id="role" name="role" required style="height: 41px;">
                                            <option value="" selected disabled>Pilih Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="kasir">Kasir</option>
                                            <option value="koki">Koki</option>
                                            <option value="pelanggan">Pelanggan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password Baru</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Kosongkan jika tidak diubah">
                                        <small class="text-muted">Minimal 8 karakter</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Ulangi password baru">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="gender" name="gender" style="height: 38px;">
                                            <option value="">Pilih</option>
                                            <option value="male" {{ (isset($user) && $user->gender == 'male') ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="female" {{ (isset($user) && $user->gender == 'female') ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto Profil</label>
                                <div class="card border-dashed p-3 text-center">
                                    <img id="photoPreview" src="{{ $user && $user->photo ? asset('storage/'.$user->photo) : 'https://ui-avatars.com/api/?name='.urlencode($user->name ?? 'User').'&background=28a745&color=fff&size=200' }}"
                                        class="img-fluid rounded-circle mb-3" alt="Preview"
                                        style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto;">
                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                    <small class="text-muted d-block mt-2">Format: JPG, PNG. Max: 1MB</small>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Akun</label>
                                <div class="border rounded p-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="active" {{ ($user->status ?? 'active') == 'active' ? 'checked' : '' }}>
                                        <label class="form-check-label text-success" for="status_active">
                                            <i class="fas fa-check-circle me-1"></i> Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="inactive" {{ ($user->status ?? '') == 'inactive' ? 'checked' : '' }}>
                                        <label class="form-check-label text-secondary" for="status_inactive">
                                            <i class="fas fa-times-circle me-1"></i> Nonaktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_suspended" value="suspended" {{ ($user->status ?? '') == 'suspended' ? 'checked' : '' }}>
                                        <label class="form-check-label text-danger" for="status_suspended">
                                            <i class="fas fa-ban me-1"></i> Ditangguhkan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-danger btn-delete" data-id="{{ $user->id ?? 1 }}">
                            <i class="fas fa-trash me-2"></i> Hapus Pengguna
                        </button>

                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Batal</a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Konfirmasi Hapus --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" action="#" method="POST">
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
        // Preview Foto
        $("#photo").change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#photoPreview").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Delete Button Logic
        $('.btn-delete').click(function() {
            const id = $(this).data('id');
            // Pastikan URL delete juga benar
            $('#deleteForm').attr('action', '/admin/users/' + id);
            $('#deleteModal').modal('show');
        });
    });
</script>
@endpush