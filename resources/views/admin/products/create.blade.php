@extends('layouts.app')

@section('title', 'Tambah Produk Baru - Kantin Sehat')
@section('page-title', 'Tambah Produk')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Data Produk</a></li>
<li class="breadcrumb-item active">Tambah Produk</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-kantin shadow-sm border-0">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0 py-1">Tambah Data Produk Baru</h5>
            </div>
            <div class="card-body p-4">
                <form id="createProductForm" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="product_name" name="name" placeholder="Contoh: Nasi Goreng Spesial" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select select2" id="category" name="category_id" required>
                                        <option value="" selected disabled>Pilih Kategori</option>
                                        <option value="1">Makanan</option>
                                        <option value="2">Minuman</option>
                                        <option value="3">Snack</option>
                                        <option value="4">Buah-buahan</option>
                                        <option value="5">Lauk Pauk</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Harga Jual (Rp) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="0" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="stock" class="form-label">Stok Awal <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="stock" name="stock" placeholder="0" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="min_stock" class="form-label">Stok Minimum</label>
                                    <input type="number" class="form-control" id="min_stock" name="min_stock" placeholder="5">
                                </div>
                                <div class="col-md-4">
                                    <label for="unit" class="form-label">Satuan</label>
                                    <select class="form-select" id="unit" name="unit">
                                        <option value="porsi">Porsi</option>
                                        <option value="bungkus">Bungkus</option>
                                        <option value="gelas">Gelas</option>
                                        <option value="buah">Buah</option>
                                        <option value="piring">Piring</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Produk</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Jelaskan detail produk..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="ingredients" class="form-label">Bahan-bahan</label>
                                <textarea class="form-control" id="ingredients" name="ingredients" rows="2" placeholder="Contoh: Nasi, telur, sayuran..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Informasi Gizi (per porsi)</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">Kalori</span>
                                            <input type="text" name="nutrition_cal" class="form-control" placeholder="kcal">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">Protein</span>
                                            <input type="text" name="nutrition_pro" class="form-control" placeholder="g">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">Karbo</span>
                                            <input type="text" name="nutrition_carb" class="form-control" placeholder="g">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text">Lemak</span>
                                            <input type="text" name="nutrition_fat" class="form-control" placeholder="g">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="form-label d-block text-center">Foto Produk</label>
                                <div class="card border-dashed p-3 text-center bg-light shadow-sm">
                                    <img id="photoPreview" src="https://via.placeholder.com/200x200?text=No+Image"
                                        class="img-fluid rounded mb-3 mx-auto" style="width: 200px; height: 200px; object-fit: cover;">
                                    <input type="file" class="form-control form-control-sm" id="photo" name="image" accept="image/*">
                                    <small class="text-muted mt-2 d-block">Maksimal 2MB (JPG/PNG)</small>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Label & Tags</label>
                                <div class="border rounded p-3 bg-white">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="best_seller" name="tags[]" value="best_seller">
                                        <label class="form-check-label" for="best_seller"><i class="fas fa-fire text-danger me-1"></i> Best Seller</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="healthy" name="tags[]" value="healthy" checked>
                                        <label class="form-check-label" for="healthy"><i class="fas fa-leaf text-success me-1"></i> Pilihan Sehat</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="organic" name="tags[]" value="organic">
                                        <label class="form-check-label" for="organic"><i class="fas fa-seedling text-primary me-1"></i> Organik</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="promo" name="is_promo" value="1">
                                        <label class="form-check-label" for="promo"><i class="fas fa-tag text-danger me-1"></i> Sedang Promo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Penjualan</label>
                                <div class="border rounded p-3 bg-white">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="s1" value="active" checked>
                                        <label class="form-check-label text-success" for="s1"><i class="fas fa-check-circle me-1"></i> Aktif</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="s2" value="inactive">
                                        <label class="form-check-label text-secondary" for="s2"><i class="fas fa-times-circle me-1"></i> Nonaktif</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="discount" class="form-label">Diskon (%)</label>
                                <input type="number" class="form-control" id="discount" name="discount" value="0" min="0" max="100">
                            </div>

                            <div class="mb-3">
                                <label for="expiry_date" class="form-label">Tanggal Kadaluarsa</label>
                                <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary px-4">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                        <button type="reset" class="btn btn-light px-4 border">
                            <i class="fas fa-redo me-2"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-success px-5 shadow-sm" id="btnSave">
                            <i class="fas fa-save me-2"></i> Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Success --}}
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-body text-center p-5">
                <div class="mb-4">
                    <i class="fas fa-check-circle text-success" style="font-size: 80px;"></i>
                </div>
                <h3 class="mb-3">Berhasil!</h3>
                <p class="text-muted mb-4">Produk baru telah berhasil ditambahkan ke menu kantin.</p>
                <button type="button" class="btn btn-success w-100 py-2" onclick="window.location.href='{{ route('admin.products.index') }}'">
                    Selesai & Lihat Daftar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Preview Foto Produk
        $("#photo").change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $("#photoPreview").attr("src", e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Submit Form AJAX Simulation
        $('#createProductForm').on('submit', function(e) {
            e.preventDefault();
            const btn = $('#btnSave');
            btn.html('<span class="spinner-border spinner-border-sm me-2"></span> Menyimpan...').attr('disabled', true);

            // Simulasi proses simpan
            setTimeout(function() {
                $('#successModal').modal('show');
                btn.html('<i class="fas fa-save me-2"></i> Simpan Produk').attr('disabled', false);
            }, 1000);
        });
    });
</script>
@endpush