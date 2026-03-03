// Cart data
let cart = JSON.parse(localStorage.getItem('kantinSehatCart')) || [];
let userData = null;
let frequentMenus = JSON.parse(localStorage.getItem('kantinSehatFrequentMenus')) || [];

// DOM elements
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
const cartSubtotal = document.getElementById('cartSubtotal');
const profileDropdown = document.getElementById('profileDropdown');
const mobileProfileDropdown = document.getElementById('mobileProfileDropdown');
const loginButton = document.getElementById('loginButton');
const mobileLoginButton = document.getElementById('mobileLoginButton');
const bottomBarItems = document.querySelectorAll('.bottom-bar-item');

// Category filter elements
const categoryButtons = document.querySelectorAll('.category-btn');
const searchInput = document.getElementById('searchMenu');
const searchBtn = document.querySelector('.search-btn');
const sortSelect = document.getElementById('sortMenu');
const menuGrid = document.getElementById('menuGrid');
const menuItems = document.querySelectorAll('.menu-item');

// Frequent menu elements
const frequentBadge = document.getElementById('frequentBadge');
const mobileFrequentBadge = document.getElementById('mobileFrequentBadge');
const frequentMenuBody = document.getElementById('frequentMenuBody');
const mobileFrequentMenuBody = document.getElementById('mobileFrequentMenuBody');

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    checkLoginStatus();
    updateCart();
    updateFrequentBadge();
    
    // Render frequent menus in dropdowns
    renderFrequentMenuDropdown();
    
    // Set current year in footer
    const yearElement = document.querySelector('.copyright p');
    if (yearElement) {
        const currentYear = new Date().getFullYear();
        yearElement.innerHTML = `&copy; ${currentYear} Kantin Sehat. Semua hak dilindungi.`;
    }
    
    // Handle bottom bar active state
    handleBottomBarActiveState();
    
    // Initialize Bootstrap dropdown events
    initDropdownEvents();
    
    // Setup category filter
    setupCategoryFilter();
    
    // Setup search
    setupSearch();
    
    // Setup sort
    setupSort();
});

// Setup category filter
function setupCategoryFilter() {
    categoryButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Update active state
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Get category
            const category = this.getAttribute('data-category');
            
            // Filter menu items
            filterMenuItems(category);
        });
    });
}

// Setup search
function setupSearch() {
    if (searchBtn) {
        searchBtn.addEventListener('click', function() {
            performSearch();
        });
    }
    
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    }
}

// Setup sort
function setupSort() {
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            sortMenuItems(this.value);
        });
    }
}

// Perform search
function performSearch() {
    const searchTerm = searchInput.value.trim().toLowerCase();
    
    menuItems.forEach(item => {
        const title = item.querySelector('.menu-title')?.textContent.toLowerCase() || '';
        const description = item.querySelector('.menu-description')?.textContent.toLowerCase() || '';
        
        if (title.includes(searchTerm) || description.includes(searchTerm) || searchTerm === '') {
            item.style.display = 'flex';
        } else {
            item.style.display = 'none';
        }
    });
    
    // Check if any items are visible
    const visibleItems = Array.from(menuItems).filter(item => item.style.display !== 'none');
    const noResults = document.getElementById('noResultsMessage');
    
    if (visibleItems.length === 0) {
        if (!noResults) {
            const message = document.createElement('div');
            message.id = 'noResultsMessage';
            message.className = 'col-12 text-center py-5';
            message.innerHTML = `
                <i class="fas fa-search fa-3x mb-3" style="color: #ddd;"></i>
                <h4>Menu tidak ditemukan</h4>
                <p class="text-muted">Coba kata kunci lain atau lihat semua menu</p>
            `;
            menuGrid.parentNode.insertBefore(message, menuGrid.nextSibling);
        }
    } else {
        if (noResults) {
            noResults.remove();
        }
    }
    
    if (searchTerm) {
        showNotification('info', `Ditemukan ${visibleItems.length} hasil untuk "${searchTerm}"`);
    }
}

// Filter menu items by category
function filterMenuItems(category) {
    menuItems.forEach(item => {
        const itemCategory = item.getAttribute('data-category') || '';
        
        if (category === 'all' || itemCategory === category) {
            item.style.display = 'flex';
        } else {
            item.style.display = 'none';
        }
    });
    
    // Remove no results message if exists
    const noResults = document.getElementById('noResultsMessage');
    if (noResults) noResults.remove();
    
    // Check if any items are visible
    const visibleItems = Array.from(menuItems).filter(item => item.style.display !== 'none');
    
    if (visibleItems.length === 0) {
        const message = document.createElement('div');
        message.id = 'noResultsMessage';
        message.className = 'col-12 text-center py-5';
        message.innerHTML = `
            <i class="fas fa-filter fa-3x mb-3" style="color: #ddd;"></i>
            <h4>Tidak ada menu di kategori ini</h4>
            <p class="text-muted">Coba pilih kategori lain</p>
        `;
        menuGrid.parentNode.insertBefore(message, menuGrid.nextSibling);
    }
}

// Sort menu items
function sortMenuItems(sortBy) {
    const itemsArray = Array.from(menuItems);
    
    itemsArray.sort((a, b) => {
        switch(sortBy) {
            case 'popular':
                const aSold = parseInt(a.getAttribute('data-sold') || '0');
                const bSold = parseInt(b.getAttribute('data-sold') || '0');
                return bSold - aSold;
                
            case 'rating':
                const aRating = parseFloat(a.getAttribute('data-rating') || '0');
                const bRating = parseFloat(b.getAttribute('data-rating') || '0');
                return bRating - aRating;
                
            case 'price-low':
                const aPrice = parseInt(a.getAttribute('data-price') || '0');
                const bPrice = parseInt(b.getAttribute('data-price') || '0');
                return aPrice - bPrice;
                
            case 'price-high':
                const aPriceHigh = parseInt(a.getAttribute('data-price') || '0');
                const bPriceHigh = parseInt(b.getAttribute('data-price') || '0');
                return bPriceHigh - aPriceHigh;
                
            default:
                return 0;
        }
    });
    
    // Re-append sorted items
    itemsArray.forEach(item => {
        menuGrid.appendChild(item);
    });
}

// Initialize dropdown events
function initDropdownEvents() {
    const dropdownElements = document.querySelectorAll('.dropdown-toggle');
    dropdownElements.forEach(element => {
        element.addEventListener('show.bs.dropdown', function() {
            if (this.id.includes('frequentMenuToggle')) {
                renderFrequentMenuDropdown();
            }
        });
    });
}

// Check login status
function checkLoginStatus() {
    const user = localStorage.getItem('kantinSehatUser');
    
    if (user) {
        try {
            userData = JSON.parse(user);
            
            // Show profile dropdown, hide login button
            if (profileDropdown) {
                profileDropdown.classList.remove('d-none');
                profileDropdown.classList.add('d-block');
            }
            if (loginButton) {
                loginButton.classList.remove('d-block');
                loginButton.classList.add('d-none');
            }
            
            if (mobileProfileDropdown) {
                mobileProfileDropdown.classList.remove('d-none');
                mobileProfileDropdown.classList.add('d-block');
            }
            if (mobileLoginButton) {
                mobileLoginButton.classList.remove('d-block');
                mobileLoginButton.classList.add('d-none');
            }
            
            // Update user info
            updateUserInfo();
            
        } catch (e) {
            console.error('Error parsing user data:', e);
            logout();
        }
    } else {
        // Show login button, hide profile dropdown
        if (profileDropdown) {
            profileDropdown.classList.remove('d-block');
            profileDropdown.classList.add('d-none');
        }
        if (loginButton) {
            loginButton.classList.remove('d-none');
            loginButton.classList.add('d-block');
        }
        
        if (mobileProfileDropdown) {
            mobileProfileDropdown.classList.remove('d-block');
            mobileProfileDropdown.classList.add('d-none');
        }
        if (mobileLoginButton) {
            mobileLoginButton.classList.remove('d-none');
            mobileLoginButton.classList.add('d-block');
        }
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

// Add to cart function
window.addToCart = function(itemId, itemName, itemPrice, itemImage) {
    // Check if user is logged in
    if (!userData) {
        Swal.fire({
            title: 'Login Diperlukan',
            text: 'Anda harus login untuk menambahkan item ke keranjang',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Login',
            cancelButtonText: 'Nanti',
            confirmButtonColor: '#001a12',
            cancelButtonColor: '#6c757d'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/login';
            }
        });
        return;
    }
    
    const existingItem = cart.find(i => i.id === itemId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: itemId,
            name: itemName,
            price: itemPrice,
            image: itemImage,
            quantity: 1
        });
    }
    
    // Add to frequent menus
    addToFrequentMenu(itemId);
    
    updateCart();
    showNotification('success', `${itemName} ditambahkan ke keranjang`);
    
    // Show cart sidebar on mobile
    if (window.innerWidth < 768) {
        toggleCart();
    }
}

// Add to frequent menu
function addToFrequentMenu(itemId) {
    const existingItem = frequentMenus.find(item => item.id === itemId);
    
    if (existingItem) {
        existingItem.count += 1;
        existingItem.lastPurchased = new Date().toISOString();
    } else {
        frequentMenus.push({
            id: itemId,
            count: 1,
            lastPurchased: new Date().toISOString()
        });
    }
    
    // Save to localStorage
    localStorage.setItem('kantinSehatFrequentMenus', JSON.stringify(frequentMenus));
    updateFrequentBadge();
}

// Update frequent menu badge
function updateFrequentBadge() {
    const totalItems = frequentMenus.length;
    
    if (frequentBadge) {
        frequentBadge.textContent = totalItems > 9 ? '9+' : totalItems;
    }
    if (mobileFrequentBadge) {
        mobileFrequentBadge.textContent = totalItems > 9 ? '9+' : totalItems;
    }
    
    // Hide badge if no items
    if (totalItems === 0) {
        if (frequentBadge) frequentBadge.style.display = 'none';
        if (mobileFrequentBadge) mobileFrequentBadge.style.display = 'none';
    } else {
        if (frequentBadge) frequentBadge.style.display = 'flex';
        if (mobileFrequentBadge) mobileFrequentBadge.style.display = 'flex';
    }
}

// Render frequent menu dropdown
function renderFrequentMenuDropdown() {
    const desktopBody = frequentMenuBody;
    const mobileBody = mobileFrequentMenuBody;
    
    if (!desktopBody || !mobileBody) return;
    
    if (frequentMenus.length === 0) {
        const emptyHtml = `
            <div class="frequent-menu-empty">
                <i class="fas fa-clock"></i>
                <p>Belum ada riwayat pembelian</p>
            </div>
        `;
        desktopBody.innerHTML = emptyHtml;
        mobileBody.innerHTML = emptyHtml;
        return;
    }
    
    // Sort by count (most purchased first)
    const sortedMenus = [...frequentMenus].sort((a, b) => b.count - a.count);
    // Get top 5 items
    const topMenus = sortedMenus.slice(0, 5);
    
    let dropdownHtml = '';
    
    topMenus.forEach(item => {
        // Get menu item from DOM
        const menuElement = document.querySelector(`.menu-item[data-id="${item.id}"]`);
        
        if (menuElement) {
            const name = menuElement.querySelector('.menu-title')?.textContent || 'Menu';
            const price = menuElement.getAttribute('data-price') || '0';
            const image = menuElement.querySelector('.menu-img')?.src || '';
            
            dropdownHtml += `
                <div class="frequent-menu-item" onclick="buyAgain(${item.id})">
                    <img src="${image}" alt="${name}" class="frequent-menu-item-img">
                    <div class="frequent-menu-item-details">
                        <h6 class="frequent-menu-item-title">${name}</h6>
                        <div class="frequent-menu-item-price">Rp ${parseInt(price).toLocaleString('id-ID')}</div>
                        <div class="frequent-menu-item-info">
                            <div class="frequent-menu-item-count">
                                <i class="fas fa-shopping-cart"></i>
                                <span>${item.count}x</span>
                            </div>
                            <div class="frequent-menu-item-last">
                                ${formatDate(item.lastPurchased)}
                            </div>
                        </div>
                        <button class="btn-buy-again" onclick="event.stopPropagation(); buyAgain(${item.id})">
                            <i class="fas fa-redo"></i> Beli Lagi
                        </button>
                    </div>
                </div>
            `;
        }
    });
    
    desktopBody.innerHTML = dropdownHtml || '<div class="frequent-menu-empty"><i class="fas fa-clock"></i><p>Menu tidak ditemukan</p></div>';
    mobileBody.innerHTML = dropdownHtml || '<div class="frequent-menu-empty"><i class="fas fa-clock"></i><p>Menu tidak ditemukan</p></div>';
}

// Format date for display
function formatDate(dateString) {
    const date = new Date(dateString);
    const now = new Date();
    const diffTime = Math.abs(now - date);
    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
    
    if (diffDays === 0) {
        return 'Hari ini';
    } else if (diffDays === 1) {
        return 'Kemarin';
    } else if (diffDays < 7) {
        return `${diffDays} hari lalu`;
    } else {
        return date.toLocaleDateString('id-ID', { 
            day: 'numeric', 
            month: 'short' 
        });
    }
}

// Buy again function
window.buyAgain = function(itemId) {
    // Close dropdown first
    const dropdowns = document.querySelectorAll('.dropdown-menu.show');
    dropdowns.forEach(dropdown => {
        dropdown.classList.remove('show');
    });
    
    // Get item from DOM
    const menuElement = document.querySelector(`.menu-item[data-id="${itemId}"]`);
    
    if (menuElement) {
        const name = menuElement.querySelector('.menu-title')?.textContent || 'Menu';
        const price = parseInt(menuElement.getAttribute('data-price') || '0');
        const image = menuElement.querySelector('.menu-img')?.src || '';
        
        addToCart(itemId, name, price, image);
    } else {
        showNotification('error', 'Menu tidak ditemukan');
    }
}

// Clear frequent menus
window.clearFrequentMenus = function() {
    Swal.fire({
        title: 'Hapus Riwayat?',
        text: 'Semua riwayat menu sering dibeli akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#001a12',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            frequentMenus = [];
            localStorage.setItem('kantinSehatFrequentMenus', JSON.stringify(frequentMenus));
            updateFrequentBadge();
            renderFrequentMenuDropdown();
            showNotification('success', 'Riwayat telah dihapus');
        }
    });
}

// View all frequent menus
window.viewAllFrequentMenus = function() {
    if (frequentMenus.length === 0) {
        showNotification('info', 'Belum ada riwayat pembelian');
        return;
    }
    
    let allMenusHtml = '<div class="text-start">';
    allMenusHtml += '<h5 class="mb-3" style="color: var(--primary);">Semua Menu Sering Dibeli</h5>';
    
    // Sort by count
    const sortedMenus = [...frequentMenus].sort((a, b) => b.count - a.count);
    
    sortedMenus.forEach(item => {
        const menuElement = document.querySelector(`.menu-item[data-id="${item.id}"]`);
        
        if (menuElement) {
            const name = menuElement.querySelector('.menu-title')?.textContent || 'Menu';
            const price = menuElement.getAttribute('data-price') || '0';
            const image = menuElement.querySelector('.menu-img')?.src || '';
            
            allMenusHtml += `
                <div class="d-flex align-items-center mb-3 p-2 border rounded" style="border-color: #eee !important;">
                    <img src="${image}" alt="${name}" 
                         style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px; margin-right: 10px;">
                    <div class="flex-grow-1">
                        <h6 class="mb-1" style="font-size: 0.9rem;">${name}</h6>
                        <div class="d-flex justify-content-between">
                            <small class="text-primary fw-bold">Rp ${parseInt(price).toLocaleString('id-ID')}</small>
                            <small class="text-muted">${item.count}x dibeli</small>
                        </div>
                        <small class="text-muted">Terakhir: ${formatDate(item.lastPurchased)}</small>
                    </div>
                    <button class="btn btn-sm btn-outline-primary ms-2" onclick="buyAgain(${item.id})">
                        <i class="fas fa-redo"></i>
                    </button>
                </div>
            `;
        }
    });
    
    allMenusHtml += '</div>';
    
    Swal.fire({
        title: 'Menu Sering Dibeli',
        html: allMenusHtml,
        width: 600,
        showCloseButton: true,
        showConfirmButton: false,
        customClass: {
            popup: 'rounded-3'
        }
    });
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
    if (cartCount) cartCount.textContent = totalItems;
    if (mobileCartCount) mobileCartCount.textContent = totalItems;
    if (bottomBarCartCount) bottomBarCartCount.textContent = totalItems;
    
    // Update cart sidebar
    if (cart.length === 0) {
        if (cartBody) {
            cartBody.innerHTML = `
                <div class="cart-empty">
                    <i class="fas fa-shopping-cart"></i>
                    <h5>Keranjang Kosong</h5>
                    <p>Tambahkan menu favorit Anda ke keranjang</p>
                </div>
            `;
        }
        if (cartTotal) cartTotal.textContent = 'Rp 0';
        if (cartSubtotal) cartSubtotal.textContent = 'Rp 0';
    } else {
        let cartHtml = '';
        let subtotal = 0;
        
        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            subtotal += itemTotal;
            
            cartHtml += `
                <div class="cart-item">
                    <img src="${item.image}" alt="${item.name}" class="cart-item-img">
                    <div class="cart-item-details">
                        <h6 class="cart-item-title">${item.name}</h6>
                        <div class="cart-item-price">Rp ${Number(item.price).toLocaleString('id-ID')}</div>
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
        
        if (cartBody) cartBody.innerHTML = cartHtml;
        if (cartSubtotal) cartSubtotal.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
        if (cartTotal) cartTotal.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
    }
}

// Show item detail modal
window.showDetail = function(itemId) {
    const menuElement = document.querySelector(`.menu-item[data-id="${itemId}"]`);
    
    if (!menuElement) {
        Swal.fire({
            title: 'Info Menu',
            text: 'Detail menu tidak ditemukan',
            icon: 'error',
            confirmButtonColor: '#001a12'
        });
        return;
    }
    
    const name = menuElement.querySelector('.menu-title')?.textContent || 'Menu';
    const description = menuElement.querySelector('.menu-description')?.textContent || '';
    const price = menuElement.getAttribute('data-price') || '0';
    const image = menuElement.querySelector('.menu-img')?.src || '';
    const category = menuElement.getAttribute('data-category') || '';
    const rating = menuElement.getAttribute('data-rating') || '0';
    const sold = menuElement.getAttribute('data-sold') || '0';
    
    // Create star rating
    const ratingNum = parseFloat(rating);
    const fullStars = Math.floor(ratingNum);
    const hasHalfStar = ratingNum % 1 >= 0.5;
    let stars = '';
    
    for (let i = 1; i <= 5; i++) {
        if (i <= fullStars) {
            stars += '<i class="fas fa-star"></i>';
        } else if (i === fullStars + 1 && hasHalfStar) {
            stars += '<i class="fas fa-star-half-alt"></i>';
        } else {
            stars += '<i class="far fa-star"></i>';
        }
    }
    
    const modalHtml = `
        <div class="row">
            <div class="col-md-5">
                <div class="text-center mb-3">
                    <img src="${image}" alt="${name}" 
                         style="width: 100%; max-height: 250px; object-fit: cover; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                </div>
            </div>
            <div class="col-md-7">
                <h4 style="color: var(--primary); font-weight: 900;">${name}</h4>
                <div class="d-flex align-items-center mb-3">
                    <div class="text-warning me-2">
                        ${stars}
                    </div>
                    <span class="me-3" style="font-weight: 600;">${rating}</span>
                    <span class="text-muted">(${sold} terjual)</span>
                </div>
                
                <p style="color: var(--dark); line-height: 1.6;">${description}</p>
                
                <div class="mb-3">
                    <span class="badge" style="background: rgba(0, 26, 18, 0.1); color: var(--primary); font-weight: 600;">
                        <i class="fas fa-tag me-1"></i> ${category}
                    </span>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <div>
                        <h3 style="color: var(--primary); font-weight: 900; margin: 0;">
                            Rp ${parseInt(price).toLocaleString('id-ID')}
                        </h3>
                    </div>
                    <button class="btn" onclick="addToCart(${itemId}, '${name}', ${price}, '${image}'); Swal.close();" 
                            style="background: var(--primary); color: white; font-weight: 700; padding: 10px 25px; border-radius: 8px;">
                        <i class="fas fa-cart-plus me-2"></i> Tambah ke Keranjang
                    </button>
                </div>
            </div>
        </div>
    `;
    
    Swal.fire({
        title: '',
        html: modalHtml,
        width: 800,
        showCloseButton: true,
        showConfirmButton: false,
        customClass: {
            popup: 'rounded-3'
        },
        didOpen: () => {
            const modal = document.querySelector('.swal2-popup');
            if (modal) {
                modal.style.padding = '30px';
            }
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
            cancelButtonText: 'Nanti',
            confirmButtonColor: '#001a12',
            cancelButtonColor: '#6c757d'
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
            icon: 'warning',
            confirmButtonColor: '#001a12'
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
        timerProgressBar: true,
        background: 'white',
        color: 'var(--dark)',
        iconColor: type === 'success' ? 'var(--success)' : 
                   type === 'error' ? 'var(--danger)' : 
                   type === 'warning' ? 'var(--warning)' : 'var(--info)'
    });
}

// Cart toggle functions
if (cartToggle) {
    cartToggle.addEventListener('click', toggleCart);
}

if (mobileCartToggle) {
    mobileCartToggle.addEventListener('click', function(e) {
        e.preventDefault();
        toggleCart();
    });
}

if (bottomBarCartToggle) {
    bottomBarCartToggle.addEventListener('click', function(e) {
        e.preventDefault();
        toggleCart();
    });
}

if (cartClose) {
    cartClose.addEventListener('click', closeCart);
}

if (overlay) {
    overlay.addEventListener('click', closeCart);
}

function toggleCart() {
    if (cartSidebar) cartSidebar.classList.add('active');
    if (overlay) overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeCart() {
    if (cartSidebar) cartSidebar.classList.remove('active');
    if (overlay) overlay.classList.remove('active');
    document.body.style.overflow = 'auto';
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
            
            // Update UI
            checkLoginStatus();
            
            Swal.fire({
                title: 'Berhasil Logout!',
                text: 'Anda telah keluar dari akun',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false,
                confirmButtonColor: '#001a12'
            });
        }
    });
};

// Scroll to promo section
document.querySelectorAll('a[href="#promo"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const promoSection = document.getElementById('promo');
        if (promoSection) {
            promoSection.scrollIntoView({ behavior: 'smooth' });
        }
    });
});