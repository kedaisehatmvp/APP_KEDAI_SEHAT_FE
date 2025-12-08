@extends('layouts.app')

@section('title', 'Detail Produk - Kantin Sehat')
@section('page-title', 'Detail Produk')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Data Produk</a></li>
<li class="breadcrumb-item active">Detail Produk</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Produk #{{ $id ?? 'PROD001' }}</h5>
                <div class="btn-group">
                    <a href="{{ route('admin.products.edit', $id ?? 1) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-kantin-outline">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Product Image & Basic Info -->
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                     class="img-fluid rounded" 
                                     alt="Product Image"
                                     style="max-height: 300px; width: 100%; object-fit: cover;">
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Informasi Cepat</h6>
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
                                        <td><strong>Kategori</strong></td>
                                        <td>Makanan</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Stok</strong></td>
                                        <td>
                                            <span class="badge bg-success">25 porsi tersisa</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Harga</strong></td>
                                        <td class="text-success">
                                            <strong>Rp 25.000</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Rating</strong></td>
                                        <td>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star-half-alt text-warning"></i>
                                            <span class="ms-1">4.5</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Details -->
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Informasi Produk</h6>
                            </div>
                            <div class="card-body">
                                <h4 class="text-primary mb-3">Nasi Goreng Sehat</h4>
                                
                                <div class="mb-3">
                                    <h6>Deskripsi</h6>
                                    <p class="mb-0">
                                        Nasi goreng sehat dengan tambahan sayuran organik dan protein tanpa MSG. 
                                        Cocok untuk sarapan atau makan siang. Diolah dengan minyak zaitun dan bumbu alami.
                                    </p>
                                </div>
                                
                                <div class="mb-3">
                                    <h6>Bahan-bahan</h6>
                                    <p class="mb-0">
                                        Nasi, wortel, buncis, jagung, telur, bawang merah, bawang putih, minyak zaitun, 
                                        kecap rendah gula, garam, merica.
                                    </p>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h6>Informasi Gizi (per porsi)</h6>
                                        <table class="table table-sm">
                                            <tr>
                                                <td>Kalori</td>
                                                <td><strong>350 kcal</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Protein</td>
                                                <td><strong>15g</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Karbohidrat</td>
                                                <td><strong>45g</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Lemak</td>
                                                <td><strong>8g</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Serat</td>
                                                <td><strong>5g</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Tags</h6>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge bg-success">
                                                <i class="fas fa-leaf me-1"></i>Sehat
                                            </span>
                                            <span class="badge bg-primary">
                                                <i class="fas fa-seedling me-1"></i>Organik
                                            </span>
                                            <span class="badge bg-danger">
                                                <i class="fas fa-fire me-1"></i>Best Seller
                                            </span>
                                            <span class="badge bg-warning">
                                                <i class="fas fa-star me-1"></i>Rekomendasi
                                            </span>
                                        </div>
                                        
                                        <h6 class="mt-3">Waktu Penyajian</h6>
                                        <p class="mb-0">
                                            <i class="fas fa-clock text-info me-1"></i>
                                            15-20 menit
                                        </p>
                                        
                                        <h6 class="mt-3">Tanggal Dibuat</h6>
                                        <p class="mb-0">
                                            <i class="fas fa-calendar text-info me-1"></i>
                                            15 November 2023
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sales & Statistics -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Statistik Penjualan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h1 class="display-4 text-primary">124</h1>
                                            <p class="mb-0">Total Penjualan</p>
                                            <small class="text-muted">30 hari terakhir</small>
                                        </div>
                                        
                                        <div class="mt-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Target Penjualan</span>
                                                <span>80%</span>
                                            </div>
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-success" style="width: 80%"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-3">
                                            <div class="d-flex justify-content-between">
                                                <div class="text-center">
                                                    <div class="text-success">Rp 3.1JT</div>
                                                    <small>Pendapatan</small>
                                                </div>
                                                <div class="text-center">
                                                    <div class="text-info">24</div>
                                                    <small>Bulan Ini</small>
                                                </div>
                                                <div class="text-center">
                                                    <div class="text-warning">8.2</div>
                                                    <small>Rata2/hari</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-light">
                                        <h6 class="mb-0">Stok & Persediaan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Stok Saat Ini</span>
                                                <span>25 / 50</span>
                                            </div>
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar bg-primary" style="width: 50%"></div>
                                            </div>
                                            <small class="text-muted">50% dari kapasitas maksimal</small>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span>Stok Minimum</span>
                                                <span>5 porsi</span>
                                            </div>
                                            <div class="alert alert-warning py-2">
                                                <i class="fas fa-exclamation-triangle me-2"></i>
                                                Stok akan habis dalam 3 hari
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <h6>Riwayat Stok</h6>
                                            <div class="list-group list-group-flush">
                                                <div class="list-group-item d-flex justify-content-between px-0">
                                                    <span>Pengisian Stok</span>
                                                    <span class="text-success">+20 porsi</span>
                                                    <small>2 hari lalu</small>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between px-0">
                                                    <span>Penjualan</span>
                                                    <span class="text-danger">-8 porsi</span>
                                                    <small>Kemarin</small>
                                                </div>
                                                <div class="list-group-item d-flex justify-content-between px-0">
                                                    <span>Penyesuaian</span>
                                                    <span class="text-info">+3 porsi</span>
                                                    <small>3 hari lalu</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Recent Orders -->
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Pesanan Terkait</h6>
                                <small>5 pesanan terakhir</small>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>ID Pesanan</th>
                                                <th>Pelanggan</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i = 1; $i <= 5; $i++)
                                            <tr>
                                                <td>#ORD{{ sprintf('%03d', $i) }}</td>
                                                <td>Pelanggan {{ $i }}</td>
                                                <td>{{ $i }}</td>
                                                <td class="text-success">Rp 25.000</td>
                                                <td>
                                                    @if($i % 3 == 0)
                                                    <span class="badge bg-success">Selesai</span>
                                                    @elseif($i % 3 == 1)
                                                    <span class="badge bg-warning">Diproses</span>
                                                    @else
                                                    <span class="badge bg-info">Dikirim</span>
                                                    @endif
                                                </td>
                                                <td>{{ date('d/m', strtotime("-".$i." days")) }}</td>
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