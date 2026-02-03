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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                <div class="stats-icon"><i class="fas fa-user-graduate"></i></div>
                <div class="stats-number">{{ $siswa->count() }}</div>
                <div class="stats-label">Total Siswa</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card" style="background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);">
                <div class="stats-icon"><i class="fas fa-mars"></i></div>
                <div class="stats-number">{{ $siswa->where('gender', 'L')->count() }}</div>
                <div class="stats-label">Laki-laki</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card" style="background: linear-gradient(135deg, #f73378 0%, #ab47bc 100%);">
                <div class="stats-icon"><i class="fas fa-venus"></i></div>
                <div class="stats-number">{{ $siswa->where('gender', 'P')->count() }}</div>
                <div class="stats-label">Perempuan</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);">
                <div class="stats-icon"><i class="fas fa-school"></i></div>
                <div class="stats-number">{{ $siswa->pluck('kelas')->unique()->count() }}</div>
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
                            {{-- <th>Nama Ibu</th>
                            <th>Nama Ayah</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th> --}}
                            <th>Jenis Kelamin</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswa as $item)
                            <tr>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->jurusan }}</td>
                                {{-- <td>{{ $item->nama_ibu }}</td>
                                <td>{{ $item->nama_ayah }}</td>
                                <td>{{ $item->tempat_lahir }}</td>
                                <td>{{ $item->tgl_lahir }}</td> --}}
                                <td>{{ $item->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>
                                    <div class="action-buttons d-flex justify-content-center gap-1">
                                        <a href="{{ route('admin.siswa.show', $item->id_siswa) }}"
                                            class="btn btn-view btn-sm" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.siswa.edit', $item->id_siswa) }}"
                                            class="btn btn-edit btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.siswa.destroy', $item->id_siswa) }}" method="POST"
                                            style="display:inline;" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-delete btn-sm" title="Delete"
                                                data-name="{{ $item->nama_siswa }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                    <p class="text-muted">Belum ada data siswa</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Handle delete dengan konfirmasi
            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                const nama = $(this).find('button').data('name');

                if (confirm('Apakah Anda yakin ingin menghapus data siswa ' + nama + '?')) {
                    this.submit();
                }
            });
        });
    </script>
@endpush
