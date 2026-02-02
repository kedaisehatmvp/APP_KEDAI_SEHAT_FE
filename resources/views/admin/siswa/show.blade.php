@extends('layouts.app')

@section('title', 'Detail Siswa - Kantin Sehat')
@section('page-title', 'Detail Siswa')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.siswa.index') }}">Data Siswa</a></li>
<li class="breadcrumb-item active">Detail Siswa</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Siswa {{ $siswa->nama_siswa }}</h5>
                <div class="btn-group">
                    <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-kantin-outline">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($siswa->nama_siswa) }}&background=007bff&color=fff&size=200"
                                        class="rounded-circle border border-3 border-primary"
                                        alt="Foto Siswa"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                <h4 class="mb-1">{{ $siswa->nama_siswa }}</h4>
                                <p class="text-muted mb-3">
                                    <i class="fas fa-id-card me-1"></i>NIS: {{ $siswa->nis }}
                                </p>

                                <div class="mb-3">
                                    <span class="badge bg-info px-3 py-2">
                                        <i class="fas fa-graduation-cap me-1"></i>Siswa
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Status Akademik</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm mb-0">
                                    <tr>
                                        <td><strong>Kelas</strong></td>
                                        <td><span class="badge bg-secondary">{{ $siswa->kelas }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jurusan</strong></td>
                                        <td><span class="badge bg-dark">{{ $siswa->jurusan }}</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Informasi Pribadi Siswa</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <tr>
                                                <th width="30%">Nama Lengkap</th>
                                                <td>: {{ $siswa->nama_siswa }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nomor Induk Siswa (NIS)</th>
                                                <td>: {{ $siswa->nis }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kelas</th>
                                                <td>: {{ $siswa->kelas }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jurusan</th>
                                                <td>: {{ $siswa->jurusan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>:
                                                    @if(($siswa->gender ?? 'P') == 'L')
                                                    <i class="fas fa-mars text-primary me-1"></i> Laki-laki
                                                    @else
                                                    <i class="fas fa-venus text-danger me-1"></i> Perempuan
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Riwayat Jajan Terakhir</h6>
                                <span class="badge bg-primary">5 Transaksi Terakhir</span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>Tgl Transaksi</th>
                                                <th>Menu</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i = 1; $i <= 3; $i++)
                                                <tr>
                                                <td>{{ date('d/m/Y H:i', strtotime("-".$i." days")) }}</td>
                                                <td>Nasi Kuning, Teh Botol</td>
                                                <td class="text-success">Rp 15.000</td>
                                                <td><span class="badge bg-success">Lunas</span></td>
                                                </tr>
                                                @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection