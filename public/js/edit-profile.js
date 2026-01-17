        // Load user data
        document.addEventListener('DOMContentLoaded', function() {
            loadUserData();
            
            // Set current year in footer
            const yearElement = document.querySelector('.copyright p');
            if (yearElement) {
                const currentYear = new Date().getFullYear();
                yearElement.innerHTML = yearElement.innerHTML.replace('2024', currentYear);
            }
            
            // Form submission
            document.getElementById('editProfileForm').addEventListener('submit', function(e) {
                e.preventDefault();
                saveProfile();
            });
        });
        
        // Load user data into form
        function loadUserData() {
            const userData = JSON.parse(localStorage.getItem('kantinSehatUser') || '{}');
            
            if (userData) {
                // Split name into first and last
                const nameParts = (userData.name || '').split(' ');
                document.getElementById('firstName').value = nameParts[0] || '';
                document.getElementById('lastName').value = nameParts.slice(1).join(' ') || '';
                
                // Fill other fields
                document.getElementById('email').value = userData.email || '';
                document.getElementById('phone').value = userData.phone || '';
                document.getElementById('address').value = userData.address || '';
                document.getElementById('birthDate').value = userData.birthDate || '';
                document.getElementById('gender').value = userData.gender || '';
                document.getElementById('class').value = userData.class || '';
                document.getElementById('major').value = userData.major || '';
                document.getElementById('bio').value = userData.bio || '';
                
                // Set avatar preview
                const avatarPreview = document.getElementById('avatarPreview');
                if (userData.avatar) {
                    avatarPreview.src = userData.avatar;
                } else if (userData.name) {
                    avatarPreview.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(userData.name)}&background=28a745&color=fff&size=150`;
                }
            }
        }
        
        // Preview avatar
        function previewAvatar() {
            const input = document.getElementById('avatarInput');
            const preview = document.getElementById('avatarPreview');
            
            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Validate file size (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    Swal.fire({
                        title: 'File Terlalu Besar',
                        text: 'Ukuran file maksimal 2MB',
                        icon: 'error'
                    });
                    return;
                }
                
                // Validate file type
                if (!file.type.match('image.*')) {
                    Swal.fire({
                        title: 'Format Tidak Didukung',
                        text: 'Hanya file gambar yang diperbolehkan',
                        icon: 'error'
                    });
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                
                reader.readAsDataURL(file);
            }
        }
        
        // Save profile
        function saveProfile() {
            // Collect form data
            const firstName = document.getElementById('firstName').value.trim();
            const lastName = document.getElementById('lastName').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const address = document.getElementById('address').value.trim();
            const birthDate = document.getElementById('birthDate').value;
            const gender = document.getElementById('gender').value;
            const userClass = document.getElementById('class').value;
            const major = document.getElementById('major').value.trim();
            const bio = document.getElementById('bio').value.trim();
            
            // Validation
            if (!firstName || !lastName) {
                Swal.fire({
                    title: 'Perhatian',
                    text: 'Nama depan dan belakang harus diisi',
                    icon: 'warning'
                });
                return;
            }
            
            if (!email) {
                Swal.fire({
                    title: 'Perhatian',
                    text: 'Email harus diisi',
                    icon: 'warning'
                });
                return;
            }
            
            // Get existing user data
            const userData = JSON.parse(localStorage.getItem('kantinSehatUser') || '{}');
            
            // Update user data
            const updatedUser = {
                ...userData,
                name: `${firstName} ${lastName}`.trim(),
                email: email,
                phone: phone,
                address: address,
                birthDate: birthDate,
                gender: gender,
                class: userClass,
                major: major,
                bio: bio,
                updatedAt: new Date().toISOString()
            };
            
            // Update avatar if changed
            const avatarInput = document.getElementById('avatarInput');
            if (avatarInput.files && avatarInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    updatedUser.avatar = e.target.result;
                    saveToStorage(updatedUser);
                };
                reader.readAsDataURL(avatarInput.files[0]);
            } else {
                saveToStorage(updatedUser);
            }
        }
        
        // Save to storage and redirect
        function saveToStorage(userData) {
            // Save to localStorage
            localStorage.setItem('kantinSehatUser', JSON.stringify(userData));
            
            // Show success message
            Swal.fire({
                title: 'Berhasil!',
                text: 'Profile berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                // Redirect to profile page
                window.location.href = '/pembeli/profile';
            });
        }