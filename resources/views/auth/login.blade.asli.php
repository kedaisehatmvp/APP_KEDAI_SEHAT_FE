<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kantin Sehat</title>
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

        /* Background Shapes */
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

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(25px);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .logo-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 30px;
        }

        .logo-section i {
            font-size: 2.5rem;
            color: var(--primary);
        }

        .logo-section h1 {
            font-size: 28px;
            font-weight: 700;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .login-header {
            margin-bottom: 25px;
            text-align: center;
        }

        .login-header h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #e2e8f0;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .login-header p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Form Styles */
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

        .login-card input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff !important;
            font-size: 15px;
            transition: all 0.3s;
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 2;
        }

        .login-card input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.3);
            background: rgba(255, 255, 255, 0.15);
        }

        .login-card input::placeholder {
            color: rgba(255, 255, 255, 0.5);
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

        /* Options */
        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .remember-me label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            cursor: pointer;
        }

        .forgot-password {
            font-size: 14px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: #34d399;
            text-decoration: underline;
        }

        /* Buttons */
        .btn {
            width: 100%;
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
            margin-top: 10px;
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
            display: none;
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

        /* Register Link */
        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 15px;
            color: rgba(255, 255, 255, 0.8);
        }

        .register-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            color: #34d399;
            text-decoration: underline;
            transform: translateX(2px);
        }

        /* Animation */
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

        .login-card {
            animation: fadeIn 0.8s ease-out;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                max-width: 100%;
                padding: 15px;
            }
            
            .login-card {
                padding: 2rem 1.5rem;
            }
            
            .login-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .bg-shape {
                width: 250px;
                height: 250px;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 1.5rem;
            }
            
            .logo-section h1 {
                font-size: 24px;
            }
            
            .login-header h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Background Shapes -->
    <div class="bg-shape"></div>
    <div class="bg-shape"></div>

    <div class="login-container">
        <div class="login-card">
            <div class="logo-section">
                <i class="fas fa-utensils fa-2x"></i>
                <h1>KANTIN SEHAT</h1>
            </div>

            <div class="login-header">
                <h2>Selamat Datang Kembali</h2>
                <p>Masuk ke akun Anda untuk mengakses layanan Kantin Sehat</p>
            </div>

            <!-- Status Message -->
            <div id="statusMessage" class="status-message"></div>

            <!-- Login Form -->
            <form id="loginForm">
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="email@siswa.sch.id" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="login-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ingat saya</label>
                    </div>
                    <a href="#" class="forgot-password" onclick="showForgotPassword()">
                        Lupa password?
                    </a>
                </div>

                <button type="submit" class="btn btn-primary" id="loginBtn">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>

                <div class="register-link">
                    Belum punya akun? <a href="/register">Daftar di sini</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Set up form submission
            document.getElementById('loginForm').addEventListener('submit', function(e) {
                e.preventDefault();
                handleLogin();
            });
            
            // Auto-fill if there are saved credentials
            const savedEmail = localStorage.getItem('kantinsehatRememberEmail');
            const savedPassword = localStorage.getItem('kantinsehatRememberPassword');
            
            if (savedEmail && document.getElementById('remember').checked) {
                document.getElementById('email').value = savedEmail;
                if (savedPassword) {
                    document.getElementById('password').value = savedPassword;
                }
            }
            
            // Check if user is already logged in
            checkIfLoggedIn();
        });

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

        // Handle login
        function handleLogin() {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const remember = document.getElementById('remember').checked;
            
            // Validate inputs
            if (!email || !password) {
                showStatus('error', 'Harap isi email dan password!');
                return;
            }
            
            // Show loading
            const loginBtn = document.getElementById('loginBtn');
            const originalText = loginBtn.innerHTML;
            loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            loginBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Check credentials
                const isValid = validateCredentials(email, password);
                
                if (isValid) {
                    // Save credentials if remember me is checked
                    if (remember) {
                        localStorage.setItem('kantinsehatRememberEmail', email);
                        localStorage.setItem('kantinsehatRememberPassword', password);
                    } else {
                        localStorage.removeItem('kantinsehatRememberEmail');
                        localStorage.removeItem('kantinsehatRememberPassword');
                    }
                    
                    // Get or create user data
                    const users = JSON.parse(localStorage.getItem('kantinsehatUsers')) || [];
                    let user = users.find(u => u.email === email);
                    
                    if (!user) {
                        // Create new user
                        user = {
                            email: email,
                            name: email.split('@')[0],
                            role: email.includes('admin') ? 'admin' : 'siswa',
                            createdAt: new Date().toISOString()
                        };
                        users.push(user);
                        localStorage.setItem('kantinsehatUsers', JSON.stringify(users));
                    }
                    
                    // Save current user session
                    localStorage.setItem('kantinsehatCurrentUser', JSON.stringify({
                        ...user,
                        isLoggedIn: true,
                        lastLogin: new Date().toISOString()
                    }));
                    
                    // Show success message
                    showStatus('success', 'Login berhasil! Mengarahkan ke dashboard...');
                    
                    // Redirect to dashboard based on role
                    setTimeout(() => {
                        if (user.role === 'admin') {
                            window.location.href = '/admin/dashboard';
                        } else {
                            window.location.href = '/siswa/dashboard';
                        }
                    }, 1500);
                } else {
                    // Show error message
                    showStatus('error', 'Email atau password salah!');
                    
                    // Reset button
                    loginBtn.innerHTML = originalText;
                    loginBtn.disabled = false;
                }
            }, 1000);
        }

        // Simple validation for demo
        function validateCredentials(email, password) {
            // For demo purposes, accept any email with password "password123"
            // Or check against stored users
            const users = JSON.parse(localStorage.getItem('kantinsehatUsers')) || [];
            
            // Check if user exists and password matches
            const user = users.find(u => u.email === email);
            if (user) {
                // In a real app, you'd check hashed passwords
                return password === 'password123' || (user.password && user.password === password);
            }
            
            // For demo: accept any email with default password
            return password === 'password123';
        }

        // Show status message
        function showStatus(type, message) {
            const statusElement = document.getElementById('statusMessage');
            statusElement.className = `status-message status-${type}`;
            statusElement.innerHTML = `
                <i class="fas fa-${type === 'error' ? 'exclamation-circle' : 'check-circle'} me-2"></i>
                ${message}
            `;
            statusElement.style.display = 'block';
            
            // Auto hide success messages
            if (type === 'success') {
                setTimeout(() => {
                    statusElement.style.display = 'none';
                }, 3000);
            }
        }

        // Forgot password
        function showForgotPassword() {
            const email = document.getElementById('email').value || prompt('Masukkan email Anda untuk reset password:');
            if (email) {
                showStatus('info', `Link reset password telah dikirim ke ${email}`);
                
                // In real app, this would make an API call
                console.log(`Reset password requested for: ${email}`);
            }
        }

        // Check if user is already logged in
        function checkIfLoggedIn() {
            const currentUser = JSON.parse(localStorage.getItem('kantinsehatCurrentUser'));
            if (currentUser && currentUser.isLoggedIn) {
                showStatus('info', `Anda sudah login sebagai ${currentUser.email}. Mengarahkan...`);
                
                // Redirect to dashboard based on role
                setTimeout(() => {
                    if (currentUser.role === 'admin') {
                        window.location.href = '/admin/dashboard';
                    } else {
                        window.location.href = '/siswa/dashboard';
                    }
                }, 1000);
            }
        }
    </script>
</body>
</html>