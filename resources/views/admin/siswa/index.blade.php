@extends('layouts.app')

@section('title', 'Data Siswa')
@section('title-icon', 'fa-users')

@section('page-header')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-2"><i class="fas fa-user-graduate me-2"></i> Data Siswa</h1>
            <p class="mb-0">Kelola data siswa Kantin Sehat</p>
        </div>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-light btn-lg">
            <i class="fas fa-plus me-2"></i> Tambah Siswa
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="stats-icon"><i class="fas fa-user-graduate"></i></div>
            <div class="stats-number">120</div>
            <div class="stats-label">Total Siswa</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);">
            <div class="stats-icon"><i class="fas fa-mars"></i></div>
            <div class="stats-number">65</div>
            <div class="stats-label">Laki-laki</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #f73378 0%, #ab47bc 100%);">
            <div class="stats-icon"><i class="fas fa-venus"></i></div>
            <div class="stats-number">55</div>
            <div class="stats-label">Perempuan</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);">
            <div class="stats-icon"><i class="fas fa-school"></i></div>
            <div class="stats-number">12</div>
            <div class="stats-label">Total Kelas</div>
        </div>
    </div>
</div>

<div class="card card-kantin shadow-sm">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i> Daftar Siswa</h5>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-light btn-sm"><i class="fas fa-download me-1"></i> Export</button>
                <button class="btn btn-outline-light btn-sm"><i class="fas fa-print me-1"></i> Print</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Foto</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 10; $i++)
                        @php
                        $jurusanList=['RPL', 'TKJ' , 'Multimedia' , 'AKL' , 'OTKP' ];
                        $jurusan=$jurusanList[array_rand($jurusanList)];
                        $kelas=rand(10, 12);
                        $gender=rand(0, 1) ? 'Laki-laki' : 'Perempuan' ;
                        @endphp
                        <tr>
                        <td>{{ $i }}</td>
                        <td>
                            <img src="https://ui-avatars.com/api/?name=Siswa+{{ $i }}&background={{ $gender == 'Laki-laki' ? '007bff' : 'f73378' }}&color=fff&size=40"
                                class="rounded-circle shadow-sm" alt="Avatar">
                        </td>
                        <td><code>222310{{ 100 + $i }}</code></td>
                        <td><strong>Siswa {{ $i }}</strong></td>
                        <td>{{ $kelas }}</td>
                        <td><span class="badge bg-light text-dark border px-3">{{ $jurusan }}</span></td>
                        <td>
                            <small>
                                <i class="fas {{ $gender == 'Laki-laki' ? 'fa-mars text-primary' : 'fa-venus text-danger' }} me-1"></i>
                                {{ $gender }}
                            </small>
                        </td>
                        <td>
                            <div class="action-buttons d-flex justify-content-center gap-1">
                                <a href="{{ url('/admin/siswa/' . $i) . '/show' }}" class="btn btn-view btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ url('/admin/siswa/' . $i . '/edit') }}" class="btn btn-edit btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-delete btn-sm btn-delete-trigger"
                                    data-id="{{ $i }}"
                                    data-name="Siswa {{ $i }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Form Delete Global --}}
<form id="globalDeleteForm" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.btn-delete-trigger').click(function() {
            const name = $(this).data('name');
            const id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus data ' + name + '?')) {
                const url = "{{ url('/admin/siswa') }}/" + id;
                $('#globalDeleteForm').attr('action', url);
                $('#globalDeleteForm').submit();
            }
        });
    });
</script>
@endpush@extends('layouts.app')

@section('title', 'Data Siswa')
@section('title-icon', 'fa-users')

@section('page-header')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-2"><i class="fas fa-user-graduate me-2"></i> Data Siswa</h1>
            <p class="mb-0">Kelola data siswa Kantin Sehat</p>
        </div>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-light btn-lg">
            <i class="fas fa-plus me-2"></i> Tambah Siswa
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="stats-icon"><i class="fas fa-user-graduate"></i></div>
            <div class="stats-number">120</div>
            <div class="stats-label">Total Siswa</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);">
            <div class="stats-icon"><i class="fas fa-mars"></i></div>
            <div class="stats-number">65</div>
            <div class="stats-label">Laki-laki</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #f73378 0%, #ab47bc 100%);">
            <div class="stats-icon"><i class="fas fa-venus"></i></div>
            <div class="stats-number">55</div>
            <div class="stats-label">Perempuan</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);">
            <div class="stats-icon"><i class="fas fa-school"></i></div>
            <div class="stats-number">12</div>
            <div class="stats-label">Total Kelas</div>
        </div>
    </div>
</div>

<div class="card card-kantin shadow-sm">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i> Daftar Siswa</h5>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-light btn-sm"><i class="fas fa-download me-1"></i> Export</button>
                <button class="btn btn-outline-light btn-sm"><i class="fas fa-print me-1"></i> Print</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Foto</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 10; $i++)
                        @php
                        $jurusanList=['RPL', 'TKJ' , 'Multimedia' , 'AKL' , 'OTKP' ];
                        $jurusan=$jurusanList[array_rand($jurusanList)];
                        $kelas=rand(10, 12);
                        $gender=rand(0, 1) ? 'Laki-laki' : 'Perempuan' ;
                        @endphp
                        <tr>
                        <td>{{ $i }}</td>
                        <td>
                            <img src="https://ui-avatars.com/api/?name=Siswa+{{ $i }}&background={{ $gender == 'Laki-laki' ? '007bff' : 'f73378' }}&color=fff&size=40"
                                class="rounded-circle shadow-sm" alt="Avatar">
                        </td>
                        <td><code>222310{{ 100 + $i }}</code></td>
                        <td><strong>Siswa {{ $i }}</strong></td>
                        <td>{{ $kelas }}</td>
                        <td><span class="badge bg-light text-dark border px-3">{{ $jurusan }}</span></td>
                        <td>
                            <small>
                                <i class="fas {{ $gender == 'Laki-laki' ? 'fa-mars text-primary' : 'fa-venus text-danger' }} me-1"></i>
                                {{ $gender }}
                            </small>
                        </td>
                        <td>
                            <div class="action-buttons d-flex justify-content-center gap-1">
                                <a href="{{ url('/admin/siswa/' . $i) . '/show' }}" class="btn btn-view btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ url('/admin/siswa/' . $i . '/edit') }}" class="btn btn-edit btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-delete btn-sm btn-delete-trigger"
                                    data-id="{{ $i }}"
                                    data-name="Siswa {{ $i }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Form Delete Global --}}
<form id="globalDeleteForm" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.btn-delete-trigger').click(function() {
            const name = $(this).data('name');
            const id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus data ' + name + '?')) {
                const url = "{{ url('/admin/siswa') }}/" + id;
                $('#globalDeleteForm').attr('action', url);
                $('#globalDeleteForm').submit();
            }
        });
    });
</script>
@endpush