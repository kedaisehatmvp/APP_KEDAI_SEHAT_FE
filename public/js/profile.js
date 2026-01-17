        // Load user data
        document.addEventListener('DOMContentLoaded', function() {
            loadProfileData();
            loadStats();
            loadRecentOrders();
            
            // Set current year in footer
            const yearElement = document.querySelector('.copyright p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
            }
        });
        
        // Load profile data
        function loadProfileData() {
            const userData = JSON.parse(localStorage.getItem('kantinSehatUser') || '{}');
            
            if (userData) {
                // Update profile info
                document.getElementById('profileName').textContent = userData.name || 'Nama Pengguna';
                document.getElementById('profileRole').textContent = getRoleDisplay(userData.role);
                document.getElementById('profileEmail').textContent = userData.email || '-';
                document.getElementById('profilePhone').textContent = userData.phone || '-';
                document.getElementById('profileAddress').textContent = userData.address || '-';
                document.getElementById('profileClass').textContent = userData.class || '-';
                
                // Update avatar
                const avatar = document.getElementById('profileAvatar');
                if (userData.avatar) {
                    avatar.src = userData.avatar;
                } else if (userData.name) {
                    avatar.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.name)}&background=28a745&color=fff&size=150`;
                }
                
                // Update join date
                if (userData.createdAt) {
                    const joinDate = new Date(userData.createdAt).toLocaleDateString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    document.getElementById('profileJoinDate').textContent = joinDate;
                }
            }
        }
        
        // Load stats
        function loadStats() {
            const userData = JSON.parse(localStorage.getItem('kantinSehatUser') || '{}');
            const orders = JSON.parse(localStorage.getItem('kantinSehatOrders')) || [];
            
            // Filter user's orders
            const userOrders = orders.filter(order => order.customer && order.customer.email === userData.email);
            
            // Calculate stats
            const totalOrders = userOrders.length;
            const totalSpent = userOrders.reduce((total, order) => {
                return total + (order.items ? order.items.reduce((sum, item) => sum + (item.price * item.quantity), 0) : 0);
            }, 0);
            
            // Calculate success rate (completed orders)
            const completedOrders = userOrders.filter(order => order.status === 'completed' || order.status === 'success').length;
            const successRate = totalOrders > 0 ? Math.round((completedOrders / totalOrders) * 100) : 0;
            
            // Update stats
            document.getElementById('totalOrders').textContent = totalOrders;
            document.getElementById('totalSpent').textContent = `Rp ${totalSpent.toLocaleString('id-ID')}`;
            document.getElementById('successRate').textContent = `${successRate}%`;
            
            // Calculate average rating
            let totalRating = 0;
            let ratingCount = 0;
            
            userOrders.forEach(order => {
                if (order.rating) {
                    totalRating += order.rating;
                    ratingCount++;
                }
            });
            
            const avgRating = ratingCount > 0 ? (totalRating / ratingCount).toFixed(1) : '0.0';
            document.getElementById('avgRating').textContent = avgRating;
        }
        
        // Load recent orders
        function loadRecentOrders() {
            const userData = JSON.parse(localStorage.getItem('kantinSehatUser') || '{}');
            const orders = JSON.parse(localStorage.getItem('kantinSehatOrders')) || [];
            
            // Filter user's orders and sort by date (newest first)
            const userOrders = orders
                .filter(order => order.customer && order.customer.email === userData.email)
                .sort((a, b) => new Date(b.date || b.createdAt) - new Date(a.date || a.createdAt))
                .slice(0, 5); // Get only 5 most recent
            
            const ordersContainer = document.getElementById('recentOrders');
            
            if (userOrders.length === 0) {
                return; // Keep default message
            }
            
            let ordersHtml = '';
            
            userOrders.forEach(order => {
                // Calculate total
                const total = order.items ? order.items.reduce((sum, item) => sum + (item.price * item.quantity), 0) : 0;
                const date = new Date(order.date || order.createdAt).toLocaleDateString('id-ID');
                const status = getStatusDisplay(order.status);
                
                ordersHtml += `
                    <div class="order-item">
                        <div>
                            <h6 class="mb-1">${order.id || 'Pesanan'}</h6>
                            <small class="text-muted">${date} • ${order.items ? order.items.length : 0} item</small>
                        </div>
                        <div class="ms-auto text-end">
                            <div class="fw-bold text-primary">Rp ${total.toLocaleString('id-ID')}</div>
                            <span class="order-status ${getStatusClass(order.status)}">${status}</span>
                        </div>
                    </div>
                `;
            });
            
            ordersContainer.innerHTML = ordersHtml;
        }
        
        // Get role display text
        function getRoleDisplay(role) {
            const roles = {
                'siswa': 'Siswa',
                'guru': 'Guru',
                'admin': 'Admin Kantin'
            };
            return roles[role] || 'Pengguna';
        }
        
        // Get status display
        function getStatusDisplay(status) {
            const statuses = {
                'pending': 'Menunggu',
                'processing': 'Diproses',
                'completed': 'Selesai',
                'cancelled': 'Dibatalkan',
                'success': 'Berhasil'
            };
            return statuses[status] || status || 'Menunggu';
        }
        
        // Get status class
        function getStatusClass(status) {
            const classes = {
                'pending': 'status-warning',
                'processing': 'status-warning',
                'completed': 'status-success',
                'success': 'status-success',
                'cancelled': 'status-danger'
            };
            return classes[status] || 'status-warning';
        }
        
        // Logout function
        function logout() {
            Swal.fire({
                title: 'Logout?',
                text: 'Anda yakin ingin keluar dari akun ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    localStorage.removeItem('kantinSehatUser');
                    window.location.href = '/login';
                }
            });
        }