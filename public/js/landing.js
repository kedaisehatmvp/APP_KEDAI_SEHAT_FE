 // User data management
        let isLoggedIn = false;
        let userData = null;

        // Sample menu data for cart
        const menuItems = {
            "Salad Sehat Super": {
                price: 25000,
                image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            },
            "Jus Detox Mix": {
                price: 18000,
                image: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            },
            "Nasi Goreng Sehat": {
                price: 28000,
                image: "https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            }
        };

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            checkLoginStatus();
            updateCartBadge();
            setupEventListeners();

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Contact form submission
            document.getElementById('contactForm').addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Pesan Terkirim!',
                    text: 'Terima kasih telah menghubungi pengelola kantin. Pesan Anda akan segera kami proses.',
                    icon: 'success',
                    confirmButtonColor: '#28a745'
                }).then(() => {
                    // Reset form
                    this.reset();
                });
            });

            // Set current year in footer
            const yearElement = document.querySelector('.copyright p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
            }

            // Update CTA buttons based on login status
            updateCTAButtons();
        });

        // Check login status from localStorage
        function checkLoginStatus() {
            const user = localStorage.getItem('kantinSehatUser');
            const profileDropdown = document.getElementById('profileDropdown');
            const loginButton = document.getElementById('loginButton');

            if (user) {
                try {
                    userData = JSON.parse(user);
                    isLoggedIn = true;

                    // Show profile dropdown, hide login button
                    profileDropdown.classList.remove('d-none');
                    profileDropdown.classList.add('d-block');
                    loginButton.classList.remove('d-block');
                    loginButton.classList.add('d-none');

                    // Update user info
                    updateUserInfo();

                } catch (e) {
                    console.error('Error parsing user data:', e);
                    logout();
                }
            } else {
                // Show login button, hide profile dropdown
                profileDropdown.classList.remove('d-block');
                profileDropdown.classList.add('d-none');
                loginButton.classList.remove('d-none');
                loginButton.classList.add('d-block');
            }
        }

        // Update user information in dropdown
        function updateUserInfo() {
            if (!userData) return;

            const userName = document.getElementById('userName');
            const userRole = document.getElementById('userRole');
            const profileAvatar = document.querySelector('.profile-avatar img');

            if (userName && userData.name) {
                userName.textContent = userData.name;
            }

            if (userRole && userData.role) {
                userRole.textContent = userData.role;
            }

            if (profileAvatar && userData.avatar) {
                profileAvatar.src = userData.avatar;
            } else if (profileAvatar && userData.name) {
                // Generate avatar from name
                const initials = userData.name.split(' ').map(n => n[0]).join('');
                profileAvatar.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.name)}&background=28a745&color=fff&size=40`;
            }
        }

        // Setup event listeners
        function setupEventListeners() {
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

                        // Update UI
                        checkLoginStatus();
                        updateCTAButtons();

                        Swal.fire({
                            title: 'Berhasil Logout!',
                            text: 'Anda telah keluar dari akun',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            };

            // Add to cart function
            window.addToCart = function(button) {
                const menuCard = button.closest('.menu-card');
                const menuTitle = menuCard.querySelector('.menu-title').textContent;
                const menuPrice = menuCard.querySelector('.menu-price').textContent;
                const menuImage = menuCard.querySelector('.menu-img').src;

                // Get price number from string
                const price = parseInt(menuPrice.replace('Rp ', '').replace(/\./g, ''));

                // Add to cart
                const item = {
                    id: Date.now(),
                    name: menuTitle,
                    price: price,
                    image: menuImage,
                    quantity: 1
                };

                addToCartStorage(item);

                Swal.fire({
                    title: 'Berhasil!',
                    text: `${menuTitle} telah ditambahkan ke keranjang`,
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });
            };
        }

        // Add item to cart storage
        function addToCartStorage(item) {
            let cart = JSON.parse(localStorage.getItem('kantinSehatCart')) || [];

            // Check if item already exists
            const existingItemIndex = cart.findIndex(cartItem => cartItem.name === item.name);

            if (existingItemIndex !== -1) {
                cart[existingItemIndex].quantity += 1;
            } else {
                cart.push(item);
            }

            // Save to localStorage
            localStorage.setItem('kantinSehatCart', JSON.stringify(cart));

            // Update cart badge
            updateCartBadge();
        }

        // Update cart badge
        function updateCartBadge() {
            const cart = JSON.parse(localStorage.getItem('kantinSehatCart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);

            const cartBadge = document.getElementById('cartBadge');
            if (cartBadge) {
                cartBadge.textContent = totalItems > 99 ? '99+' : totalItems;
                cartBadge.style.display = totalItems > 0 ? 'flex' : 'none';
            }
        }

        // Update CTA buttons based on login status
        function updateCTAButtons() {
            const ctaButtons = document.getElementById('ctaButtons');
            if (!ctaButtons) return;

            const user = localStorage.getItem('kantinSehatUser');

            if (user) {
                try {
                    const userData = JSON.parse(user);
                    ctaButtons.innerHTML = `
                        <a href="/menu" class="btn-cta">
                            <i class="fas fa-shopping-cart me-2"></i> Pesan Sekarang
                        </a>
                        <a href="pembeli.profile" class="btn-cta">
                            <i class="fas fa-shopping-cart me-2"></i> Lihat Profile
                        </a>
                    `;
                } catch (e) {
                    ctaButtons.innerHTML = `
                        <a href="/register" class="btn-cta">
                            <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                        </a>
                    `;
                }
            } else {
                ctaButtons.innerHTML = `
                    <a href="/register" class="btn-cta">
                        <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                    </a>
                    <a href="/login" class="btn-cta" style="margin-left: 15px; background: transparent; border: 2px solid white;">
                        <i class="fas fa-sign-in-alt me-2"></i> Login
                    </a>
                `;
            }
        }

        // For testing purposes - simulate login
        function simulateLogin(userType = 'siswa') {
            const users = {
                siswa: {
                    id: 1,
                    name: "Ahmad Fauzi",
                    email: "ahmad.fauzi@smkn1-jkt.sch.id",
                    role: "Siswa",
                    class: "XII TKJ 2",
                    nis: "20210001",
                    phone: "081234567890"
                },
                guru: {
                    id: 2,
                    name: "Budi Santoso, S.Pd",
                    email: "budi.santoso@smkn1-jkt.sch.id",
                    role: "Guru",
                    subject: "Matematika",
                    nip: "19801234567890",
                    phone: "081298765432"
                },
                admin: {
                    id: 3,
                    name: "Admin Kantin",
                    email: "admin@kantinsehat.sch.id",
                    role: "Admin Kantin",
                    position: "Pengelola",
                    phone: "081311223344"
                }
            };

            const user = users[userType];
            localStorage.setItem('kantinSehatUser', JSON.stringify(user));

            // Reload page to update UI
            setTimeout(() => {
                window.location.reload();
            }, 100);
        }

        // For testing purposes - simulate adding sample items to cart
        function addSampleItemsToCart() {
            const items = [{
                    id: 1,
                    name: "Salad Sehat Super",
                    price: 25000,
                    image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                    quantity: 2
                },
                {
                    id: 2,
                    name: "Jus Detox Mix",
                    price: 18000,
                    image: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                    quantity: 1
                }
            ];

            localStorage.setItem('kantinSehatCart', JSON.stringify(items));
            updateCartBadge();

            Swal.fire({
                title: 'Sample Items Added!',
                text: '2 sample items telah ditambahkan ke keranjang',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }

        // Clear cart for testing
        function clearCart() {
            localStorage.removeItem('kantinSehatCart');
            updateCartBadge();

            Swal.fire({
                title: 'Keranjang Dikosongkan!',
                text: 'Semua item telah dihapus dari keranjang',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }

        // Demo functions - remove in production
        console.log('Demo functions available:');
        console.log('1. simulateLogin("siswa") - Login sebagai siswa');
        console.log('2. simulateLogin("guru") - Login sebagai guru');
        console.log('3. simulateLogin("admin") - Login sebagai admin');
        console.log('4. addSampleItemsToCart() - Tambah sample items ke keranjang');
        console.log('5. clearCart() - Kosongkan keranjang');
        console.log('6. logout() - Logout dari sistem');