<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan - Kantin Sehat</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #28a745;
            --primary-dark: #218838;
            --light: #f8f9fa;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* ===== NAVBAR ===== */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary);
        }
        
        .navbar-brand span {
            color: #ffc107;
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 8px;
            color: #333 !important;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: var(--primary) !important;
        }
        
        .btn-order {
            background: var(--primary);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-order:hover {
            background: var(--primary-dark);
            color: white;
        }
        
        /* Profile Dropdown */
        .profile-avatar img {
            object-fit: cover;
            border: 2px solid var(--primary);
        }
        
        .btn-transparent {
            background: transparent;
            border: none;
            color: #333;
            display: flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 50px;
        }
        
        .btn-transparent:hover {
            background: rgba(40, 167, 69, 0.1);
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        
        .dropdown-item {
            padding: 10px 20px;
            border-radius: 5px;
            margin: 2px 10px;
            width: calc(100% - 20px);
        }
        
        .dropdown-item:hover {
            background: rgba(40, 167, 69, 0.1);
            color: var(--primary);
        }
        
        .profile-name {
            font-size: 0.9rem;
            line-height: 1.2;
        }
        
        .profile-role {
            font-size: 0.75rem;
        }
        
        /* Header */
        .history-header {
            background: linear-gradient(135deg, var(--primary), #34ce57);
            color: white;
            padding: 100px 0 50px;
            margin-top: 80px;
            text-align: center;
        }
        
        /* Stats */
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        
        .stat-icon i {
            font-size: 1.3rem;
            color: var(--primary);
        }
        
        .stat-number {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        /* Transaction Card */
        .transaction-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            margin-bottom: 15px;
            border-left: 4px solid var(--primary);
            transition: all 0.3s;
        }
        
        .transaction-card:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }
        
        .transaction-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .transaction-body {
            padding: 20px;
        }
        
        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-success {
            background: #d4edda;
            color: #155724;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-failed {
            background: #f8d7da;
            color: #721c24;
        }
        
        /* Buttons */
        .btn-simple {
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 0.9rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary-simple {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary-simple:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-outline-simple {
            background: white;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .btn-outline-simple:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }
        
        .empty-state i {
            font-size: 4rem;
            color: #e9ecef;
            margin-bottom: 20px;
        }
        
        /* Footer */
        .simple-footer {
            background: #343a40;
            color: white;
            padding: 40px 0 20px;
            margin-top: 60px;
        }
        
        .footer-logo {
            font-weight: 700;
            font-size: 1.5rem;
            color: white;
            text-decoration: none;
        }
        
        .footer-logo span {
            color: #ffc107;
        }
        
        /* Custom Modal */
        .custom-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }
        
        .custom-modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .custom-modal-content {
            background: white;
            border-radius: 10px;
            padding: 20px;
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
            transform: translateY(-20px);
            transition: transform 0.3s;
        }
        
        .custom-modal.active .custom-modal-content {
            transform: translateY(0);
        }
        
        .custom-modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #666;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .custom-modal-close:hover {
            color: #333;
        }
        
        /* Notification */
        .custom-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border-radius: 8px;
            padding: 15px 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 9999;
            transform: translateX(100%);
            transition: transform 0.3s;
        }
        
        .custom-notification.show {
            transform: translateX(0);
        }
        
        .notification-success {
            border-left: 4px solid var(--primary);
        }
        
        .notification-icon {
            font-size: 1.5rem;
            color: var(--primary);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .history-header {
                padding: 80px 0 40px;
                margin-top: 70px;
            }
            
            .btn-transparent {
                padding: 5px;
            }
            
            .profile-name {
                font-size: 0.8rem;
            }
            
            .custom-modal-content {
                width: 95%;
                padding: 15px;
            }
        }
        
        @media (max-width: 576px) {
            .history-header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg fixed-top">
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
                        <a class="nav-link active" href="/order-history">Pesanan</a>
                    </li>
                    
                    <!-- Profile Dropdown -->
                    <div id="profileDropdown" class="dropdown">
                        <button class="btn btn-transparent dropdown-toggle" 
                                type="button" 
                                id="dropdownMenuButton" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false">
                            <div class="profile-avatar me-2">
                                <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=28a745&color=fff&size=40" 
                                     alt="Profile" 
                                     class="rounded-circle"
                                     width="40" 
                                     height="40">
                            </div>
                            <div class="text-start d-none d-md-block">
                                <div class="profile-name fw-bold">Budi Santoso</div>
                                <small class="profile-role text-muted">Siswa</small>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="/pembeli/profile">
                                    <i class="fas fa-user me-2"></i> Profile Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item active" href="/order-history">
                                    <i class="fas fa-history me-2"></i> Riwayat Transaksi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/pembeli/settings">
                                    <i class="fas fa-cog me-2"></i> Pengaturan
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a href="/menu" class="btn-order">
                            <i class="fas fa-shopping-cart"></i> Pesan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== HEADER ===== -->
    <div class="history-header">
        <div class="container">
            <h1 class="mb-3">
                <i class="fas fa-history me-3"></i>Riwayat Pesanan
            </h1>
            <p class="lead mb-0">Semua transaksi Anda di Kantin Sehat</p>
        </div>
    </div>

    <!-- ===== STATS ===== -->
    <div class="container mt-4">
        <div class="row g-3">
            <div class="col-md-3 col-6">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-number">5</div>
                    <div class="text-muted">Total Pesanan</div>
                </div>
            </div>
            
            <div class="col-md-3 col-6">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="stat-number">Rp 209K</div>
                    <div class="text-muted">Total Belanja</div>
                </div>
            </div>
            
            <div class="col-md-3 col-6">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-number">3</div>
                    <div class="text-muted">Selesai</div>
                </div>
            </div>
            
            <div class="col-md-3 col-6">
                <div class="stat-card text-center">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number">2</div>
                    <div class="text-muted">Proses</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== FILTER ===== -->
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Semua Pesanan</h5>
            <div class="d-flex gap-2">
                <select class="form-select w-auto" id="filterStatus">
                    <option value="all">Semua Status</option>
                    <option value="selesai">Selesai</option>
                    <option value="proses">Dalam Proses</option>
                    <option value="batal">Dibatalkan</option>
                </select>
                <button class="btn btn-outline-simple btn-simple" onclick="refreshData()">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- ===== TRANSACTIONS ===== -->
    <div class="container mt-3" id="transactionsList">
        <!-- Transaction cards will be loaded here -->
    </div>

    <!-- ===== EMPTY STATE ===== -->
    <div class="container mt-5 d-none" id="emptyState">
        <div class="empty-state">
            <i class="fas fa-receipt"></i>
            <h4 class="mb-3">Belum Ada Pesanan</h4>
            <p class="mb-4">Anda belum melakukan pemesanan di Kantin Sehat</p>
            <a href="/menu" class="btn btn-primary-simple btn-simple">
                <i class="fas fa-utensils me-2"></i>Pesan Sekarang
            </a>
        </div>
    </div>

    <!-- ===== MODAL CONTAINER ===== -->
    <div id="modalContainer"></div>
    
    <!-- ===== FOOTER ===== -->
    <footer class="simple-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <a href="/" class="footer-logo mb-3 d-inline-block">
                        <i class="fas fa-utensils me-2"></i>Kantin<span>Sehat</span>
                    </a>
                    <p class="mb-0">Makanan sehat untuk komunitas sekolah</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="mb-3">
                        <p class="mb-1">
                            <i class="fas fa-phone me-2"></i>(021) 1234-5678
                        </p>
                        <p class="mb-1">
                            <i class="fas fa-envelope me-2"></i>kantin@smkn1-jkt.sch.id
                        </p>
                    </div>
                    <p class="mb-0">&copy; 2024 Kantin Sehat SMKN 1 Jakarta</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ===== SCRIPTS ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sample transaction data
        const transactions = [
            {
                id: "TRX001",
                date: "15 Maret 2024",
                time: "10:30",
                items: ["Salad Sehat Super", "Jus Detox Mix"],
                total: 43000,
                status: "selesai"
            },
            {
                id: "TRX002",
                date: "14 Maret 2024",
                time: "14:20",
                items: ["Nasi Goreng Sehat"],
                total: 28000,
                status: "proses"
            },
            {
                id: "TRX003",
                date: "12 Maret 2024",
                time: "11:15",
                items: ["Paket Diet Sehat", "Teh Hijau Organik"],
                total: 63000,
                status: "selesai"
            },
            {
                id: "TRX004",
                date: "10 Maret 2024",
                time: "16:45",
                items: ["Sandwich Ayam Sehat"],
                total: 18000,
                status: "selesai"
            },
            {
                id: "TRX005",
                date: "8 Maret 2024",
                time: "09:20",
                items: ["Smoothie Bowl Berry"],
                total: 22000,
                status: "batal"
            }
        ];

        // DOM elements
        const transactionsList = document.getElementById('transactionsList');
        const emptyState = document.getElementById('emptyState');
        const filterStatus = document.getElementById('filterStatus');
        const modalContainer = document.getElementById('modalContainer');

        // Load transactions on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadTransactions();
            setupEventListeners();
        });

        // Load transactions
        function loadTransactions(filter = 'all') {
            let filteredTransactions = transactions;
            
            if (filter !== 'all') {
                filteredTransactions = transactions.filter(t => t.status === filter);
            }
            
            // Show/hide empty state
            if (filteredTransactions.length === 0) {
                transactionsList.innerHTML = '';
                emptyState.classList.remove('d-none');
                return;
            } else {
                emptyState.classList.add('d-none');
            }
            
            // Render transactions
            let html = '';
            
            filteredTransactions.forEach(transaction => {
                const statusClass = getStatusClass(transaction.status);
                const statusText = getStatusText(transaction.status);
                
                html += `
                    <div class="transaction-card">
                        <div class="transaction-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">${transaction.id}</h6>
                                    <small class="text-muted">
                                        <i class="far fa-calendar me-1"></i>
                                        ${transaction.date} - ${transaction.time}
                                    </small>
                                </div>
                                <span class="status-badge ${statusClass}">
                                    ${statusText}
                                </span>
                            </div>
                        </div>
                        
                        <div class="transaction-body">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <strong>Items:</strong>
                                    <small>${transaction.items.length} item</small>
                                </div>
                                <div>
                                    ${transaction.items.map(item => `
                                        <span class="badge bg-light text-dark me-2 mb-2 p-2">
                                            <i class="fas fa-utensils me-1"></i>${item}
                                        </span>
                                    `).join('')}
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Total:</strong>
                                    <span class="ms-2 fs-5 fw-bold text-primary">
                                        Rp ${transaction.total.toLocaleString('id-ID')}
                                    </span>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-outline-simple btn-simple" onclick="viewDetail('${transaction.id}')">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </button>
                                    <button class="btn btn-primary-simple btn-simple" onclick="repeatOrder('${transaction.id}')">
                                        <i class="fas fa-redo me-1"></i> Ulangi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            transactionsList.innerHTML = html;
        }

        // Get status class
        function getStatusClass(status) {
            switch(status) {
                case 'selesai': return 'status-success';
                case 'proses': return 'status-pending';
                case 'batal': return 'status-failed';
                default: return 'status-pending';
            }
        }

        // Get status text
        function getStatusText(status) {
            switch(status) {
                case 'selesai': return 'Selesai';
                case 'proses': return 'Diproses';
                case 'batal': return 'Dibatalkan';
                default: return status;
            }
        }

        // Setup event listeners
        function setupEventListeners() {
            // Filter change
            filterStatus.addEventListener('change', function() {
                loadTransactions(this.value);
            });
        }

        // Refresh data
        function refreshData() {
            // Simulate loading
            transactionsList.innerHTML = `
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3">Memuat data...</p>
                </div>
            `;
            
            setTimeout(() => {
                loadTransactions(filterStatus.value);
            }, 500);
        }

        // Custom Modal Functions
        function showModal(title, content, onConfirm = null) {
            // Clear any existing modal
            modalContainer.innerHTML = '';
            
            const modal = document.createElement('div');
            modal.className = 'custom-modal';
            modal.innerHTML = `
                <div class="custom-modal-content">
                    <button class="custom-modal-close" onclick="closeModal()">
                        <i class="fas fa-times"></i>
                    </button>
                    ${title ? `<h5 class="mb-3">${title}</h5>` : ''}
                    <div>${content}</div>
                    ${onConfirm ? `
                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-outline-simple btn-simple flex-grow-1" onclick="closeModal()">
                                Batal
                            </button>
                            <button class="btn btn-primary-simple btn-simple flex-grow-1" onclick="${onConfirm}">
                                Konfirmasi
                            </button>
                        </div>
                    ` : ''}
                </div>
            `;
            
            modalContainer.appendChild(modal);
            
            // Show modal with animation
            setTimeout(() => {
                modal.classList.add('active');
            }, 10);
            
            // Close modal on ESC key
            const escHandler = (e) => {
                if (e.key === 'Escape') closeModal();
            };
            document.addEventListener('keydown', escHandler);
            
            // Store handler for cleanup
            modal._escHandler = escHandler;
        }

        function closeModal() {
            const modal = document.querySelector('.custom-modal');
            if (modal) {
                modal.classList.remove('active');
                
                // Remove event listener
                if (modal._escHandler) {
                    document.removeEventListener('keydown', modal._escHandler);
                }
                
                // Remove from DOM after animation
                setTimeout(() => {
                    if (modal.parentNode) {
                        modal.parentNode.removeChild(modal);
                    }
                }, 300);
            }
        }

        // Show notification
        function showNotification(message, type = 'success', duration = 3000) {
            const notification = document.createElement('div');
            notification.className = `custom-notification notification-${type}`;
            notification.innerHTML = `
                <div class="notification-icon">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                </div>
                <div>
                    <strong>${type === 'success' ? 'Berhasil!' : 'Perhatian!'}</strong>
                    <p class="mb-0">${message}</p>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Show with animation
            setTimeout(() => {
                notification.classList.add('show');
            }, 10);
            
            // Auto remove
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, duration);
        }

        // View transaction detail
        window.viewDetail = function(transactionId) {
            const transaction = transactions.find(t => t.id === transactionId);
            if (!transaction) return;
            
            const content = `
                <div class="mb-3">
                    <p><strong>ID Transaksi:</strong> ${transaction.id}</p>
                    <p><strong>Tanggal:</strong> ${transaction.date}</p>
                    <p><strong>Waktu:</strong> ${transaction.time}</p>
                    <p><strong>Status:</strong> ${getStatusText(transaction.status)}</p>
                </div>
                
                <div class="mb-3">
                    <strong>Items yang dipesan:</strong>
                    <ul class="mt-2">
                        ${transaction.items.map(item => `<li>${item}</li>`).join('')}
                    </ul>
                </div>
                
                <div class="border-top pt-3">
                    <p class="mb-1"><strong>Total Pembayaran:</strong></p>
                    <h4 class="text-primary">Rp ${transaction.total.toLocaleString('id-ID')}</h4>
                </div>
            `;
            
            showModal('Detail Pesanan', content);
        }

        // Repeat order
        window.repeatOrder = function(transactionId) {
            const transaction = transactions.find(t => t.id === transactionId);
            if (!transaction) return;
            
            const content = `
                <p>Tambahkan ${transaction.items.length} item ke keranjang?</p>
                <ul class="mt-2">
                    ${transaction.items.map(item => `<li>${item}</li>`).join('')}
                </ul>
            `;
            
            showModal(
                'Ulangi Pesanan',
                content,
                `confirmRepeatOrder('${transactionId}')`
            );
        }

        // Confirm repeat order
        window.confirmRepeatOrder = function(transactionId) {
            const transaction = transactions.find(t => t.id === transactionId);
            if (!transaction) return;
            
            // Simulate adding to cart
            setTimeout(() => {
                closeModal();
                
                // Show success notification
                showNotification(
                    `${transaction.items.length} item berhasil ditambahkan ke keranjang`,
                    'success'
                );
                
                // Optional: Redirect to cart after delay
                setTimeout(() => {
                    // window.location.href = '/menu'; // Uncomment to redirect
                }, 2000);
            }, 500);
        }

        // Demo functions
        window.addSampleOrder = function() {
            const newOrder = {
                id: "TRX" + (transactions.length + 1).toString().padStart(3, '0'),
                date: new Date().toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                }),
                time: new Date().toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit'
                }),
                items: ["Salad Baru", "Jus Jeruk"],
                total: 35000,
                status: "proses"
            };
            
            transactions.unshift(newOrder);
            loadTransactions(filterStatus.value);
            
            showNotification('Pesanan demo berhasil ditambahkan!', 'success');
        }

        // Test bug fix - close all modals
        window.closeAllModals = function() {
            const modals = document.querySelectorAll('.custom-modal');
            modals.forEach(modal => {
                if (modal._escHandler) {
                    document.removeEventListener('keydown', modal._escHandler);
                }
                modal.remove();
            });
        }
    </script>
</body>
</html>