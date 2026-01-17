// Data untuk detail pembayaran
        const detailMetode = {
            qris: `
                <div class="animasi-muncul text-center">
                    <h5 class="fw-bold mb-3">Scan QR Code Ini</h5>
                    <div class="qr-code">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=KantinSehat-Rp40000-Order123&format=png&color=000000&bgcolor=ffffff&margin=10" alt="QR Code">
                    </div>
                    <button class="tombol-download" onclick="downloadQR()">
                        <i class='bx bx-download'></i> Download QR Code
                    </button>
                    <p class="mt-3 text-muted">Buka aplikasi e-wallet, pilih scan QR, dan arahkan ke gambar ini</p>
                    <div class="d-flex gap-2 justify-content-center mt-2">
                        <span class="badge bg-light text-dark">GoPay</span>
                        <span class="badge bg-light text-dark">OVO</span>
                        <span class="badge bg-light text-dark">Dana</span>
                        <span class="badge bg-light text-dark">ShopeePay</span>
                    </div>
                </div>
            `,

            cod: `
                <div class="animasi-muncul">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-bayar me-3">
                            <i class='bx bx-money'></i>
                        </div>
                        <h5 class="fw-bold mb-0">Bayar di Tempat (COD)</h5>
                    </div>
                    <p class="text-start">Siapkan uang pas saat kurir datang:</p>
                    <div class="bg-light p-3 rounded mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total:</span>
                            <strong>Rp 40.000</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Biaya COD:</span>
                            <strong>Rp 0</strong>
                        </div>
                    </div>
                    <div class="alert alert-warning small text-start">
                        <i class='bx bx-info-circle me-1'></i>
                        Pastikan nomor HP aktif supaya kurir bisa hubungi saat antar pesanan
                    </div>
                </div>
            `,

            bank: `
                <div class="animasi-muncul">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-bayar me-3">
                            <i class='bx bx-building-house'></i>
                        </div>
                        <h5 class="fw-bold mb-0">Transfer Bank</h5>
                    </div>
                    <div class="text-start">
                        <p class="mb-3">Transfer ke rekening di bawah:</p>
                        
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Bank:</span>
                                    <strong>BCA</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">No. Rekening:</span>
                                    <strong>1234 5678 9012</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Atas Nama:</span>
                                    <strong>KANTIN SEHAT</strong>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-info small">
                            <i class='bx bx-info-circle me-1'></i>
                            Transfer tepat <strong>Rp 40.000</strong> dan upload bukti transfer
                        </div>
                    </div>
                </div>
            `,

            ewallet: `
                <div class="animasi-muncul">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-bayar me-3">
                            <i class='bx bx-credit-card'></i>
                        </div>
                        <h5 class="fw-bold mb-0">Bayar dengan E-Wallet</h5>
                    </div>
                    <p class="mb-3">Pilih e-wallet yang akan digunakan:</p>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <div class="ewallet-option" data-ewallet="gopay" onclick="pilihEwallet('gopay')">
                                <div class="ewallet-logo mb-2">
                                    <img src="{{ asset('images/Gopay_logo.svg') }}" alt="GoPay">
                                </div>
                                <div class="fw-semibold">GoPay</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="ewallet-option" data-ewallet="ovo" onclick="pilihEwallet('ovo')">
                                <div class="ewallet-logo mb-2">
                                    <img src="{{ asset('images/Logo_ovo_purple.svg') }}" alt="OVO">
                                </div>
                                <div class="fw-semibold">OVO</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="ewallet-option" data-ewallet="dana" onclick="pilihEwallet('dana')">
                                <div class="ewallet-logo mb-2">
                                    <img src="{{ asset('images/Logo_dana_blue.svg') }}" alt="Dana">
                                </div>
                                <div class="fw-semibold">Dana</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="ewallet-option" data-ewallet="linkaja" onclick="pilihEwallet('linkaja')">
                                <div class="ewallet-logo mb-2">
                                    <img src="{{ asset('images/LinkAja.svg') }}" alt="LinkAja">
                                </div>
                                <div class="fw-semibold">LinkAja</div>
                            </div>
                        </div>
                    </div>
                    
                    <p class="text-muted small">Anda akan dialihkan ke aplikasi e-wallet yang dipilih</p>
                </div>
            `
        };

        // Teks tombol untuk tiap metode
        const textTombol = {
            qris: "Bayar dengan QRIS",
            cod: "Konfirmasi Pesanan COD",
            bank: "Saya Sudah Transfer",
            ewallet: "Bayar dengan E-Wallet"
        };

        // Ambil semua elemen yang perlu
        const semuaMetode = document.querySelectorAll(".metode-bayar");
        const semuaMetodeTerima = document.querySelectorAll(".metode-terima");
        const areaDetail = document.getElementById("area-detail");
        const tombolBayar = document.getElementById("tombol-bayar");
        const tombolMobile = document.getElementById("tombol-mobile");
        const lantaiContainer = document.getElementById("lantai-container");
        const waktuContainer = document.getElementById("waktu-container");
        const antarText = document.getElementById("antar-text");
        const pilihanTerpilihDisplay = document.getElementById("pilihan-terpilih-display");
        
        // State untuk menyimpan pilihan
        let metodeTerimaAktif = null;
        let lantaiAktif = null;
        let waktuAktif = null;
        let metodeBayarAktif = null;
        let ewalletAktif = null;

        // Fungsi untuk memilih metode penerimaan
        function pilihMetodeTerima(tipe) {
            // Reset semua metode terima
            semuaMetodeTerima.forEach((m) => {
                m.classList.remove("aktif");
            });
            
            // Aktifkan yang dipilih
            event.currentTarget.classList.add("aktif");
            
            // Simpan pilihan
            metodeTerimaAktif = tipe;
            document.getElementById('deliveryMethod').value = tipe;
            
            // Tampilkan pilihan lantai jika memilih "antar"
            if (tipe === 'antar') {
                lantaiContainer.style.display = 'block';
                waktuContainer.style.display = 'none';
                antarText.textContent = 'Pilih lantai dan waktu pengantaran';
                pilihanTerpilihDisplay.style.display = 'none';
                
                // Reset pilihan sebelumnya jika ada
                lantaiAktif = null;
                waktuAktif = null;
                document.getElementById('deliveryFloor').value = '';
                document.getElementById('deliveryTime').value = '';
                
                // Reset semua pilihan
                document.querySelectorAll('.jam-antar-option').forEach((option) => {
                    option.classList.remove("aktif");
                });
            } else {
                lantaiContainer.style.display = 'none';
                waktuContainer.style.display = 'none';
                antarText.textContent = 'Ambil makanannya saat istirahat';
                pilihanTerpilihDisplay.style.display = 'none';
                document.getElementById('deliveryFloor').value = '';
                document.getElementById('deliveryTime').value = '';
                lantaiAktif = null;
                waktuAktif = null;
            }
            
            // Periksa kelengkapan pilihan
            periksaKelengkapan();
        }

        // Fungsi untuk memilih lantai
        function pilihLantai(lantai, e) {
            e.stopPropagation(); // Prevent triggering parent onclick
            
            // Reset semua pilihan lantai
            document.querySelectorAll('.jam-antar-option[data-lantai]').forEach((option) => {
                option.classList.remove("aktif");
            });
            
            // Aktifkan yang dipilih
            e.currentTarget.classList.add("aktif");
            
            // Simpan pilihan
            lantaiAktif = lantai;
            document.getElementById('deliveryFloor').value = lantai;
            
            // Tampilkan pilihan waktu setelah lantai dipilih
            waktuContainer.style.display = 'block';
            
            // Jika sudah ada pilihan waktu sebelumnya, aktifkan
            if (waktuAktif) {
                const waktuOption = document.querySelector(`.jam-antar-option[data-waktu="${waktuAktif}"]`);
                if (waktuOption) {
                    waktuOption.classList.add('aktif');
                }
            }
            
            // Update tampilan
            updatePilihanDisplay();
            
            // Periksa kelengkapan pilihan
            periksaKelengkapan();
        }

        // Fungsi untuk memilih waktu
        function pilihWaktu(waktu, e) {
            e.stopPropagation(); // Prevent triggering parent onclick
            
            // Reset semua pilihan waktu
            document.querySelectorAll('.jam-antar-option[data-waktu]').forEach((option) => {
                option.classList.remove("aktif");
            });
            
            // Aktifkan yang dipilih
            e.currentTarget.classList.add("aktif");
            
            // Simpan pilihan
            waktuAktif = waktu;
            document.getElementById('deliveryTime').value = waktu;
            
            // Update tampilan
            updatePilihanDisplay();
            
            // Periksa kelengkapan pilihan
            periksaKelengkapan();
        }
        
        // Fungsi untuk update tampilan pilihan yang terpilih
        function updatePilihanDisplay() {
            if (lantaiAktif && waktuAktif) {
                const lantaiText = `Lantai ${lantaiAktif}`;
                const waktuText = `Istirahat ke-${waktuAktif}`;
                pilihanTerpilihDisplay.innerHTML = `<i class='bx bx-check-circle me-1'></i> ${lantaiText} - ${waktuText}`;
                pilihanTerpilihDisplay.style.display = 'block';
                antarText.textContent = 'Lantai dan waktu sudah dipilih';
            } else if (lantaiAktif) {
                pilihanTerpilihDisplay.innerHTML = `<i class='bx bx-building-house me-1'></i> Lantai ${lantaiAktif} terpilih`;
                pilihanTerpilihDisplay.style.display = 'block';
                antarText.textContent = 'Pilih waktu pengantaran';
            } else {
                pilihanTerpilihDisplay.style.display = 'none';
            }
        }

        // Fungsi untuk memilih metode pembayaran
        function pilihMetodeBayar(tipe) {
            // Reset semua metode bayar
            semuaMetode.forEach((m) => {
                m.classList.remove("aktif");
            });
            
            // Aktifkan yang dipilih
            event.currentTarget.classList.add("aktif");
            
            // Simpan pilihan
            metodeBayarAktif = tipe;
            document.getElementById('paymentMethod').value = tipe;
            
            // Tampilkan detail pembayaran sesuai metode
            areaDetail.innerHTML = detailMetode[tipe];
            
            // Jika metode ewallet, reset pilihan ewallet sebelumnya
            if (tipe === 'ewallet') {
                ewalletAktif = null;
            }
            
            // Update teks tombol
            tombolBayar.textContent = textTombol[tipe];
            tombolMobile.textContent = textTombol[tipe];
            
            // Periksa kelengkapan pilihan
            periksaKelengkapan();
            
            // Jika di mobile, scroll ke detail
            if (window.innerWidth <= 768) {
                areaDetail.scrollIntoView({ behavior: "smooth", block: "center" });
            }
        }

        // Fungsi untuk memilih ewallet
        function pilihEwallet(ewallet) {
            // Reset semua ewallet
            document.querySelectorAll('.ewallet-option').forEach((option) => {
                option.style.borderColor = '#e9ecef';
                option.style.backgroundColor = '';
            });
            
            // Aktifkan yang dipilih
            event.currentTarget.style.borderColor = 'var(--primary)';
            event.currentTarget.style.backgroundColor = 'var(--hijau-muda)';
            
            // Simpan pilihan
            ewalletAktif = ewallet;
        }

        // Fungsi untuk memeriksa kelengkapan pilihan
        function periksaKelengkapan() {
            // Untuk takeaway, lantai dan waktu boleh null
            const metodeTerimaValid = metodeTerimaAktif !== null;
            const lantaiValid = metodeTerimaAktif !== 'antar' || lantaiAktif !== null;
            const waktuValid = metodeTerimaAktif !== 'antar' || waktuAktif !== null;
            const metodeBayarValid = metodeBayarAktif !== null;
            
            const semuaValid = metodeTerimaValid && lantaiValid && waktuValid && metodeBayarValid;
            
            // Aktifkan tombol jika semua sudah dipilih
            tombolBayar.disabled = !semuaValid;
            tombolMobile.disabled = !semuaValid;
            
            // Update teks tombol jika metode bayar sudah dipilih
            if (metodeBayarAktif && !tombolBayar.disabled) {
                tombolBayar.textContent = textTombol[metodeBayarAktif];
                tombolMobile.textContent = textTombol[metodeBayarAktif];
            }
        }

        // Fungsi untuk download QR code
        function downloadQR() {
            const qrImg = document.querySelector('.qr-code img');
            const link = document.createElement('a');
            link.href = qrImg.src;
            link.download = 'qris-kantin-sehat.png';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // Fungsi untuk submit form
        function submitForm() {
            // Validasi
            if (!metodeTerimaAktif) {
                alert('Silakan pilih metode penerimaan pesanan');
                return;
            }
            
            // Validasi khusus untuk antar
            if (metodeTerimaAktif === 'antar') {
                if (!lantaiAktif) {
                    alert('Silakan pilih lantai pengantaran');
                    return;
                }
                if (!waktuAktif) {
                    alert('Silakan pilih waktu pengantaran');
                    return;
                }
            }
            
            if (!metodeBayarAktif) {
                alert('Silakan pilih metode pembayaran');
                return;
            }
            
            // Validasi khusus untuk ewallet
            if (metodeBayarAktif === 'ewallet' && !ewalletAktif) {
                alert('Silakan pilih e-wallet yang akan digunakan');
                return;
            }
            
            // Tampilkan loading
            tombolBayar.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Memproses...';
            tombolBayar.disabled = true;
            
            if (tombolMobile) {
                tombolMobile.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Memproses...';
                tombolMobile.disabled = true;
            }
            
            // Submit form
            setTimeout(() => {
                document.getElementById('orderForm').submit();
            }, 1000);
        }

        // Fungsi untuk inisialisasi
        function init() {
            // Reset semua state
            metodeTerimaAktif = null;
            lantaiAktif = null;
            waktuAktif = null;
            metodeBayarAktif = null;
            ewalletAktif = null;
            
            // Reset semua input hidden
            document.getElementById('deliveryMethod').value = '';
            document.getElementById('deliveryFloor').value = '';
            document.getElementById('deliveryTime').value = '';
            document.getElementById('paymentMethod').value = '';
            
            // Reset tampilan
            lantaiContainer.style.display = 'none';
            waktuContainer.style.display = 'none';
            pilihanTerpilihDisplay.style.display = 'none';
        }

        // Jalankan inisialisasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', init);