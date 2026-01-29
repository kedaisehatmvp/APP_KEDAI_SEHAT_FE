// Menu data dengan gambar yang diperbaiki dan data tambahan
const menuItems = [
    {
        id: 1,
        name: "Salad Sehat Super",
        category: ["makanan", "vegetarian", "low-calorie"],
        description: "Campuran sayuran organik segar (selada, tomat cherry, timun, wortel) dengan dressing khusus rendah kalori dan biji chia.",
        price: 25000,
        oldPrice: 30000,
        image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.8,
        calories: 180,
        featured: true,
        badge: "HOT",
        sold: 342,
        prepTime: 5,
        ingredients: ["Selada organik", "Tomat cherry", "Mentimun", "Wortel", "Biji chia", "Dressing lemon"],
        reviews: [
            { name: "Budi Santoso", rating: 5, comment: "Saladnya segar banget! Dressingnya pas tidak terlalu asam." },
            { name: "Sari Dewi", rating: 4, comment: "Enak dan sehat, sayurnya masih fresh. Cuman dikit banget porsinya." },
            { name: "Ahmad Rizki", rating: 5, comment: "Favorite saya buat makan siang, bikin kenyang tapi tidak bikin mengantuk." }
        ]
    },
    {
        id: 2,
        name: "Jus Detox Mix",
        category: ["minuman", "vegetarian"],
        description: "Campuran buah-buahan organik (apel hijau, seledri, lemon, jahe) tanpa gula tambahan, kaya vitamin dan antioksidan.",
        price: 18000,
        image: "https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 5.0,
        calories: 120,
        featured: false,
        badge: "NEW",
        sold: 215,
        prepTime: 3,
        ingredients: ["Apel hijau organik", "Seledri", "Lemon", "Jahe", "Air mineral"],
        reviews: [
            { name: "Linda Wijaya", rating: 5, comment: "Rasanya segar banget! Perfect untuk detox setelah makan berat." },
            { name: "Rudi Hartono", rating: 5, comment: "Tidak terlalu manis, justru enak gitu. Bikin badan terasa ringan." },
            { name: "Maya Sari", rating: 5, comment: "Jahenya pas, tidak terlalu kuat. Saya minum setiap pagi sekarang." }
        ]
    },
    {
        id: 3,
        name: "Nasi Goreng Sehat",
        category: ["makanan"],
        description: "Nasi merah dengan sayuran organik (wortel, buncis, jagung) dan dada ayam panggang tanpa kulit, dimasak dengan minyak zaitun.",
        price: 28000,
        image: "https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.5,
        calories: 320,
        featured: true,
        sold: 478,
        prepTime: 8,
        ingredients: ["Nasi merah", "Dada ayam tanpa kulit", "Wortel", "Buncis", "Jagung manis", "Telur", "Minyak zaitun"],
        reviews: [
            { name: "Dian Pratama", rating: 4, comment: "Enak dan tidak terlalu berminyak. Nasinya masih pera seperti nasi merah seharusnya." },
            { name: "Fajar Nugroho", rating: 5, comment: "Favorite menu! Dada ayamnya empuk dan banyak potongannya." },
            { name: "Putri Ayu", rating: 4, comment: "Rasanya ringan, cocok buat yang lagi diet tapi pengen makan nasi goreng." }
        ]
    },
    {
        id: 4,
        name: "Smoothie Bowl Berry",
        category: ["makanan", "vegetarian", "low-calorie"],
        description: "Smoothie buah berry (strawberry, blueberry, raspberry) dengan topping granola homemade, chia seed, dan potongan buah segar.",
        price: 22000,
        image: "https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.7,
        calories: 210,
        featured: false,
        badge: "POPULAR",
        sold: 189,
        prepTime: 5,
        ingredients: ["Strawberry", "Blueberry", "Raspberry", "Yogurt rendah lemak", "Granola homemade", "Chia seed", "Madu"],
        reviews: [
            { name: "Rina Melati", rating: 5, comment: "Warnanya cantik banget! Rasanya juga enak, manis alami dari buah." },
            { name: "Andi Saputra", rating: 4, comment: "Cocok buat sarapan, kenyang sampai siang. Granolanya renyah enak." },
            { name: "Siska Wati", rating: 5, comment: "Anak saya suka banget! Sekarang jadi menu rutin buat bekal sekolah." }
        ]
    },
    {
        id: 5,
        name: "Sandwich Ayam Sehat",
        category: ["makanan"],
        description: "Roti gandum dengan ayam panggang, selada, tomat, mentimun, dan saus yogurt rendah lemak. Dikemas dengan rapi untuk dibawa.",
        price: 20000,
        oldPrice: 25000,
        image: "https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.2,
        calories: 280,
        featured: false,
        sold: 321,
        prepTime: 4,
        ingredients: ["Roti gandum", "Dada ayam panggang", "Selada", "Tomat", "Mentimun", "Saus yogurt", "Mayo rendah lemak"],
        reviews: [
            { name: "Hendra Kurniawan", rating: 4, comment: "Praktis buat dibawa, rotinya masih lembut." },
            { name: "Wulan Sari", rating: 5, comment: "Ayamnya banyak dan empuk. Saus yogurttnya bikin rasanya segar." },
            { name: "Bayu Adi", rating: 4, comment: "Cocok buat makan siang cepat. Tidak bikin kantong bolong juga." }
        ]
    },
    {
        id: 6,
        name: "Teh Hijau Organik",
        category: ["minuman", "vegetarian", "low-calorie"],
        description: "Teh hijau premium dari daun teh pilihan, diseduh dengan suhu tepat tanpa gula tambahan, kaya antioksidan dan baik untuk metabolisme.",
        price: 12000,
        image: "https://images.unsplash.com/photo-1594631252845-29fc4cc8cde9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.9,
        calories: 5,
        featured: false,
        badge: "NEW",
        sold: 567,
        prepTime: 2,
        ingredients: ["Daun teh hijau organik", "Air panas 80°C"],
        reviews: [
            { name: "Agus Setiawan", rating: 5, comment: "Tehnya harum, tidak pahit. Saya minum 2x sehari." },
            { name: "Nina Hartanti", rating: 5, comment: "Sempurna! Tidak pakai gula jadi benar-benar sehat." },
            { name: "Rizky Fadilah", rating: 4, comment: "Enak dinikmati hangat. Bikin rileks setelah ujian." }
        ]
    },
    {
        id: 7,
        name: "Paket Diet Sehat",
        category: ["paket", "vegetarian", "low-calorie"],
        description: "Paket lengkap untuk diet sehat selama 1 hari terdiri dari sarapan oatmeal, salad makan siang, cemilan edamame, dan makan makan sup sayur.",
        price: 75000,
        oldPrice: 90000,
        image: "https://images.unsplash.com/photo-1490818387583-1baba5e638af?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.9,
        calories: 450,
        featured: true,
        badge: "HOT",
        sold: 89,
        prepTime: 10,
        ingredients: ["Oatmeal dengan buah", "Salad sayuran", "Edamame rebus", "Sup sayur", "Teh hijau"],
        reviews: [
            { name: "Dewi Lestari", rating: 5, comment: "Paketnya komplit banget! Berhasil turun 2kg dalam seminggu." },
            { name: "Ari Wibowo", rating: 5, comment: "Portionnya pas, tidak kekurangan atau kelebihan. Recommended!" },
            { name: "Mira Handayani", rating: 4, comment: "Rasanya enak semua, cuman agak mahal tapi worth it lah." }
        ]
    },
    {
        id: 8,
        name: "Yogurt Parfait",
        category: ["cemilan", "vegetarian", "low-calorie"],
        description: "Yogurt rendah lemak dengan lapisan granola, buah berry segar, dan madu asli. Disajikan dalam gelas bening yang menarik.",
        price: 18000,
        image: "https://images.unsplash.com/photo-1488477181946-6428a0291777?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.6,
        calories: 160,
        featured: false,
        sold: 234,
        prepTime: 3,
        ingredients: ["Yogurt rendah lemak", "Granola", "Strawberry", "Blueberry", "Madu asli"],
        reviews: [
            { name: "Cindy Anggraeni", rating: 5, comment: "Tampilannya cantik banget! Rasanya juga enak, yogurttnya tidak terlalu asam." },
            { name: "Eko Prasetyo", rating: 4, comment: "Enak buat cemilan sore. Manisnya pas dari madu." },
            { name: "Lina Marlina", rating: 5, comment: "Anak-anak suka banget! Sekarang jadi cemilan favorit keluarga." }
        ]
    },
    {
        id: 9,
        name: "Air Lemon Detox",
        category: ["minuman", "vegetarian", "low-calorie"],
        description: "Air lemon hangat dengan irisan lemon segar dan sedikit madu. Perfect untuk memulai hari atau detox tubuh di pagi hari.",
        price: 8000,
        image: "https://images.unsplash.com/photo-1546171753-97d7676e4602?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.4,
        calories: 10,
        featured: false,
        sold: 412,
        prepTime: 2,
        ingredients: ["Lemon segar", "Air hangat", "Madu (opsional)"],
        reviews: [
            { name: "Rina Permatasari", rating: 5, comment: "Rutin minum setiap pagi, badan terasa lebih segar." },
            { name: "Arief Rahman", rating: 4, comment: "Sederhana tapi efeknya bagus untuk pencernaan." },
            { name: "Susi Susanti", rating: 5, comment: "Harga murah, manfaatnya banyak. Wajib order setiap hari." }
        ]
    },
    {
        id: 10,
        name: "Oatmeal Pisang",
        category: ["makanan", "vegetarian"],
        description: "Oatmeal dimasak dengan susu rendah lemak, ditambah potongan pisang, kayu manis, dan madu organik. Sarapan sehat yang mengenyangkan.",
        price: 15000,
        image: "https://images.unsplash.com/photo-1610399214658-f8c4d66c8d0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.3,
        calories: 190,
        featured: false,
        sold: 278,
        prepTime: 5,
        ingredients: ["Oatmeal", "Susu rendah lemak", "Pisang", "Kayu manis", "Madu organik"],
        reviews: [
            { name: "Bambang Suryadi", rating: 4, comment: "Oatmealnya lembut, tidak berair. Pisangnya manis alami." },
            { name: "Tuti Alawiyah", rating: 5, comment: "Sarapan favorit saya! Tidak bikin ngantuk di kelas." },
            { name: "Ramon Sinaga", rating: 4, comment: "Enak dan sehat. Kadang saya tambahin kismis sendiri." }
        ]
    },
    {
        id: 11,
        name: "Cemilan Edamame",
        category: ["cemilan", "vegetarian", "low-calorie"],
        description: "Edamame rebus dengan sedikit garam laut. Kaya protein nabati dan serat, cocok untuk cemilan sehat kapan saja.",
        price: 12000,
        image: "https://images.unsplash.com/photo-1578102487201-3c27b5e7f74c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.7,
        calories: 140,
        featured: false,
        sold: 345,
        prepTime: 4,
        ingredients: ["Edamame segar", "Garam laut", "Air untuk merebus"],
        reviews: [
            { name: "Feri Irawan", rating: 5, comment: "Sederhana tapi enak! Proteinnya tinggi cocok buat yang gym." },
            { name: "Dian Puspita", rating: 5, comment: "Cemilan paling sehat menurut saya. Gurih alami dari edamamenya." },
            { name: "Herman Susanto", rating: 4, comment: "Praktis buat ngemil sambil ngerjain tugas. Tidak bikin gendut." }
        ]
    },
    {
        id: 12,
        name: "Paket Sehat 7 Hari",
        category: ["paket", "vegetarian"],
        description: "Paket menu sehat lengkap untuk 7 hari dengan variasi menu berbeda setiap hari. Include sarapan, makan siang, cemilan, dan makan malam.",
        price: 350000,
        oldPrice: 420000,
        image: "https://images.unsplash.com/photo-1506084868230-bb9d95c24759?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
        rating: 4.8,
        calories: 450,
        featured: true,
        badge: "HOT",
        sold: 45,
        prepTime: 15,
        ingredients: ["Berbagai sayuran organik", "Buah-buahan segar", "Protein nabati", "Biji-bijian", "Rempah alami"],
        reviews: [
            { name: "Gita Natasha", rating: 5, comment: "Investasi kesehatan yang worth it! Badan terasa lebih fit dalam 7 hari." },
            { name: "Rendra Maulana", rating: 5, comment: "Menu tidak monoton, setiap hari ada surprise baru. Keren!" },
            { name: "Sari Indah", rating: 4, comment: "Sedikit mahal tapi kualitasnya premium. Sayurnya selalu fresh." }
        ]
    }
];

// Cart data
let cart = JSON.parse(localStorage.getItem('kantinSehatCart')) || [];
let userData = null;
let frequentMenus = JSON.parse(localStorage.getItem('kantinSehatFrequentMenus')) || [];
let currentPage = 1;
const itemsPerPage = 6;
let currentSort = 'default';

// DOM elements
const menuGrid = document.getElementById('menuGrid');
const categoryButtons = document.querySelectorAll('.category-btn');
const searchInput = document.getElementById('searchMenu');
const searchBtn = document.querySelector('.search-btn');
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
const loadMoreBtn = document.getElementById('loadMore');
const sortSelect = document.getElementById('sortMenu');

// Frequent menu elements
const frequentBadge = document.getElementById('frequentBadge');
const mobileFrequentBadge = document.getElementById('mobileFrequentBadge');
const frequentMenuBody = document.getElementById('frequentMenuBody');
const mobileFrequentMenuBody = document.getElementById('mobileFrequentMenuBody');

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    checkLoginStatus();
    renderMenu('all', currentSort);
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
    
    // Setup search button
    if (searchBtn) {
        searchBtn.addEventListener('click', function() {
            performSearch();
        });
    }
    
    // Setup search input enter key
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    }
    
    // Setup sort select
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            currentSort = this.value;
            renderMenu('all', currentSort);
        });
    }
    
    // Setup load more button
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            loadMoreItems();
        });
    }
});

// Initialize dropdown events
function initDropdownEvents() {
    // Handle dropdown show event to refresh content
    const dropdownElements = document.querySelectorAll('.dropdown-toggle');
    dropdownElements.forEach(element => {
        element.addEventListener('show.bs.dropdown', function() {
            if (this.id.includes('frequentMenuToggle')) {
                renderFrequentMenuDropdown();
            }
        });
    });
}

// Perform search
function performSearch() {
    const searchTerm = searchInput.value.trim().toLowerCase();
    if (searchTerm) {
        const filteredItems = menuItems.filter(item => 
            item.name.toLowerCase().includes(searchTerm) ||
            item.description.toLowerCase().includes(searchTerm) ||
            item.ingredients.some(ingredient => ingredient.toLowerCase().includes(searchTerm))
        );
        
        renderFilteredMenu(filteredItems);
        showNotification('info', `Ditemukan ${filteredItems.length} hasil untuk "${searchTerm}"`);
    }
}

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
function renderMenu(category, sortBy = 'default') {
    menuGrid.innerHTML = '';
    currentPage = 1;
    
    let filteredItems = category === 'all' 
        ? [...menuItems] 
        : menuItems.filter(item => item.category.includes(category));
    
    // Sort items
    filteredItems = sortMenuItems(filteredItems, sortBy);
    
    // Get items for current page
    const itemsToShow = filteredItems.slice(0, currentPage * itemsPerPage);
    
    renderMenuItems(itemsToShow);
    
    // Show/hide load more button
    if (loadMoreBtn) {
        if (filteredItems.length > itemsToShow.length) {
            loadMoreBtn.style.display = 'block';
        } else {
            loadMoreBtn.style.display = 'none';
        }
    }
}

// Load more items
function loadMoreItems() {
    currentPage++;
    
    const activeCategory = document.querySelector('.category-btn.active').getAttribute('data-category');
    let filteredItems = activeCategory === 'all' 
        ? [...menuItems] 
        : menuItems.filter(item => item.category.includes(activeCategory));
    
    // Sort items
    filteredItems = sortMenuItems(filteredItems, currentSort);
    
    // Get items for current page
    const itemsToShow = filteredItems.slice(0, currentPage * itemsPerPage);
    
    renderMenuItems(itemsToShow);
    
    // Show/hide load more button
    if (filteredItems.length > itemsToShow.length) {
        loadMoreBtn.style.display = 'block';
    } else {
        loadMoreBtn.style.display = 'none';
    }
    
    // Smooth scroll to newly loaded items
    const lastItem = document.querySelector('.menu-item:last-child');
    if (lastItem) {
        lastItem.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
}

// Sort menu items
function sortMenuItems(items, sortBy) {
    switch(sortBy) {
        case 'popular':
            return [...items].sort((a, b) => (b.sold || 0) - (a.sold || 0));
        case 'rating':
            return [...items].sort((a, b) => b.rating - a.rating);
        case 'price-low':
            return [...items].sort((a, b) => a.price - b.price);
        case 'price-high':
            return [...items].sort((a, b) => b.price - a.price);
        default:
            return items;
    }
}

// Render filtered menu (for search)
function renderFilteredMenu(filteredItems) {
    menuGrid.innerHTML = '';
    
    if (filteredItems.length === 0) {
        menuGrid.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="fas fa-search fa-3x mb-3" style="color: #ddd;"></i>
                <h4>Menu tidak ditemukan</h4>
                <p class="text-muted">Coba kata kunci lain atau lihat semua menu</p>
            </div>
        `;
        if (loadMoreBtn) loadMoreBtn.style.display = 'none';
        return;
    }
    
    renderMenuItems(filteredItems);
    
    if (loadMoreBtn) loadMoreBtn.style.display = 'none';
}

// Render menu items to grid
function renderMenuItems(items) {
    items.forEach(item => {
        const menuItem = document.createElement('div');
        menuItem.className = `menu-item ${item.featured ? 'featured' : ''}`;
        
        let badgeHtml = '';
        if (item.badge) {
            const badgeClass = item.badge === 'HOT' ? 'hot' : item.badge === 'NEW' ? 'new' : 'popular';
            badgeHtml = `<span class="menu-badge ${badgeClass}"><i class="fas fa-${badgeClass === 'hot' ? 'fire' : badgeClass === 'new' ? 'star' : 'crown'}"></i> ${item.badge}</span>`;
        }
        
        let oldPriceHtml = '';
        if (item.oldPrice) {
            oldPriceHtml = `<span class="menu-old-price">Rp ${item.oldPrice.toLocaleString('id-ID')}</span>`;
        }
        
        const ratingStars = getStarRating(item.rating);
        
        menuItem.innerHTML = `
            ${badgeHtml}
            <div class="menu-img-container">
                <img src="${item.image}" alt="${item.name}" class="menu-img">
            </div>
            <div class="menu-content">
                <span class="menu-category"><i class="fas fa-${getCategoryIcon(item.category[0])}"></i> ${getCategoryLabel(item.category[0])}</span>
                <h3 class="menu-title">${item.name}</h3>
                <p class="menu-description">${item.description}</p>
                
                <div class="menu-footer">
                    <div class="menu-price-container">
                        <div>
                            <span class="menu-price">Rp ${item.price.toLocaleString('id-ID')}</span>
                            ${oldPriceHtml}
                        </div>
                        <div class="menu-rating">
                            ${ratingStars}
                            <span>${item.rating}</span>
                        </div>
                    </div>
                    
                    <div class="menu-info">
                        <div class="menu-calories">
                            <i class="fas fa-fire"></i>
                            <span>${item.calories} kal</span>
                        </div>
                        <div class="menu-sold">
                            <i class="fas fa-shopping-bag"></i>
                            <span>${item.sold || 0} terjual</span>
                        </div>
                        <div class="menu-time">
                            <i class="fas fa-clock"></i>
                            <span>${item.prepTime || 5} min</span>
                        </div>
                    </div>
                    
                    <div class="menu-actions">
                        <button class="btn-add-to-cart" onclick="addToCart(${item.id})">
                            <i class="fas fa-cart-plus"></i> Tambah
                        </button>
                        <button class="btn-detail" onclick="showDetail(${item.id})" title="Detail">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
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

// Get category icon
function getCategoryIcon(category) {
    const icons = {
        'makanan': 'utensils',
        'minuman': 'glass-whiskey',
        'cemilan': 'cookie-bite',
        'paket': 'box',
        'vegetarian': 'leaf',
        'low-calorie': 'weight'
    };
    return icons[category] || 'tag';
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
        renderMenu(category, currentSort);
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
    
    // Add to frequent menus
    addToFrequentMenu(itemId);
    
    updateCart();
    showNotification('success', `${item.name} ditambahkan ke keranjang`);
    
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
    frequentBadge.textContent = totalItems > 9 ? '9+' : totalItems;
    mobileFrequentBadge.textContent = totalItems > 9 ? '9+' : totalItems;
    
    // Hide badge if no items
    if (totalItems === 0) {
        frequentBadge.style.display = 'none';
        mobileFrequentBadge.style.display = 'none';
    } else {
        frequentBadge.style.display = 'flex';
        mobileFrequentBadge.style.display = 'flex';
    }
}

// Render frequent menu dropdown
function renderFrequentMenuDropdown() {
    const desktopBody = frequentMenuBody;
    const mobileBody = mobileFrequentMenuBody;
    
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
        const menuItem = menuItems.find(m => m.id === item.id);
        if (!menuItem) return;
        
        dropdownHtml += `
            <div class="frequent-menu-item" onclick="buyAgain(${item.id})">
                <img src="${menuItem.image}" alt="${menuItem.name}" class="frequent-menu-item-img">
                <div class="frequent-menu-item-details">
                    <h6 class="frequent-menu-item-title">${menuItem.name}</h6>
                    <div class="frequent-menu-item-price">Rp ${menuItem.price.toLocaleString('id-ID')}</div>
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
    });
    
    desktopBody.innerHTML = dropdownHtml;
    mobileBody.innerHTML = dropdownHtml;
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
    
    // Add to cart
    addToCart(itemId);
    showNotification('success', 'Ditambahkan ke keranjang');
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
        const menuItem = menuItems.find(m => m.id === item.id);
        if (!menuItem) return;
        
        allMenusHtml += `
            <div class="d-flex align-items-center mb-3 p-2 border rounded" style="border-color: #eee !important;">
                <img src="${menuItem.image}" alt="${menuItem.name}" 
                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px; margin-right: 10px;">
                <div class="flex-grow-1">
                    <h6 class="mb-1" style="font-size: 0.9rem;">${menuItem.name}</h6>
                    <div class="d-flex justify-content-between">
                        <small class="text-primary fw-bold">Rp ${menuItem.price.toLocaleString('id-ID')}</small>
                        <small class="text-muted">${item.count}x dibeli</small>
                    </div>
                    <small class="text-muted">Terakhir: ${formatDate(item.lastPurchased)}</small>
                </div>
                <button class="btn btn-sm btn-outline-primary ms-2" onclick="buyAgain(${item.id})">
                    <i class="fas fa-redo"></i>
                </button>
            </div>
        `;
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
        cartSubtotal.textContent = 'Rp 0';
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
        cartSubtotal.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
        cartTotal.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
    }
}

// Show item detail with enhanced modal
window.showDetail = function(itemId) {
    const item = menuItems.find(i => i.id === itemId);
    
    // Create HTML for ingredients
    let ingredientsHtml = '';
    if (item.ingredients && item.ingredients.length > 0) {
        ingredientsHtml = `
            <div class="mb-4">
                <h6 style="color: var(--primary); font-weight: 700;">Bahan-bahan:</h6>
                <div class="d-flex flex-wrap gap-2 mt-2">
                    ${item.ingredients.map(ing => 
                        `<span class="badge bg-light text-dark border" style="font-weight: 500;">${ing}</span>`
                    ).join('')}
                </div>
            </div>
        `;
    }
    
    // Create HTML for reviews
    let reviewsHtml = '';
    if (item.reviews && item.reviews.length > 0) {
        reviewsHtml = `
            <div class="mt-4">
                <h6 style="color: var(--primary); font-weight: 700;">Ulasan Pelanggan (${item.reviews.length}):</h6>
                <div class="mt-3" style="max-height: 200px; overflow-y: auto;">
                    ${item.reviews.map(review => `
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <strong>${review.name}</strong>
                                    <div class="text-warning" style="font-size: 0.9rem;">
                                        ${getStarRating(review.rating)}
                                    </div>
                                </div>
                                <small class="text-muted">${formatDate(new Date(Date.now() - Math.random() * 30 * 24 * 60 * 60 * 1000).toISOString())}</small>
                            </div>
                            <p class="mb-0" style="font-size: 0.9rem;">${review.comment}</p>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;
    }
    
    // Create HTML for nutrition info
    const nutritionHtml = `
        <div class="row mt-3">
            <div class="col-6">
                <div class="text-center p-2 border rounded">
                    <div style="color: var(--primary); font-weight: 700; font-size: 1.1rem;">${item.calories}</div>
                    <div style="font-size: 0.8rem; color: var(--gray);">Kalori</div>
                </div>
            </div>
            <div class="col-6">
                <div class="text-center p-2 border rounded">
                    <div style="color: var(--primary); font-weight: 700; font-size: 1.1rem;">${item.prepTime || 5}</div>
                    <div style="font-size: 0.8rem; color: var(--gray);">Menit Penyajian</div>
                </div>
            </div>
        </div>
    `;
    
    // Create modal content
    const modalHtml = `
        <div class="row">
            <div class="col-md-5">
                <div class="text-center mb-3">
                    <img src="${item.image}" alt="${item.name}" 
                         style="width: 100%; max-height: 250px; object-fit: cover; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                </div>
                ${nutritionHtml}
            </div>
            <div class="col-md-7">
                <h4 style="color: var(--primary); font-weight: 900;">${item.name}</h4>
                <div class="d-flex align-items-center mb-3">
                    <div class="text-warning me-2">
                        ${getStarRating(item.rating)}
                    </div>
                    <span class="me-3" style="font-weight: 600;">${item.rating}</span>
                    <span class="text-muted">(${item.sold || 0} terjual)</span>
                </div>
                
                <p style="color: var(--dark); line-height: 1.6;">${item.description}</p>
                
                <div class="mb-3">
                    <span class="badge" style="background: rgba(0, 26, 18, 0.1); color: var(--primary); font-weight: 600; margin-right: 5px;">
                        <i class="fas fa-${getCategoryIcon(item.category[0])} me-1"></i> ${getCategoryLabel(item.category[0])}
                    </span>
                    ${item.category.slice(1).map(cat => 
                        `<span class="badge bg-light text-dark border me-1" style="font-weight: 500;">
                            <i class="fas fa-${getCategoryIcon(cat)} me-1"></i> ${getCategoryLabel(cat)}
                        </span>`
                    ).join('')}
                </div>
                
                ${ingredientsHtml}
                
                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <div>
                        <h3 style="color: var(--primary); font-weight: 900; margin: 0;">
                            Rp ${item.price.toLocaleString('id-ID')}
                        </h3>
                        ${item.oldPrice ? 
                            `<del style="color: var(--gray); font-size: 1rem;">Rp ${item.oldPrice.toLocaleString('id-ID')}</del>
                             <span class="badge bg-danger ms-2">Hemat ${Math.round((1 - item.price/item.oldPrice) * 100)}%</span>` 
                            : ''}
                    </div>
                    <button class="btn" onclick="addToCart(${item.id}); Swal.close();" 
                            style="background: var(--primary); color: white; font-weight: 700; padding: 10px 25px; border-radius: 8px;">
                        <i class="fas fa-cart-plus me-2"></i> Tambah ke Keranjang
                    </button>
                </div>
            </div>
        </div>
        ${reviewsHtml}
    `;
    
    Swal.fire({
        title: '',
        html: modalHtml,
        width: 900,
        showCloseButton: true,
        showConfirmButton: false,
        customClass: {
            popup: 'rounded-3'
        },
        didOpen: () => {
            // Add custom styling to SweetAlert modal
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
cartToggle.addEventListener('click', toggleCart);

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

cartClose.addEventListener('click', closeCart);

overlay.addEventListener('click', closeCart);

function toggleCart() {
    cartSidebar.classList.add('active');
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeCart() {
    cartSidebar.classList.remove('active');
    overlay.classList.remove('active');
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
    Swal.fire({
        title: 'Login Berhasil!',
        text: `Anda login sebagai ${role}`,
        icon: 'success',
        timer: 2000,
        showConfirmButton: false,
        confirmButtonColor: '#001a12'
    });
    
    setTimeout(() => {
        location.reload();
    }, 2000);
};

// Demo function for adding frequent menu data
window.addDemoFrequentMenus = function() {
    const demoFrequentMenus = [
        { 
            id: 1, 
            count: 5, 
            lastPurchased: new Date(Date.now() - 86400000).toISOString() // 1 day ago
        },
        { 
            id: 2, 
            count: 3, 
            lastPurchased: new Date(Date.now() - 172800000).toISOString() // 2 days ago
        },
        { 
            id: 3, 
            count: 8, 
            lastPurchased: new Date(Date.now() - 259200000).toISOString() // 3 days ago
        },
        { 
            id: 4, 
            count: 2, 
            lastPurchased: new Date(Date.now() - 345600000).toISOString() // 4 days ago
        },
        { 
            id: 7, 
            count: 4, 
            lastPurchased: new Date(Date.now() - 432000000).toISOString() // 5 days ago
        },
        { 
            id: 10, 
            count: 6, 
            lastPurchased: new Date(Date.now() - 86400000).toISOString() // 1 day ago
        }
    ];
    
    localStorage.setItem('kantinSehatFrequentMenus', JSON.stringify(demoFrequentMenus));
    frequentMenus = demoFrequentMenus;
    updateFrequentBadge();
    renderFrequentMenuDropdown();
    
    Swal.fire({
        title: 'Data Demo Ditambahkan!',
        text: 'Data menu sering dibeli telah ditambahkan untuk demo.',
        icon: 'success',
        timer: 2000,
        showConfirmButton: false,
        confirmButtonColor: '#001a12'
    });
};

// Demo function for simulating a purchase
window.simulatePurchase = function() {
    if (cart.length === 0) {
        Swal.fire({
            title: 'Keranjang Kosong!',
            text: 'Tambahkan item ke keranjang terlebih dahulu',
            icon: 'warning',
            confirmButtonColor: '#001a12'
        });
        return;
    }
    
    // Add all items in cart to frequent menus
    cart.forEach(item => {
        addToFrequentMenu(item.id);
    });
    
    // Clear cart
    cart = [];
    updateCart();
    
    Swal.fire({
        title: 'Pembelian Berhasil!',
        text: 'Terima kasih telah berbelanja. Item telah ditambahkan ke riwayat.',
        icon: 'success',
        timer: 3000,
        showConfirmButton: false,
        confirmButtonColor: '#001a12'
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