@extends('layouts.app')

@section('title', 'Tambah Siswa Baru - Kantin Sehat')
@section('page-title', 'Tambah Siswa')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.siswa.index') }}">Data Siswa</a></li>
<li class="breadcrumb-item active">Tambah Siswa</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0 py-2">Tambah Data Siswa Baru</h5>
            </div>
            <div class="card-body">
                {{-- Form Handle via JavaScript untuk simulasi FE --}}
                <form id="createSiswaForm" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nis" class="form-label">NIS (Nomor Induk Siswa) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS siswa" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama_siswa" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan nama lengkap siswa" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
                                        <select class="form-select" id="kelas" name="kelas" required style="height: 41px;">
                                            <option value="" selected disabled>Pilih Kelas</option>
                                            <option value="X">Kelas 10</option>
                                            <option value="XI">Kelas 11</option>
                                            <option value="XII">Kelas 12</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jurusan" class="form-label">Jurusan <span class="text-danger">*</span></label>
                                        <select class="form-select" id="jurusan" name="jurusan" required style="height: 41px;">
                                            <option value="" selected disabled>Pilih Jurusan</option>
                                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                                            <option value="TKJ">Teknik Komputer Jaringan</option>
                                            <option value="TBSM">Teknik dan Bisnis Sepeda Motor</option>
                                            <option value="AKL">Akuntansi</option>
                                            <option value="MP">Manajemen Perkantoran</option>
                                            <option value="FKK">Farmasi Klinis dan Komunitas</option>
                                            <option value="JB">Jasa Boga</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama_ibu" class="form-label">Nama Ibu <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan nama ibu siswa" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama_ayah" class="form-label">Nama Ayah <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan nama ayah siswa" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir siswa" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tgl_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <div class="d-flex gap-3 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="g1" value="L" checked>
                                                <label class="form-check-label" for="g1">Laki-laki</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="g2" value="P">
                                                <label class="form-check-label" for="g2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="form-label d-block text-center">Foto Siswa</label>
                                <div class="card border-dashed p-3 text-center bg-light">
                                    <img id="photoPreview"
                                        src="https://ui-avatars.com/api/?name=Siswa&background=28a745&color=fff&size=200"
                                        class="rounded-circle mb-3 shadow-sm"
                                        style="width: 150px; height: 150px; object-fit: cover; margin: 0 auto;">
                                    <input type="file" class="form-control form-control-sm" id="photo" name="photo" accept="image/*">
                                    <small class="text-muted mt-2 d-block">JPG/PNG. Maksimal 1MB</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.siswa.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-success px-5" id="btnSave">
                            <i class="fas fa-save me-2"></i> Simpan Data Siswa
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
                <p class="text-muted mb-4">Data siswa baru telah berhasil didaftarkan ke dalam sistem Kantin Sehat.</p>
                <button type="button" class="btn btn-success px-5 py-2 shadow-sm" onclick="window.location.href='{{ route('admin.siswa.index') }}'">
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
        $('#createSiswaForm').on('submit', function(e) {
            e.preventDefault();
            const btn = $('#btnSave');
            
            btn.html('<span class="spinner-border spinner-border-sm me-2"></span> Memproses...').attr('disabled', true);

            // Kirim data via AJAX
            let formData = new FormData(this);
            
            $.ajax({
                url: "{{ route('admin.siswa.store') }}", // Pastikan route ini ada!
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.success) {
                        $('#successModal').modal('show');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                    btn.html('<i class="fas fa-save me-2"></i> Simpan Data Siswa').attr('disabled', false);
                }
            });
        });
    });
</script>
@endpush