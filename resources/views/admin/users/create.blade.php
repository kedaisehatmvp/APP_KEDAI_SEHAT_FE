@extends('layouts.app')

@section('title', 'Tambah Pengguna Baru - Kantin Sehat')
@section('page-title', 'Tambah Pengguna')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Data Pengguna</a></li>
<li class="breadcrumb-item active">Tambah Pengguna</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0 py-2">Tambah Data Pengguna Baru</h5>
            </div>
            <div class="card-body">
                {{-- Form Handle via JavaScript untuk simulasi FE --}}
                <form id="createUserForm" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">No. Telepon</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="0812xxxx">
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
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 8 karakter" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="gender" name="gender" style="height: 41px;">
                                            <option value="male">Laki-laki</option>
                                            <option value="female">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="form-label d-block text-center">Foto Profil</label>
                                <div class="card border-dashed p-3 text-center bg-light">
                                    <img id="photoPreview"
                                        src="https://ui-avatars.com/api/?name=User&background=28a745&color=fff&size=200"
                                        class="rounded-circle mb-3 shadow-sm"
                                        style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto;">
                                    <input type="file" class="form-control form-control-sm" id="photo" name="photo" accept="image/*">
                                    <small class="text-muted mt-2 d-block">JPG/PNG. Maksimal 1MB</small>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Awal</label>
                                <div class="border rounded p-3 bg-white">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="s1" value="active" checked>
                                        <label class="form-check-label text-success" for="s1"><i class="fas fa-check-circle me-1"></i> Aktif</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="s2" value="pending">
                                        <label class="form-check-label text-warning" for="s2"><i class="fas fa-clock me-1"></i> Pending</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-success px-5" id="btnSave">
                            <i class="fas fa-save me-2"></i> Simpan Pengguna
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Success --}}
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-body text-center p-5">
                <div class="mb-4">
                    <i class="fas fa-check-circle text-success" style="font-size: 70px;"></i>
                </div>
                <h4 class="mb-3">Berhasil Ditambahkan!</h4>
                <p class="text-muted mb-4">User baru telah berhasil didaftarkan ke dalam sistem Kantin Sehat.</p>
                <button type="button" class="btn btn-success px-5 py-2 shadow-sm" onclick="window.location.href='{{ route('admin.users.index') }}'">
                    Kembali ke Daftar
                </button>
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
                reader.onload = function(e) {
                    $("#photoPreview").attr("src", e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle Submit
        $('#createUserForm').on('submit', function(e) {
            e.preventDefault();
            const btn = $('#btnSave');

            btn.html('<span class="spinner-border spinner-border-sm me-2"></span> Memproses...').attr('disabled', true);

            setTimeout(function() {
                $('#successModal').modal('show');
                btn.html('<i class="fas fa-save me-2"></i> Simpan Pengguna').attr('disabled', false);
            }, 1200);
        });
    });
</script>
@endpush