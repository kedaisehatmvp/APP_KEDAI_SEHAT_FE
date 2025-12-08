<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Kantin Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #10b981;
            --primary-dark: #059669;
            --secondary: #6b7280;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --light: #f8fafc;
            --dark: #1f2937;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            background: #000;
            background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), 
                        url('https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            overflow-x: hidden;
        }

        .bg-shape {
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(16, 185, 129, 0.15);
            filter: blur(100px);
            z-index: 0;
        }

        .bg-shape:nth-child(1) {
            top: -80px;
            left: -80px;
        }

        .bg-shape:nth-child(2) {
            bottom: -80px;
            right: -80px;
        }

        .register-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(25px);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .register-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .logo-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .logo-section img {
            width: 50px;
            height: auto;
            filter: brightness(0) invert(1);
        }

        .logo-section h1 {
            font-size: 28px;
            font-weight: 700;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .register-header {
            margin-bottom: 25px;
            text-align: center;
        }

        .register-header h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #e2e8f0;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .register-header p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Step Indicator */
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background: rgba(255, 255, 255, 0.2);
            z-index: 1;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .step-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .step.active .step-number {
            background: var(--primary);
            color: white;
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2);
        }

        .step.completed .step-number {
            background: var(--success);
            color: white;
        }

        .step.completed .step-number::after {
            content: '✓';
            font-size: 12px;
        }

        .step-text {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
            text-align: center;
            transition: all 0.3s ease;
        }

        .step.active .step-text {
            color: white;
            font-weight: 500;
        }

        /* Form Styles */
        .form-step {
            display: none;
            animation: fadeIn 0.5s ease-out;
        }

        .form-step.active {
            display: block;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
        }

        .form-label i {
            margin-right: 8px;
            width: 16px;
            text-align: center;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
            font-size: 16px;
            z-index: 3;
        }

        .register-card input,
        .register-card select {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff !important;
            font-size: 15px;
            transition: all 0.3s;
            backdrop-filter: blur(10px);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            position: relative;
            z-index: 2;
        }

        .register-card select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='rgba(255,255,255,0.7)' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            padding-right: 40px;
            cursor: pointer;
        }

        .register-card select option {
            background: #2d3748;
            color: #fff;
            padding: 10px;
        }

        .register-card input:focus,
        .register-card select:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.3);
            background: rgba(255, 255, 255, 0.15);
        }

        .register-card input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -8px;
        }

        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 0 8px;
        }

        /* Gender Options */
        .gender-options {
            display: flex;
            gap: 15px;
            margin-top: 8px;
        }

        .gender-option {
            flex: 1;
            position: relative;
        }

        .gender-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .gender-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px 10px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            height: 100%;
        }

        .gender-label i {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .gender-label span {
            font-size: 14px;
            font-weight: 500;
        }

        .gender-option input[type="radio"]:checked + .gender-label {
            border-color: var(--primary);
            background: rgba(16, 185, 129, 0.2);
            color: white;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        /* Password Strength */
        .password-strength {
            margin-top: 10px;
        }

        .strength-meter {
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 5px;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .strength-text {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Terms Checkbox - FIXED */
        .terms-checkbox {
            display: flex;
            align-items: center;
            margin: 25px 0;
            gap: 10px;
            position: relative;
        }

        .terms-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            position: relative;
            z-index: 1;
            opacity: 1 !important;
            accent-color: var(--primary);
        }

        .terms-checkbox label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.5;
            cursor: pointer;
            flex: 1;
        }

        .terms-checkbox a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .terms-checkbox a:hover {
            text-decoration: underline;
        }

        /* Verification Code Input - FIXED */
        .verification-inputs {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin: 20px 0;
        }

        .verification-input {
            width: 50px;
            height: 60px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transition: all 0.3s;
        }

        .verification-input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.3);
            transform: scale(1.05);
        }

        .verification-input.filled {
            border-color: var(--primary);
            background: rgba(16, 185, 129, 0.1);
        }

        .resend-code {
            text-align: center;
            margin-top: 15px;
        }

        .resend-code a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .resend-code a:hover {
            text-decoration: underline;
        }

        .countdown {
            color: var(--warning);
            font-weight: 600;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .btn-primary:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.5);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
        }

        /* Status Messages */
        .status-message {
            padding: 12px 15px;
            border-radius: 10px;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: left;
            backdrop-filter: blur(10px);
            border-left: 4px solid;
        }

        .status-success {
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            border-left-color: #4ade80;
        }

        .status-error {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border-left-color: #f87171;
        }

        .status-info {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            border-left-color: #60a5fa;
        }

        /* Login Link */
        .login-link {
            text-align: center;
            margin-top: 25px;
            font-size: 15px;
            color: rgba(255, 255, 255, 0.8);
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #34d399;
            text-decoration: underline;
            transform: translateX(2px);
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            font-size: 14px;
            z-index: 2;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: white;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(20px) scale(0.95); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }

        .register-card {
            animation: fadeIn 0.8s ease-out;
        }

        /* Success Modal */
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
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(25px);
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            animation: fadeIn 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: rgba(16, 185, 129, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 36px;
            color: var(--primary);
        }

        .success-content h3 {
            color: white;
            margin-bottom: 10px;
        }

        .success-content p {
            color: rgba(255,255,255,0.8);
            margin-bottom: 20px;
        }

        .success-email {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 12px;
            margin: 20px 0;
            border-left: 4px solid var(--primary);
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .register-container {
                max-width: 100%;
                padding: 15px;
            }
            
            .register-card {
                padding: 2rem 1.5rem;
            }
            
            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            
            .gender-options {
                flex-direction: column;
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .bg-shape {
                width: 250px;
                height: 250px;
            }
            
            .success-content {
                padding: 30px 20px;
            }
            
            .verification-inputs {
                gap: 8px;
            }
            
            .verification-input {
                width: 45px;
                height: 55px;
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 1.5rem;
            }
            
            .step-indicator {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .step-indicator::before {
                display: none;
            }
            
            .step {
                flex-direction: row;
                gap: 15px;
                width: 100%;
            }
            
            .step-number {
                margin-bottom: 0;
            }
            
            .verification-inputs {
                gap: 6px;
            }
            
            .verification-input {
                width: 40px;
                height: 50px;
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <!-- Background Shapes -->
    <div class="bg-shape"></div>
    <div class="bg-shape"></div>

    <div class="register-container">
        <div class="register-card">
            <div class="logo-section">
                <i class="fas fa-utensils fa-2x" style="color: var(--primary);"></i>
                <h1>KANTIN SEHAT</h1>
            </div>

            <div class="register-header">
                <h2>Buat Akun Baru</h2>
                <p>Daftar sebagai siswa untuk mengakses layanan Kantin Sehat</p>
            </div>

            <!-- Step Indicator - 4 STEPS -->
            <div class="step-indicator">
                <div class="step active" data-step="1">
                    <div class="step-number">1</div>
                    <div class="step-text">Data Siswa</div>
                </div>
                <div class="step" data-step="2">
                    <div class="step-number">2</div>
                    <div class="step-text">Akun</div>
                </div>
                <div class="step" data-step="3">
                    <div class="step-number">3</div>
                    <div class="step-text">Verifikasi</div>
                </div>
                <div class="step" data-step="4">
                    <div class="step-number">4</div>
                    <div class="step-text">Selesai</div>
                </div>
            </div>

            <!-- Form Steps -->
            <form id="registerForm">
                <!-- Step 1: Student Data -->
                <div class="form-step active" data-step="1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis" class="form-label">
                                    <i class="fas fa-id-card"></i> NIS
                                </label>
                                <div class="input-with-icon">
                                    <i class="fas fa-id-card"></i>
                                    <input type="text" id="nis" name="nis" placeholder="Nomor Induk Siswa" required 
                                           pattern="[0-9]+" title="Hanya angka diperbolehkan">
                                </div>
                                <small class="text-muted" style="color: rgba(255,255,255,0.6); display: block; margin-top: 5px;">
                                    Contoh: 12345678
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user"></i> Nama Lengkap
                                </label>
                                <div class="input-with-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" id="name" name="name" placeholder="Nama lengkap siswa" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="class" class="form-label">
                                    <i class="fas fa-graduation-cap"></i> Kelas
                                </label>
                                <div class="input-with-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                    <select id="class" name="class" required style="color: white !important;">
                                        <option value="" disabled selected style="color: rgba(255,255,255,0.5); background: #2d3748;">Pilih Kelas</option>
                                        <option value="X" style="color: white; background: #2d3748;">X (Sepuluh)</option>
                                        <option value="XI" style="color: white; background: #2d3748;">XI (Sebelas)</option>
                                        <option value="XII" style="color: white; background: #2d3748;">XII (Dua Belas)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="major" class="form-label">
                                    <i class="fas fa-book"></i> Jurusan
                                </label>
                                <div class="input-with-icon">
                                    <i class="fas fa-book"></i>
                                    <select id="major" name="major" required style="color: white !important;">
                                        <option value="" disabled selected style="color: rgba(255,255,255,0.5); background: #2d3748;">Pilih Jurusan</option>
                                        <option value="TJKT" style="color: white; background: #2d3748;">Teknik Jaringan Komputer dan Telekomunikasi</option>
                                        <option value="PPLG" style="color: white; background: #2d3748;">Pengembangan Perangkat Lunak dan Gim</option>
                                        <option value="PH" style="color: white; background: #2d3748;">Perhotelan</option>
                                        <option value="TF" style="color: white; background: #2d3748;">Teknologi Farmasi</option>
                                        <option value="KLN" style="color: white; background: #2d3748;">Kuliner</option>
                                        <option value="MPLB" style="color: white; background: #2d3748;">Manajemen Perkantoran dan Layanan Bisnis</option>
                                        <option value="AKL" style="color: white; background: #2d3748;">Akuntansi dan Keuangan Lembaga</option>
                                        <option value="TO" style="color: white; background: #2d3748;">Teknik Otomotif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-venus-mars"></i> Jenis Kelamin
                        </label>
                        <div class="gender-options">
                            <div class="gender-option">
                                <input type="radio" id="gender_male" name="gender" value="L" required>
                                <label for="gender_male" class="gender-label">
                                    <i class="fas fa-male"></i>
                                    <span>Laki-laki</span>
                                </label>
                            </div>
                            <div class="gender-option">
                                <input type="radio" id="gender_female" name="gender" value="P" required>
                                <label for="gender_female" class="gender-label">
                                    <i class="fas fa-female"></i>
                                    <span>Perempuan</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='/login'">
                            <i class="fas fa-arrow-left"></i> Kembali ke Login
                        </button>
                        <button type="button" class="btn btn-primary" onclick="goToStep(2)">
                            Selanjutnya <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Account Data - UPDATED LAYOUT -->
                <div class="form-step" data-step="2">
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" placeholder="email@siswa.sch.id" required>
                        </div>
                        <small class="text-muted" style="color: rgba(255,255,255,0.6); display: block; margin-top: 5px;">
                            Gunakan email sekolah (contoh: nama@siswa.smk.edu)
                        </small>
                    </div>

                    <!-- PASSWORD VERTICAL LAYOUT -->
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Password
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required
                                   oninput="checkPasswordStrength(this.value)">
                            <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="password-strength">
                            <div class="strength-meter">
                                <div class="strength-fill" id="strengthFill"></div>
                            </div>
                            <div class="strength-text" id="strengthText">Kekuatan password</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            <i class="fas fa-lock"></i> Konfirmasi Password
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   placeholder="Ulangi password" required>
                            <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div id="passwordMatch" style="font-size: 12px; margin-top: 5px;"></div>
                    </div>

                    <div class="terms-checkbox">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">
                            Saya menyetujui <a href="#" onclick="showTerms()">Syarat & Ketentuan</a> dan 
                            <a href="#" onclick="showPrivacy()">Kebijakan Privasi</a> Kantin Sehat
                        </label>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn btn-secondary" onclick="goToStep(1)">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button>
                        <!-- LANGSUNG LANJUT TANPA VALIDASI -->
                        <button type="button" class="btn btn-primary" onclick="skipToVerification()">
                            Lanjut Verifikasi <i class="fas fa-shield-alt"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Verification -->
                <div class="form-step" data-step="3">
                    <div class="status-message status-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Kode verifikasi telah dikirim ke email Anda:</strong>
                        <div id="verificationEmail" style="font-weight: bold; margin-top: 5px;"></div>
                        <small style="display: block; margin-top: 5px; color: rgba(255,255,255,0.7);">
                            Untuk demo, masukkan kode apa saja (contoh: 123456)
                        </small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-shield-alt"></i> Kode Verifikasi (6 digit)
                        </label>
                        <div class="verification-inputs">
                            <input type="text" class="verification-input" maxlength="1" data-index="0" 
                                   oninput="handleVerificationInput(event, 0)" onkeydown="handleVerificationKeydown(event, 0)">
                            <input type="text" class="verification-input" maxlength="1" data-index="1" 
                                   oninput="handleVerificationInput(event, 1)" onkeydown="handleVerificationKeydown(event, 1)">
                            <input type="text" class="verification-input" maxlength="1" data-index="2" 
                                   oninput="handleVerificationInput(event, 2)" onkeydown="handleVerificationKeydown(event, 2)">
                            <input type="text" class="verification-input" maxlength="1" data-index="3" 
                                   oninput="handleVerificationInput(event, 3)" onkeydown="handleVerificationKeydown(event, 3)">
                            <input type="text" class="verification-input" maxlength="1" data-index="4" 
                                   oninput="handleVerificationInput(event, 4)" onkeydown="handleVerificationKeydown(event, 4)">
                            <input type="text" class="verification-input" maxlength="1" data-index="5" 
                                   oninput="handleVerificationInput(event, 5)" onkeydown="handleVerificationKeydown(event, 5)">
                        </div>
                        <div id="verificationError" style="color: #ef4444; font-size: 14px; margin-top: 10px; text-align: center;"></div>
                    </div>

                    <div class="resend-code">
                        <p>Tidak menerima kode? <span id="countdownText" class="countdown">60</span> detik</p>
                        <a href="javascript:void(0)" onclick="resendVerificationCode()" id="resendLink" style="display: none;">
                            Kirim ulang kode
                        </a>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn btn-secondary" onclick="goToStep(2)">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button>
                        <!-- LANGSUNG LANJUT TANPA VALIDASI KODE -->
                        <button type="button" class="btn btn-primary" onclick="skipToSuccess()">
                            Verifikasi <i class="fas fa-check-circle"></i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="/login">Masuk di sini</a>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="success-modal" id="successModal">
        <div class="success-content">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3>Pendaftaran Berhasil!</h3>
            <p>Akun Anda telah berhasil diverifikasi. Silakan login untuk melanjutkan.</p>
            
            <div class="success-email">
                <i class="fas fa-envelope me-2"></i>
                <span id="userEmail"></span>
            </div>
            
            <div class="user-info" style="text-align: left; background: rgba(255,255,255,0.05); padding: 15px; border-radius: 10px; margin: 20px 0;">
                <h6 style="color: white; margin-bottom: 10px;"><i class="fas fa-user me-2"></i>Data Pendaftaran:</h6>
                <p style="margin-bottom: 5px;"><strong>NIS:</strong> <span id="infoNis"></span></p>
                <p style="margin-bottom: 5px;"><strong>Nama:</strong> <span id="infoName"></span></p>
                <p style="margin-bottom: 5px;"><strong>Kelas:</strong> <span id="infoClass"></span></p>
                <p style="margin-bottom: 5px;"><strong>Jurusan:</strong> <span id="infoMajor"></span></p>
                <p style="margin-bottom: 0;"><strong>Jenis Kelamin:</strong> <span id="infoGender"></span></p>
            </div>
            
            <div class="alert alert-success" style="background: rgba(16, 185, 129, 0.15); color: #34d399; padding: 15px; border-radius: 10px; border-left: 4px solid #10b981; margin: 20px 0;">
                <i class="fas fa-check-circle me-2"></i>
                <strong>Email telah diverifikasi!</strong> Akun Anda siap digunakan.
            </div>
            
            <div class="button-group" style="margin-top: 30px;">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">
                    <i class="fas fa-home me-2"></i> Beranda
                </button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='/login'">
                    <i class="fas fa-sign-in-alt me-2"></i> Login Sekarang
                </button>
            </div>
            
            <div style="margin-top: 20px;">
                <p style="font-size: 12px; color: rgba(255,255,255,0.5);">
                    <i class="fas fa-lightbulb me-2"></i>
                    Catatan: Ini adalah demo frontend. Data disimpan sementara di browser.
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let currentStep = 1;
        let userData = {};
        let countdownTimer;
        let countdownSeconds = 60;

        // Jurusan mapping untuk display
        const majorLabels = {
            'TJKT': 'Teknik Jaringan Komputer dan Telekomunikasi',
            'PPLG': 'Pengembangan Perangkat Lunak dan Gim',
            'PH': 'Perhotelan',
            'TF': 'Teknologi Farmasi',
            'KLN': 'Kuliner',
            'MPLB': 'Manajemen Perkantoran dan Layanan Bisnis',
            'AKL': 'Akuntansi dan Keuangan Lembaga',
            'TO': 'Teknik Otomotif'
        };

        // Kelas mapping untuk display
        const classLabels = {
            'X': 'X (Sepuluh)',
            'XI': 'XI (Sebelas)',
            'XII': 'XII (Dua Belas)'
        };

        // Gender mapping untuk display
        const genderLabels = {
            'L': 'Laki-laki',
            'P': 'Perempuan'
        };

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Restore form data from localStorage if exists
            restoreFormData();
            
            // Set up password confirmation check
            document.getElementById('password_confirmation').addEventListener('input', function() {
                checkPasswordMatch();
            });
            
            // Set up checkbox styling
            const termsCheckbox = document.getElementById('terms');
            termsCheckbox.style.width = '18px';
            termsCheckbox.style.height = '18px';
            termsCheckbox.style.cursor = 'pointer';
            termsCheckbox.style.accentColor = '#10b981';
            
            // Focus pada verification input pertama
            document.querySelector('.verification-inputs')?.addEventListener('click', function() {
                const firstInput = this.querySelector('.verification-input');
                if (firstInput) firstInput.focus();
            });
        });

        // Step Navigation
        function goToStep(step) {
            // Hide all steps
            document.querySelectorAll('.form-step').forEach(stepEl => {
                stepEl.classList.remove('active');
            });

            // Update step indicator
            document.querySelectorAll('.step').forEach(stepEl => {
                stepEl.classList.remove('active', 'completed');
                const stepNum = parseInt(stepEl.getAttribute('data-step'));
                
                if (stepNum < step) {
                    stepEl.classList.add('completed');
                } else if (stepNum === step) {
                    stepEl.classList.add('active');
                }
            });

            // Show target step
            document.querySelector(`.form-step[data-step="${step}"]`).classList.add('active');
            currentStep = step;
            
            // Focus on first input of current step
            setTimeout(() => {
                const firstInput = document.querySelector(`.form-step[data-step="${step}"] input`);
                if (firstInput) firstInput.focus();
            }, 300);
        }

        // SKIP langsung ke verifikasi tanpa validasi
        function skipToVerification() {
            // Collect user data (tanpa validasi)
            userData = {
                nis: document.getElementById('nis').value || '12345678',
                name: document.getElementById('name').value || 'Siswa Demo',
                class: document.getElementById('class').value || 'XI',
                classLabel: classLabels[document.getElementById('class').value] || 'XI (Sebelas)',
                major: document.getElementById('major').value || 'TJKT',
                majorLabel: majorLabels[document.getElementById('major').value] || 'Teknik Jaringan Komputer dan Telekomunikasi',
                gender: document.querySelector('input[name="gender"]:checked')?.value || 'L',
                genderLabel: genderLabels[document.querySelector('input[name="gender"]:checked')?.value] || 'Laki-laki',
                email: document.getElementById('email').value || 'demo@siswa.sch.id',
                password: document.getElementById('password').value || 'password123',
                registeredAt: new Date().toISOString(),
                isVerified: true,
                status: 'active'
            };

            // Show email in verification step
            document.getElementById('verificationEmail').textContent = userData.email || 'demo@siswa.sch.id';

            // Go to verification step
            goToStep(3);
            startCountdown();
            
            // Focus pada verification input pertama
            setTimeout(() => {
                const firstVerificationInput = document.querySelector('.verification-input[data-index="0"]');
                if (firstVerificationInput) {
                    firstVerificationInput.focus();
                }
            }, 500);
        }

        // SKIP langsung ke success tanpa validasi kode
        function skipToSuccess() {
            // Mark all verification inputs as filled
            document.querySelectorAll('.verification-input').forEach(input => {
                if (!input.value) {
                    input.value = '1';
                }
                input.classList.add('filled');
                input.style.borderColor = '#10b981';
                input.style.background = 'rgba(16, 185, 129, 0.1)';
            });

            // Stop countdown
            clearInterval(countdownTimer);

            // Show success modal
            showSuccessModal();
        }

        // FIXED: Handle verification input - SIMPLE VERSION
        function handleVerificationInput(event, index) {
            const input = event.target;
            const inputs = document.querySelectorAll('.verification-input');
            
            // Ambil nilai input
            let value = input.value;
            
            // Jika ada nilai, ambil karakter terakhir (untuk handle paste)
            if (value.length > 1) {
                value = value.slice(-1);
                input.value = value;
            }
            
            // Update tampilan
            if (value) {
                input.classList.add('filled');
                input.style.borderColor = '#10b981';
                input.style.background = 'rgba(16, 185, 129, 0.1)';
                
                // Pindah ke input berikutnya
                if (index < 5) {
                    setTimeout(() => {
                        inputs[index + 1].focus();
                    }, 10);
                }
            } else {
                input.classList.remove('filled');
                input.style.borderColor = 'rgba(255, 255, 255, 0.2)';
                input.style.background = 'rgba(255, 255, 255, 0.1)';
            }
            
            // Clear error
            document.getElementById('verificationError').textContent = '';
        }

        // FIXED: Handle keydown for better navigation
        function handleVerificationKeydown(event, index) {
            const inputs = document.querySelectorAll('.verification-input');
            
            if (event.key === 'Backspace') {
                // Jika backspace dan input kosong, pindah ke input sebelumnya
                if (!event.target.value && index > 0) {
                    setTimeout(() => {
                        inputs[index - 1].focus();
                        inputs[index - 1].select();
                    }, 10);
                }
            } else if (event.key === 'ArrowLeft' && index > 0) {
                inputs[index - 1].focus();
                inputs[index - 1].select();
            } else if (event.key === 'ArrowRight' && index < 5) {
                inputs[index + 1].focus();
                inputs[index + 1].select();
            } else if (event.key === 'Enter') {
                // Jika Enter, langsung verifikasi
                skipToSuccess();
            }
        }

        // Start countdown timer
        function startCountdown() {
            countdownSeconds = 60;
            document.getElementById('countdownText').textContent = countdownSeconds;
            document.getElementById('resendLink').style.display = 'none';
            
            clearInterval(countdownTimer);
            
            countdownTimer = setInterval(() => {
                countdownSeconds--;
                document.getElementById('countdownText').textContent = countdownSeconds;
                
                if (countdownSeconds <= 0) {
                    clearInterval(countdownTimer);
                    document.getElementById('countdownText').textContent = '0';
                    document.getElementById('resendLink').style.display = 'inline';
                }
            }, 1000);
        }

        // Resend verification code
        function resendVerificationCode() {
            startCountdown();
            
            // Hide resend link
            document.getElementById('resendLink').style.display = 'none';
            
            showNotification('info', 'Kode verifikasi baru telah dikirim');
        }

        // Password strength checker
        function checkPasswordStrength(password) {
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            
            let strength = 0;
            let text = 'Sangat Lemah';
            let color = '#ef4444';
            
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            switch(strength) {
                case 1:
                    text = 'Lemah';
                    color = '#f97316';
                    break;
                case 2:
                    text = 'Cukup';
                    color = '#f59e0b';
                    break;
                case 3:
                    text = 'Sedang';
                    color = '#eab308';
                    break;
                case 4:
                    text = 'Kuat';
                    color = '#10b981';
                    break;
                case 5:
                    text = 'Sangat Kuat';
                    color = '#34d399';
                    break;
            }
            
            strengthFill.style.width = (strength * 20) + '%';
            strengthFill.style.backgroundColor = color;
            strengthText.textContent = text;
            strengthText.style.color = color;
        }

        // Check password match
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchElement = document.getElementById('passwordMatch');
            
            if (!confirmPassword) {
                matchElement.textContent = '';
                matchElement.style.color = '';
                return;
            }
            
            if (password === confirmPassword) {
                matchElement.textContent = '✓ Password cocok';
                matchElement.style.color = '#10b981';
            } else {
                matchElement.textContent = '✗ Password tidak cocok';
                matchElement.style.color = '#ef4444';
            }
        }

        // Toggle password visibility
        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            const toggleIcon = input.parentElement.querySelector('.password-toggle i');
            
            if (input.type === 'password') {
                input.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Show notification
        function showNotification(type, message) {
            // Remove existing notifications
            document.querySelectorAll('.status-message').forEach(el => {
                if (el.parentElement && el.parentElement.classList.contains('form-step')) {
                    el.remove();
                }
            });
            
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `status-message status-${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'error' ? 'exclamation-circle' : 'check-circle'} me-2"></i>
                ${message}
            `;
            
            // Insert before form content
            const formStep = document.querySelector('.form-step.active');
            const firstChild = formStep.firstChild;
            formStep.insertBefore(notification, firstChild);
            
            // Remove after 5 seconds
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 5000);
        }

        // Show terms modal
        function showTerms() {
            alert('Syarat dan Ketentuan Kantin Sehat:\n\n1. Akun hanya untuk siswa aktif\n2. Dilarang berbagi akun\n3. Transaksi wajib menggunakan saldo yang valid\n4. Kantin berhak membatasi penggunaan jika melanggar aturan');
        }

        // Show privacy modal
        function showPrivacy() {
            alert('Kebijakan Privasi Kantin Sehat:\n\n1. Data pribadi hanya digunakan untuk transaksi kantin\n2. Tidak membagikan data ke pihak ketiga\n3. Data dihapus setelah siswa lulus\n4. Hak akses data hanya untuk admin kantin');
        }

        // Show success modal
        function showSuccessModal() {
            // Update success modal with user data
            document.getElementById('userEmail').textContent = userData.email;
            document.getElementById('infoNis').textContent = userData.nis;
            document.getElementById('infoName').textContent = userData.name;
            document.getElementById('infoClass').textContent = userData.classLabel;
            document.getElementById('infoMajor').textContent = userData.majorLabel;
            document.getElementById('infoGender').textContent = userData.genderLabel;
            
            // Show modal
            document.getElementById('successModal').classList.add('active');
            
            // Save user to localStorage (simulated database)
            saveUserToLocalStorage();
            
            // Clear form
            document.getElementById('registerForm').reset();
            
            // Reset step indicator
            document.querySelectorAll('.step').forEach(stepEl => {
                stepEl.classList.remove('active', 'completed');
            });
            document.querySelector('.step[data-step="1"]').classList.add('active');
            
            // Reset current step
            currentStep = 1;
            
            // Show step 1
            document.querySelectorAll('.form-step').forEach(stepEl => {
                stepEl.classList.remove('active');
            });
            document.querySelector('.form-step[data-step="1"]').classList.add('active');
            
            // Clear verification inputs
            document.querySelectorAll('.verification-input').forEach(input => {
                input.value = '';
                input.classList.remove('filled');
                input.style.borderColor = '';
                input.style.background = '';
            });
            
            // Clear localStorage form data
            localStorage.removeItem('kantinsehatRegisterData');
            
            // Stop countdown if running
            clearInterval(countdownTimer);
        }

        // Close success modal
        function closeSuccessModal() {
            document.getElementById('successModal').classList.remove('active');
        }

        // Save user to localStorage (simulated database)
        function saveUserToLocalStorage() {
            // Get existing users or create new array
            let users = JSON.parse(localStorage.getItem('kantinsehatUsers')) || [];
            
            // Add new user
            users.push(userData);
            
            // Save back to localStorage
            localStorage.setItem('kantinsehatUsers', JSON.stringify(users));
            
            // Also save user session
            localStorage.setItem('kantinsehatCurrentUser', JSON.stringify({
                id: Date.now(),
                email: userData.email,
                name: userData.name,
                role: 'siswa',
                isLoggedIn: false,
                isVerified: true
            }));
            
            console.log('User saved to localStorage:', userData);
            console.log('Total users:', users.length);
        }

        // Save form data to localStorage
        function saveFormData() {
            const formData = {
                nis: document.getElementById('nis').value,
                name: document.getElementById('name').value,
                class: document.getElementById('class').value,
                major: document.getElementById('major').value,
                gender: document.querySelector('input[name="gender"]:checked')?.value,
                email: document.getElementById('email').value
            };
            
            localStorage.setItem('kantinsehatRegisterData', JSON.stringify(formData));
        }

        // Restore form data from localStorage
        function restoreFormData() {
            const savedData = localStorage.getItem('kantinsehatRegisterData');
            if (savedData) {
                const formData = JSON.parse(savedData);
                
                document.getElementById('nis').value = formData.nis || '';
                document.getElementById('name').value = formData.name || '';
                document.getElementById('class').value = formData.class || '';
                document.getElementById('major').value = formData.major || '';
                document.getElementById('email').value = formData.email || '';
                
                if (formData.gender) {
                    const radio = document.querySelector(`input[name="gender"][value="${formData.gender}"]`);
                    if (radio) radio.checked = true;
                }
            }
        }

        // Auto-save form data on input
        document.querySelectorAll('#registerForm input, #registerForm select').forEach(element => {
            element.addEventListener('input', function() {
                saveFormData();
            });
            
            element.addEventListener('change', function() {
                saveFormData();
            });
        });

        // Handle form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
        });

        // Prevent accidental page reload
        window.addEventListener('beforeunload', function(e) {
            // Only warn if user has started filling the form
            const hasData = document.getElementById('nis').value || 
                           document.getElementById('name').value ||
                           document.getElementById('email').value;
            
            if (hasData && currentStep < 4) {
                e.preventDefault();
                e.returnValue = 'Data pendaftaran belum disimpan. Yakin ingin meninggalkan halaman?';
            }
        });

        // Close modal when clicking outside
        document.getElementById('successModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeSuccessModal();
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSuccessModal();
            }
        });

        // DEMO: Auto-fill untuk testing
        function demoAutoFill() {
            document.getElementById('nis').value = '22010123';
            document.getElementById('name').value = 'Andi Pratama';
            document.getElementById('class').value = 'XI';
            document.getElementById('major').value = 'PPLG';
            document.getElementById('gender_male').checked = true;
            document.getElementById('email').value = 'andi.pratama@siswa.sch.id';
            document.getElementById('password').value = 'Password123!';
            document.getElementById('password_confirmation').value = 'Password123!';
            document.getElementById('terms').checked = true;
            
            checkPasswordStrength('Password123!');
            checkPasswordMatch();
            
            showNotification('info', 'Form telah diisi otomatis untuk demo');
        }

        // Uncomment untuk testing
        // setTimeout(demoAutoFill, 1000);
    </script>
</body>
</html>