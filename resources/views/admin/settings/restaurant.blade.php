@extends('layouts.app')

@section('title', 'Pengaturan Kantin - Kantin Sehat')
@section('page-title', 'Pengaturan Kantin')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.settings.index') }}">Pengaturan</a></li>
<li class="breadcrumb-item active">Kantin</li>
@endsection

@section('content')
<div class="row">
    <!-- Sidebar Settings Menu -->
    <div class="col-md-3">
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h6 class="mb-0">Menu Pengaturan</h6>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.settings.profile') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-user-circle me-2"></i> Profil Saya
                </a>
                <a href="{{ route('admin.settings.account') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-user-cog me-2"></i> Akun
                </a>
                <a href="{{ route('admin.settings.security') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-shield-alt me-2"></i> Keamanan
                </a>
                <a href="{{ route('admin.settings.notifications') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-bell me-2"></i> Notifikasi
                </a>
                <a href="{{ route('admin.settings.restaurant') }}" class="list-group-item list-group-item-action active">
                    <i class="fas fa-utensils me-2"></i> Kantin
                </a>
            </div>
        </div>
        
        <div class="card card-kantin">
            <div class="card-body text-center">
                <div class="mb-3">
                    <img src="{{ asset('images/logojpg.png') }}" 
                         class="rounded-circle border border-3 border-primary" 
                         alt="Restaurant Logo"
                         style="width: 100px; height: 100px; object-fit: cover;">
                </div>
                <h6 class="mb-1">Kantin Sehat</h6>
                <p class="text-muted mb-2">Makanan Sehat untuk Semua</p>
                <small class="text-muted d-block">ID: KTN-001</small>
                <small class="text-muted">Beroperasi sejak: Jan 2023</small>
            </div>
        </div>
    </div>
    
    <!-- Restaurant Settings Content -->
    <div class="col-md-9">
        <!-- Restaurant Information -->
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h5 class="mb-0">Informasi Kantin</h5>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="restaurant_name" class="form-label">Nama Kantin <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-kantin" id="restaurant_name" name="restaurant_name" 
                                       value="Kantin Sehat" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="restaurant_email" class="form-label">Email Kantin</label>
                                <input type="email" class="form-control form-control-kantin" id="restaurant_email" name="restaurant_email" 
                                       value="info@kantinsehat.com">
                            </div>
                            
                            <div class="mb-3">
                                <label for="restaurant_phone" class="form-label">Telepon Kantin</label>
                                <input type="text" class="form-control form-control-kantin" id="restaurant_phone" name="restaurant_phone" 
                                       value="(021) 1234567">
                            </div>
                            
                            <div class="mb-3">
                                <label for="restaurant_address" class="form-label">Alamat Kantin</label>
                                <textarea class="form-control form-control-kantin" id="restaurant_address" name="restaurant_address" 
                                          rows="3">Jl. Sehat No. 123, Jakarta Pusat 10110</textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="restaurant_logo" class="form-label">Logo Kantin</label>
                                <div class="card border-dashed p-3 text-center">
                                    <img id="logoPreview" src="https://via.placeholder.com/300x150/28a745/ffffff?text=KANTIN+SEHAT" 
                                         class="img-fluid rounded mb-3" alt="Logo Preview" 
                                         style="max-height: 100px; object-fit: contain;">
                                    <input type="file" class="form-control form-control-kantin image-preview" 
                                           id="restaurant_logo" name="restaurant_logo" accept="image/*"
                                           data-preview="#logoPreview">
                                    <small class="text-muted d-block mt-2">Format: JPG, PNG. Max: 2MB</small>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" class="form-control form-control-kantin" id="website" name="website" 
                                       value="https://kantinsehat.com">
                            </div>
                            
                            <div class="mb-3">
                                <label for="tax_id" class="form-label">NPWP</label>
                                <input type="text" class="form-control form-control-kantin" id="tax_id" name="tax_id" 
                                       value="12.345.678.9-012.345">
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-kantin">
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Operating Hours -->
        <div class="card card-kantin mb-4">
            <div class="card-header">
                <h5 class="mb-0">Jam Operasional</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="20%">Hari</th>
                                <th width="40%">Jam Buka</th>
                                <th width="40%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $operatingHours = [
                                    ['Senin', '08:00', '22:00', true],
                                    ['Selasa', '08:00', '22:00', true],
                                    ['Rabu', '08:00', '22:00', true],
                                    ['Kamis', '08:00', '22:00', true],
                                    ['Jumat', '08:00', '22:00', true],
                                    ['Sabtu', '09:00', '20:00', true],
                                    ['Minggu', '10:00', '18:00', false],
                                ];
                            @endphp
                            
                            @foreach($operatingHours as $day)
                            <tr>
                                <td>
                                    <strong>{{ $day[0] }}</strong>
                                </td>
                                <td>
                                    <div class="row g-2">
                                        <div class="col">
                                            <input type="time" class="form-control form-control-sm" value="{{ $day[1] }}">
                                        </div>
                                        <div class="col-auto align-self-center">s/d</div>
                                        <div class="col">
                                            <input type="time" class="form-control form-control-sm" value="{{ $day[2] }}">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" {{ $day[3] ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ $day[3] ? 'Buka' : 'Tutup' }}
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-end mt-3">
                    <button type="button" class="btn btn-kantin">
                        <i class="fas fa-save me-2"></i> Simpan Jam Operasional
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Restaurant Settings -->
        <div class="row">
            <div class="col-md-6">
                <div class="card card-kantin mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Pengaturan Umum</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Mata Uang</label>
                            <select class="form-control form-control-kantin">
                                <option value="IDR" selected>Rupiah (Rp)</option>
                                <option value="USD">US Dollar ($)</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Pajak (VAT)</label>
                            <div class="input-group">
                                <input type="number" class="form-control" value="10" min="0" max="100">
                                <span class="input-group-text">%</span>
                            </div>
                            <small class="text-muted">Pajak pertambahan nilai</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Biaya Layanan</label>
                            <div class="input-group">
                                <input type="number" class="form-control" value="5" min="0" max="100">
                                <span class="input-group-text">%</span>
                            </div>
                            <small class="text-muted">Biaya layanan tambahan</small>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enableDelivery" checked>
                                <label class="form-check-label" for="enableDelivery">
                                    Aktifkan Pengantaran
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enableTakeaway" checked>
                                <label class="form-check-label" for="enableTakeaway">
                                    Aktifkan Take Away
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card card-kantin mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Pengaturan Pesanan</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Estimasi Waktu Pesanan</label>
                            <div class="input-group">
                                <input type="number" class="form-control" value="15" min="5" max="60">
                                <span class="input-group-text">menit</span>
                            </div>
                            <small class="text-muted">Rata-rata waktu penyiapan pesanan</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Minimal Pesanan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" value="20000" min="0">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Batas Pesanan Online</label>
                            <div class="input-group">
                                <input type="time" class="form-control" value="21:00">
                            </div>
                            <small class="text-muted">Batas waktu pesanan online</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Metode Pembayaran</label>
                            <div class="d-flex flex-column">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cashPayment" checked>
                                    <label class="form-check-label" for="cashPayment">
                                        <i class="fas fa-money-bill-wave me-2"></i> Tunai
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="qrisPayment" checked>
                                    <label class="form-check-label" for="qrisPayment">
                                        <i class="fas fa-qrcode me-2"></i> QRIS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bankTransfer">
                                    <label class="form-check-label" for="bankTransfer">
                                        <i class="fas fa-university me-2"></i> Transfer Bank
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ewalletPayment" checked>
                                    <label class="form-check-label" for="ewalletPayment">
                                        <i class="fas fa-mobile-alt me-2"></i> E-Wallet
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Restaurant Statistics -->
        <div class="card card-kantin">
            <div class="card-header">
                <h5 class="mb-0">Statistik Kantin</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3 col-6 mb-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body p-3">
                                <h3 class="mb-0">1,245</h3>
                                <small>Total Pesanan</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-6 mb-3">
                        <div class="card bg-success text-white">
                            <div class="card-body p-3">
                                <h3 class="mb-0">Rp 42.5JT</h3>
                                <small>Total Pendapatan</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-6 mb-3">
                        <div class="card bg-info text-white">
                            <div class="card-body p-3">
                                <h3 class="mb-0">95</h3>
                                <small>Pelanggan Aktif</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-6 mb-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body p-3">
                                <h3 class="mb-0">4.8</h3>
                                <small>Rating Rata-rata</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6>Ringkasan Bulan Ini</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <td>Pesanan Bulan Ini</td>
                                    <td class="text-end">142</td>
                                </tr>
                                <tr>
                                    <td>Pendapatan Bulan Ini</td>
                                    <td class="text-end text-success">Rp 4.8JT</td>
                                </tr>
                                <tr>
                                    <td>Pelanggan Baru</td>
                                    <td class="text-end">12</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm">
                                <tr>
                                    <td>Produk Terjual</td>
                                    <td class="text-end">245</td>
                                </tr>
                                <tr>
                                    <td>Rata-rata Pesanan</td>
                                    <td class="text-end">Rp 33.8K</td>
                                </tr>
                                <tr>
                                    <td>Produk Paling Laris</td>
                                    <td class="text-end">Nasi Goreng</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-chart-bar me-2"></i> Lihat Laporan Detail
                    </button>
                    <button class="btn btn-kantin">
                        <i class="fas fa-print me-2"></i> Cetak Laporan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection