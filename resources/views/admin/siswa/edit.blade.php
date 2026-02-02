@extends('layouts.app')

@section('title', 'Edit Siswa - Kantin Sehat')
@section('page-title', 'Edit Siswa')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('/admin/siswa') }}">Data Siswa</a></li>
<li class="breadcrumb-item active">Edit Siswa</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Edit Data Siswa {{ $siswa->nama_siswa }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nis" class="form-label">NIS (Nomor Induk Siswa) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-kantin" id="nis" name="nis"
                                            value="{{ $siswa->nis }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-kantin" id="name" name="nama_siswa"
                                            value="{{ $siswa->nama_siswa }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
                                        <select class="form-control form-control-kantin" id="kelas" name="kelas" required>
                                            <option value="">Pilih Kelas</option>
                                            <option value="X" {{ $siswa->kelas == 'X' ? 'selected' : '' }}>10</option>
                                            <option value="XI" {{ $siswa->kelas == 'XI' ? 'selected' : '' }}>11</option>
                                            <option value="XII" {{ $siswa->kelas == 'XII' ? 'selected' : '' }}>12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="jurusan" class="form-label">Jurusan <span class="text-danger">*</span></label>
                                        <select class="form-control form-control-kantin" id="jurusan" name="jurusan" required>
                                            <option value="">Pilih Jurusan</option>
                                            <option value="RPL" {{ $siswa->jurusan == 'RPL' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                            <option value="TKJ" {{ $siswa->jurusan == 'TKJ' ? 'selected' : '' }}>Teknik Komputer Jaringan</option>
                                            <option value="MM" {{ $siswa->jurusan == 'MM' ? 'selected' : '' }}>Multimedia</option>
                                            <option value="AKL" {{ $siswa->jurusan == 'AKL' ? 'selected' : '' }}>Akuntansi</option>
                                            <option value="OTKP" {{ $siswa->jurusan == 'OTKP' ? 'selected' : '' }}>Perkantoran</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <div class="d-flex gap-3 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="male" value="L" {{ $siswa->gender == 'L' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="male">Laki-laki</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="female" value="P" {{ $siswa->gender == 'P' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="female">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-4">
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto Siswa</label>
                                <div class="card border-dashed p-3 text-center">
                                    <img id="photoPreview" src="https://ui-avatars.com/api/?name=Ahmad+Budiman&background=28a745&color=fff&size=200"
                                        class="img-fluid rounded shadow-sm mb-3" alt="Preview"
                                        style="width: 150px; height: 180px; object-fit: cover; margin: 0 auto;">
                                    <input type="file" class="form-control form-control-kantin" id="photo" name="photo" accept="image/*">
                                    <small class="text-muted d-block mt-2">Format: JPG, PNG. Max: 2MB</small>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="button" class="btn btn-outline-danger btn-delete" data-id="{{ $siswa->id_siswa }}">
                            <i class="fas fa-trash me-2"></i> Hapus Data Siswa
                        </button>

                        <div class="d-flex gap-2">
                            <a href="{{ url('/admin/siswa') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-success px-4" style="background-color: #28a745; border: none;">
                                <i class="fas fa-save me-2"></i> Update Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data siswa ini?</p>
                <p class="text-danger"><strong>Tindakan ini tidak dapat dibatalkan!</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" action="#" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus Siswa</button>
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
            $('#deleteForm').attr('action', '/admin/siswa/' + id);
            $('#deleteModal').modal('show');
        });

        // Simple Photo Preview
        $('#photo').change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#photoPreview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush