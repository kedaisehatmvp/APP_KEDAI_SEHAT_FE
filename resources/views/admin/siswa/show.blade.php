@extends('layouts.app')

@section('title', 'Detail Pengguna - Kantin Sehat')
@section('page-title', 'Detail Pengguna')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Data Pengguna</a></li>
<li class="breadcrumb-item active">Detail Pengguna</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Pengguna #{{ $id ?? 'USR001' }}</h5>
                <div class="btn-group">
                    <a href="{{ route('admin.users.edit', $id ?? 1) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-kantin-outline">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- User Profile -->
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <img src="https://ui-avatars.com/api/?name=Ahmad+Budiman&background=28a745&color=fff&size=200" 
                                         class="rounded-circle border border-3 border-primary" 
                                         alt="User Photo"
                                         style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                
                                <h4 class="mb-1">Ahmad Budiman</h4>
                                <p class="text-muted mb-3">
                                    <i class="fas fa-envelope me-1"></i>ahmad@kantinsehat.com
                                </p>
                                
                                <div class="mb-3">
                                    <span class="badge bg-danger px-3 py-2">
                                        <i class="fas fa-user-shield me-1"></i>Admin
                                    </span>
                                </div>
                                
                                <div class="d-flex justify-content-center gap-2 mb-3">
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-phone"></i>
                                    </button>
                                    <button class="btn btn-outline-success btn-sm">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-comment"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Informasi Akun</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <td><strong>Status</strong></td>
                                        <td>
                                            <span class="badge bg-success">Aktif</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bergabung</strong></td>
                                        <td>15 Jan 2023</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Login Terakhir</strong></td>
                                        <td>{{ date('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Login</strong></td>
                                        <td>142 kali</td>
                                    </tr>
                                    <tr>
                                        <td><strong>IP Terakhir</strong></td>
                                        <td>192.168.1.100</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Izin Akses</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge bg-success mb-1">
                                        <i class="fas fa-utensils me-1"></i>Produk
                                    </span>
                                    <span class="badge bg-success mb-1">
                                        <i class="fas fa-shopping-cart me-1"></i>Pesanan
                                    </span>
                                    <span class="badge bg-success mb-1">
                                        <i class="fas fa-users me-1"></i>Pengguna
                                    </span>
                                    <span class="badge bg-success mb-1">
                                        <i class="fas fa-chart-bar me-1"></i>Laporan
                                    </span>
                                    <span class="badge bg-success mb-1">
                                        <i class="fas fa-cog me-1"></i>Pengaturan
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- User Details & Activities -->
                    <div class="col-md-8">
                        <!-- Personal Information -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Informasi Pribadi</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-sm">
                                            <tr>
                                                <td width="40%"><strong>NIK</strong></td>
                                                <td>3271234567890123</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Jenis Kelamin</strong></td>
                                                <td>Laki-laki</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Lahir</strong></td>
                                                <td>15 Mei 1990 (33 tahun)</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tempat Lahir</strong></td>
                                                <td>Jakarta</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-sm">
                                            <tr>
                                                <td width="40%"><strong>Telepon</strong></td>
                                                <td>081234567890</td>
                                            </tr>
                                            <tr>
                                                <td><strong>WhatsApp</strong></td>
                                                <td>081234567890</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status</strong></td>
                                                <td>Menikah</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Pendidikan</strong></td>
                                                <td>S1 Teknik Informatika</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <h6>Alamat</h6>
                                    <p class="mb-0">
                                        Jl. Sehat No. 123, RT 01/RW 02, Kel. Sejahtera, 
                                        Kec. Bahagia, Jakarta Pusat 10110
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- User Statistics -->
                        <div class="row mb-4">
                            <div class="col-md-3 col-6">
                                <div class="card bg-primary text-white text-center">
                                    <div class="card-body p-3">
                                        <h3 class="mb-0">124</h3>
                                        <small>Total Pesanan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="card bg-success text-white text-center">
                                    <div class="card-body p-3">
                                        <h3 class="mb-0">Rp 8.5JT</h3>
                                        <small>Total Belanja</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="card bg-info text-white text-center">
                                    <div class="card-body p-3">
                                        <h3 class="mb-0">42</h3>
                                        <small>Bulan Ini</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="card bg-warning text-white text-center">
                                    <div class="card-body p-3">
                                        <h3 class="mb-0">4.8</h3>
                                        <small>Rating</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Recent Activities -->
                        <div class="card mb-4">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Aktivitas Terbaru</h6>
                                <small>10 aktivitas terakhir</small>
                            </div>
                            <div class="card-body">
                                <div class="timeline">
                                    @for($i = 1; $i <= 5; $i++)
                                    <div class="timeline-item mb-3">
                                        <div class="timeline-marker bg-{{ ['primary', 'success', 'warning', 'info', 'danger'][$i-1] }}"></div>
                                        <div class="timeline-content p-3 bg-light rounded">
                                            <div class="d-flex justify-content-between">
                                                <strong>{{ ['Login sistem', 'Update produk', 'Proses pesanan', 'Generate laporan', 'Reset password'][$i-1] }}</strong>
                                                <small class="text-muted">{{ $i }} jam yang lalu</small>
                                            </div>
                                            <p class="mb-0 mt-1">
                                                {{ [
                                                    'Berhasil login dari IP 192.168.1.' . $i,
                                                    'Memperbarui stok produk Nasi Goreng',
                                                    'Memproses pesanan #ORD00' . $i,
                                                    'Mengekspor laporan penjualan bulanan',
                                                    'Melakukan reset password akun'
                                                ][$i-1] }}
                                            </p>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        
                        <!-- Recent Orders -->
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Pesanan Terbaru</h6>
                                <a href="#" class="btn btn-sm btn-kantin-outline">Lihat Semua</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>ID Pesanan</th>
                                                <th>Tanggal</th>
                                                <th>Items</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i = 1; $i <= 5; $i++)
                                            <tr>
                                                <td>#ORD{{ sprintf('%03d', $i) }}</td>
                                                <td>{{ date('d/m H:i', strtotime("-".$i." hours")) }}</td>
                                                <td>
                                                    <small>
                                                        @if($i % 3 == 0)
                                                        Nasi Goreng (1), Jus (1)
                                                        @elseif($i % 3 == 1)
                                                        Salad (2), Roti (1)
                                                        @else
                                                        Mie (1), Teh (1)
                                                        @endif
                                                    </small>
                                                </td>
                                                <td class="text-success">Rp {{ number_format(25000 + ($i * 5000), 0, ',', '.') }}</td>
                                                <td>
                                                    @if($i % 3 == 0)
                                                    <span class="badge bg-success">Selesai</span>
                                                    @elseif($i % 3 == 1)
                                                    <span class="badge bg-warning">Diproses</span>
                                                    @else
                                                    <span class="badge bg-info">Dikirim</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </td>
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

@push('styles')
<style>
    .timeline {
        position: relative;
        padding-left: 30px;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 20px;
    }
    
    .timeline-marker {
        position: absolute;
        left: -30px;
        top: 15px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 3px #e9ecef;
    }
</style>
@endpush
@endsection