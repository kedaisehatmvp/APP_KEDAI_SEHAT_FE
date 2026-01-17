        // User management based on database tables
        let userData = null;
        let originalData = null;
        let siswaData = null;
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            checkLoginStatus();
            loadUserData();
            loadSiswaData();
            loadOrderHistory();
            setupFormListeners();
            
            // Set current year in footer
            const yearElement = document.querySelector('.copyright p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
            }
        });
        
        // Check login status based on tbl_users
        function checkLoginStatus() {
            const user = localStorage.getItem('kantinSehatUser');
            const profileDropdown = document.getElementById('profileDropdown');
            const loginButton = document.getElementById('loginButton');
            
            if (user) {
                try {
                    userData = JSON.parse(user);
                    
                    // Show profile dropdown, hide login button
                    profileDropdown.classList.remove('d-none');
                    profileDropdown.classList.add('d-block');
                    loginButton.classList.remove('d-block');
                    loginButton.classList.add('d-none');
                    
                    // Update navbar info
                    updateNavbarInfo();
                    
                } catch (e) {
                    console.error('Error parsing user data:', e);
                    logout();
                }
            } else {
                // Redirect to login if not logged in
                window.location.href = '/login';
            }
        }
        
        // Load user data from tbl_users
        function loadUserData() {
            if (!userData) {
                // For demo, create sample user data
                userData = {
                    id_user: 1,
                    username: 'siswa001',
                    password: 'hashedpassword',
                    nama_lengkap: 'Budi Santoso',
                    role: 'siswa',
                    foto: null,
                    email: 'budi.santoso@smkn1.sch.id',
                    no_telepon: '81234567890',
                    id_siswa: 1,
                    last_login: new Date().toISOString(),
                    created_at: new Date('2024-01-01').toISOString(),
                    updated_at: new Date().toISOString()
                };
                localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            }
            
            // Update profile info
            document.getElementById('profileName').textContent = userData.nama_lengkap;
            document.getElementById('profileEmail').textContent = userData.email;
            document.getElementById('profileRole').textContent = getRoleDisplay(userData.role);
            document.getElementById('profileBadge').textContent = userData.role === 'siswa' ? 'Siswa Aktif' : getRoleDisplay(userData.role);
            
            // Update avatar
            const avatarUrl = userData.foto || `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.nama_lengkap)}&background=28a745&color=fff&size=150`;
            document.getElementById('profileAvatar').src = avatarUrl;
            document.getElementById('avatarPreview').src = avatarUrl;
            
            // Update last login
            const lastLogin = userData.last_login ? new Date(userData.last_login).toLocaleString('id-ID') : '-';
            document.getElementById('lastLogin').textContent = lastLogin;
            
            // Load form data
            loadFormData();
            
            // Save original data for comparison
            originalData = JSON.parse(JSON.stringify(userData));
        }
        
        // Load siswa data from tbl_siswa
        function loadSiswaData() {
            // For demo, create sample siswa data
            siswaData = {
                id_siswa: 1,
                nis: '20240001',
                nama_siswa: 'Budi Santoso',
                kelas: 'X',
                jurusan: 'TKJ',
                gender: 'L',
                created_at: new Date('2024-01-01').toISOString(),
                updated_at: new Date().toISOString()
            };
            
            // Update NIS display
            document.getElementById('profileNIS').textContent = `NIS: ${siswaData.nis}`;
        }
        
        // Load order history for stats from tbl_transaksi
        function loadOrderHistory() {
            // For demo, create sample transaction data
            const orders = [
                {
                    id_transaksi: 1,
                    id_user: 1,
                    id_menu: 1,
                    jumlah: 2,
                    total_harga: 30000,
                    status: 'selesai',
                    tanggal_transaksi: new Date('2024-03-01').toISOString()
                },
                {
                    id_transaksi: 2,
                    id_user: 1,
                    id_menu: 3,
                    jumlah: 1,
                    total_harga: 15000,
                    status: 'selesai',
                    tanggal_transaksi: new Date('2024-03-02').toISOString()
                }
            ];
            
            const totalOrders = orders.length;
            const totalSpent = orders.reduce((total, order) => total + order.total_harga, 0);
            
            document.getElementById('totalOrders').textContent = totalOrders;
            document.getElementById('totalSpent').textContent = `Rp ${totalSpent.toLocaleString('id-ID')}`;
        }
        
        // Load form data from both tbl_users and tbl_siswa
        function loadFormData() {
            if (!userData || !siswaData) return;
            
            // Profile form (from tbl_siswa)
            document.getElementById('nis').value = siswaData.nis || '';
            document.getElementById('namaSiswa').value = siswaData.nama_siswa || '';
            document.getElementById('kelas').value = siswaData.kelas || '';
            document.getElementById('jurusan').value = siswaData.jurusan || '';
            document.getElementById('phone').value = userData.no_telepon || '';
            document.getElementById('gender').value = siswaData.gender || '';
            
            // Account form (from tbl_users)
            document.getElementById('email').value = userData.email || '';
            document.getElementById('username').value = userData.username || '';
            document.getElementById('userRole').value = userData.role || 'siswa';
            document.getElementById('tahunAjaran').value = '2024/2025'; // Default
            document.getElementById('language').value = userData.language || 'id';
            
            // Security form
            document.getElementById('twoFactor').checked = userData.two_factor || false;
            
            // Notification settings
            document.getElementById('notifOrder').checked = userData.notif_order !== false;
            document.getElementById('notifPromo').checked = userData.notif_promo !== false;
            document.getElementById('notifUpdate').checked = userData.notif_update || false;
            document.getElementById('notifSound').checked = userData.notif_sound !== false;
            document.getElementById('notifPush').checked = userData.notif_push !== false;
        }
        
        // Setup form listeners
        function setupFormListeners() {
            // Profile form
            document.getElementById('profileForm').addEventListener('submit', function(e) {
                e.preventDefault();
                saveProfile();
            });
            
            // Account form
            document.getElementById('accountForm').addEventListener('submit', function(e) {
                e.preventDefault();
                saveAccount();
            });
            
            // Security form
            document.getElementById('securityForm').addEventListener('submit', function(e) {
                e.preventDefault();
                saveSecurity();
            });
        }
        
        // Update navbar info
        function updateNavbarInfo() {
            document.getElementById('navbarName').textContent = userData.nama_lengkap || 'Nama User';
            document.getElementById('navbarRole').textContent = getRoleDisplay(userData.role);
            
            const navbarAvatar = document.getElementById('navbarAvatar');
            if (navbarAvatar && userData.foto) {
                navbarAvatar.src = userData.foto;
            } else if (navbarAvatar && userData.nama_lengkap) {
                navbarAvatar.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.nama_lengkap)}&background=28a745&color=fff&size=40`;
            }
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
        
        // Change tab
        function changeTab(tabName) {
            // Update active tab button
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
                if (btn.textContent.includes(tabName.charAt(0).toUpperCase() + tabName.slice(1))) {
                    btn.classList.add('active');
                }
            });
            
            // Show selected tab
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('active');
            });
            document.getElementById(`${tabName}Tab`).classList.add('active');
        }
        
        // Preview avatar
        function previewAvatar() {
            const input = document.getElementById('avatarInput');
            const preview = document.getElementById('avatarPreview');
            
            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Validate file size (2MB max)
                if (file.size > 2 * 1024 * 1024) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Ukuran file maksimal 2MB',
                        icon: 'error'
                    });
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    
                    // Update navbar avatar too
                    const navbarAvatar = document.getElementById('navbarAvatar');
                    if (navbarAvatar) {
                        navbarAvatar.src = e.target.result;
                    }
                    
                    // Update profile avatar
                    const profileAvatar = document.getElementById('profileAvatar');
                    if (profileAvatar) {
                        profileAvatar.src = e.target.result;
                    }
                };
                
                reader.readAsDataURL(file);
            }
        }
        
        // Save profile (update tbl_siswa and tbl_users)
        function saveProfile() {
            // Collect form data
            const profileData = {
                // tbl_siswa data
                nama_siswa: document.getElementById('namaSiswa').value,
                kelas: document.getElementById('kelas').value,
                jurusan: document.getElementById('jurusan').value,
                gender: document.getElementById('gender').value,
                updated_at: new Date().toISOString(),
                
                // tbl_users data
                no_telepon: document.getElementById('phone').value,
                foto: document.getElementById('avatarPreview').src
            };
            
            // Validate required fields
            if (!profileData.nama_siswa || !profileData.kelas || !profileData.jurusan || !profileData.gender) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Harap isi semua field yang wajib diisi',
                    icon: 'error'
                });
                return;
            }
            
            // Update siswa data
            siswaData = { ...siswaData, ...profileData };
            
            // Update user data
            userData = { 
                ...userData, 
                nama_lengkap: profileData.nama_siswa,
                no_telepon: profileData.no_telepon,
                foto: profileData.foto,
                updated_at: new Date().toISOString()
            };
            
            // Save to localStorage (in real app, send to API)
            localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            
            // Update UI
            document.getElementById('profileName').textContent = siswaData.nama_siswa;
            document.getElementById('profileNIS').textContent = `NIS: ${siswaData.nis}`;
            updateNavbarInfo();
            
            // Show success message
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data profile berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
        
        // Save account settings (update tbl_users)
        function saveAccount() {
            const accountData = {
                email: document.getElementById('email').value,
                username: document.getElementById('username').value,
                language: document.getElementById('language').value,
                updated_at: new Date().toISOString()
            };
            
            // Validate email
            if (!accountData.email || !accountData.email.includes('@')) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Email tidak valid',
                    icon: 'error'
                });
                return;
            }
            
            // Update user data
            userData = { ...userData, ...accountData };
            
            // Save to localStorage
            localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            
            // Update UI
            document.getElementById('profileEmail').textContent = userData.email;
            
            Swal.fire({
                title: 'Berhasil!',
                text: 'Pengaturan akun berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
        
        // Save security settings (update tbl_users password)
        function saveSecurity() {
            const currentPassword = document.getElementById('currentPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            // Validate current password
            if (currentPassword !== 'password123') { // In real app, use hashed password comparison
                Swal.fire({
                    title: 'Error!',
                    text: 'Password saat ini salah',
                    icon: 'error'
                });
                return;
            }
            
            // Validate new password
            if (newPassword !== confirmPassword) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Password baru tidak cocok',
                    icon: 'error'
                });
                return;
            }
            
            if (newPassword.length < 6) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Password minimal 6 karakter',
                    icon: 'error'
                });
                return;
            }
            
            // Update user data
            userData = {
                ...userData,
                password: newPassword, // In real app, hash this!
                two_factor: document.getElementById('twoFactor').checked,
                updated_at: new Date().toISOString()
            };
            
            localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            
            // Clear form
            document.getElementById('currentPassword').value = '';
            document.getElementById('newPassword').value = '';
            document.getElementById('confirmPassword').value = '';
            
            Swal.fire({
                title: 'Berhasil!',
                text: 'Password berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
        
        // Save notification settings
        function saveNotifications() {
            const notifications = {
                notif_order: document.getElementById('notifOrder').checked,
                notif_promo: document.getElementById('notifPromo').checked,
                notif_update: document.getElementById('notifUpdate').checked,
                notif_sound: document.getElementById('notifSound').checked,
                notif_push: document.getElementById('notifPush').checked
            };
            
            userData = {
                ...userData,
                ...notifications,
                updated_at: new Date().toISOString()
            };
            
            localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            
            Swal.fire({
                title: 'Berhasil!',
                text: 'Pengaturan notifikasi berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
        
        // Reset notifications
        function resetNotifications() {
            document.getElementById('notifOrder').checked = true;
            document.getElementById('notifPromo').checked = true;
            document.getElementById('notifUpdate').checked = false;
            document.getElementById('notifSound').checked = true;
            document.getElementById('notifPush').checked = true;
        }
        
        // Cancel edit
        function cancelEdit() {
            loadFormData();
        }
        
        // Show session management
        function showSessionManagement() {
            Swal.fire({
                title: 'Kelola Sesi Login',
                html: `
                    <div class="text-start">
                        <p><strong>Sesi Aktif:</strong></p>
                        <ul class="mb-3">
                            <li>Browser Chrome - Jakarta (Sekarang)</li>
                            <li>Mobile Safari - Jakarta (2 jam lalu)</li>
                        </ul>
                        <p>Anda dapat logout dari semua perangkat lainnya.</p>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Logout Semua Sesi Lain',
                cancelButtonText: 'Tutup'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Semua sesi lain telah logout',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        }
        
        // Logout device
        function logoutDevice(button) {
            const securityItem = button.closest('.security-item');
            securityItem.style.opacity = '0.5';
            setTimeout(() => {
                securityItem.remove();
            }, 300);
        }
        
        // Export data
        function exportData() {
            const exportData = {
                user: userData,
                siswa: siswaData,
                exported_at: new Date().toISOString()
            };
            
            const dataStr = JSON.stringify(exportData, null, 2);
            const dataUri = 'data:application/json;charset=utf-8,'+ encodeURIComponent(dataStr);
            
            const exportFileDefaultName = `kantin-sehat-data-${new Date().toISOString().split('T')[0]}.json`;
            
            const linkElement = document.createElement('a');
            linkElement.setAttribute('href', dataUri);
            linkElement.setAttribute('download', exportFileDefaultName);
            linkElement.click();
            
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data telah diekspor',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
        
        // Delete account
        function deleteAccount() {
            Swal.fire({
                title: 'Hapus Akun?',
                text: "Tindakan ini tidak dapat dibatalkan! Semua data Anda akan dihapus permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus Akun',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Clear all user data
                    localStorage.removeItem('kantinSehatUser');
                    
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Akun Anda telah dihapus.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '/';
                    });
                }
            });
        }
        
        // Logout function
        window.logout = function() {
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
                    // Clear user data from localStorage
                    localStorage.removeItem('kantinSehatUser');
                    
                    // Redirect to home
                    window.location.href = '/';
                }
            });
        };
        
        // Console log for debugging
        console.log('Settings Page Features:');
        console.log('1. Profile management based on tbl_siswa');
        console.log('2. Account settings based on tbl_users');
        console.log('3. Security settings with password change');
        console.log('4. Notification preferences');
        console.log('5. Data export and account deletion');