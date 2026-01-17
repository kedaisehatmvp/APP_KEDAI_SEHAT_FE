 // Menu data dengan gambar yang diperbaiki
        const menuItems = [
            {
                id: 1,
                name: "Salad Sehat Super",
                category: ["makanan", "vegetarian", "low-calorie"],
                description: "Campuran sayuran organik segar dengan dressing khusus rendah kalori.",
                price: 25000,
                oldPrice: 30000,
                image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.8,
                calories: 180,
                featured: true,
                badge: "HOT"
            },
            {
                id: 2,
                name: "Jus Detox Mix",
                category: ["minuman", "vegetarian"],
                description: "Campuran buah-buahan organik tanpa gula tambahan, kaya vitamin.",
                price: 18000,
                image: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 5.0,
                calories: 120,
                featured: false,
                badge: "NEW"
            },
            {
                id: 3,
                name: "Nasi Goreng Sehat",
                category: ["makanan"],
                description: "Nasi merah dengan sayuran organik dan protein rendah lemak.",
                price: 28000,
                image: "https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.5,
                calories: 320,
                featured: true
            },
            {
                id: 4,
                name: "Smoothie Bowl Berry",
                category: ["makanan", "vegetarian", "low-calorie"],
                description: "Smoothie buah berry dengan topping granola dan buah segar.",
                price: 22000,
                image: "https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.7,
                calories: 210,
                featured: false
            },
            {
                id: 5,
                name: "Sandwich Ayam Sehat",
                category: ["makanan"],
                description: "Roti gandum dengan ayam panggang dan sayuran segar.",
                price: 20000,
                oldPrice: 25000,
                image: "https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.2,
                calories: 280,
                featured: false
            },
            {
                id: 6,
                name: "Teh Hijau Organik",
                category: ["minuman", "vegetarian", "low-calorie"],
                description: "Teh hijau premium tanpa gula, kaya antioksidan.",
                price: 12000,
                image: "https://images.unsplash.com/photo-1594631252845-29fc4cc8cde9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.9,
                calories: 5,
                featured: false,
                badge: "NEW"
            },
            {
                id: 7,
                name: "Paket Diet Sehat",
                category: ["paket", "vegetarian", "low-calorie"],
                description: "Paket lengkap untuk diet sehat selama 1 hari.",
                price: 75000,
                oldPrice: 90000,
                image: "https://images.unsplash.com/photo-1490818387583-1baba5e638af?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.9,
                calories: 450,
                featured: true,
                badge: "HOT"
            },
            {
                id: 8,
                name: "Yogurt Parfait",
                category: ["cemilan", "vegetarian", "low-calorie"],
                description: "Yogurt rendah lemak dengan buah segar dan granola.",
                price: 18000,
                image: "https://images.unsplash.com/photo-1488477181946-6428a0291777?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.6,
                calories: 160,
                featured: false
            },
            {
                id: 9,
                name: "Air Lemon Detox",
                category: ["minuman", "vegetarian", "low-calorie"],
                description: "Air lemon hangat untuk detox tubuh di pagi hari.",
                price: 8000,
                image: "https://images.unsplash.com/photo-1546171753-97d7676e4602?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.4,
                calories: 10,
                featured: false
            },
            {
                id: 10,
                name: "Oatmeal Pisang",
                category: ["makanan", "vegetarian"],
                description: "Oatmeal dengan potongan pisang dan madu organik.",
                price: 15000,
                image: "https://images.unsplash.com/photo-1610399214658-f8c4d66c8d0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.3,
                calories: 190,
                featured: false
            },
            {
                id: 11,
                name: "Cemilan Edamame",
                category: ["cemilan", "vegetarian", "low-calorie"],
                description: "Edamame rebus dengan sedikit garam laut.",
                price: 12000,
                image: "https://images.unsplash.com/photo-1578102487201-3c27b5e7f74c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.7,
                calories: 140,
                featured: false
            },
            {
                id: 12,
                name: "Paket Sehat 7 Hari",
                category: ["paket", "vegetarian"],
                description: "Paket menu sehat lengkap untuk 7 hari.",
                price: 350000,
                oldPrice: 420000,
                image: "https://images.unsplash.com/photo-1506084868230-bb9d95c24759?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                rating: 4.8,
                calories: 450,
                featured: true,
                badge: "HOT"
            }
        ];

        // Cart data
        let cart = JSON.parse(localStorage.getItem('kantinSehatCart')) || [];
        let userData = null;
        
        // DOM elements
        const menuGrid = document.getElementById('menuGrid');
        const categoryButtons = document.querySelectorAll('.category-btn');
        const searchInput = document.getElementById('searchMenu');
        const cartSidebar = document.getElementById('cartSidebar');
        const overlay = document.getElementById('overlay');
        const cartToggle = document.getElementById('cartToggle');
        const mobileCartToggle = document.getElementById('mobileCartToggle');
        const bottomBarCartToggle = document.getElementById('bottomBarCartToggle');
        const cartClose = document.getElementById('cartClose');
        const cartBody = document.getElementById('cartBody');
        const cartCount = document.getElementById('cartCount');
        const mobileCartCount = document.getElementById('mobileCartCount');
        const bottomBarCartCount = document.getElementById('bottomBarCartCount');
        const cartTotal = document.getElementById('cartTotal');
        const profileDropdown = document.getElementById('profileDropdown');
        const mobileProfileDropdown = document.getElementById('mobileProfileDropdown');
        const loginButton = document.getElementById('loginButton');
        const mobileLoginButton = document.getElementById('mobileLoginButton');
        const bottomBarItems = document.querySelectorAll('.bottom-bar-item');

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            checkLoginStatus();
            renderMenu('all');
            updateCart();
            
            // Set current year in footer
            const yearElement = document.querySelector('.copyright p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
            }
            
            // Handle bottom bar active state
            handleBottomBarActiveState();
        });

        // Check login status
        function checkLoginStatus() {
            const user = localStorage.getItem('kantinSehatUser');
            
            if (user) {
                try {
                    userData = JSON.parse(user);
                    
                    // Show profile dropdown, hide login button
                    profileDropdown.classList.remove('d-none');
                    profileDropdown.classList.add('d-block');
                    loginButton.classList.remove('d-block');
                    loginButton.classList.add('d-none');
                    
                    mobileProfileDropdown.classList.remove('d-none');
                    mobileProfileDropdown.classList.add('d-block');
                    mobileLoginButton.classList.remove('d-block');
                    mobileLoginButton.classList.add('d-none');
                    
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
                
                mobileProfileDropdown.classList.remove('d-block');
                mobileProfileDropdown.classList.add('d-none');
                mobileLoginButton.classList.remove('d-none');
                mobileLoginButton.classList.add('d-block');
            }
        }

        // Update user information in dropdown
        function updateUserInfo() {
            if (!userData) return;
            
            const navbarName = document.getElementById('navbarName');
            const navbarRole = document.getElementById('navbarRole');
            const navbarAvatar = document.getElementById('navbarAvatar');
            const mobileNavbarAvatar = document.getElementById('mobileNavbarAvatar');
            
            if (navbarName && userData.nama_lengkap) {
                navbarName.textContent = userData.nama_lengkap;
            }
            
            if (navbarRole && userData.role) {
                navbarRole.textContent = getRoleDisplay(userData.role);
            }
            
            if (navbarAvatar) {
                if (userData.foto) {
                    navbarAvatar.src = userData.foto;
                    if (mobileNavbarAvatar) mobileNavbarAvatar.src = userData.foto;
                } else if (userData.nama_lengkap) {
                    const avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.nama_lengkap)}&background=001a12&color=fff&size=40`;
                    navbarAvatar.src = avatarUrl;
                    if (mobileNavbarAvatar) mobileNavbarAvatar.src = avatarUrl;
                }
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

        // Handle bottom bar active state
        function handleBottomBarActiveState() {
            const currentPath = window.location.pathname;
            
            bottomBarItems.forEach(item => {
                item.classList.remove('active');
                
                if (currentPath === '/' && item.getAttribute('href') === '/') {
                    item.classList.add('active');
                } else if (currentPath.includes('/menu') && item.getAttribute('href') === '/menu') {
                    item.classList.add('active');
                } else if (currentPath.includes('#promo') && item.getAttribute('href') === '#promo') {
                    item.classList.add('active');
                }
            });
        }

        // Render menu items
        function renderMenu(category) {
            menuGrid.innerHTML = '';
            
            const filteredItems = category === 'all' 
                ? menuItems 
                : menuItems.filter(item => item.category.includes(category));
            
            filteredItems.forEach(item => {
                const menuItem = document.createElement('div');
                menuItem.className = `menu-item ${item.featured ? 'featured' : ''}`;
                
                let badgeHtml = '';
                if (item.badge) {
                    const badgeClass = item.badge === 'HOT' ? 'hot' : 'new';
                    badgeHtml = `<span class="menu-badge ${badgeClass}">${item.badge}</span>`;
                }
                
                let oldPriceHtml = '';
                if (item.oldPrice) {
                    oldPriceHtml = `<span class="menu-old-price">Rp ${item.oldPrice.toLocaleString('id-ID')}</span>`;
                }
                
                const ratingStars = getStarRating(item.rating);
                
                menuItem.innerHTML = `
                    ${badgeHtml}
                    <img src="${item.image}" alt="${item.name}" class="menu-img">
                    <div class="menu-content">
                        <span class="menu-category">${getCategoryLabel(item.category[0])}</span>
                        <h3 class="menu-title">${item.name}</h3>
                        <div class="menu-rating">
                            ${ratingStars}
                            <span>${item.rating}</span>
                        </div>
                        <p class="menu-description">${item.description}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="menu-price">Rp ${item.price.toLocaleString('id-ID')}</span>
                                ${oldPriceHtml}
                            </div>
                            <div class="menu-calories">
                                <i class="fas fa-fire"></i>
                                <span>${item.calories} kalori</span>
                            </div>
                        </div>
                        <div class="menu-actions">
                            <button class="btn-add-to-cart" onclick="addToCart(${item.id})">
                                <i class="fas fa-cart-plus"></i> Tambah
                            </button>
                            <button class="btn-detail" onclick="showDetail(${item.id})">
                                <i class="fas fa-info-circle"></i> Detail
                            </button>
                        </div>
                    </div>
                `;
                
                menuGrid.appendChild(menuItem);
            });
        }

        // Get star rating HTML
        function getStarRating(rating) {
            let stars = '';
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 >= 0.5;
            
            for (let i = 1; i <= 5; i++) {
                if (i <= fullStars) {
                    stars += '<i class="fas fa-star"></i>';
                } else if (i === fullStars + 1 && hasHalfStar) {
                    stars += '<i class="fas fa-star-half-alt"></i>';
                } else {
                    stars += '<i class="far fa-star"></i>';
                }
            }
            return stars;
        }

        // Get category label
        function getCategoryLabel(category) {
            const labels = {
                'makanan': 'Makanan',
                'minuman': 'Minuman',
                'cemilan': 'Cemilan',
                'paket': 'Paket',
                'vegetarian': 'Vegetarian',
                'low-calorie': 'Low Calorie'
            };
            return labels[category] || category;
        }

        // Category filter
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                const category = this.getAttribute('data-category');
                renderMenu(category);
            });
        });

        // Search functionality
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const filteredItems = menuItems.filter(item => 
                item.name.toLowerCase().includes(searchTerm) ||
                item.description.toLowerCase().includes(searchTerm)
            );
            
            menuGrid.innerHTML = '';
            filteredItems.forEach(item => {
                const menuItem = document.createElement('div');
                menuItem.className = `menu-item ${item.featured ? 'featured' : ''}`;
                
                let badgeHtml = '';
                if (item.badge) {
                    const badgeClass = item.badge === 'HOT' ? 'hot' : 'new';
                    badgeHtml = `<span class="menu-badge ${badgeClass}">${item.badge}</span>`;
                }
                
                let oldPriceHtml = '';
                if (item.oldPrice) {
                    oldPriceHtml = `<span class="menu-old-price">Rp ${item.oldPrice.toLocaleString('id-ID')}</span>`;
                }
                
                const ratingStars = getStarRating(item.rating);
                
                menuItem.innerHTML = `
                    ${badgeHtml}
                    <img src="${item.image}" alt="${item.name}" class="menu-img">
                    <div class="menu-content">
                        <span class="menu-category">${getCategoryLabel(item.category[0])}</span>
                        <h3 class="menu-title">${item.name}</h3>
                        <div class="menu-rating">
                            ${ratingStars}
                            <span>${item.rating}</span>
                        </div>
                        <p class="menu-description">${item.description}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="menu-price">Rp ${item.price.toLocaleString('id-ID')}</span>
                                ${oldPriceHtml}
                            </div>
                            <div class="menu-calories">
                                <i class="fas fa-fire"></i>
                                <span>${item.calories} kalori</span>
                            </div>
                        </div>
                        <div class="menu-actions">
                            <button class="btn-add-to-cart" onclick="addToCart(${item.id})">
                                <i class="fas fa-cart-plus"></i> Tambah
                            </button>
                            <button class="btn-detail" onclick="showDetail(${item.id})">
                                <i class="fas fa-info-circle"></i> Detail
                            </button>
                        </div>
                    </div>
                `;
                
                menuGrid.appendChild(menuItem);
            });
        });

        // Add to cart function
        window.addToCart = function(itemId) {
            // Check if user is logged in
            if (!userData) {
                Swal.fire({
                    title: 'Login Diperlukan',
                    text: 'Anda harus login untuk menambahkan item ke keranjang',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Nanti'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/login';
                    }
                });
                return;
            }
            
            const item = menuItems.find(i => i.id === itemId);
            const existingItem = cart.find(i => i.id === itemId);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: item.id,
                    name: item.name,
                    price: item.price,
                    image: item.image,
                    quantity: 1
                });
            }
            
            updateCart();
            showNotification('success', `${item.name} ditambahkan ke keranjang`);
        }

        // Remove from cart
        window.removeFromCart = function(itemId) {
            cart = cart.filter(item => item.id !== itemId);
            updateCart();
            showNotification('info', 'Item dihapus dari keranjang');
        }

        // Update quantity
        window.updateQuantity = function(itemId, change) {
            const item = cart.find(i => i.id === itemId);
            if (item) {
                item.quantity += change;
                if (item.quantity < 1) {
                    removeFromCart(itemId);
                    return;
                }
                updateCart();
            }
        }

        // Update cart display
        function updateCart() {
            // Save to localStorage
            localStorage.setItem('kantinSehatCart', JSON.stringify(cart));
            
            // Update cart count
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
            mobileCartCount.textContent = totalItems;
            bottomBarCartCount.textContent = totalItems;
            
            // Update cart sidebar
            if (cart.length === 0) {
                cartBody.innerHTML = `
                    <div class="cart-empty">
                        <i class="fas fa-shopping-cart"></i>
                        <h5>Keranjang Kosong</h5>
                        <p>Tambahkan menu favorit Anda ke keranjang</p>
                    </div>
                `;
                cartTotal.textContent = 'Rp 0';
            } else {
                let cartHtml = '';
                let total = 0;
                
                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    
                    cartHtml += `
                        <div class="cart-item">
                            <img src="${item.image}" alt="${item.name}" class="cart-item-img">
                            <div class="cart-item-details">
                                <h6 class="cart-item-title">${item.name}</h6>
                                <div class="cart-item-price">Rp ${item.price.toLocaleString('id-ID')}</div>
                            </div>
                            <div class="cart-item-actions">
                                <div class="quantity-control">
                                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                                    <span class="quantity">${item.quantity}</span>
                                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
                                </div>
                                <button class="remove-item" onclick="removeFromCart(${item.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                });
                
                cartBody.innerHTML = cartHtml;
                cartTotal.textContent = `Rp ${total.toLocaleString('id-ID')}`;
            }
        }

        // Show item detail
        window.showDetail = function(itemId) {
            const item = menuItems.find(i => i.id === itemId);
            
            Swal.fire({
                title: item.name,
                html: `
                    <div class="text-center mb-3">
                        <img src="${item.image}" alt="${item.name}" style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <p><strong>Deskripsi:</strong> ${item.description}</p>
                    <p><strong>Kategori:</strong> ${item.category.map(c => getCategoryLabel(c)).join(', ')}</p>
                    <p><strong>Rating:</strong> ${item.rating} ⭐</p>
                    <p><strong>Kalori:</strong> ${item.calories} kalori</p>
                    <p><strong>Harga:</strong> Rp ${item.price.toLocaleString('id-ID')}</p>
                    ${item.oldPrice ? `<p><strong>Harga Lama:</strong> <del>Rp ${item.oldPrice.toLocaleString('id-ID')}</del></p>` : ''}
                `,
                showCancelButton: true,
                confirmButtonText: 'Tambah ke Keranjang',
                cancelButtonText: 'Tutup',
                confirmButtonColor: '#001a12',
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    addToCart(itemId);
                }
            });
        }

        // Go to checkout
        window.goToCheckout = function() {
            if (!userData) {
                Swal.fire({
                    title: 'Login Diperlukan',
                    text: 'Anda harus login untuk melakukan checkout',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Nanti'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/login';
                    }
                });
                return;
            }
            
            if (cart.length === 0) {
                Swal.fire({
                    title: 'Keranjang Kosong',
                    text: 'Tambahkan item terlebih dahulu sebelum checkout',
                    icon: 'warning'
                });
                return;
            }
            
            // Save cart data for checkout page
            localStorage.setItem('kantinSehatCheckout', JSON.stringify(cart));
            window.location.href = '/payment';
        }

        // Show notification
        function showNotification(type, message) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });
        }

        // Cart toggle functions
        cartToggle.addEventListener('click', toggleCart);
        
        mobileCartToggle.addEventListener('click', function(e) {
            e.preventDefault();
            toggleCart();
        });
        
        bottomBarCartToggle.addEventListener('click', function(e) {
            e.preventDefault();
            toggleCart();
        });

        cartClose.addEventListener('click', closeCart);

        overlay.addEventListener('click', closeCart);

        function toggleCart() {
            cartSidebar.classList.add('active');
            overlay.classList.add('active');
        }

        function closeCart() {
            cartSidebar.classList.remove('active');
            overlay.classList.remove('active');
        }

        // Close cart with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCart();
            }
        });

        // Logout function
        window.logout = function() {
            Swal.fire({
                title: 'Logout?',
                text: 'Anda yakin ingin keluar dari akun ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#001a12',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Clear user data from localStorage
                    localStorage.removeItem('kantinSehatUser');
                    
                    // Clear cart data (optional)
                    // localStorage.removeItem('kantinSehatCart');
                    
                    // Update UI
                    checkLoginStatus();
                    
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

        // Demo function for testing
        window.simulateLogin = function(role = 'siswa') {
            const users = {
                siswa: {
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
                },
                guru: {
                    id_user: 2,
                    username: 'guru001',
                    password: 'hashedpassword',
                    nama_lengkap: 'Ibu Guru, S.Pd',
                    role: 'guru',
                    foto: null,
                    email: 'guru@smkn1.sch.id',
                    no_telepon: '81234567891',
                    id_siswa: null,
                    last_login: new Date().toISOString(),
                    created_at: new Date('2024-01-01').toISOString(),
                    updated_at: new Date().toISOString()
                },
                admin: {
                    id_user: 3,
                    username: 'admin001',
                    password: 'hashedpassword',
                    nama_lengkap: 'Admin Kantin',
                    role: 'admin',
                    foto: null,
                    email: 'admin@kantinsehat.sch.id',
                    no_telepon: '81234567892',
                    id_siswa: null,
                    last_login: new Date().toISOString(),
                    created_at: new Date('2024-01-01').toISOString(),
                    updated_at: new Date().toISOString()
                }
            };
            
            localStorage.setItem('kantinSehatUser', JSON.stringify(users[role]));
            alert(`Login sebagai ${role} berhasil!`);
            location.reload();
        };