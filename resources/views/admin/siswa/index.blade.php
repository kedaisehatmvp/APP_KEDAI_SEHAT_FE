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
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Nama Ibu</th>
                        <th>Nama Ayah</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswa as $item)
                    <tr>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->nama_ibu }}</td>
                        <td>{{ $item->nama_ayah }}</td>
                        <td>{{ $item->tempat_lahir }}</td>
                        <td>{{$item->tgl_lahir}}</td>
                        <td>{{ $item->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>
                            <div class="action-buttons d-flex justify-content-center gap-1">
                                <a href="{{ route('admin.siswa.show', $item->id_siswa) }}" class="btn btn-view btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.siswa.edit', $item->id_siswa) }}" class="btn btn-edit btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-delete btn-sm btn-delete-trigger"
                                    data-id="{{ $item->id }}"
                                    data-name="Siswa {{ $item->nama_siswa }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
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