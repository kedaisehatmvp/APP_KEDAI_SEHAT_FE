// Sample data dari pesanan selesai
const completedOrders = [
    {
        id: "TRX001",
        date: "15 Maret 2024",
        items: [
            { id: 1, name: "Salad Sehat Super", price: 25000, image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&h=300&fit=crop" },
            { id: 2, name: "Jus Detox Mix", price: 18000, image: "https://images.unsplash.com/photo-1600271886742-f049cd451bba?w-400&h=300&fit=crop" }
        ]
    },
    {
        id: "TRX003",
        date: "12 Maret 2024",
        items: [
            { id: 3, name: "Paket Diet Sehat", price: 45000, image: "https://images.unsplash.com/photo-1490818387583-1baba5e638af?w=400&h=300&fit=crop" },
            { id: 4, name: "Teh Hijau Organik", price: 18000, image: "https://images.unsplash.com/photo-1561047029-3000c68339ca?w=400&h=300&fit=crop" }
        ]
    }
];


// State variables
let selectedFood = null;
let selectedRating = 0;
let currentStep = 1;

// DOM elements
const foodList = document.getElementById('foodList');
const nextBtn = document.getElementById('nextBtn');
const submitBtn = document.getElementById('submitBtn');
const selectedFoodInfo = document.getElementById('selectedFoodInfo');
const ratingText = document.getElementById('ratingText');
const commentTextarea = document.getElementById('comment');
const charCount = document.getElementById('charCount');
const successMessage = document.getElementById('successMessage');

// Load food items on page load
document.addEventListener('DOMContentLoaded', function() {
    loadFoodItems();
    setupEventListeners();
});

// Load food items from completed orders
function loadFoodItems() {
    let html = '';
    let allFoods = [];
    
    // Ambil semua makanan dari pesanan selesai
    completedOrders.forEach(order => {
        order.items.forEach(item => {
            allFoods.push({
                ...item,
                orderId: order.id,
                orderDate: order.date
            });
        });
    });
    
    // Tampilkan makanan
    if (allFoods.length === 0) {
        html = `
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-utensils fa-3x text-muted mb-3"></i>
                    <h5>Belum ada makanan yang bisa dirating</h5>
                    <p class="text-muted">Anda belum memiliki pesanan yang selesai</p>
                    <button class="btn btn-primary" onclick="window.location.href='/order-history'">
                        Lihat Pesanan
                    </button>
                </div>
            </div>
        `;
    } else {
        allFoods.forEach(food => {
            html += `
                <div class="col-md-4 col-sm-6 mb-3">
                    <div class="food-item" onclick="selectFood(${food.id})" data-food-id="${food.id}">
                        <img src="${food.image}" alt="${food.name}" class="food-img">
                        <div class="food-name">${food.name}</div>
                        <div class="food-price">Rp ${food.price.toLocaleString('id-ID')}</div>
                        <small class="text-muted">Dari pesanan: ${food.orderId}</small>
                    </div>
                </div>
            `;
        });
    }
    
    foodList.innerHTML = html;
}

// Select a food item
function selectFood(foodId) {
    // Remove selected class from all items
    document.querySelectorAll('.food-item').forEach(item => {
        item.classList.remove('selected');
    });
    
    // Add selected class to clicked item
    const selectedItem = document.querySelector(`[data-food-id="${foodId}"]`);
    selectedItem.classList.add('selected');
    
    // Find food data
    let foundFood = null;
    completedOrders.forEach(order => {
        const food = order.items.find(item => item.id === foodId);
        if (food) {
            foundFood = {
                ...food,
                orderId: order.id,
                orderDate: order.date
            };
        }
    });
    
    selectedFood = foundFood;
    nextBtn.disabled = false;
}

// Go to step 2
function goToStep2() {
    if (!selectedFood) return;
    
    currentStep = 2;
    
    // Update UI
    document.getElementById('step1').classList.remove('active');
    document.getElementById('step2').classList.add('active');
    
    // Show selected food info
    selectedFoodInfo.innerHTML = `
        <div class="alert alert-info">
            <div class="d-flex align-items-center">
                <img src="${selectedFood.image}" alt="${selectedFood.name}" 
                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; margin-right: 15px;">
                <div>
                    <strong>${selectedFood.name}</strong><br>
                    <small class="text-muted">Rp ${selectedFood.price.toLocaleString('id-ID')} • ${selectedFood.orderId}</small>
                </div>
            </div>
        </div>
    `;
}

// Back to step 1
function backToStep1() {
    currentStep = 1;
    
    document.getElementById('step2').classList.remove('active');
    document.getElementById('step1').classList.add('active');
    
    // Reset rating
    selectedRating = 0;
    document.querySelectorAll('.star-rating i').forEach(star => {
        star.classList.remove('active', 'fas');
        star.classList.add('far');
    });
    ratingText.textContent = "Belum ada rating";
    document.getElementById('selectedRating').value = "0";
    submitBtn.disabled = true;
}

// Setup event listeners
function setupEventListeners() {
    // Star rating
    document.querySelectorAll('.star-rating i').forEach(star => {
        star.addEventListener('click', function() {
            const rating = parseInt(this.getAttribute('data-rating'));
            setRating(rating);
        });
    });
    
    // Character count for comment
    commentTextarea.addEventListener('input', function() {
        const length = this.value.length;
        charCount.textContent = `${length}/500`;
        
        if (length > 500) {
            this.value = this.value.substring(0, 500);
            charCount.textContent = "500/500";
            charCount.style.color = "#dc3545";
        } else {
            charCount.style.color = "#666";
        }
    });
}

// Set star rating
function setRating(rating) {
    selectedRating = rating;
    document.getElementById('selectedRating').value = rating;
    
    // Update star display
    document.querySelectorAll('.star-rating i').forEach((star, index) => {
        const starNumber = index + 1;
        if (starNumber <= rating) {
            star.classList.remove('far');
            star.classList.add('fas', 'active');
        } else {
            star.classList.remove('fas', 'active');
            star.classList.add('far');
        }
    });
    
    // Update rating text
    const ratingTexts = [
        "Sangat Buruk",
        "Buruk",
        "Cukup",
        "Baik",
        "Sangat Baik"
    ];
    ratingText.textContent = ratingTexts[rating - 1] || "Belum ada rating";
    
    // Enable submit button
    submitBtn.disabled = false;
}

// Submit rating
function submitRating() {
    if (!selectedFood || selectedRating === 0) return;
    
    const comment = commentTextarea.value.trim();
    
    // Simulate API call
    const ratingData = {
        foodId: selectedFood.id,
        foodName: selectedFood.name,
        rating: selectedRating,
        comment: comment,
        orderId: selectedFood.orderId,
        timestamp: new Date().toISOString()
    };
    
    console.log('Rating submitted:', ratingData);
    
    // Show success message
    document.getElementById('step2').classList.remove('active');
    successMessage.classList.remove('d-none');
    
    // Optional: Save to localStorage for demo
    const savedRatings = JSON.parse(localStorage.getItem('foodRatings') || '[]');
    savedRatings.push(ratingData);
    localStorage.setItem('foodRatings', JSON.stringify(savedRatings));
}

// Reset form
function resetForm() {
    // Reset state
    selectedFood = null;
    selectedRating = 0;
    currentStep = 1;
    
    // Reset UI
    successMessage.classList.add('d-none');
    document.getElementById('step1').classList.add('active');
    document.getElementById('step2').classList.remove('active');
    
    // Reset form elements
    document.querySelectorAll('.food-item').forEach(item => {
        item.classList.remove('selected');
    });
    
    nextBtn.disabled = true;
    submitBtn.disabled = true;
    commentTextarea.value = '';
    charCount.textContent = "0/500";
    
    // Reload food items
    loadFoodItems();
}