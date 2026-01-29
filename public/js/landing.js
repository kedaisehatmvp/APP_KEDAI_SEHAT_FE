// User data management
let isLoggedIn = false;
let userData = null;

// Nutrition data for each menu item
const nutritionData = {
    "Salad Sehat Super": {
        calories: 120,
        protein: 5,
        carbs: 15,
        fat: 8,
        fiber: 4,
        vitaminA: "45%",
        vitaminC: "90%",
        iron: "15%",
        description: "Salad sehat dengan campuran sayuran organik segar seperti lettuce, tomat cherry, mentimun, wortel, dan alpukat. Dilengkapi dengan dressing yogurt rendah lemak.",
        benefits: [
            "Kaya serat untuk pencernaan sehat",
            "Vitamin C untuk imunitas tubuh",
            "Antioksidan untuk kesehatan kulit",
            "Rendah kalori untuk diet",
            "Lemak sehat dari alpukat"
        ]
    },
    "Jus Detox Mix": {
        calories: 85,
        protein: 2,
        carbs: 20,
        fat: 1,
        fiber: 3,
        vitaminA: "30%",
        vitaminC: "120%",
        iron: "8%",
        description: "Jus detoksifikasi dari campuran buah-buahan organik: apel hijau, lemon, jahe, dan mint. Tanpa tambahan gula, 100% alami.",
        benefits: [
            "Detoksifikasi alami tubuh",
            "Meningkatkan metabolisme",
            "Kaya antioksidan",
            "Menjaga hidrasi tubuh",
            "Membantu pencernaan"
        ]
    },
    "Nasi Goreng Sehat": {
        calories: 280,
        protein: 12,
        carbs: 45,
        fat: 10,
        fiber: 6,
        vitaminA: "25%",
        vitaminC: "40%",
        iron: "20%",
        description: "Nasi merah goreng dengan sayuran organik (wortel, buncis, jagung), telur omega-3, dan ayam panggang tanpa kulit. Dibumbui dengan rempah alami.",
        benefits: [
            "Nasi merah kaya serat",
            "Protein tinggi untuk energi",
            "Rendah lemak jenuh",
            "Mengandung omega-3",
            "Vitamin B kompleks"
        ]
    },
    "Paket Makan Siang": {
        calories: 350,
        protein: 18,
        carbs: 50,
        fat: 12,
        fiber: 8,
        vitaminA: "35%",
        vitaminC: "60%",
        iron: "25%",
        description: "Paket lengkap makan siang terdiri dari nasi merah, ayam panggang, sayuran kukus, tahu/tempe, buah potong, dan minuman sehat pilihan.",
        benefits: [
            "Gizi seimbang lengkap",
            "Energi tahan lama",
            "Protein tinggi untuk otot",
            "Vitamin dan mineral lengkap",
            "Cocok untuk aktivitas padat"
        ]
    },
    "Sup Ayam Jamur": {
        calories: 150,
        protein: 10,
        carbs: 18,
        fat: 5,
        fiber: 4,
        vitaminA: "20%",
        vitaminC: "35%",
        iron: "12%",
        description: "Sup hangat dengan kaldu ayam rendah lemak, jamur shitake, wortel, daun bawang, dan rempah-rempah alami. Disajikan dengan potongan ayam tanpa kulit.",
        benefits: [
            "Meningkatkan imunitas",
            "Rendah kalori",
            "Sumber protein baik",
            "Hangat dan menyehatkan",
            "Membantu pemulihan"
        ]
    },
    "Pizza Sehat": {
        calories: 320,
        protein: 14,
        carbs: 48,
        fat: 9,
        fiber: 7,
        vitaminA: "40%",
        vitaminC: "55%",
        iron: "18%",
        description: "Pizza dengan crust gandum utuh, saus tomat organik, keju mozzarella rendah lemak, dan topping sayuran segar (paprika, jamur, zucchini, tomat).",
        benefits: [
            "Gandum utuh untuk serat",
            "Sayuran kaya vitamin",
            "Kalsium dari keju",
            "Rendah lemak jenuh",
            "Antioksidan dari tomat"
        ]
    },
    "Smoothie Berry": {
        calories: 95,
        protein: 3,
        carbs: 22,
        fat: 2,
        fiber: 5,
        vitaminA: "15%",
        vitaminC: "85%",
        iron: "10%",
        description: "Smoothie creamy dari campuran berry organik (strawberry, blueberry, raspberry) dengan yogurt Yunani rendah lemak dan sedikit madu asli.",
        benefits: [
            "Antioksidan tinggi",
            "Probiotik dari yogurt",
            "Baik untuk pencernaan",
            "Kesehatan jantung",
            "Kulit sehat dan cerah"
        ]
    },
    "Burger Sehat": {
        calories: 280,
        protein: 16,
        carbs: 35,
        fat: 8,
        fiber: 6,
        vitaminA: "30%",
        vitaminC: "45%",
        iron: "22%",
        description: "Burger dengan patty sayuran dan lentil, roti gandum utuh, lettuce, tomat, bawang bombay, dan saus yogurt rendah lemak. Disajikan dengan salad kecil.",
        benefits: [
            "Protein nabati tinggi",
            "Serat dari gandum utuh",
            "Rendah lemak jenuh",
            "Kaya zat besi",
            "Cocok untuk vegetarian"
        ]
    }
};

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
    
    // Initialize promo menu scrolling
    initPromoMenuScroll();
    
    // Setup promo badges with different colors
    setupPromoBadges();
    
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
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
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
    }
    
    // Set current year in footer
    const yearElement = document.querySelector('.copyright p');
    if (yearElement) {
        const currentYear = new Date().getFullYear();
        yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
    }
    
    // Update CTA buttons based on login status
    updateCTAButtons();
});

// Setup promo badges with different colors
function setupPromoBadges() {
    const promoBadges = document.querySelectorAll('.promo-badge');
    const badgeTypes = ['30', 'b1g1', '25', 'spesial', '20', 'new', '15', 'limited'];
    
    promoBadges.forEach((badge, index) => {
        const type = badgeTypes[index % badgeTypes.length];
        badge.setAttribute('data-type', type);
        
        // Set text based on type
        switch(type) {
            case '30':
                badge.textContent = '30% OFF';
                break;
            case 'b1g1':
                badge.textContent = 'BUY 1 GET 1';
                break;
            case '25':
                badge.textContent = '25% OFF';
                break;
            case '20':
                badge.textContent = '20% OFF';
                break;
            case 'new':
                badge.textContent = 'NEW';
                break;
            case '15':
                badge.textContent = '15% OFF';
                break;
            case 'limited':
                badge.textContent = 'LIMITED';
                break;
            case 'spesial':
                badge.textContent = 'SPESIAL';
                break;
        }
    });
}

// Initialize promo menu scrolling with auto-scroll
function initPromoMenuScroll() {
    const scrollContainer = document.getElementById('promoMenuScroll');
    const scrollLeftBtn = document.getElementById('scrollLeft');
    const scrollRightBtn = document.getElementById('scrollRight');
    
    if (!scrollContainer) return;
    
    let isDown = false;
    let startX;
    let scrollLeft;
    let autoScrollInterval;
    
    // Mouse drag scroll
    scrollContainer.addEventListener('mousedown', (e) => {
        isDown = true;
        scrollContainer.style.cursor = 'grabbing';
        startX = e.pageX - scrollContainer.offsetLeft;
        scrollLeft = scrollContainer.scrollLeft;
        
        // Stop auto scroll when user interacts
        stopAutoScroll();
    });
    
    scrollContainer.addEventListener('mouseleave', () => {
        isDown = false;
        scrollContainer.style.cursor = 'grab';
    });
    
    scrollContainer.addEventListener('mouseup', () => {
        isDown = false;
        scrollContainer.style.cursor = 'grab';
        
        // Restart auto scroll after user interaction
        setTimeout(startAutoScroll, 3000);
    });
    
    scrollContainer.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - scrollContainer.offsetLeft;
        const walk = (x - startX) * 2;
        scrollContainer.scrollLeft = scrollLeft - walk;
    });
    
    // Touch drag for mobile
    scrollContainer.addEventListener('touchstart', (e) => {
        isDown = true;
        startX = e.touches[0].pageX - scrollContainer.offsetLeft;
        scrollLeft = scrollContainer.scrollLeft;
        stopAutoScroll();
    });
    
    scrollContainer.addEventListener('touchend', () => {
        isDown = false;
        setTimeout(startAutoScroll, 3000);
    });
    
    scrollContainer.addEventListener('touchmove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.touches[0].pageX - scrollContainer.offsetLeft;
        const walk = (x - startX) * 2;
        scrollContainer.scrollLeft = scrollLeft - walk;
    });
    
    // Button scroll
    if (scrollLeftBtn) {
        scrollLeftBtn.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
            stopAutoScroll();
            setTimeout(startAutoScroll, 5000);
        });
    }
    
    if (scrollRightBtn) {
        scrollRightBtn.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
            stopAutoScroll();
            setTimeout(startAutoScroll, 5000);
        });
    }
    
    // Auto scroll function
    function startAutoScroll() {
        // Only auto-scroll if not hovering
        if (scrollContainer.matches(':hover')) return;
        
        stopAutoScroll();
        
        autoScrollInterval = setInterval(() => {
            // Check if at the end
            const isAtEnd = scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth - 10;
            
            if (isAtEnd) {
                // Smooth scroll back to start
                scrollContainer.scrollTo({
                    left: 0,
                    behavior: 'smooth'
                });
                
                // Wait for scroll to complete before continuing auto-scroll
                setTimeout(() => {
                    if (autoScrollInterval) {
                        // Continue auto-scrolling after reset
                        autoScrollInterval = setInterval(() => {
                            scrollContainer.scrollBy({
                                left: 1,
                                behavior: 'auto'
                            });
                        }, 30);
                    }
                }, 1000);
                
                // Stop current interval
                clearInterval(autoScrollInterval);
                autoScrollInterval = null;
            } else {
                // Scroll right
                scrollContainer.scrollBy({
                    left: 1,
                    behavior: 'auto'
                });
            }
        }, 30); // Slow auto-scroll (30ms = ~33fps)
    }
    
    function stopAutoScroll() {
        if (autoScrollInterval) {
            clearInterval(autoScrollInterval);
            autoScrollInterval = null;
        }
    }
    
    // Start auto-scroll on load with delay
    setTimeout(startAutoScroll, 2000);
    
    // Stop auto-scroll on hover
    scrollContainer.addEventListener('mouseenter', stopAutoScroll);
    scrollContainer.addEventListener('mouseleave', () => {
        setTimeout(startAutoScroll, 1000);
    });
    
    // Stop auto-scroll on focus
    scrollContainer.addEventListener('focus', stopAutoScroll);
    scrollContainer.addEventListener('blur', () => {
        setTimeout(startAutoScroll, 1000);
    });
    
    // Handle window resize
    window.addEventListener('resize', () => {
        stopAutoScroll();
        setTimeout(startAutoScroll, 1000);
    });
}

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
        const menuCard = button.closest('.best-seller-card') || button.closest('.promo-menu-card');
        let menuTitle, menuPrice, menuImage;
        
        if (button.closest('.best-seller-card')) {
            menuTitle = menuCard.querySelector('.best-seller-title').textContent;
            menuPrice = menuCard.querySelector('.best-seller-price').textContent;
            menuImage = menuCard.querySelector('.best-seller-img').src;
        } else if (button.closest('.promo-menu-card')) {
            menuTitle = menuCard.querySelector('h4').textContent;
            menuPrice = menuCard.querySelector('.new-price').textContent;
            menuImage = menuCard.querySelector('.promo-menu-image').style.backgroundImage
                .replace('url("', '').replace('")', '');
        }
        
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
    
    // Show nutrition info modal
    window.showNutritionInfo = function(button) {
        const menuCard = button.closest('.promo-menu-card');
        const menuTitle = menuCard.querySelector('h4').textContent;
        const menuPrice = menuCard.querySelector('.new-price').textContent;
        const menuImage = menuCard.querySelector('.promo-menu-image').style.backgroundImage
            .replace('url("', '').replace('")', '');
        
        // Get nutrition data
        const nutrition = nutritionData[menuTitle] || {
            calories: 0,
            protein: 0,
            carbs: 0,
            fat: 0,
            fiber: 0,
            vitaminA: "0%",
            vitaminC: "0%",
            iron: "0%",
            description: "Informasi gizi belum tersedia.",
            benefits: ["Data manfaat sedang diupdate"]
        };
        
        // Create modal HTML
        const modalHTML = `
            <div class="modal fade nutrition-modal" id="nutritionModal" tabindex="-1" aria-labelledby="nutritionModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="nutritionModalLabel">${menuTitle}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="nutrition-image">
                                <img src="${menuImage}" alt="${menuTitle}">
                            </div>
                            
                            <p class="nutrition-desc">${nutrition.description}</p>
                            
                            <div class="nutrition-section">
                                <h5>Informasi Gizi (per porsi)</h5>
                                <div class="nutrition-grid">
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">${nutrition.calories}</div>
                                        <div class="nutrition-label">Kalori</div>
                                    </div>
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">${nutrition.protein}g</div>
                                        <div class="nutrition-label">Protein</div>
                                    </div>
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">${nutrition.carbs}g</div>
                                        <div class="nutrition-label">Karbohidrat</div>
                                    </div>
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">${nutrition.fat}g</div>
                                        <div class="nutrition-label">Lemak</div>
                                    </div>
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">${nutrition.fiber}g</div>
                                        <div class="nutrition-label">Serat</div>
                                    </div>
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">${nutrition.vitaminA}</div>
                                        <div class="nutrition-label">Vitamin A</div>
                                    </div>
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">${nutrition.vitaminC}</div>
                                        <div class="nutrition-label">Vitamin C</div>
                                    </div>
                                    <div class="nutrition-item">
                                        <div class="nutrition-value">${nutrition.iron}</div>
                                        <div class="nutrition-label">Zat Besi</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="nutrition-benefits">
                                <h6>Manfaat Kesehatan</h6>
                                <ul class="benefits-list">
                                    ${nutrition.benefits.map(benefit => `<li>${benefit}</li>`).join('')}
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <h4 class="text-primary me-auto mb-0">${menuPrice}</h4>
                            <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Tutup
                            </button>
                            <button type="button" class="btn btn-add-cart" onclick="addToCartFromModal('${menuTitle}', '${menuPrice}', '${menuImage}')">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Remove existing modal if any
        const existingModal = document.getElementById('nutritionModal');
        if (existingModal) {
            existingModal.remove();
        }
        
        // Add modal to body
        document.body.insertAdjacentHTML('beforeend', modalHTML);
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('nutritionModal'));
        modal.show();
    };
    
    // Add click event to promo menu buttons
    document.querySelectorAll('.btn-promo').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const menuCard = this.closest('.promo-menu-card');
            const menuTitle = menuCard.querySelector('h4').textContent;
            const menuPrice = menuCard.querySelector('.new-price').textContent;
            const menuImage = menuCard.querySelector('.promo-menu-image').style.backgroundImage
                .replace('url("', '').replace('")', '');
            
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
            }).then(() => {
                // Redirect to menu page
                window.location.href = '/menu';
            });
        });
    });
}

// Add item to cart from modal
window.addToCartFromModal = function(menuTitle, menuPrice, menuImage) {
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
    
    // Close modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('nutritionModal'));
    modal.hide();
    
    Swal.fire({
        title: 'Berhasil!',
        text: `${menuTitle} telah ditambahkan ke keranjang`,
        icon: 'success',
        timer: 2000,
        showConfirmButton: false
    });
};

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
        cartBadge.classList.toggle('d-none', totalItems === 0);
        cartBadge.classList.toggle('d-inline-block', totalItems > 0);
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
                <a href="/order-history" class="btn-cta">
                    <i class="fas fa-history me-2"></i> Riwayat Pesanan
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
            <a href="/login" class="btn-cta">
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