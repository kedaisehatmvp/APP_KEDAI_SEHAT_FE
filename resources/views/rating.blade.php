<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Makanan - Kantin Sehat</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts - Lato -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/rating.css') }}">
</head>
<body>
    <!-- ===== HEADER ===== -->
    <div class="rating-header">
        <div class="container">
            <div class="d-flex align-items-center">
                <button class="btn btn-back" onclick="window.history.back()">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <div class="ms-3">
                    <h1 class="mb-2">
                        <i class="fas fa-star me-2"></i>Rating Makanan
                    </h1>
                    <p class="mb-0">Berikan penilaian untuk makanan yang telah Anda pesan</p>
                </div>
            </div>
        </div>
    </div>

    <!--===== MAIN CONTENT =====-->
    <div class="container mt-4">
        <!-- Step 1: Pilih Makanan -->
        <div class="step-card active" id="step1">
            <div class="step-header">
                <span class="step-number">1</span>
                <h5 class="step-title">Pilih Makanan</h5>
            </div>
            
            <div class="step-body">
                <p class="text-muted mb-4">Pilih makanan dari pesanan terakhir yang telah selesai</p>
                
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

        <!-- Step 2: Beri Rating -->
        <div class="step-card" id="step2">
            <div class="step-header">
                <span class="step-number">2</span>
                <h5 class="step-title">Beri Rating</h5>
            </div>
            
            <div class="step-body">
                <div id="selectedFoodInfo" class="mb-4">
                    <!-- Info makanan terpilih akan muncul di sini -->
                </div>
                
                <div class="rating-section mb-4">
                    <h6 class="mb-3">Berapa bintang untuk makanan ini?</h6>
                    <div class="star-rating">
                        <i class="far fa-star" data-rating="1"></i>
                        <i class="far fa-star" data-rating="2"></i>
                        <i class="far fa-star" data-rating="3"></i>
                        <i class="far fa-star" data-rating="4"></i>
                        <i class="far fa-star" data-rating="5"></i>
                    </div>
                    <div class="rating-text mt-2" id="ratingText">Belum ada rating</div>
                    <input type="hidden" id="selectedRating" value="0">
                </div>
                
                <div class="comment-section mb-4">
                    <label for="comment" class="form-label">Komentar (opsional)</label>
                    <textarea class="form-control" id="comment" rows="4" 
                              placeholder="Bagikan pengalaman Anda tentang makanan ini..."></textarea>
                    <small class="text-muted">Maksimal 500 karakter</small>
                    <div class="text-end">
                        <span id="charCount">0/500</span>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-back-step" onclick="backToStep1()">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </button>
                    <button class="btn btn-submit" onclick="submitRating()" disabled id="submitBtn">
                        <i class="fas fa-paper-plane me-2"></i> Kirim Rating
                    </button>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        <div class="success-card d-none" id="successMessage">
            <div class="text-center">
                <i class="fas fa-check-circle success-icon"></i>
                <h4 class="mt-3">Terima Kasih!</h4>
                <p class="text-muted mb-4">Rating Anda telah berhasil dikirim</p>
                <button class="btn btn-primary" onclick="window.location.href='/order-history'">
                    Kembali ke Riwayat Pesanan
                </button>
                <button class="btn btn-outline-primary ms-2" onclick="resetForm()">
                    Beri Rating Lainnya
                </button>
            </div>
        </div>
    </div>

    <!-- ===== SCRIPTS ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/rating.js') }}"></script>
</body>
</html>