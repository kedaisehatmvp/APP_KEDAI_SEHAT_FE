@extends('layouts.app')

@section('title', 'Data Pesanan - Kantin Sehat')
@section('page-title', 'Data Pesanan')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Data Pesanan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Pesanan</h5>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-success">
                        <i class="fas fa-print me-2"></i>Cetak Laporan
                    </button>
                    <button type="button" class="btn btn-kantin">
                        <i class="fas fa-plus me-2"></i>Pesanan Baru
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter Section -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label class="form-label">Status Pesanan</label>
                        <select class="form-control form-control-kantin select2">
                            <option value="">Semua Status</option>
                            <option value="pending">Menunggu</option>
                            <option value="processing">Diproses</option>
                            <option value="ready">Siap Diambil</option>
                            <option value="completed">Selesai</option>
                            <option value="cancelled">Dibatalkan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control form-control-kantin" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control form-control-kantin" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button class="btn btn-kantin w-100">
                            <i class="fas fa-filter me-2"></i>Filter
                        </button>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="table-responsive">
                    <table class="table table-kantin data-table">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>ID Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Waktu</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= 10; $i++)
                            @php
                                $statuses = ['pending', 'processing', 'ready', 'completed', 'cancelled'];
                                $status = $statuses[$i % 5];
                                $statusColors = [
                                    'pending' => 'warning',
                                    'processing' => 'info', 
                                    'ready' => 'primary',
                                    'completed' => 'success',
                                    'cancelled' => 'danger'
                                ];
                                $statusLabels = [
                                    'pending' => 'Menunggu',
                                    'processing' => 'Diproses',
                                    'ready' => 'Siap Diambil',
                                    'completed' => 'Selesai',
                                    'cancelled' => 'Dibatalkan'
                                ];
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    <strong>#ORD{{ sprintf('%03d', $i) }}</strong>
                                    <br>
                                    <small class="text-muted">Meja {{ $i }}</small>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center me-2" 
                                             style="width: 35px; height: 35px;">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                        <div>
                                            <strong>Pelanggan {{ $i }}</strong>
                                            <br>
                                            <small>user{{ $i }}@email.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <small>
                                        @if($i % 3 == 0)
                                        Nasi Goreng (2), Jus Jeruk (1)
                                        @elseif($i % 3 == 1)
                                        Salad Buah (1), Roti Gandum (2)
                                        @else
                                        Mie Sehat (1), Teh Hijau (1)
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    <strong class="text-success">Rp {{ number_format(25000 + ($i * 15000), 0, ',', '.') }}</strong>
                                    <br>
                                    <small class="text-muted">
                                        @if($i % 2 == 0)
                                        <i class="fas fa-money-bill-wave text-success"></i> Tunai
                                        @else
                                        <i class="fas fa-credit-card text-primary"></i> QRIS
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $statusColors[$status] }}">
                                        {{ $statusLabels[$status] }}
                                    </span>
                                    <br>
                                    <small class="text-muted">{{ $i }}0 menit lalu</small>
                                </td>
                                <td>{{ date('H:i', strtotime("-".$i." hours")) }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-sm btn-info" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-success" title="Proses">
                                            <i class="fas fa-check"></i>
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
    </div>
</div>

<!-- Order Statistics -->
<div class="row mt-4">
    <div class="col-md-2 col-6">
        <div class="card card-kantin bg-warning text-white">
            <div class="card-body text-center p-3">
                <h3 class="mb-0">15</h3>
                <small>Menunggu</small>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="card card-kantin bg-info text-white">
            <div class="card-body text-center p-3">
                <h3 class="mb-0">8</h3>
                <small>Diproses</small>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="card card-kantin bg-primary text-white">
            <div class="card-body text-center p-3">
                <h3 class="mb-0">5</h3>
                <small>Siap Diambil</small>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="card card-kantin bg-success text-white">
            <div class="card-body text-center p-3">
                <h3 class="mb-0">45</h3>
                <small>Hari Ini</small>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="card card-kantin bg-danger text-white">
            <div class="card-body text-center p-3">
                <h3 class="mb-0">3</h3>
                <small>Dibatalkan</small>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-6">
        <div class="card card-kantin bg-secondary text-white">
            <div class="card-body text-center p-3">
                <h3 class="mb-0">Rp 4.2JT</h3>
                <small>Total Hari Ini</small>
            </div>
        </div>
    </div>
</div>
@endsection