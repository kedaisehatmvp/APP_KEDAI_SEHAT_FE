@extends('layouts.app')

@section('title', 'Data Produk')

@section('page-header')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-0"><i class="fas fa-utensils me-2"></i> Data Produk</h1>
            <p class="mb-0">Kelola menu makanan Kantin Sehat</p>
        </div>
        <a href="{{ url('/admin/products/create') }}" class="btn btn-light btn-lg">
            <i class="fas fa-plus me-2"></i> Tambah Produk
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card card-kantin bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">28</h3>
                        <p class="mb-0">Total Produk</p>
                    </div>
                    <i class="fas fa-utensils fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-kantin bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">22</h3>
                        <p class="mb-0">Produk Aktif</p>
                    </div>
                    <i class="fas fa-check-circle fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-kantin bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">4</h3>
                        <p class="mb-0">Habis Stok</p>
                    </div>
                    <i class="fas fa-exclamation-triangle fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-kantin bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">2</h3>
                        <p class="mb-0">Produk Baru</p>
                    </div>
                    <i class="fas fa-star fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-kantin">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Rating</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $products = [
                    ['name' => 'Salad Sehat', 'category' => 'Makanan', 'price' => 25000, 'stock' => 15, 'status' => 'active', 'rating' => 4.8],
                    ['name' => 'Jus Wortel', 'category' => 'Minuman', 'price' => 15000, 'stock' => 30, 'status' => 'active', 'rating' => 4.5],
                    ['name' => 'Nasi Goreng Sehat', 'category' => 'Makanan', 'price' => 28000, 'stock' => 8, 'status' => 'active', 'rating' => 4.9],
                    ['name' => 'Smoothie Berry', 'category' => 'Minuman', 'price' => 22000, 'stock' => 0, 'status' => 'out', 'rating' => 4.7],
                    ['name' => 'Sandwich Ayam', 'category' => 'Cemilan', 'price' => 18000, 'stock' => 12, 'status' => 'active', 'rating' => 4.3],
                    ['name' => 'Teh Hijau', 'category' => 'Minuman', 'price' => 12000, 'stock' => 25, 'status' => 'active', 'rating' => 4.4],
                    ];
                    @endphp

                    @foreach($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    class="rounded me-2" width="40" height="40" alt="{{ $product['name'] }}">
                                <div>
                                    <strong>{{ $product['name'] }}</strong><br>
                                    <small class="text-muted">SKU: PROD{{ 1000 + $index }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge 
                                {{ $product['category'] == 'Makanan' ? 'bg-primary' : 
                                   ($product['category'] == 'Minuman' ? 'bg-info' : 'bg-warning') }}">
                                {{ $product['category'] }}
                            </span>
                        </td>
                        <td>Rp {{ number_format($product['price'], 0, ',', '.') }}</td>
                        <td>
                            <span class="badge 
                                {{ $product['stock'] > 10 ? 'bg-success' : 
                                   ($product['stock'] > 0 ? 'bg-warning' : 'bg-danger') }}">
                                {{ $product['stock'] }} pcs
                            </span>
                        </td>
                        <td>
                            <span class="badge 
                                {{ $product['status'] == 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ $product['status'] == 'active' ? 'Aktif' : 'Habis' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <=floor($product['rating']))
                                        <i class="fas fa-star"></i>
                                        @elseif($i - 0.5 <= $product['rating'])
                                            <i class="fas fa-star-half-alt"></i>
                                            @else
                                            <i class="far fa-star"></i>
                                            @endif
                                            @endfor
                                </span>
                                <small class="ms-2">{{ $product['rating'] }}</small>
                            </div>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ url('/admin/products/' . ($index + 1)) }}"
                                class="btn btn-sm btn-info" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ url('/admin/products/' . ($index + 1) . '/edit') }}"
                                class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ url('/admin/products/' . ($index + 1) . '/delete') }}"
                                class="btn btn-sm btn-danger btn-delete" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection