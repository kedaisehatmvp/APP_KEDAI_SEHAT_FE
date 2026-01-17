<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan - Kantin Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <div class="container-wrapper">
        <!-- Header Section -->
        <div class="header-section">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">Tambah Pelanggan Baru</h2>
                    <p class="mb-0" style="opacity: 0.9;">Isi NISN untuk mengisi data otomatis, atau isi manual</p>
                </div>
                <a href="/index" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>
            </div>
        </div>
        
        <!-- Form Section -->
        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-person-plus me-2"></i>Form Data Pelanggan</h5>
            </div>
            <div class="card-body">
                <form id="formTambahPelanggan">
                    <!-- Input NISN -->
                    <div class="mb-4">
                        <label for="nisn" class="form-label">NIS</label>
                        <div class="input-group">
                            <input type="text" 
                                   class="form-control" 
                                   id="nisn" 
                                   placeholder="Masukkan NIS (10 digit)"
                                   maxlength="10">
                            <button class="btn btn-primary" type="button" id="btnCariNISN">
                                <i class="bi bi-search me-1"></i>Cari
                            </button>
                        </div>
                        <div class="info-text">
                            Kosongkan jika tidak diketahui atau ingin input manual
                        </div>
                        
                        <!-- Status Pencarian -->
                        <div class="mt-2">
                            <div class="alert alert-danger d-none" id="errorAlert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                NIS tidak ditemukan. Silakan isi data secara manual.
                            </div>
                            <div class="alert alert-success d-none" id="successAlert">
                                <i class="bi bi-check-circle me-2"></i>
                                Data ditemukan! Informasi pelanggan telah diisi.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Pelanggan -->
                    <div class="section-divider">
                        <h6>Informasi Pelanggan</h6>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="nama" 
                                   placeholder="Masukkan nama lengkap"
                                   required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Kelas Saat Ini</label>
                            <select class="form-select" id="status" required>
                                <option value="">Pilih kelas</option>
                                <option value="#">X</option>
                                <option value="#">XI</option>
                                <option value="#">XII</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Jurusan</label>
                            <select class="form-select" id="status" required>
                                <option value="">Pilih Jurusan</option>
                                <option value="#">Teknik Komputer Jaringan</option>
                                <option value="#">Rekayasa Perangkat Lunak</option>
                                <option value="#">Perhotelan</option>
                                <option value="#">Teknik Mesin</option>
                                <option value="#">perkantoran</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="telepon" class="form-label">No. Telepon</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="telepon" 
                                   placeholder="Contoh: 081234567890"
                                   required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" 
                                   class="form-control" 
                                   id="email" 
                                   placeholder="nama@email.com">
                        </div>
                    </div>
                    
                  
                    
                    <div class="action-buttons">
                        <a href="index.html" class="btn btn-secondary">
                            <i class="bi bi-x-circle me-1"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary" id="btnSubmit">
                            <i class="bi bi-save me-1"></i>Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/form.js') }}"></script>
</body>
</html>