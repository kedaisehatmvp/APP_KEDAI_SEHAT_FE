 document.addEventListener('DOMContentLoaded', function() {
            const otpBoxes = document.querySelectorAll('.otp-box');
            const fullOtpInput = document.getElementById('fullOtp');
            const verifyBtn = document.getElementById('verifyBtn');
            const resendBtn = document.getElementById('resendBtn');
            const countdownElement = document.getElementById('countdown');
            
            let timer = 300;
            let timerInterval;

            function updateTimer() {
                if (timer <= 0) {
                    clearInterval(timerInterval);
                    countdownElement.textContent = "00:00";
                    countdownElement.classList.add('expired');
                    resendBtn.disabled = false;
                    return;
                }
                
                const minutes = Math.floor(timer / 60);
                const seconds = timer % 60;
                
                countdownElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                
                timer--;
            }

            timerInterval = setInterval(updateTimer, 1000);
            updateTimer();

            otpBoxes[0].focus();

            otpBoxes.forEach((box, index) => {
                box.addEventListener('input', (e) => {
                    const value = e.target.value;
                    
                    if (!/^\d*$/.test(value)) {
                        e.target.value = '';
                        return;
                    }
                    
                    if (value.length === 1 && index < otpBoxes.length - 1) {
                        otpBoxes[index + 1].focus();
                    }
                    
                    updateFullOtp();
                });

                box.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace') {
                        if (box.value === '' && index > 0) {
                            otpBoxes[index - 1].focus();
                            otpBoxes[index - 1].value = '';
                        }
                        setTimeout(() => {
                            updateFullOtp();
                        }, 0);
                    }
                });
            });

            function updateFullOtp() {
                const otp = Array.from(otpBoxes)
                    .map(box => box.value)
                    .join('');
                
                fullOtpInput.value = otp;
                
                verifyBtn.disabled = otp.length !== 6;
            }

            document.getElementById('otpForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const otp = fullOtpInput.value;
                
                if (otp.length !== 6) {
                    return;
                }
                
                this.submit();
            });

            resendBtn.addEventListener('click', function() {
                if (this.disabled) return;
                
                clearInterval(timerInterval);
                timer = 300;
                timerInterval = setInterval(updateTimer, 1000);
                
                this.disabled = true;
                countdownElement.classList.remove('expired');
                
                otpBoxes.forEach(box => {
                    box.value = '';
                });
                updateFullOtp();
                otpBoxes[0].focus();
                
                fetch('/resend-otp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ email: 'kimi.anonteli@example.com' })
                });
            });
        });