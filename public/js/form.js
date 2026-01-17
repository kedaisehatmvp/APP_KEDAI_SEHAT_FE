 // Database simulasi
        const databaseSiswa = {
            "1234567890": {
                nama: "Ahmad Rizki",
                kelas: "12",
                jurusan: "RPL",
                telepon: "081234567890",
                email: "ahmad.rizki@sekolah.id"
            },
            "1234567891": {
                nama: "Siti Aisyah",
                kelas: "11",
                jurusan: "RPL",
                telepon: "081234567891",
                email: "siti.aisyah@sekolah.id"
            },
            "1234567892": {
                nama: "Budi Santoso",
                kelas: "10",
                jurusan: "RPL",
                telepon: "081234567892",
                email: "budi.santoso@sekolah.id"
            }
        };
        
        // Elemen DOM
        const nisnInput = document.getElementById('nisn');
        const btnCariNISN = document.getElementById('btnCariNISN');
        const errorAlert = document.getElementById('errorAlert');
        const successAlert = document.getElementById('successAlert');
        
        // Fungsi cari NISN
        function cariNISN() {
            const nisn = nisnInput.value.trim();
            
            // Jika NISN kosong, reset alert dan biarkan form manual
            if (!nisn) {
                errorAlert.classList.add('d-none');
                successAlert.classList.add('d-none');
                resetAutoFields();
                return;
            }
            
            // Validasi format NISN
            if (nisn.length !== 10 || !/^\d+$/.test(nisn)) {
                alert('NISN harus 10 digit angka');
                nisnInput.focus();
                return;
            }
            
            // Reset alert
            errorAlert.classList.add('d-none');
            successAlert.classList.add('d-none');
            
            // Simulasi delay pencarian
            setTimeout(() => {
                if (databaseSiswa[nisn]) {
                    // Data ditemukan
                    const data = databaseSiswa[nisn];
                    
                    // Isi form otomatis
                    document.getElementById('nama').value = data.nama;
                    document.getElementById('kelas').value = data.kelas;
                    document.getElementById('jurusan').value = data.jurusan;
                    document.getElementById('telepon').value = data.telepon;
                    document.getElementById('email').value = data.email || '';
                    
                    // Tampilkan success alert
                    successAlert.classList.remove('d-none');
                    
                    // Auto-focus ke status
                    document.getElementById('status').focus();
                } else {
                    // Data tidak ditemukan
                    errorAlert.classList.remove('d-none');
                    
                    // Reset field yang otomatis
                    resetAutoFields();
                }
            }, 500);
        }
        
        // Fungsi reset field otomatis
        function resetAutoFields() {
            document.getElementById('nama').value = '';
            document.getElementById('kelas').value = '';
            document.getElementById('jurusan').value = '';
            document.getElementById('telepon').value = '';
            document.getElementById('email').value = '';
        }
        
        // Event Listeners
        btnCariNISN.addEventListener('click', cariNISN);
        
        nisnInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                cariNISN();
            }
        });
        
        // Validasi form submit
        document.getElementById('formTambahPelanggan').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Ambil data dari form
            const data = {
                nisn: nisnInput.value.trim(),
                nama: document.getElementById('nama').value.trim(),
                kelas: document.getElementById('kelas').value.trim(),
                jurusan: document.getElementById('jurusan').value.trim(),
                telepon: document.getElementById('telepon').value.trim(),
                email: document.getElementById('email').value.trim(),
                status: document.getElementById('status').value,
                hargaTerakhir: document.getElementById('hargaTerakhir').value,
                catatan: document.getElementById('catatan').value.trim()
            };
            
            // Validasi data wajib
            if (!data.nama || !data.kelas || !data.jurusan || !data.telepon || !data.status) {
                alert('Harap lengkapi semua field yang wajib diisi');
                return;
            }
            
            console.log('Data yang akan disimpan:', data);
            
            // Tampilkan konfirmasi
            if (confirm('Simpan data pelanggan ini?')) {
                alert('Data pelanggan berhasil disimpan!');
                window.location.href = 'index.html';
            }
        });