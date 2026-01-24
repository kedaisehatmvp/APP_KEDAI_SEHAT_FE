<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Masalah - Kantin Sehat</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts - Lato -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/report.css') }}">
</head>
<body>
    <!-- ===== HEADER ===== -->
    <div class="report-header">
        <div class="container">
            <div class="d-flex align-items-center">
                <button class="btn btn-back" onclick="window.history.back()">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div class="ms-3">
                    <h1 class="mb-2">
                        <i class="fas fa-flag me-2"></i>Report Masalah
                    </h1>
                    <p class="mb-0">Laporkan masalah pada makanan yang Anda pesan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="container mt-4">
        <!-- Step 1: Pilih Makanan -->
        <div class="step-card active" id="step1">
            <div class="step-header">
                <span class="step-number">1</span>
                <h5 class="step-title">Pilih Makanan</h5>
            </div>
            
            <div class="step-body">
                <p class="text-muted mb-4">Pilih makanan dari pesanan terakhir yang bermasalah</p>
                
                <div class="row g-3" id="foodList">
                    <!-- Makanan akan di-load via JavaScript -->
                </div>
                
                <div class="mt-4 text-end">
                    <button class="btn btn-next" onclick="goToStep2()" disabled id="nextBtn">
                        Lanjut <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Step 2: Laporkan Masalah -->
        <div class="step-card" id="step2">
            <div class="step-header">
                <span class="step-number">2</span>
                <h5 class="step-title">Laporkan Masalah</h5>
            </div>
            
            <div class="step-body">
                <div id="selectedFoodInfo" class="mb-4">
                    <!-- Info makanan terpilih akan muncul di sini -->
                </div>
                
                <div class="problem-type mb-4">
                    <h6 class="mb-3">Jenis Masalah</h6>
                    <div class="row g-2" id="problemTypes">
                        <!-- Problem types will be loaded here -->
                    </div>
                </div>
                
                <div class="description-section mb-4">
                    <label for="problemDescription" class="form-label">
                        <strong>Deskripsi Masalah</strong>
                        <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control" id="problemDescription" rows="5" 
                              placeholder="Jelaskan masalah yang Anda alami secara detail..."></textarea>
                    <small class="text-muted">Deskripsi yang jelas akan membantu kami menangani masalah dengan lebih baik</small>
                    <div class="text-end">
                        <span id="charCount">0/1000</span>
                    </div>
                </div>
                
                <div class="attachment-section mb-4">
                    <label class="form-label">Lampiran Foto (opsional)</label>
                    <div class="file-upload-area" onclick="document.getElementById('fileInput').click()">
                        <i class="fas fa-cloud-upload-alt fa-2x mb-3"></i>
                        <p class="mb-2">Klik untuk mengunggah foto</p>
                        <small class="text-muted">Maksimal 5MB, format: JPG, PNG</small>
                        <input type="file" id="fileInput" accept="image/*" style="display: none;" onchange="handleFileUpload(this)">
                    </div>
                    <div id="filePreview" class="mt-2"></div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-back-step" onclick="backToStep1()">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </button>
                    <button class="btn btn-submit" onclick="submitReport()" disabled id="submitBtn">
                        <i class="fas fa-paper-plane me-2"></i> Kirim Report
                    </button>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        <div class="success-card d-none" id="successMessage">
            <div class="text-center">
                <i class="fas fa-check-circle success-icon"></i>
                <h4 class="mt-3">Terima Kasih!</h4>
                <p class="text-muted mb-3">Laporan Anda telah berhasil dikirim</p>
                <p class="text-muted small">Tim kami akan meninjau laporan Anda dan menghubungi Anda jika diperlukan</p>
                <button class="btn btn-primary" onclick="window.location.href='/order-history'">
                    Kembali ke Riwayat Pesanan
                </button>
                <button class="btn btn-outline-primary ms-2" onclick="resetForm()">
                    Laporkan Masalah Lain
                </button>
            </div>
        </div>
    </div>

    <!-- ===== SCRIPTS ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/report.js') }}"></script>
</body>
</html>