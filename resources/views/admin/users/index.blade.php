@extends('layouts.app')

@section('title', 'Data Users')
@section('title-icon', 'fa-users')

@section('page-header')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-2"><i class="fas fa-users me-2"></i> Data Users</h1>
            <p class="mb-0">Kelola data pengguna Kantin Sehat</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-light btn-lg">
            <i class="fas fa-plus me-2"></i> Tambah User
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="stats-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stats-number">24</div>
            <div class="stats-label">Total Users</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);">
            <div class="stats-icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <div class="stats-number">3</div>
            <div class="stats-label">Admin</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);">
            <div class="stats-icon">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="stats-number">18</div>
            <div class="stats-label">Pembeli</div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #6f42c1 0%, #d63384 100%);">
            <div class="stats-icon">
                <i class="fas fa-user-clock"></i>
            </div>
            <div class="stats-number">3</div>
            <div class="stats-label">Staff</div>
        </div>
    </div>
</div>

<div class="card card-kantin">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i> Daftar Users</h5>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-light btn-sm">
                    <i class="fas fa-download me-1"></i> Export
                </button>
                <button class="btn btn-outline-light btn-sm">
                    <i class="fas fa-print me-1"></i> Print
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 10; $i++)
                        @php
                        $roles=['Admin', 'Pembeli' , 'Kasir' , 'Koki' ];
                        $role=$roles[array_rand($roles)];
                        $statuses=['Aktif', 'Nonaktif' , 'Pending' ];
                        $status=$statuses[array_rand($statuses)];

                        $names=['Andi Wijaya', 'Siti Rahma' , 'Budi Santoso' , 'Dewi Lestari' , 'Eko Saputra' , 'Fitriani' , 'Gilang Ramadhan' , 'Hana Pertiwi' , 'Indra Kusuma' , 'Joko Susilo' ];
                        $name=$names[$i-1];
                        @endphp
                        <tr>
                        <td>{{ $i }}</td>
                        <td>
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($name) }}&background=28a745&color=fff&size=40"
                                class="rounded-circle" alt="Avatar" width="40">
                        </td>
                        <td><strong>{{ $name }}</strong></td>
                        <td><span class="text-muted">@user{{ $i }}</span></td>
                        <td>user{{ $i }}@kantinsehat.com</td>
                        <td>0812-3456-78{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <span class="badge-kantin 
                                {{ $role == 'Admin' ? 'badge-danger' : 
                                    ($role == 'Pembeli' ? 'badge-primary' : 
                                    ($role == 'Kasir' ? 'badge-warning' : 'badge-info')) }}">
                                {{ $role }}
                            </span>
                        </td>
                        <td>
                            <span class="badge-kantin 
                                {{ $status == 'Aktif' ? 'badge-success' : 
                                    ($status == 'Pending' ? 'badge-warning' : 'badge-danger') }}">
                                {{ $status }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ url('/admin/users/' . $i . '/show') }}" class="btn btn-view" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ url('/admin/users/' . $i . '/edit') }}" class="btn btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ url('/admin/users/' . $i . '/delete') }}" class="btn btn-delete" title="Hapus" data-item-name="{{ $name }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection