@extends('layouts.app')

@section('title', 'Dashboard - Kantin Sehat')
@section('page-title', 'Dashboard')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

@section('content')
<div class="row">
    <!-- Stats Cards -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card bg-primary rounded-3 p-4 text-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-0">Rp 4.2JT</h3>
                    <p class="mb-0">Pendapatan Hari Ini</p>
                </div>
                <i class="fas fa-money-bill-wave fa-3x opacity-50"></i>
            </div>
            <div class="mt-3">
                <small><i class="fas fa-arrow-up me-1"></i> 12% dari kemarin</small>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card bg-success rounded-3 p-4 text-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-0">45</h3>
                    <p class="mb-0">Pesanan Hari Ini</p>
                </div>
                <i class="fas fa-shopping-cart fa-3x opacity-50"></i>
            </div>
            <div class="mt-3">
                <small><i class="fas fa-arrow-up me-1"></i> 5 pesanan baru</small>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card bg-info rounded-3 p-4 text-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-0">28</h3>
                    <p class="mb-0">Total Produk</p>
                </div>
                <i class="fas fa-utensils fa-3x opacity-50"></i>
            </div>
            <div class="mt-3">
                <small>6 produk hampir habis</small>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card bg-warning rounded-3 p-4 text-white">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="mb-0">124</h3>
                    <p class="mb-0">Total Pengguna</p>
                </div>
                <i class="fas fa-users fa-3x opacity-50"></i>
            </div>
            <div class="mt-3">
                <small>112 pengguna aktif</small>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Orders -->
    <div class="col-xl-8 mb-4">
        <div class="card card-kantin">
            <div class="card-header">
                <h5 class="mb-0">Pesanan Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= 5; $i++)
                            <tr>
                                <td><strong>#ORD{{ sprintf('%03d', $i) }}</strong></td>
                                <td>Pelanggan {{ $i }}</td>
                                <td class="text-success">Rp {{ number_format(50000 + ($i * 15000), 0, ',', '.') }}</td>
                                <td>
                                    @if($i == 1)
                                    <span class="badge bg-success">Selesai</span>
                                    @elseif($i == 2)
                                    <span class="badge bg-warning">Diproses</span>
                                    @elseif($i == 3)
                                    <span class="badge bg-info">Dikirim</span>
                                    @else
                                    <span class="badge bg-primary">Menunggu</span>
                                    @endif
                                </td>
                                <td>{{ date('H:i', strtotime("-".$i." hours")) }}</td>
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
                <div class="text-center mt-3">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-kantin-outline">
                        Lihat Semua Pesanan <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Stats -->
    <div class="col-xl-4 mb-4">
        <div class="card card-kantin">
            <div class="card-header">
                <h5 class="mb-0">Statistik Cepat</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                        <div>
                            <i class="fas fa-utensils text-primary me-2"></i>
                            <span>Produk Terlaris</span>
                        </div>
                        <strong>Nasi Goreng Sehat</strong>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                        <div>
                            <i class="fas fa-user text-success me-2"></i>
                            <span>Pelanggan Aktif</span>
                        </div>
                        <strong>95 orang</strong>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                        <div>
                            <i class="fas fa-chart-line text-info me-2"></i>
                            <span>Rata-rata Pesanan/Hari</span>
                        </div>
                        <strong>38 pesanan</strong>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                        <div>
                            <i class="fas fa-star text-warning me-2"></i>
                            <span>Rating Sistem</span>
                        </div>
                        <div>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                            <span class="ms-2">4.5</span>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6>Produk Hampir Habis</h6>
                    <div class="progress mb-2" style="height: 10px;">
                        <div class="progress-bar bg-danger" style="width: 90%"></div>
                    </div>
                    <small class="text-muted">Salad Buah (2 porsi tersisa)</small>
                    
                    <div class="progress mb-2" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: 75%"></div>
                    </div>
                    <small class="text-muted">Jus Jeruk (5 gelas tersisa)</small>
                    
                    <div class="progress mb-2" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: 60%"></div>
                    </div>
                    <small class="text-muted">Roti Gandum (8 buah tersisa)</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Activities -->
    <div class="col-12">
        <div class="card card-kantin">
            <div class="card-header">
                <h5 class="mb-0">Aktivitas Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="timeline">
                    @for($i = 1; $i <= 5; $i++)
                    <div class="timeline-item mb-3">
                        <div class="timeline-marker bg-{{ ['primary', 'success', 'warning', 'info', 'danger'][$i-1] }}"></div>
                        <div class="timeline-content p-3 bg-light rounded">
                            <div class="d-flex justify-content-between">
                                <strong>{{ ['Pesanan baru', 'Produk ditambahkan', 'User login', 'Pembayaran berhasil', 'Stok diperbarui'][$i-1] }}</strong>
                                <small class="text-muted">{{ $i }} jam yang lalu</small>
                            </div>
                            <p class="mb-0 mt-1">
                                {{ [
                                    'Pesanan #ORD001 telah dibuat oleh Pelanggan 1',
                                    'Produk "Smoothie Sehat" telah ditambahkan ke katalog',
                                    'Admin login dari IP 192.168.1.'.$i,
                                    'Pembayaran untuk pesanan #ORD002 telah dikonfirmasi',
                                    'Stok Nasi Goreng diperbarui menjadi 25 porsi'
                                ][$i-1] }}
                            </p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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