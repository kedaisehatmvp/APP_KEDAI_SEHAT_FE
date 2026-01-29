class VerificationWizard {
    constructor() {
        this.currentStep = 1;
        this.totalSteps = 4;
        this.formData = {};
        this.init();
    }

    init() {
        this.updateProgress();
        this.setupEventListeners();
        this.startOTPTimer();
    }

    updateProgress() {
        // Update step completion
        document.querySelectorAll('.step').forEach((step, index) => {
            const stepNumber = index + 1;
            const stepCircle = step.querySelector('.step-circle');
            
            if (stepNumber < this.currentStep) {
                step.classList.add('completed', 'active');
            } else if (stepNumber === this.currentStep) {
                step.classList.add('active');
                step.classList.remove('completed');
            } else {
                step.classList.remove('active', 'completed');
            }
        });

        // Update connectors
        document.querySelectorAll('.step-connector').forEach((connector, index) => {
            const stepNumber = index + 1;
            if (stepNumber < this.currentStep) {
                connector.classList.add('active');
                if (stepNumber < this.currentStep - 1) {
                    connector.classList.add('completed');
                } else {
                    connector.classList.remove('completed');
                }
            } else {
                connector.classList.remove('active', 'completed');
            }
        });

        // Animate step completion
        if (this.currentStep > 1) {
            const prevStep = document.querySelector(`.step:nth-child(${(this.currentStep - 1) * 2 - 1})`);
            if (prevStep && !prevStep.classList.contains('completed')) {
                prevStep.classList.add('completed');
                
                // Animate checkmark
                const checkmark = prevStep.querySelector('.step-icon');
                if (checkmark) {
                    checkmark.style.animation = 'checkmark 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
                    setTimeout(() => {
                        checkmark.style.animation = '';
                    }, 500);
                }
            }
        }

        // Update step content with animation
        document.querySelectorAll('.step-content').forEach(content => {
            const step = parseInt(content.dataset.step);
            if (step === this.currentStep) {
                setTimeout(() => {
                    content.classList.add('active');
                }, 10);
            } else {
                content.classList.remove('active');
            }
        });

        // Smooth scroll to top of form
        const formCard = document.querySelector('.form-card');
        if (formCard) {
            formCard.scrollTop = 0;
        }
    }

    validateCurrentStep() {
        const currentContent = document.querySelector(`.step-content[data-step="${this.currentStep}"]`);
        const inputs = currentContent.querySelectorAll('input[required]');
        let isValid = true;
        
        for (const input of inputs) {
            this.clearError(input);
            
            if (!input.value.trim()) {
                this.showError(input, 'Field ini wajib diisi');
                isValid = false;
                continue;
            }
            
            if (input.name === 'pin_confirmation') {
                const pin = document.querySelector('input[name="pin"]').value;
                if (input.value !== pin) {
                    this.showError(input, 'PIN tidak cocok');
                    isValid = false;
                }
            }
            
            if (input.pattern) {
                const regex = new RegExp(input.pattern);
                if (!regex.test(input.value)) {
                    this.showError(input, 'Format tidak valid');
                    isValid = false;
                }
            }
        }
        
        return isValid;
    }

    showError(input, message) {
        input.classList.add('error');
        
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        errorDiv.style.cssText = `
            color: #d32f2f;
            font-size: 12px;
            margin-top: 5px;
            animation: slideIn 0.3s ease;
        `;
        
        input.parentNode.appendChild(errorDiv);
        
        // Focus on first error
        if (input === input.parentNode.parentNode.querySelector('.error')) {
            input.focus();
        }
    }

    clearError(input) {
        input.classList.remove('error');
        const existingError = input.parentNode.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }
    }

    saveFormData() {
        const currentContent = document.querySelector(`.step-content[data-step="${this.currentStep}"]`);
        const inputs = currentContent.querySelectorAll('input');
        
        inputs.forEach(input => {
            this.formData[input.name] = input.value;
        });
        
        // Save to localStorage for persistence
        localStorage.setItem('verificationData', JSON.stringify(this.formData));
    }

    loadFormData() {
        const savedData = localStorage.getItem('verificationData');
        if (savedData) {
            this.formData = JSON.parse(savedData);
            
            // Populate form fields
            Object.keys(this.formData).forEach(name => {
                const input = document.querySelector(`[name="${name}"]`);
                if (input) {
                    input.value = this.formData[name];
                    
                    // Trigger label animation
                    if (input.value) {
                        const event = new Event('input');
                        input.dispatchEvent(event);
                    }
                }
            });
        }
    }

    togglePinVisibility() {
        const pinInput = document.getElementById('pinInput');
        const toggleBtn = document.getElementById('togglePinBtn');
        const icon = toggleBtn.querySelector('i');
        
        if (pinInput.type === 'password') {
            pinInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
            toggleBtn.classList.add('active');
            
            // Animation
            icon.style.animation = 'iconPulse 0.3s ease';
            setTimeout(() => {
                icon.style.animation = '';
            }, 300);
        } else {
            pinInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
            toggleBtn.classList.remove('active');
        }
        
        // Focus kembali ke input
        pinInput.focus();
    }

    nextStep() {
        if (this.validateCurrentStep()) {
            this.saveFormData();
            
            if (this.currentStep < this.totalSteps) {
                this.currentStep++;
                this.updateProgress();
            }
        }
    }

    prevStep() {
        if (this.currentStep > 1) {
            this.currentStep--;
            this.updateProgress();
        }
    }

    startOTPTimer() {
        const countdownElement = document.getElementById('countdown');
        const resendButton = document.getElementById('resendOtp');
        
        if (!countdownElement || !resendButton) return;
        
        let timeLeft = 60;
        
        const timer = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = timeLeft;
            
            if (timeLeft <= 0) {
                clearInterval(timer);
                resendButton.disabled = false;
                resendButton.textContent = 'Kirim Ulang OTP';
                countdownElement.parentElement.style.display = 'none';
            }
        }, 1000);
        
        resendButton.addEventListener('click', () => {
            if (!resendButton.disabled) {
                // Reset timer
                timeLeft = 60;
                countdownElement.textContent = timeLeft;
                resendButton.disabled = true;
                countdownElement.parentElement.style.display = 'block';
                
                // Show loading
                resendButton.classList.add('loading');
                
                // Simulate API call
                setTimeout(() => {
                    resendButton.classList.remove('loading');
                    alert('OTP telah dikirim ulang ke nomor Anda');
                    this.startOTPTimer();
                }, 1500);
            }
        });
    }

    setupEventListeners() {
        // Auto-save on input
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('input', () => {
                this.clearError(input);
                this.saveFormData();
                
                // Add valid class
                if (input.value.trim() && input.checkValidity()) {
                    input.classList.add('valid');
                } else {
                    input.classList.remove('valid');
                }
            });
            
            // Real-time PIN matching
            if (input.name === 'pin' || input.name === 'pin_confirmation') {
                input.addEventListener('input', () => {
                    const pin = document.querySelector('input[name="pin"]');
                    const pinConfirm = document.querySelector('input[name="pin_confirmation"]');
                    
                    if (pin.value && pinConfirm.value) {
                        if (pin.value === pinConfirm.value) {
                            pin.classList.add('valid');
                            pinConfirm.classList.add('valid');
                            this.clearError(pinConfirm);
                        } else {
                            pin.classList.remove('valid');
                            pinConfirm.classList.remove('valid');
                        }
                    }
                });
            }
        });

        // Toggle PIN visibility
        const togglePinBtn = document.getElementById('togglePinBtn');
        if (togglePinBtn) {
            togglePinBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.togglePinVisibility();
            });
            
            // Optional: Toggle with Enter key when focused
            togglePinBtn.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.togglePinVisibility();
                }
            });
        }

        // Form submission
        document.getElementById('verificationForm').addEventListener('submit', (e) => {
            e.preventDefault();
            
            if (this.currentStep === this.totalSteps && this.validateCurrentStep()) {
                const submitBtn = document.querySelector('.btn-submit');
                const originalText = submitBtn.textContent;
                
                submitBtn.textContent = 'Memverifikasi...';
                submitBtn.disabled = true;
                submitBtn.classList.add('loading');
                
                // Simulate API call
                setTimeout(() => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('loading');
                    
                    // Clear localStorage
                    localStorage.removeItem('verificationData');
                    
                    // Show success and redirect
                    alert('Verifikasi berhasil! Anda akan diarahkan ke verifikasi.');
                    setTimeout(() => {
                        window.location.href = '/verif';
                    }, 1500);
                }, 2000);
            }
        });

        // Auto-format phone number
        const phoneInput = document.querySelector('input[name="no_hp"]');
        if (phoneInput) {
            phoneInput.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, '');
                if (value.startsWith('0')) {
                    value = value.substring(1);
                }
                if (value.length > 0) {
                    value = '08' + value;
                }
                e.target.value = value.substring(0, 15);
            });
        }

        // Load saved data on page load
        window.addEventListener('load', () => {
            this.loadFormData();
        });

        // Prevent body scroll
        document.addEventListener('touchmove', (e) => {
            if (e.target.closest('.form-group')) {
                return;
            }
            e.preventDefault();
        }, { passive: false });
    }
}

// Initialize wizard
document.addEventListener('DOMContentLoaded', () => {
    const wizard = new VerificationWizard();
    
    // Global functions for buttons
    window.nextStep = () => wizard.nextStep();
    window.prevStep = () => wizard.prevStep();
    
    // Prevent zoom on mobile
    document.addEventListener('touchstart', (e) => {
        if (e.touches.length > 1) {
            e.preventDefault();
        }
    }, { passive: false });
});

// Add validation styles
const style = document.createElement('style');
style.textContent = `
    .input-field.error {
        border-color: #d32f2f !important;
        background: #ffebee !important;
        animation: shake 0.3s ease;
    }
    
    .input-field.valid {
        border-color: #2e7d32 !important;
        background: #e8f5e9 !important;
    }
    
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    
    @keyframes checkmark {
        0% {
            transform: scale(0);
            opacity: 0;
        }
        50% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-5px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes iconPulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
        }
    }
    
    .step-circle {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .step-connector {
        transition: all 0.4s ease;
    }
`;
document.head.appendChild(style);