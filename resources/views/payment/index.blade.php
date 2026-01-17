<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Bayar Makan - Kantin Sehat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-toko d-flex align-items-center">
                    <div class="logo-toko me-3">
                        <img src="{{ asset('images/ks-h.png') }}" alt="Logo Kantin Sehat" class="logo-kantin">
                    </div>
                    <div>
                        <h2 class="mb-1 fw-bold">Kantin Sehat</h2>
                        <p class="text-muted mb-0">
                            <i class="bx bx-time me-1"></i> Siap 15-25 menit
                            <i class="bx bx-store-alt me-1 ms-2"></i> Takeaway / Antar
                        </p>
                    </div>
                </div>

                <div class="kartu-pesanan">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">Ringkasan Pesanan</h5>
                        <span class="badge bg-light text-dark">3 item</span>
                    </div>

                    <div class="item-makanan d-flex justify-content-between">
                        <div>
                            <div class="nama-item">Nasi Goreng Spesial</div>
                            <div class="catatan-item">Bawang + Telur</div>
                        </div>
                        <div class="harga-item">Rp 28.000</div>
                    </div>

                    <div class="item-makanan d-flex justify-content-between">
                        <div>
                            <div class="nama-item">Es Teh Manis</div>
                            <div class="catatan-item">Ukuran sedang</div>
                        </div>
                        <div class="harga-item">Rp 6.000</div>
                    </div>

                    <div class="item-makanan d-flex justify-content-between">
                        <div>
                            <div class="nama-item">Kerupuk</div>
                            <div class="catatan-item">Tambahan</div>
                        </div>
                        <div class="harga-item">Rp 2.000</div>
                    </div>

                    <div class="item-makanan d-flex justify-content-between">
                        <div class="nama-item">Biaya Antar</div>
                        <div class="harga-item">Rp 4.000</div>
                    </div>

                    <div class="total-bayar d-flex justify-content-between mt-3 pt-3">
                        <span>Total Bayar</span>
                        <span>Rp 40.000</span>
                    </div>
                </div>

                <!-- FORM untuk menyimpan data pemilihan -->
                <form id="orderForm" method="POST" action="/donepay">
                    @csrf
                    
                    <!-- Hidden inputs untuk menyimpan pilihan -->
                    <input type="hidden" name="delivery_method" id="deliveryMethod" value="">
                    <input type="hidden" name="delivery_floor" id="deliveryFloor" value="">
                    <input type="hidden" name="delivery_time" id="deliveryTime" value="">
                    <input type="hidden" name="payment_method" id="paymentMethod" value="">
                    
                    <div class="kartu-terima">
                        <h5 class="fw-bold mb-3">Metode penerimaan pesanan</h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="metode-terima" data-tipe="antar" onclick="pilihMetodeTerima('antar')">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-terima me-3">
                                            <i class='bx bx-package me-1'></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-1">
                                                <i class='bx bx-package me-1'></i>Di Antar
                                            </h6>
                                            <p class="text-muted small mb-0" id="antar-text">Pilih lantai dan waktu pengantaran</p>
                                            <div id="pilihan-terpilih-display" class="jam-terpilih" style="display: none;"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Container untuk pilihan lantai -->
                                    <div class="jam-antar-container" id="lantai-container" style="display: none;">
                                        <p class="mb-2 fw-semibold">
                                            <i class='bx bx-building me-1'></i> Pilih Lantai:
                                        </p>
                                        <div class="jam-antar-option" data-lantai="1" onclick="pilihLantai('1', event)">
                                            <i class='bx bx-building-house me-2'></i> Lantai 1
                                        </div>
                                        <div class="jam-antar-option" data-lantai="2" onclick="pilihLantai('2', event)">
                                            <i class='bx bx-building-house me-2'></i> Lantai 2
                                        </div>
                                        <div class="jam-antar-option" data-lantai="3" onclick="pilihLantai('3', event)">
                                            <i class='bx bx-building-house me-2'></i> Lantai 3
                                        </div>
                                    </div>
                                    
                                    <!-- Container untuk pilihan waktu -->
                                    <div class="jam-antar-container" id="waktu-container" style="display: none;">
                                        <p class="mb-2 fw-semibold">
                                            <i class='bx bx-time me-1'></i> Pilih Waktu:
                                        </p>
                                        <div class="jam-antar-option" data-waktu="1" onclick="pilihWaktu('1', event)">
                                            <i class='bx bx-time-five me-2'></i> Istirahat ke-1 (pertama)
                                        </div>
                                        <div class="jam-antar-option" data-waktu="2" onclick="pilihWaktu('2', event)">
                                            <i class='bx bx-time-five me-2'></i> Istirahat ke-2 (kedua)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="metode-terima" data-tipe="takeaway" onclick="pilihMetodeTerima('takeaway')">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-terima me-3">
                                            <i class='bx bx-store'></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">Takeaway</h6>
                                            <p class="text-muted small mb-0">Ambil makanannya saat istirahat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kartu-bayar">
                        <h5 class="fw-bold mb-3">Pilih Cara Bayar</h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="metode-bayar" data-tipe="qris" onclick="pilihMetodeBayar('qris')">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-bayar me-3">
                                            <i class="bx bx-qr-scan"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">QRIS (Scan QR)</h6>
                                            <p class="text-muted small mb-0">Bayar pake GoPay, OVO, Dana, dll</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="metode-bayar" data-tipe="cod" onclick="pilihMetodeBayar('cod')">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-bayar me-3">
                                            <i class="bx bx-money"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">COD (Bayar di Tempat)</h6>
                                            <p class="text-muted small mb-0">Bayar cash pas makanan nyampe</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="metode-bayar" data-tipe="bank" onclick="pilihMetodeBayar('bank')">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-bayar me-3">
                                            <i class="bx bx-building-house"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">Transfer Bank</h6>
                                            <p class="text-muted small mb-0">Transfer ke rekening Kantin Sehat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="metode-bayar" data-tipe="ewallet" onclick="pilihMetodeBayar('ewallet')">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-bayar me-3">
                                            <i class="bx bx-credit-card"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1">E-Wallet</h6>
                                            <p class="text-muted small mb-0">Bayar pake GoPay, OVO, LinkAja</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <div class="panel-detail">
                    <h5 class="fw-bold mb-3">Detail Pembayaran</h5>

                    <div class="area-detail" id="area-detail">
                        <i class="bx bx-wallet text-muted mb-3" style="font-size: 48px"></i>
                        <p class="mb-2">Pilih metode pembayaran dulu ya!</p>
                        <p class="text-muted small">Klik salah satu cara bayar di sebelah kiri</p>
                    </div>

                    <!-- tombol untuk bayar -->
                    <button class="tombol-utama mt-3" id="tombol-bayar" onclick="submitForm()" disabled>
                        Pilih Cara Bayar Dulu
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="bar-bawah">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-muted small">Total</div>
                    <div class="fw-bold fs-5">Rp 40.000</div>
                </div>
                <!-- tombol untuk mobile -->
                <button class="tombol-utama" id="tombol-mobile" style="width: auto; padding: 10px 20px" onclick="submitForm()" disabled>
                    Pilih Cara Bayar Dulu
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/payment.js') }}"></script>
</body>
</html>