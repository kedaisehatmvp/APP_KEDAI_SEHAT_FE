@extends('layouts.app')

@section('title', 'Tambah Produk Baru')

@section('page-header')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Tambah Produk Baru</h1>
            <p class="mb-0">Tambah menu makanan baru ke Kantin Sehat</p>
        </div>
        <a href="{{ url('/admin/products') }}" class="btn btn-light btn-lg">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-kantin">
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-4 text-center">
                        <div class="mb-3">
                            <img id="product-preview" 
                                 src="https://via.placeholder.com/300x200/28a745/ffffff?text=Preview+Produk" 
                                 class="img-fluid rounded" 
                                 style="max-height: 200px; object-fit: cover;" 
                                 alt="Preview Produk">
                        </div>
                        <div>
                            <label for="image" class="btn btn-outline-success">
                                <i class="fas fa-camera me-2"></i> Upload Gambar
                            </label>
                            <input type="file" class="d-none" id="image" name="image" 
                                   accept="image/*">
                            <div class="form-text">Format: JPG, PNG, maksimal 2MB</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk *</label