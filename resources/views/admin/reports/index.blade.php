@extends('layouts.app')

@section('title', 'Laporan - Kantin Sehat')
@section('page-title', 'Laporan & Analisis')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Laporan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Laporan Penjualan</h5>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-success">
                        <i class="fas fa-file-excel me-2"></i>Export Excel
                    </button>
                    <button type="button" class="btn btn-kantin">
                        <i class="fas fa-print me-2"></i>Cetak Laporan
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Report Filters -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label class="form-label">Periode Laporan</label>
                        <select class="form-control form-control-kantin">
                            <option value="daily">Harian</option>
                            <option value="weekly" selected>Mingguan</option>
                            <option value="monthly">Bulanan</option>
                            <option value="yearly">Tahunan</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control form-control-kantin" value="{{ date('Y-m-01') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control form-control-kantin" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button class="btn btn-kantin w-100">
                            <i class="fas fa-chart-line me-2"></i>Generate
                        </button>
                    </div>
                </div>

                <!-- Summary Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card card-kantin bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="mb-0">Rp 42.5JT</h3>
                                        <small>Total Pendapatan</small>
                                    </div>
                                    <i class="fas fa-money-bill-wave fa-2x opacity-50"></i>
                                </div>
                                <div class="mt-2">
                                    <small><i class="fas fa-arrow-up me-1"></i> 15% dari bulan lalu</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card card-kantin bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="mb-0">1,245</h3>
                                        <small>Total Pesanan</small>
                                    </div>
                                    <i class="fas fa-shopping-cart fa-2x opacity-50"></i>
                                </div>
                                <div class="mt-2">
                                    <small><i class="fas fa-arrow-up me-1"></i> 8% dari bulan lalu</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card card-kantin bg-info text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="mb-0">Rp 34.1K</h3>
                                        <small>Rata-rata/Order</small>
                                    </div>
                                    <i class="fas fa-chart-bar fa-2x opacity-50"></i>
                                </div>
                                <div class="mt-2">
                                    <small><i class="fas fa-arrow-up me-1"></i> 5% dari bulan lalu</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card card-kantin bg-warning text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h3 class="mb-0">95</h3>
                                        <small>Pelanggan Aktif</small>
                                    </div>
                                    <i class="fas fa-users fa-2x opacity-50"></i>
                                </div>
                                <div class="mt-2">
                                    <small><i class="fas fa-user-plus me-1"></i> 12 baru bulan ini</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales Chart -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card card-kantin">
                            <div class="card-header">
                                <h6 class="mb-0">Grafik Penjualan 30 Hari Terakhir</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-container" style="height: 300px;">
                                    <!-- Simple Chart using CSS -->
                                    <div class="d-flex align-items-end" style="height: 250px; border-bottom: 2px solid #e9ecef;">
                                        @for($i = 1; $i <= 30; $i += 5)
                                        <div class="flex-fill d-flex flex-column align-items-center mx-1">
                                            <div class="bg-primary rounded" style="width: 30px; height: {{ rand(50, 200) }}px;"></div>
                                            <small class="mt-2">{{ $i }} Nov</small>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Products -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-kantin">
                            <div class="card-header">
                                <h6 class="mb-0">5 Produk Terlaris</h6>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    @for($i = 1; $i <= 5; $i++)
                                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <span class="badge bg-primary rounded-circle p-2">{{ $i }}</span>
                                            </div>
                                            <div>
                                                <strong>{{ ['Nasi Goreng Sehat', 'Salad Buah', 'Jus Jeruk', 'Roti Gandum', 'Mie Sehat'][$i-1] }}</strong>
                                                <br>
                                                <small class="text-muted">{{ rand(100, 300) }} penjualan</small>
                                            </div>
                                        </div>
                                        <span class="text-success">Rp {{ number_format(rand(20000, 50000), 0, ',', '.') }}</span>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card card-kantin">
                            <div class="card-header">
                                <h6 class="mb-0">Kategori Terpopuler</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Makanan</span>
                                        <span>65%</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-success" style="width: 65%"></div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Minuman</span>
                                        <span>25%</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-info" style="width: 25%"></div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Snack</span>
                                        <span>10%</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-warning" style="width: 10%"></div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <h6>Jam Puncak</h6>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-center">
                                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                 style="width: 40px; height: 40px;">
                                                12
                                            </div>
                                            <div>12:00-13:00</div>
                                            <small class="text-muted">Siang</small>
                                        </div>
                                        <div class="text-center">
                                            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                 style="width: 40px; height: 40px;">
                                                8
                                            </div>
                                            <div>18:00-19:00</div>
                                            <small class="text-muted">Malam</small>
                                        </div>
                                        <div class="text-center">
                                            <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                                                 style="width: 40px; height: 40px;">
                                                6
                                            </div>
                                            <div>10:00-11:00</div>
                                            <small class="text-muted">Pagi</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Report Table -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card card-kantin">
                            <div class="card-header">
                                <h6 class="mb-0">Detail Transaksi</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-kantin">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>ID Transaksi</th>
                                                <th>Pelanggan</th>
                                                <th>Produk</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th>Metode</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i = 1; $i <= 5; $i++)
                                            <tr>
                                                <td>{{ date('d/m/Y', strtotime("-".$i." days")) }}</td>
                                                <td>#TRX{{ sprintf('%04d', $i) }}</td>
                                                <td>Pelanggan {{ $i }}</td>
                                                <td>{{ ['Nasi Goreng', 'Jus Jeruk', 'Salad', 'Roti', 'Mie'][$i-1] }}</td>
                                                <td>{{ rand(1, 3) }}</td>
                                                <td class="text-success">Rp {{ number_format(rand(20000, 80000), 0, ',', '.') }}</td>
                                                <td>
                                                    @if($i % 2 == 0)
                                                    <span class="badge bg-success">Tunai</span>
                                                    @else
                                                    <span class="badge bg-primary">QRIS</span>
                                                    @endif
                                                </td>
                                                <td><span class="badge bg-success">Sukses</span></td>
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