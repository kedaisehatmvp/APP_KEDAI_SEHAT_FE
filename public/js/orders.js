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
        const bottomBarItems = document.querySelectorAll('.bottom-bar-item');

        // Load transactions on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadTransactions();
            setupEventListeners();
            handleBottomBarActiveState();
        });

        // Handle bottom bar active state
        function handleBottomBarActiveState() {
            const currentPath = window.location.pathname;
            
            bottomBarItems.forEach(item => {
                item.classList.remove('active');
                
                if (currentPath === '/' && item.getAttribute('href') === '/') {
                    item.classList.add('active');
                } else if (currentPath.includes('/menu') && item.getAttribute('href') === '/menu') {
                    item.classList.add('active');
                } else if (item.getAttribute('href') === '#promo') {
                    // For promo, check if we're on menu page with promo section
                    if (currentPath.includes('/menu')) {
                        item.classList.add('active');
                    }
                } else if (currentPath.includes('/order-history') && item.getAttribute('href') === '/order-history') {
                    item.classList.add('active');
                }
            });
        }

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