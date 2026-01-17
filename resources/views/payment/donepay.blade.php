<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pembayaran Berhasil - Kantin Sehat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/donepay.css') }}">
</head>

<body>

<div class="success-container">

    <div class="success-icon">
        <i class='bx bx-check-circle'></i>
    </div>

    <div class="success-title">
        <h1>Pesanan Berhasil!</h1>
        <p>Terima kasih telah melakukan pembayaran. Pesanan Anda sedang diproses.</p>
    </div>

 

<div class="order-details">

    <div class="kelas-info">
        <h3>Charles</h3>
        <h3>X</h3>
        <h3>RPL</h3>
    </div>

    <div>
        <div class="detail-label">
            <i class='bx bx-package'></i>Metode Penerimaan
        </div>
        <div class="detail-value">Di Antar</div>
    </div>

    <div>
        <div class="detail-label">
            <i class='bx bx-credit-card'></i>Metode Pembayaran
        </div>
        <div class="detail-value">QRIS</div>
    </div>

    <div>
        <div class="detail-label">
            <i class='bx bx-receipt'></i>Detail Pesanan
        </div>
        <div class="items-list">
            <div class="item-row"><span>Nasi Goreng</span><span>28.000</span></div>
            <div class="item-row"><span>Es Teh</span><span>6.000</span></div>
            <div class="item-row"><span>Kerupuk</span><span>2.000</span></div>
        </div>
    </div>

</div>


    <div class="total-section">
        <div class="total-row">
            <span class="total-label">Total Pembayaran</span>
            <span class="total-price">Rp 40.000</span>
        </div>
    </div>

    <div class="action-buttons">
        <a href="#" class="btn btn-primary">
            <i class='bx bx-home'></i>Kembali ke Utama
        </a>
        <button onclick="window.print()" class="btn btn-outline">
            <i class='bx bx-printer'></i>Cetak
        </button>
        <a href="{{ route('menu') }}" class="btn btn-light">
            <i class='bx bx-cart'></i>Pesan Lagi
        </a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/donepay.js')}}"></script>

</body>
</html>
