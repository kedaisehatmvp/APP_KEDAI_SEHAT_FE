<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Kantin Sehat</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #28a745;
            --primary-dark: #218838;
            --secondary: #ffc107;
            --light: #f8f9fa;
            --dark: #343a40;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #17a2b8;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark);
            line-height: 1.6;
            background-color: #f8f9fa;
        }
        
        /* ===== NAVBAR ===== */
        .navbar {
            background: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary);
        }
        
        .navbar-brand span {
            color: var(--secondary);
        }
        
        .navbar-brand i {
            color: var(--primary);
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 10px;
            color: var(--dark) !important;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        /* ===== CHECKOUT HEADER ===== */
        .checkout-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 80px 0 40px;
        }
        
        .checkout-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .checkout-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .step-indicator {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            gap: 20px;
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            min-width: 80px;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            background: white;
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-bottom: 10px;
            border: 2px solid white;
        }
        
        .step.active .step-number {
            background: var(--secondary);
            color: var(--dark);
        }
        
        .step.completed .step-number {
            background: var(--primary);
            color: white;
        }
        
        .step-text {
            font-size: 0.8rem;
            font-weight: 500;
            text-align: center;
        }
        
        /* ===== CHECKOUT CONTENT ===== */
        .checkout-content {
            padding: 50px 0;
            min-height: 500px;
        }
        
        .checkout-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .checkout-card h3 {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f1f1;
        }
        
        /* ===== ORDER SUMMARY ===== */
        .order-summary {
            position: sticky;
            top: 100px;
        }
        
        .order-items {
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 20px;
        }
        
        .order-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .order-item-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 15px;
        }
        
        .order-item-details {
            flex: 1;
        }
        
        .order-item-name {
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .order-item-price {
            color: var(--primary);
            font-weight: 600;
        }
        
        .order-item-quantity {
            color: #666;
            font-size: 0.9rem;
        }
        
        .order-total {
            border-top: 2px solid #f1f1f1;
            padding-top: 20px;
            margin-top: 20px;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: #666;
        }
        
        .total-row.grand-total {
            font-weight: 600;
            color: var(--dark);
            font-size: 1.2rem;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }
        
        .promo-code {
            margin-top: 20px;
        }
        
        .promo-input {
            display: flex;
            gap: 10px;
        }
        
        .promo-input input {
            flex: 1;
            padding: 10px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .promo-input input:focus {
            border-color: var(--primary);
            outline: none;
        }
        
        .btn-apply {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .btn-apply:hover {
            background: var(--primary-dark);
        }
        
        /* ===== FORM STYLES ===== */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            transition: all 0.3s;
            width: 100%;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
            outline: none;
        }
        
        .form-select {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            transition: all 0.3s;
            width: 100%;
            background-color: white;
        }
        
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
            outline: none;
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }
        
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 0 10px;
        }
        
        @media (max-width: 768px) {
            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
        
        /* ===== PAYMENT METHODS ===== */
        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .payment-method {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .payment-method:hover {
            border-color: var(--primary);
        }
        
        .payment-method.selected {
            border-color: var(--primary);
            background: rgba(40, 167, 69, 0.05);
        }
        
        .payment-method input {
            margin-right: 15px;
        }
        
        .payment-icon {
            width: 40px;
            height: 40px;
            background: #f8f9fa;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .payment-icon i {
            font-size: 1.5rem;
            color: var(--primary);
        }
        
        .payment-info h6 {
            margin: 0;
            font-weight: 600;
        }
        
        .payment-info p {
            margin: 5px 0 0;
            color: #666;
            font-size: 0.9rem;
        }
        
        /* ===== PAYMENT DETAILS SECTION ===== */
        .payment-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            display: none;
        }
        
        .payment-details.active {
            display: block;
        }
        
        .qr-code-container {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid #e9ecef;
        }
        
        .qr-code-placeholder {
            width: 200px;
            height: 200px;
            background: linear-gradient(45deg, #f1f1f1, #e9ecef);
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }
        
        .qr-code-placeholder i {
            font-size: 3rem;
            color: var(--primary);
        }
        
        .qr-code-instruction {
            margin-top: 15px;
        }
        
        .bank-details {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #e9ecef;
        }
        
        .bank-info {
            margin-bottom: 15px;
        }
        
        .bank-info p {
            margin: 5px 0;
        }
        
        .bank-info strong {
            color: var(--dark);
            min-width: 120px;
            display: inline-block;
        }
        
        .upload-proof {
            background: white;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid #e9ecef;
        }
        
        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 10px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 15px;
        }
        
        .upload-area:hover {
            border-color: var(--primary);
            background: rgba(40, 167, 69, 0.05);
        }
        
        .upload-area i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .uploaded-file {
            display: flex;
            align-items: center;
            background: #f8f9fa;
            padding: 10px 15px;
            border-radius: 8px;
            margin-top: 10px;
        }
        
        .uploaded-file i {
            color: var(--primary);
            margin-right: 10px;
        }
        
        .file-info {
            flex: 1;
        }
        
        .remove-file {
            color: var(--danger);
            background: none;
            border: none;
            cursor: pointer;
        }
        
        /* ===== BUTTONS ===== */
        .btn-checkout {
            background: var(--primary);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-checkout:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(40, 167, 69, 0.3);
        }
        
        .btn-back {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-back:hover {
            background: var(--primary);
            color: white;
        }
        
        /* ===== FOOTER ===== */
        footer {
            background: var(--dark);
            color: white;
            padding: 40px 0 20px;
            margin-top: 80px;
        }
        
        .footer-logo {
            font-weight: 700;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 20px;
            display: inline-block;
        }
        
        .footer-logo span {
            color: var(--secondary);
        }
        
        .footer-about p {
            color: #bbb;
            margin-bottom: 20px;
        }
        
        .copyright {
            text-align: center;
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #bbb;
            font-size: 0.9rem;
        }
        
        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .order-summary {
                position: static;
                margin-top: 30px;
            }
            
            .step-indicator {
                gap: 15px;
                flex-wrap: wrap;
            }
            
            .step {
                min-width: 70px;
            }
            
            .step-text {
                font-size: 0.75rem;
            }
        }
        
        @media (max-width: 768px) {
            .checkout-header {
                padding: 60px 0 30px;
            }
            
            .checkout-header h1 {
                font-size: 2rem;
            }
            
            .step-indicator {
                gap: 10px;
            }
            
            .step {
                min-width: 60px;
            }
            
            .step-text {
                font-size: 0.7rem;
            }
            
            .checkout-card {
                padding: 20px;
            }
        }
        
        @media (max-width: 576px) {
            .checkout-header h1 {
                font-size: 1.8rem;
            }
            
            .btn-checkout,
            .btn-back {
                padding: 12px 20px;
                font-size: 1rem;
            }
        }
        
        /* ===== LOADING SPINNER ===== */
        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--primary);
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            display: none;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* ===== SUCCESS MODAL ===== */
        .success-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .success-modal.active {
            display: flex;
        }
        
        .success-content {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .success-icon {
            width: 80px;
            height: 80px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        
        .success-icon i {
            font-size: 2.5rem;
            color: var(--primary);
        }
        
        .success-content h3 {
            color: var(--primary);
            margin-bottom: 10px;
        }
        
        .success-content p {
            color: #666;
            margin-bottom: 20px;
        }
        
        .order-number {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            font-family: monospace;
            font-weight: 600;
        }
        
        .btn-success {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-success:hover {
            background: var(--primary-dark);
        }
    </style>
</head>
<body>
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-utensils me-2"></i>Kantin<span>Sehat</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#promo">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== CHECKOUT HEADER ===== -->
    <section class="checkout-header">
        <div class="container">
            <h1>Checkout</h1>
            <p>Selesaikan pesanan Anda dalam 4 langkah mudah</p>
            
            <div class="step-indicator">
                <div class="step active" id="step1">
                    <div class="step-number">1</div>
                    <div class="step-text">Informasi</div>
                </div>
                <div class="step" id="step2">
                    <div class="step-number">2</div>
                    <div class="step-text">Pembayaran</div>
                </div>
                <div class="step" id="step3">
                    <div class="step-number">3</div>
                    <div class="step-text">Bukti Bayar</div>
                </div>
                <div class="step" id="step4">
                    <div class="step-number">4</div>
                    <div class="step-text">Konfirmasi</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CHECKOUT CONTENT ===== -->
    <section class="checkout-content">
        <div class="container">
            <div class="row">
                <!-- Left Column: Checkout Forms -->
                <div class="col-lg-8">
                    <!-- Step 1: Customer Information -->
                    <div class="checkout-step" id="step1Content">
                        <div class="checkout-card">
                            <h3><i class="fas fa-user-circle me-2"></i>Informasi Pelanggan</h3>
                            
                            <form id="customerForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nama Lengkap *</label>
                                            <input type="text" id="name" class="form-control" required 
                                                   placeholder="Masukkan nama lengkap">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email *</label>
                                            <input type="email" id="email" class="form-control" required 
                                                   placeholder="nama@email.com">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Nomor Telepon *</label>
                                            <input type="tel" id="phone" class="form-control" required 
                                                   placeholder="08xxxxxxxxxx">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="class" class="form-label">Kelas *</label>
                                            <select id="class" class="form-select" required>
                                                <option value="">Pilih Kelas</option>
                                                <option value="X">X (Sepuluh)</option>
                                                <option value="XI">XI (Sebelas)</option>
                                                <option value="XII">XII (Dua Belas)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="address" class="form-label">Alamat (Opsional untuk ambil di tempat)</label>
                                    <input type="text" id="address" class="form-control" 
                                           placeholder="Alamat lengkap (jika perlu diantar)">
                                </div>
                                
                                <div class="form-group">
                                    <label for="notes" class="form-label">Catatan Pesanan (Opsional)</label>
                                    <textarea id="notes" class="form-control" rows="3" 
                                              placeholder="Catatan khusus untuk pesanan Anda"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Metode Pengambilan *</label>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pickup" 
                                                       id="pickupTakeaway" value="takeaway" checked>
                                                <label class="form-check-label" for="pickupTakeaway">
                                                    <i class="fas fa-store me-2"></i>Ambil di Kantin
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pickup" 
                                                       id="pickupDelivery" value="delivery">
                                                <label class="form-check-label" for="pickupDelivery">
                                                    <i class="fas fa-truck me-2"></i>Antar ke Kelas
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <button class="btn-back" onclick="window.location.href='/menu'">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Menu
                                </button>
                                <button class="btn-checkout" onclick="goToStep(2)">
                                    Lanjut ke Pembayaran <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 2: Payment -->
                    <div class="checkout-step" id="step2Content" style="display: none;">
                        <div class="checkout-card">
                            <h3><i class="fas fa-credit-card me-2"></i>Metode Pembayaran</h3>
                            
                            <div class="payment-methods">
                                <label class="payment-method" for="paymentCash">
                                    <input type="radio" id="paymentCash" name="payment" value="cash" checked>
                                    <div class="payment-icon">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <div class="payment-info">
                                        <h6>Tunai (COD)</h6>
                                        <p>Bayar saat mengambil pesanan</p>
                                    </div>
                                </label>
                                
                                <label class="payment-method" for="paymentQRIS">
                                    <input type="radio" id="paymentQRIS" name="payment" value="qris">
                                    <div class="payment-icon">
                                        <i class="fas fa-qrcode"></i>
                                    </div>
                                    <div class="payment-info">
                                        <h6>QRIS</h6>
                                        <p>Scan QR Code untuk pembayaran</p>
                                    </div>
                                </label>
                                
                                <label class="payment-method" for="paymentBank">
                                    <input type="radio" id="paymentBank" name="payment" value="bank">
                                    <div class="payment-icon">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="payment-info">
                                        <h6>Transfer Bank</h6>
                                        <p>Transfer ke rekening Kantin Sehat</p>
                                    </div>
                                </label>
                                
                                <label class="payment-method" for="paymentEwallet">
                                    <input type="radio" id="paymentEwallet" name="payment" value="ewallet">
                                    <div class="payment-icon">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                    <div class="payment-info">
                                        <h6>E-Wallet</h6>
                                        <p>Gopay, OVO, Dana, LinkAja</p>
                                    </div>
                                </label>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <button class="btn-back" onclick="goToStep(1)">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Informasi
                                </button>
                                <button class="btn-checkout" onclick="goToStep(3)">
                                    Lanjut ke Bukti Bayar <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 3: Payment Proof -->
                    <div class="checkout-step" id="step3Content" style="display: none;">
                        <div class="checkout-card">
                            <h3><i class="fas fa-receipt me-2"></i>Bukti Pembayaran</h3>
                            
                            <!-- Payment Details based on selected method -->
                            <div id="paymentDetails"></div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <button class="btn-back" onclick="goToStep(2)">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Pembayaran
                                </button>
                                <button class="btn-checkout" onclick="goToStep(4)">
                                    Lanjut ke Konfirmasi <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 4: Confirmation -->
                    <div class="checkout-step" id="step4Content" style="display: none;">
                        <div class="checkout-card">
                            <h3><i class="fas fa-check-circle me-2"></i>Konfirmasi Pesanan</h3>
                            
                            <div class="order-review">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Silakan review pesanan Anda sebelum melakukan checkout
                                </div>
                                
                                <div class="customer-info mb-4">
                                    <h5 class="mb-3">Informasi Pelanggan</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Nama:</strong> <span id="reviewName">-</span></p>
                                            <p><strong>Email:</strong> <span id="reviewEmail">-</span></p>
                                            <p><strong>Telepon:</strong> <span id="reviewPhone">-</span></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Kelas:</strong> <span id="reviewClass">-</span></p>
                                            <p><strong>Metode:</strong> <span id="reviewPickup">-</span></p>
                                            <p><strong>Pembayaran:</strong> <span id="reviewPayment">-</span></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="order-items mb-4">
                                    <h5 class="mb-3">Detail Pesanan</h5>
                                    <!-- Order items will be loaded here -->
                                    <div id="reviewOrderItems"></div>
                                </div>
                                
                                <div class="order-summary-review">
                                    <h5 class="mb-3">Ringkasan Pembayaran</h5>
                                    <div id="reviewOrderSummary"></div>
                                </div>
                                
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="termsAgreement" required>
                                    <label class="form-check-label" for="termsAgreement">
                                        Saya setuju dengan <a href="#" class="text-primary">Syarat dan Ketentuan</a> 
                                        serta <a href="#" class="text-primary">Kebijakan Privasi</a> Kantin Sehat
                                    </label>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <button class="btn-back" onclick="goToStep(3)">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Bukti Bayar
                                </button>
                                <button class="btn-checkout" onclick="placeOrder()">
                                    <i class="fas fa-check me-2"></i> Selesaikan Pesanan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column: Order Summary -->
                <div class="col-lg-4">
                    <div class="order-summary">
                        <div class="checkout-card">
                            <h3><i class="fas fa-shopping-cart me-2"></i>Ringkasan Pesanan</h3>
                            
                            <div class="order-items" id="orderSummaryItems">
                                <!-- Order items will be loaded here -->
                                <div class="order-item">
                                    <div class="spinner" style="margin: 20px auto;"></div>
                                </div>
                            </div>
                            
                            <div class="order-total">
                                <div class="total-row">
                                    <span>Subtotal</span>
                                    <span id="subtotal">Rp 0</span>
                                </div>
                                <div class="total-row">
                                    <span>Biaya Pengiriman</span>
                                    <span id="deliveryFee">Rp 0</span>
                                </div>
                                <div class="total-row">
                                    <span>Diskon</span>
                                    <span id="discount">-Rp 0</span>
                                </div>
                                <div class="total-row grand-total">
                                    <span>Total</span>
                                    <span id="grandTotal">Rp 0</span>
                                </div>
                            </div>
                            
                            <div class="promo-code mt-4">
                                <h6 class="mb-2">Kode Promo</h6>
                                <div class="promo-input">
                                    <input type="text" id="promoCode" placeholder="Masukkan kode promo">
                                    <button class="btn-apply" onclick="applyPromo()">Terapkan</button>
                                </div>
                                <div id="promoMessage" class="mt-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SUCCESS MODAL ===== -->
    <div class="success-modal" id="successModal">
        <div class="success-content">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h3>Pesanan Berhasil!</h3>
            <p>Terima kasih telah berbelanja di Kantin Sehat. Pesanan Anda akan segera diproses.</p>
            
            <div class="order-number">
                No. Pesanan: <span id="orderNumber">KS-20240101-001</span>
            </div>
            
            <p>Kami akan mengirimkan detail pesanan ke email Anda.</p>
            
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="/menu" class="btn-success">
                    <i class="fas fa-shopping-cart me-2"></i> Belanja Lagi
                </a>
                <a href="/" class="btn-success" style="background: var(--secondary);">
                    <i class="fas fa-home me-2"></i> Beranda
                </a>
                <button class="btn-success" style="background: var(--info);" onclick="printReceipt()">
                    <i class="fas fa-print me-2"></i> Cetak Nota
                </button>
            </div>
        </div>
    </div>

    <!-- ===== FOOTER ===== -->
    <footer id="about">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <a href="/" class="footer-logo">
                        <i class="fas fa-utensils me-2"></i>Kantin<span>Sehat</span>
                    </a>
                    <div class="footer-about">
                        <p>Menyediakan makanan sehat dengan bahan organik terbaik untuk mendukung gaya hidup sehat Anda.</p>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <h5 class="text-white">Kontak</h5>
                    <div class="footer-contact">
                        <p><i class="fas fa-phone"></i> (021) 1234-5678</p>
                        <p><i class="fas fa-envelope"></i> info@kantinsehat.com</p>
                        <p><i class="fas fa-clock"></i> 08:00 - 20:00</p>
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <h5 class="text-white">Metode Pembayaran</h5>
                    <div class="d-flex gap-2 flex-wrap">
                        <i class="fas fa-credit-card fa-lg text-white-50"></i>
                        <i class="fas fa-qrcode fa-lg text-white-50"></i>
                        <i class="fab fa-gopay fa-lg text-white-50"></i>
                        <i class="fab fa-cc-visa fa-lg text-white-50"></i>
                        <i class="fab fa-cc-mastercard fa-lg text-white-50"></i>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2024 Kantin Sehat. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- ===== SCRIPTS ===== -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Cart data from localStorage - FIXED VERSION
        let cart = [];
        let currentStep = 1;
        let appliedPromo = null;
        const deliveryFee = 5000; // Rp 5,000 delivery fee
        let uploadedProof = null;
        
        // Available promo codes
        const promoCodes = {
            'SEHAT20': { discount: 0.2, message: 'Diskon 20% untuk pembelian pertama' },
            'KANTIN10': { discount: 0.1, message: 'Diskon 10% untuk semua produk' },
            'HEALTHY15': { discount: 0.15, message: 'Diskon 15% khusus menu sehat' }
        };
        
        // Bank information
        const bankInfo = {
            bankName: 'Bank BNI',
            accountNumber: '123-456-789-0',
            accountName: 'KANTIN SEHAT SMK',
            branch: 'Cabang Jakarta Pusat'
        };
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Load cart from multiple possible localStorage keys
            loadCartData();
            
            if (cart.length === 0) {
                // If cart is empty, redirect to menu
                Swal.fire({
                    title: 'Keranjang Kosong',
                    text: 'Silakan tambahkan menu ke keranjang terlebih dahulu',
                    icon: 'warning',
                    confirmButtonText: 'Lihat Menu'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/menu';
                    }
                });
            } else {
                console.log('Cart loaded successfully:', cart);
                loadOrderSummary();
                setupPaymentMethods();
                setupUploadArea();
                
                // Set current year in footer
                const yearElement = document.querySelector('.copyright p');
                if (yearElement) {
                    const currentYear = new Date().getFullYear();
                    yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
                }
                
                // Load saved data from localStorage
                loadSavedData();
            }
        });
        
        // Function to load cart data from localStorage
        function loadCartData() {
            // Try multiple possible keys
            const possibleKeys = ['kantinSehatCart', 'cart', 'shoppingCart', 'keranjang'];
            
            for (const key of possibleKeys) {
                try {
                    const storedData = localStorage.getItem(key);
                    if (storedData) {
                        const parsedData = JSON.parse(storedData);
                        if (Array.isArray(parsedData) && parsedData.length > 0) {
                            cart = parsedData;
                            console.log(`Cart loaded from key: ${key}`);
                            return;
                        }
                    }
                } catch (e) {
                    console.error(`Error parsing cart from ${key}:`, e);
                }
            }
            
            console.warn('No cart data found in localStorage');
            cart = [];
        }
        
        // Load saved data from localStorage
        function loadSavedData() {
            // Customer info
            const savedCustomer = JSON.parse(localStorage.getItem('customerInfo'));
            if (savedCustomer) {
                document.getElementById('name').value = savedCustomer.name || '';
                document.getElementById('email').value = savedCustomer.email || '';
                document.getElementById('phone').value = savedCustomer.phone || '';
                document.getElementById('class').value = savedCustomer.class || '';
                document.getElementById('address').value = savedCustomer.address || '';
                document.getElementById('notes').value = savedCustomer.notes || '';
                
                if (savedCustomer.pickup) {
                    document.querySelector(`input[name="pickup"][value="${savedCustomer.pickup}"]`).checked = true;
                }
            }
            
            // Payment method
            const savedPayment = localStorage.getItem('paymentMethod') || 'cash';
            document.querySelector(`input[name="payment"][value="${savedPayment}"]`).checked = true;
            
            // Applied promo
            const savedPromo = JSON.parse(localStorage.getItem('appliedPromo'));
            if (savedPromo) {
                appliedPromo = savedPromo;
                document.getElementById('promoCode').value = Object.keys(promoCodes).find(key => 
                    promoCodes[key].discount === savedPromo.discount
                ) || '';
                document.getElementById('promoMessage').innerHTML = 
                    `<span class="text-success">${savedPromo.message}</span>`;
            }
        }
        
        // Load order summary
        function loadOrderSummary() {
            const orderItemsContainer = document.getElementById('orderSummaryItems');
            
            if (cart.length === 0) {
                orderItemsContainer.innerHTML = `
                    <div class="text-center py-4">
                        <i class="fas fa-shopping-cart fa-2x text-muted mb-3"></i>
                        <p class="text-muted">Keranjang kosong</p>
                    </div>
                `;
                updateTotals(0, 0, 0);
                return;
            }
            
            let itemsHtml = '';
            let subtotal = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                
                // Gunakan default image jika tidak ada
                const itemImage = item.image || 'https://via.placeholder.com/60x60?text=Menu';
                
                itemsHtml += `
                    <div class="order-item">
                        <img src="${itemImage}" alt="${item.name}" class="order-item-img">
                        <div class="order-item-details">
                            <div class="order-item-name">${item.name}</div>
                            <div class="order-item-price">Rp ${item.price.toLocaleString('id-ID')}</div>
                            <div class="order-item-quantity">Jumlah: ${item.quantity}</div>
                        </div>
                    </div>
                `;
            });
            
            orderItemsContainer.innerHTML = itemsHtml;
            
            // Calculate delivery fee
            const pickupMethod = document.querySelector('input[name="pickup"]:checked')?.value || 'takeaway';
            const delivery = pickupMethod === 'delivery' ? deliveryFee : 0;
            
            // Calculate discount
            let discount = 0;
            if (appliedPromo) {
                discount = subtotal * appliedPromo.discount;
            }
            
            updateTotals(subtotal, delivery, discount);
        }
        
        // Update totals
        function updateTotals(subtotal, delivery, discount) {
            const grandTotal = subtotal + delivery - discount;
            
            document.getElementById('subtotal').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
            document.getElementById('deliveryFee').textContent = `Rp ${delivery.toLocaleString('id-ID')}`;
            document.getElementById('discount').textContent = `-Rp ${discount.toLocaleString('id-ID')}`;
            document.getElementById('grandTotal').textContent = `Rp ${grandTotal.toLocaleString('id-ID')}`;
        }
        
        // Setup payment methods
        function setupPaymentMethods() {
            const paymentMethods = document.querySelectorAll('input[name="payment"]');
            
            paymentMethods.forEach(method => {
                method.addEventListener('change', function() {
                    // Add selected class to parent
                    document.querySelectorAll('.payment-method').forEach(pm => {
                        pm.classList.remove('selected');
                    });
                    
                    if (this.checked) {
                        this.closest('.payment-method').classList.add('selected');
                    }
                    
                    // Save to localStorage
                    localStorage.setItem('paymentMethod', this.value);
                    
                    // Update delivery fee based on pickup method
                    const pickupMethod = document.querySelector('input[name="pickup"]:checked')?.value || 'takeaway';
                    let subtotal = 0;
                    cart.forEach(item => {
                        subtotal += item.price * item.quantity;
                    });
                    
                    const delivery = pickupMethod === 'delivery' ? deliveryFee : 0;
                    let discount = 0;
                    if (appliedPromo) {
                        discount = subtotal * appliedPromo.discount;
                    }
                    
                    updateTotals(subtotal, delivery, discount);
                });
            });
        }
        
        // Setup upload area
        function setupUploadArea() {
            const uploadArea = document.querySelector('.upload-area');
            const fileInput = document.getElementById('paymentProof');
            
            if (uploadArea) {
                uploadArea.addEventListener('click', () => fileInput?.click());
                uploadArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    uploadArea.style.borderColor = '#28a745';
                });
                uploadArea.addEventListener('dragleave', () => {
                    uploadArea.style.borderColor = '#ddd';
                });
                uploadArea.addEventListener('drop', (e) => {
                    e.preventDefault();
                    uploadArea.style.borderColor = '#ddd';
                    if (e.dataTransfer.files.length) {
                        handleFileUpload(e.dataTransfer.files[0]);
                    }
                });
            }
            
            if (fileInput) {
                fileInput.addEventListener('change', (e) => {
                    if (e.target.files.length) {
                        handleFileUpload(e.target.files[0]);
                    }
                });
            }
        }
        
        // Handle file upload
        function handleFileUpload(file) {
            // Validate file
            if (!file.type.match('image.*')) {
                Swal.fire({
                    title: 'Format File Tidak Sesuai',
                    text: 'Harap upload file gambar (JPG, PNG)',
                    icon: 'error'
                });
                return;
            }
            
            if (file.size > 2 * 1024 * 1024) { // 2MB limit
                Swal.fire({
                    title: 'File Terlalu Besar',
                    text: 'Ukuran file maksimal 2MB',
                    icon: 'error'
                });
                return;
            }
            
            // Simulate file upload
            uploadedProof = {
                name: file.name,
                size: (file.size / 1024).toFixed(2) + ' KB',
                type: file.type,
                preview: URL.createObjectURL(file)
            };
            
            // Show uploaded file
            const uploadContainer = document.querySelector('.upload-proof');
            if (uploadContainer) {
                uploadContainer.innerHTML = `
                    <div class="uploaded-file">
                        <i class="fas fa-file-image"></i>
                        <div class="file-info">
                            <div>${uploadedProof.name}</div>
                            <small class="text-muted">${uploadedProof.size}</small>
                        </div>
                        <button class="remove-file" onclick="removeUploadedFile()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
            }
            
            // Save to localStorage
            localStorage.setItem('uploadedProof', JSON.stringify(uploadedProof));
            
            Swal.fire({
                title: 'Berhasil!',
                text: 'Bukti pembayaran berhasil diupload',
                icon: 'success',
                timer: 1500
            });
        }
        
        // Remove uploaded file
        window.removeUploadedFile = function() {
            uploadedProof = null;
            localStorage.removeItem('uploadedProof');
            
            const uploadContainer = document.querySelector('.upload-proof');
            if (uploadContainer) {
                uploadContainer.innerHTML = `
                    <div class="upload-area">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <h6>Upload Bukti Pembayaran</h6>
                        <p class="text-muted">Drag & drop atau klik untuk upload</p>
                        <small class="text-muted">Format: JPG, PNG, maksimal 2MB</small>
                    </div>
                    <input type="file" id="paymentProof" class="d-none" accept="image/*">
                `;
                
                setupUploadArea();
            }
        };
        
        // Apply promo code
        window.applyPromo = function() {
            const promoInput = document.getElementById('promoCode');
            const promoMessage = document.getElementById('promoMessage');
            const code = promoInput.value.trim().toUpperCase();
            
            if (!code) {
                promoMessage.innerHTML = '<span class="text-danger">Silakan masukkan kode promo</span>';
                return;
            }
            
            if (promoCodes[code]) {
                appliedPromo = promoCodes[code];
                promoMessage.innerHTML = `<span class="text-success">${appliedPromo.message}</span>`;
                
                // Save to localStorage
                localStorage.setItem('appliedPromo', JSON.stringify(appliedPromo));
                
                // Recalculate totals
                recalculateTotals();
            } else {
                promoMessage.innerHTML = '<span class="text-danger">Kode promo tidak valid</span>';
                appliedPromo = null;
                localStorage.removeItem('appliedPromo');
                recalculateTotals();
            }
        };
        
        // Recalculate totals
        function recalculateTotals() {
            let subtotal = 0;
            cart.forEach(item => {
                subtotal += item.price * item.quantity;
            });
            
            const pickupMethod = document.querySelector('input[name="pickup"]:checked')?.value || 'takeaway';
            const delivery = pickupMethod === 'delivery' ? deliveryFee : 0;
            
            let discount = 0;
            if (appliedPromo) {
                discount = subtotal * appliedPromo.discount;
            }
            
            updateTotals(subtotal, delivery, discount);
        }
        
        // Navigation between steps
        window.goToStep = function(step) {
            // Validate current step before proceeding
            if (step === 2 && !validateStep1()) return;
            if (step === 3 && !validateStep2()) return;
            if (step === 4 && !validateStep3()) return;
            
            // Update step indicator
            for (let i = 1; i <= 4; i++) {
                const stepElement = document.getElementById(`step${i}`);
                stepElement.classList.remove('active', 'completed');
                
                if (i < step) {
                    stepElement.classList.add('completed');
                } else if (i === step) {
                    stepElement.classList.add('active');
                }
            }
            
            // Hide all step contents
            document.querySelectorAll('.checkout-step').forEach(content => {
                content.style.display = 'none';
            });
            
            // Show current step content
            document.getElementById(`step${step}Content`).style.display = 'block';
            
            // If going to step 3, load payment details
            if (step === 3) {
                loadPaymentDetails();
            }
            
            // If going to step 4, load review data
            if (step === 4) {
                loadReviewData();
            }
            
            currentStep = step;
            
            // Smooth scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };
        
        // Validate step 1
        function validateStep1() {
            const requiredFields = ['name', 'email', 'phone', 'class'];
            let isValid = true;
            
            for (const field of requiredFields) {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            }
            
            // Check if delivery needs address
            const pickupMethod = document.querySelector('input[name="pickup"]:checked').value;
            const addressInput = document.getElementById('address');
            if (pickupMethod === 'delivery' && !addressInput.value.trim()) {
                addressInput.classList.add('is-invalid');
                isValid = false;
            } else {
                addressInput.classList.remove('is-invalid');
            }
            
            if (!isValid) {
                Swal.fire({
                    title: 'Data Tidak Lengkap',
                    text: 'Silakan lengkapi semua informasi yang wajib diisi',
                    icon: 'warning',
                    confirmButtonText: 'Mengerti'
                });
            } else {
                // Save customer info to localStorage
                const customerInfo = {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    phone: document.getElementById('phone').value,
                    class: document.getElementById('class').value,
                    address: document.getElementById('address').value,
                    notes: document.getElementById('notes').value,
                    pickup: document.querySelector('input[name="pickup"]:checked').value
                };
                
                localStorage.setItem('customerInfo', JSON.stringify(customerInfo));
                
                // Recalculate totals with correct delivery fee
                recalculateTotals();
            }
            
            return isValid;
        }
        
        // Validate step 2
        function validateStep2() {
            const paymentMethod = document.querySelector('input[name="payment"]:checked').value;
            localStorage.setItem('paymentMethod', paymentMethod);
            return true;
        }
        
        // Load payment details for step 3
        function loadPaymentDetails() {
            const paymentMethod = localStorage.getItem('paymentMethod') || 'cash';
            const paymentDetails = document.getElementById('paymentDetails');
            
            let detailsHtml = '';
            
            if (paymentMethod === 'cash') {
                detailsHtml = `
                    <div class="alert alert-success">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Bayar di Tempat:</strong> Anda dapat membayar secara tunai saat mengambil pesanan di kantin.
                    </div>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Pesanan akan diproses setelah Anda mengambil dan membayar di kantin.
                    </div>
                `;
            } else if (paymentMethod === 'qris') {
                const total = document.getElementById('grandTotal').textContent;
                detailsHtml = `
                    <div class="qr-code-container">
                        <h5>Scan QRIS untuk Pembayaran</h5>
                        <div class="qr-code-placeholder">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <p><strong>Total: <span id="qrTotal">${total}</span></strong></p>
                        <div class="qr-code-instruction">
                            <p><strong>Cara Bayar:</strong></p>
                            <ol class="text-start">
                                <li>Buka aplikasi e-wallet atau mobile banking</li>
                                <li>Pilih fitur Scan QRIS</li>
                                <li>Arahkan kamera ke QR code di atas</li>
                                <li>Konfirmasi pembayaran</li>
                                <li>Screenshot/simpan bukti pembayaran</li>
                            </ol>
                        </div>
                    </div>
                    
                    <div class="upload-proof">
                        <h6>Upload Bukti Pembayaran</h6>
                        <div class="upload-area">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <h6>Upload Bukti Pembayaran</h6>
                            <p class="text-muted">Drag & drop atau klik untuk upload</p>
                            <small class="text-muted">Format: JPG, PNG, maksimal 2MB</small>
                        </div>
                        <input type="file" id="paymentProof" class="d-none" accept="image/*">
                    </div>
                `;
            } else if (paymentMethod === 'bank') {
                const total = document.getElementById('grandTotal').textContent;
                detailsHtml = `
                    <div class="bank-details">
                        <h5>Transfer Bank</h5>
                        <div class="bank-info">
                            <p><strong>Nama Bank:</strong> ${bankInfo.bankName}</p>
                            <p><strong>Nomor Rekening:</strong> ${bankInfo.accountNumber}</p>
                            <p><strong>Atas Nama:</strong> ${bankInfo.accountName}</p>
                            <p><strong>Cabang:</strong> ${bankInfo.branch}</p>
                            <p><strong>Total Transfer:</strong> <span id="bankTotal">${total}</span></p>
                        </div>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Harap transfer tepat sesuai jumlah total. Tambahkan kode unik jika diperlukan.
                        </div>
                    </div>
                    
                    <div class="upload-proof">
                        <h6>Upload Bukti Transfer</h6>
                        <div class="upload-area">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <h6>Upload Bukti Transfer</h6>
                            <p class="text-muted">Drag & drop atau klik untuk upload</p>
                            <small class="text-muted">Format: JPG, PNG, maksimal 2MB</small>
                        </div>
                        <input type="file" id="paymentProof" class="d-none" accept="image/*">
                    </div>
                `;
            } else if (paymentMethod === 'ewallet') {
                const total = document.getElementById('grandTotal').textContent;
                detailsHtml = `
                    <div class="alert alert-info">
                        <h5>Pembayaran E-Wallet</h5>
                        <p>Pilih salah satu e-wallet untuk pembayaran:</p>
                        <div class="d-flex gap-2 mb-3">
                            <span class="badge bg-primary">Gopay</span>
                            <span class="badge bg-danger">OVO</span>
                            <span class="badge bg-success">Dana</span>
                            <span class="badge bg-warning text-dark">LinkAja</span>
                        </div>
                        <p><strong>Total: <span id="ewalletTotal">${total}</span></strong></p>
                        <p>Gunakan aplikasi e-wallet favorit Anda untuk melakukan pembayaran.</p>
                    </div>
                    
                    <div class="upload-proof">
                        <h6>Upload Bukti Pembayaran</h6>
                        <div class="upload-area">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <h6>Upload Bukti Pembayaran</h6>
                            <p class="text-muted">Drag & drop atau klik untuk upload</p>
                            <small class="text-muted">Format: JPG, PNG, maksimal 2MB</small>
                        </div>
                        <input type="file" id="paymentProof" class="d-none" accept="image/*">
                    </div>
                `;
            }
            
            paymentDetails.innerHTML = detailsHtml;
            
            // Setup upload area for non-cash payments
            if (paymentMethod !== 'cash') {
                setupUploadArea();
                
                // Load uploaded proof if exists
                const savedProof = JSON.parse(localStorage.getItem('uploadedProof'));
                if (savedProof) {
                    uploadedProof = savedProof;
                    const uploadContainer = document.querySelector('.upload-proof');
                    uploadContainer.innerHTML = `
                        <div class="uploaded-file">
                            <i class="fas fa-file-image"></i>
                            <div class="file-info">
                                <div>${uploadedProof.name}</div>
                                <small class="text-muted">${uploadedProof.size}</small>
                            </div>
                            <button class="remove-file" onclick="removeUploadedFile()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    `;
                }
            }
        }
        
        // Validate step 3
        function validateStep3() {
            const paymentMethod = localStorage.getItem('paymentMethod') || 'cash';
            
            if (paymentMethod !== 'cash') {
                if (!uploadedProof) {
                    Swal.fire({
                        title: 'Bukti Pembayaran',
                        text: 'Harap upload bukti pembayaran terlebih dahulu',
                        icon: 'warning',
                        confirmButtonText: 'Mengerti'
                    });
                    return false;
                }
            }
            
            return true;
        }
        
        // Load review data for step 4
        function loadReviewData() {
            // Customer info
            const customerInfo = JSON.parse(localStorage.getItem('customerInfo')) || {};
            
            document.getElementById('reviewName').textContent = customerInfo.name || '-';
            document.getElementById('reviewEmail').textContent = customerInfo.email || '-';
            document.getElementById('reviewPhone').textContent = customerInfo.phone || '-';
            document.getElementById('reviewClass').textContent = customerInfo.class || '-';
            
            // Pickup method
            const pickupMethod = customerInfo.pickup || 'takeaway';
            document.getElementById('reviewPickup').textContent = 
                pickupMethod === 'delivery' ? 'Antar ke Kelas' : 'Ambil di Kantin';
            
            // Payment method
            const paymentMethod = localStorage.getItem('paymentMethod') || 'cash';
            const paymentLabels = {
                'cash': 'Tunai (Bayar di Kantin)',
                'qris': 'QRIS',
                'bank': 'Transfer Bank',
                'ewallet': 'E-Wallet'
            };
            document.getElementById('reviewPayment').textContent = paymentLabels[paymentMethod] || '-';
            
            // Order items
            const reviewOrderItems = document.getElementById('reviewOrderItems');
            let itemsHtml = '';
            let subtotal = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                
                // Gunakan default image jika tidak ada
                const itemImage = item.image || 'https://via.placeholder.com/60x60?text=Menu';
                
                itemsHtml += `
                    <div class="order-item">
                        <img src="${itemImage}" alt="${item.name}" class="order-item-img">
                        <div class="order-item-details">
                            <div class="order-item-name">${item.name} × ${item.quantity}</div>
                            <div class="order-item-price">Rp ${itemTotal.toLocaleString('id-ID')}</div>
                        </div>
                    </div>
                `;
            });
            
            reviewOrderItems.innerHTML = itemsHtml;
            
            // Order summary
            const reviewOrderSummary = document.getElementById('reviewOrderSummary');
            const pickupMethodForDelivery = customerInfo.pickup || 'takeaway';
            const delivery = pickupMethodForDelivery === 'delivery' ? deliveryFee : 0;
            
            let discount = 0;
            if (appliedPromo) {
                discount = subtotal * appliedPromo.discount;
            }
            
            const grandTotal = subtotal + delivery - discount;
            
            reviewOrderSummary.innerHTML = `
                <div class="total-row">
                    <span>Subtotal</span>
                    <span>Rp ${subtotal.toLocaleString('id-ID')}</span>
                </div>
                ${delivery > 0 ? `
                <div class="total-row">
                    <span>Biaya Pengiriman</span>
                    <span>Rp ${delivery.toLocaleString('id-ID')}</span>
                </div>
                ` : ''}
                ${discount > 0 ? `
                <div class="total-row">
                    <span>Diskon (${appliedPromo.discount * 100}%)</span>
                    <span>-Rp ${discount.toLocaleString('id-ID')}</span>
                </div>
                ` : ''}
                <div class="total-row grand-total">
                    <span>Total Pembayaran</span>
                    <span>Rp ${grandTotal.toLocaleString('id-ID')}</span>
                </div>
            `;
        }
        
        // Place order
        window.placeOrder = function() {
            const termsAgreement = document.getElementById('termsAgreement');
            
            if (!termsAgreement.checked) {
                Swal.fire({
                    title: 'Perhatian',
                    text: 'Anda harus menyetujui Syarat dan Ketentuan untuk melanjutkan',
                    icon: 'warning',
                    confirmButtonText: 'Mengerti'
                });
                return;
            }
            
            // Show loading
            const checkoutButton = document.querySelector('#step4Content .btn-checkout');
            const originalText = checkoutButton.innerHTML;
            checkoutButton.innerHTML = '<div class="spinner" style="display: inline-block;"></div> Memproses...';
            checkoutButton.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Generate order number
                const timestamp = new Date().getTime();
                const randomNum = Math.floor(Math.random() * 1000);
                const orderNumber = `KS-${timestamp}-${randomNum}`;
                
                // Show success modal
                document.getElementById('orderNumber').textContent = orderNumber;
                document.getElementById('successModal').classList.add('active');
                
                // Save order to localStorage (for order history)
                const order = {
                    id: orderNumber,
                    date: new Date().toISOString(),
                    customer: JSON.parse(localStorage.getItem('customerInfo')),
                    paymentMethod: localStorage.getItem('paymentMethod'),
                    items: cart,
                    appliedPromo: appliedPromo,
                    deliveryFee: document.querySelector('input[name="pickup"]:checked').value === 'delivery' ? deliveryFee : 0,
                    status: 'pending'
                };
                
                // Save to orders history
                let orders = JSON.parse(localStorage.getItem('kantinSehatOrders')) || [];
                orders.unshift(order);
                localStorage.setItem('kantinSehatOrders', JSON.stringify(orders));
                
                // Clear cart and temporary data
                cart = [];
                localStorage.removeItem('kantinSehatCart');
                localStorage.removeItem('customerInfo');
                localStorage.removeItem('paymentMethod');
                localStorage.removeItem('appliedPromo');
                localStorage.removeItem('uploadedProof');
                uploadedProof = null;
                
                // Reset button
                checkoutButton.innerHTML = originalText;
                checkoutButton.disabled = false;
                
                // Send email notification (simulated)
                sendOrderConfirmationEmail(orderNumber);
            }, 2000);
        };
        
        // Send order confirmation email (simulated)
        function sendOrderConfirmationEmail(orderNumber) {
            const customerInfo = JSON.parse(localStorage.getItem('customerInfo')) || {};
            
            // In a real application, you would send an API request to your backend
            console.log('Mengirim email ke:', customerInfo.email);
            console.log('Nomor pesanan:', orderNumber);
            console.log('Detail pesanan:', cart);
            
            // Simulate email sent
            setTimeout(() => {
                console.log('Email konfirmasi pesanan berhasil dikirim');
            }, 1000);
        }
        
        // Print receipt
        window.printReceipt = function() {
            const printWindow = window.open('', '_blank');
            const orderNumber = document.getElementById('orderNumber').textContent;
            const customerInfo = JSON.parse(localStorage.getItem('customerInfo')) || {};
            
            let itemsHtml = '';
            let subtotal = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                itemsHtml += `
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.quantity}</td>
                        <td>Rp ${item.price.toLocaleString('id-ID')}</td>
                        <td>Rp ${itemTotal.toLocaleString('id-ID')}</td>
                    </tr>
                `;
            });
            
            const pickupMethod = customerInfo.pickup || 'takeaway';
            const delivery = pickupMethod === 'delivery' ? deliveryFee : 0;
            
            let discount = 0;
            if (appliedPromo) {
                discount = subtotal * appliedPromo.discount;
            }
            
            const grandTotal = subtotal + delivery - discount;
            
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Nota Pesanan - ${orderNumber}</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        .header { text-align: center; margin-bottom: 30px; }
                        .store-name { font-size: 24px; font-weight: bold; color: #28a745; }
                        .order-info { margin-bottom: 20px; }
                        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
                        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
                        th { background-color: #f8f9fa; }
                        .total { text-align: right; font-weight: bold; margin-top: 20px; }
                        .footer { margin-top: 40px; text-align: center; font-size: 12px; color: #666; }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <div class="store-name">KANTIN SEHAT</div>
                        <div>SMK Negeri 1 Jakarta</div>
                        <div>Jl. Pendidikan No. 1, Jakarta Pusat</div>
                        <div>Telp: (021) 1234-5678</div>
                    </div>
                    
                    <div class="order-info">
                        <div><strong>No. Pesanan:</strong> ${orderNumber}</div>
                        <div><strong>Tanggal:</strong> ${new Date().toLocaleString('id-ID')}</div>
                        <div><strong>Nama:</strong> ${customerInfo.name || '-'}</div>
                        <div><strong>Kelas:</strong> ${customerInfo.class || '-'}</div>
                        <div><strong>Metode:</strong> ${customerInfo.pickup === 'delivery' ? 'Antar ke Kelas' : 'Ambil di Kantin'}</div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${itemsHtml}
                        </tbody>
                    </table>
                    
                    <div class="total">
                        <div>Subtotal: Rp ${subtotal.toLocaleString('id-ID')}</div>
                        ${delivery > 0 ? `<div>Biaya Antar: Rp ${delivery.toLocaleString('id-ID')}</div>` : ''}
                        ${discount > 0 ? `<div>Diskon: -Rp ${discount.toLocaleString('id-ID')}</div>` : ''}
                        <div style="font-size: 18px; margin-top: 10px;">
                            <strong>TOTAL: Rp ${grandTotal.toLocaleString('id-ID')}</strong>
                        </div>
                    </div>
                    
                    <div class="footer">
                        <div>Terima kasih telah berbelanja di Kantin Sehat</div>
                        <div>Pesanan akan siap dalam 15-30 menit</div>
                        <div>*** Simpan nota ini sebagai bukti pembayaran ***</div>
                    </div>
                </body>
                </html>
            `);
            
            printWindow.document.close();
            printWindow.print();
        };
        
        // Close modal
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('success-modal')) {
                e.target.classList.remove('active');
            }
        });
        
        // Handle ESC key to close modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('successModal').classList.remove('active');
            }
        });
        
        // Update delivery fee when pickup method changes
        document.querySelectorAll('input[name="pickup"]').forEach(radio => {
            radio.addEventListener('change', function() {
                recalculateTotals();
                
                // Save to localStorage
                const customerInfo = JSON.parse(localStorage.getItem('customerInfo')) || {};
                customerInfo.pickup = this.value;
                localStorage.setItem('customerInfo', JSON.stringify(customerInfo));
            });
        });
    </script>
</body>
</html>