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

// Problem types
const problemTypes = [
    { id: 1, name: "Rasa Tidak Sesuai", icon: "fa-meh", description: "Rasa makanan tidak seperti biasanya" },
    { id: 2, name: "Kualitas Bahan", icon: "fa-leaf", description: "Bahan terlihat/tidak segar" },
    { id: 3, name: "Porsi Tidak Sesuai", icon: "fa-weight", description: "Porsi lebih kecil dari biasanya" },
    { id: 4, name: "Kebersihan", icon: "fa-broom", description: "Ada benda asing/kotoran" },
    { id: 5, name: "Pengemasan", icon: "fa-box", description: "Kemasan rusak/pecah" },
    { id: 6, name: "Lainnya", icon: "fa-ellipsis-h", description: "Masalah lainnya" }
];

// State variables
let selectedFood = null;
let selectedProblemType = null;
let uploadedFile = null;
let currentStep = 1;

// DOM elements
const foodList = document.getElementById('foodList');
const nextBtn = document.getElementById('nextBtn');
const submitBtn = document.getElementById('submitBtn');
const selectedFoodInfo = document.getElementById('selectedFoodInfo');
const problemTypesContainer = document.getElementById('problemTypes');
const descriptionTextarea = document.getElementById('problemDescription');
const charCount = document.getElementById('charCount');
const filePreview = document.getElementById('filePreview');
const successMessage = document.getElementById('successMessage');

// Load food items on page load
document.addEventListener('DOMContentLoaded', function() {
    loadFoodItems();
    loadProblemTypes();
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
                    <h5>Belum ada makanan yang bisa dilaporkan</h5>
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

// Load problem types
function loadProblemTypes() {
    let html = '';
    
    problemTypes.forEach(problem => {
        html += `
            <div class="col-md-6">
                <div class="problem-type-option" onclick="selectProblemType(${problem.id})" data-problem-id="${problem.id}">
                    <div class="d-flex align-items-center">
                        <div class="problem-icon">
                            <i class="fas ${problem.icon}"></i>
                        </div>
                        <div>
                            <div class="fw-bold">${problem.name}</div>
                            <small class="text-muted">${problem.description}</small>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });
    
    problemTypesContainer.innerHTML = html;
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

// Select problem type
function selectProblemType(problemId) {
    // Remove selected class from all items
    document.querySelectorAll('.problem-type-option').forEach(item => {
        item.classList.remove('selected');
    });
    
    // Add selected class to clicked item
    const selectedItem = document.querySelector(`[data-problem-id="${problemId}"]`);
    selectedItem.classList.add('selected');
    
    selectedProblemType = problemTypes.find(p => p.id === problemId);
    
    // Enable submit button if description is filled
    checkSubmitButton();
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
        <div class="alert alert-danger">
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
    
    // Reset problem type
    selectedProblemType = null;
    document.querySelectorAll('.problem-type-option').forEach(item => {
        item.classList.remove('selected');
    });
    
    // Reset description
    descriptionTextarea.value = '';
    charCount.textContent = "0/1000";
    
    // Reset file upload
    uploadedFile = null;
    filePreview.innerHTML = '';
    
    submitBtn.disabled = true;
}

// Setup event listeners
function setupEventListeners() {
    // Character count for description
    descriptionTextarea.addEventListener('input', function() {
        const length = this.value.length;
        charCount.textContent = `${length}/1000`;
        
        if (length > 1000) {
            this.value = this.value.substring(0, 1000);
            charCount.textContent = "1000/1000";
            charCount.style.color = "#dc3545";
        } else {
            charCount.style.color = "#666";
        }
        
        checkSubmitButton();
    });
}

// Handle file upload
function handleFileUpload(input) {
    const file = input.files[0];
    
    if (!file) return;
    
    // Check file size (max 5MB)
    if (file.size > 5 * 1024 * 1024) {
        alert('File terlalu besar. Maksimal 5MB.');
        input.value = '';
        return;
    }
    
    // Check file type
    if (!file.type.match('image.*')) {
        alert('Hanya file gambar yang diizinkan.');
        input.value = '';
        return;
    }
    
    uploadedFile = file;
    
    // Show preview
    const reader = new FileReader();
    reader.onload = function(e) {
        filePreview.innerHTML = `
            <div class="file-preview">
                <img src="${e.target.result}" alt="Preview">
                <div>
                    <strong>${file.name}</strong><br>
                    <small>${(file.size / 1024).toFixed(1)} KB</small>
                </div>
                <div class="remove-file" onclick="removeFile()">
                    <i class="fas fa-times"></i>
                </div>
            </div>
        `;
    };
    reader.readAsDataURL(file);
}

// Remove uploaded file
function removeFile() {
    uploadedFile = null;
    filePreview.innerHTML = '';
    document.getElementById('fileInput').value = '';
}

// Check if submit button should be enabled
function checkSubmitButton() {
    const description = descriptionTextarea.value.trim();
    submitBtn.disabled = !(selectedProblemType && description.length >= 10);
}

// Submit report
function submitReport() {
    if (!selectedFood || !selectedProblemType) return;
    
    const description = descriptionTextarea.value.trim();
    
    if (description.length < 10) {
        alert('Deskripsi masalah minimal 10 karakter.');
        return;
    }
    
    // Simulate API call
    const reportData = {
        foodId: selectedFood.id,
        foodName: selectedFood.name,
        problemType: selectedProblemType.name,
        problemTypeId: selectedProblemType.id,
        description: description,
        orderId: selectedFood.orderId,
        hasAttachment: !!uploadedFile,
        timestamp: new Date().toISOString()
    };
    
    console.log('Report submitted:', reportData);
    
    // Show success message
    document.getElementById('step2').classList.remove('active');
    successMessage.classList.remove('d-none');
    
    // Optional: Save to localStorage for demo
    const savedReports = JSON.parse(localStorage.getItem('foodReports') || '[]');
    savedReports.push(reportData);
    localStorage.setItem('foodReports', JSON.stringify(savedReports));
}

// Reset form
function resetForm() {
    // Reset state
    selectedFood = null;
    selectedProblemType = null;
    uploadedFile = null;
    currentStep = 1;
    
    // Reset UI
    successMessage.classList.add('d-none');
    document.getElementById('step1').classList.add('active');
    document.getElementById('step2').classList.remove('active');
    
    // Reset form elements
    document.querySelectorAll('.food-item').forEach(item => {
        item.classList.remove('selected');
    });
    
    document.querySelectorAll('.problem-type-option').forEach(item => {
        item.classList.remove('selected');
    });
    
    nextBtn.disabled = true;
    submitBtn.disabled = true;
    descriptionTextarea.value = '';
    charCount.textContent = "0/1000";
    filePreview.innerHTML = '';
    document.getElementById('fileInput').value = '';
    
    // Reload food items
    loadFoodItems();
}