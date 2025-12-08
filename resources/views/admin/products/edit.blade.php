@extends('layouts.app')

@section('title', 'Edit Produk - Kantin Sehat')
@section('page-title', 'Edit Produk')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Data Produk</a></li>
<li class="breadcrumb-item active">Edit Produk</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin">
            <div class="card-header">
                <h5 class="mb-0">Edit Produk #{{ $id ?? 'PROD001' }}</h5>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-kantin" id="name" name="name" 
                                       value="Nasi Goreng Sehat" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                        <select class="form-control form-control-kantin select2" id="category" name="category" required>
                                            <option value="">Pilih Kategori</option>
                                            <option value="makanan" selected>Makanan</option>
                                            <option value="minuman">Minuman</option>
                                            <option value="snack">Snack</option>
                                            <option value="buah">Buah-buahan</option>
                                            <option value="lauk">Lauk Pauk</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-kantin" id="price" name="price" 
                                               value="25000" min="0" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Stok <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-kantin" id="stock" name="stock" 
                                               value="25" min="0" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="min_stock" class="form-label">Stok Minimum</label>
                                        <input type="number" class="form-control form-control-kantin" id="min_stock" name="min_stock" 
                                               value="5" min="0">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="unit" class="form-label">Satuan</label>
                                        <select class="form-control form-control-kantin" id="unit" name="unit">
                                            <option value="porsi" selected>Porsi</option>
                                            <option value="bungkus">Bungkus</option>
                                            <option value="gelas">Gelas</option>
                                            <option value="buah">Buah</option>
                                            <option value="piring">Piring</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Produk</label>
                                <textarea class="form-control form-control-kantin" id="description" name="description" 
                                          rows="4">Nasi goreng sehat dengan tambahan sayuran organik dan protein tanpa MSG. Cocok untuk sarapan atau makan siang.</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="ingredients" class="form-label">Bahan-bahan</label>
                                <textarea class="form-control form-control-kantin" id="ingredients" name="ingredients" 
                                          rows="3">Nasi, wortel, buncis, jagung, telur, bawang merah, bawang putih, minyak zaitun.</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nutrition" class="form-label">Informasi Gizi (per porsi)</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">Kalori</span>
                                            <input type="text" class="form-control" value="350" placeholder="kcal">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">Protein</span>
                                            <input type="text" class="form-control" value="15" placeholder="g">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">Karbo</span>
                                            <input type="text" class="form-control" value="45" placeholder="g">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">Lemak</span>
                                            <input type="text" class="form-control" value="8" placeholder="g">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar Produk</label>
                                <div class="card border-dashed p-3 text-center">
                                    <img id="imagePreview" src="https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                         class="img-fluid rounded mb-3" alt="Preview" 
                                         style="max-height: 200px; width: 100%; object-fit: cover;">
                                    <input type="file" class="form-control form-control-kantin image-preview" 
                                           id="image" name="image" accept="image/*"
                                           data-preview="#imagePreview">
                                    <small class="text-muted d-block mt-2">Format: JPG, PNG, GIF. Max: 2MB</small>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Tags</label>
                                <div class="border rounded p-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="healthy" name="tags[]" value="healthy" checked>
                                        <label class="form-check-label" for="healthy">
                                            <i class="fas fa-leaf text-success me-1"></i> Sehat
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="vegetarian" name="tags[]" value="vegetarian">
                                        <label class="form-check-label" for="vegetarian">
                                            <i class="fas fa-carrot text-warning me-1"></i> Vegetarian
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="organic" name="tags[]" value="organic" checked>
                                        <label class="form-check-label" for="organic">
                                            <i class="fas fa-seedling text-primary me-1"></i> Organik
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="spicy" name="tags[]" value="spicy">
                                        <label class="form-check-label" for="spicy">
                                            <i class="fas fa-pepper-hot text-danger me-1"></i> Pedas
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="best_seller" name="tags[]" value="best_seller" checked>
                                        <label class="form-check-label" for="best_seller">
                                            <i class="fas fa-fire text-danger me-1"></i> Best Seller
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="new" name="tags[]" value="new">
                                        <label class="form-check-label" for="new">
                                            <i class="fas fa-star text-warning me-1"></i> Baru
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="border rounded p-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="active" checked>
                                        <label class="form-check-label text-success" for="status_active">
                                            <i class="fas fa-check-circle me-1"></i> Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="inactive">
                                        <label class="form-check-label text-secondary" for="status_inactive">
                                            <i class="fas fa-times-circle me-1"></i> Nonaktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_draft" value="draft">
                                        <label class="form-check-label text-warning" for="status_draft">
                                            <i class="fas fa-edit me-1"></i> Draft
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="discount" class="form-label">Diskon (%)</label>
                                <input type="number" class="form-control form-control-kantin" id="discount" name="discount" 
                                       value="0" min="0" max="100">
                            </div>
                            
                            <div class="mb-3">
                                <label for="expiry_date" class="form-label">Tanggal Kadaluarsa</label>
                                <input type="date" class="form-control form-control-kantin" id="expiry_date" name="expiry_date" 
                                       value="{{ date('Y-m-d', strtotime('+30 days')) }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <div>
                            <button type="button" class="btn btn-danger btn-delete" data-id="{{ $id ?? 1 }}">
                                <i class="fas fa-trash me-2"></i> Hapus Produk
                            </button>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-kantin-outline">
                                <i class="fas fa-arrow-left me-2"></i> Kembali
                            </a>
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-redo me-2"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-kantin">
                                <i class="fas fa-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus produk ini?</p>
                <p class="text-danger"><strong>Produk yang dihapus tidak dapat dikembalikan!</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" action="#" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Handle delete button click
        $('.btn-delete').click(function() {
            const id = $(this).data('id');
            $('#deleteForm').attr('action', '/admin/products/' + id);
            $('#deleteModal').modal('show');
        });
    });
</script>
@endpush