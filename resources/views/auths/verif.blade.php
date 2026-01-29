<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi OTP - Kantin Sehat</title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/verif.css') }}">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="info-box">
                <div class="info-title">Verifikasi Nomor</div>
                
                <div class="email-box">
                    <span class="email">081266557788</span>
                </div>
                
                <p class="info-text">
                    Masukkan <span>6 digit kode OTP</span> yang kami kirim ke email Anda.
                    Kode ini berlaku selama <span>5 menit</span>.
                </p>
            </div>

            <form id="otpForm">
                <div class="otp-container">
                    <label class="otp-label">Kode OTP</label>
                    <div class="otp-inputs">
                        <input type="text" class="otp-box" maxlength="1" data-index="1" autocomplete="off">
                        <input type="text" class="otp-box" maxlength="1" data-index="2" autocomplete="off">
                        <input type="text" class="otp-box" maxlength="1" data-index="3" autocomplete="off">
                        <input type="text" class="otp-box" maxlength="1" data-index="4" autocomplete="off">
                        <input type="text" class="otp-box" maxlength="1" data-index="5" autocomplete="off">
                        <input type="text" class="otp-box" maxlength="1" data-index="6" autocomplete="off">
                    </div>
                </div>

                <input type="hidden" id="fullOtp" name="otp">

                <div class="timer-box">
                    <p class="timer-text">Kode akan kadaluarsa dalam:</p>
                    <div class="timer" id="countdown">05:00</div>
                </div>

                <button type="submit" class="btn-verify" id="verifyBtn" disabled>
                    Verifikasi OTP
                </button>

                <div class="resend-box">
                    <p class="resend-text">Tidak menerima kode?</p>
                    <button type="button" class="btn-resend" id="resendBtn" disabled>
                        Kirim Ulang OTP
                    </button>
                </div>
            </form>

            <a href="{{ route('wizard') }}" class="back-link">
                Kembali ke Sebelumnya
            </a>
        </div>
    </div>

    <!-- Elemen Gambar Bawah -->
    <div class="elemen-bottom">
        <img src="{{ asset('assets/img/element.png') }}" alt="Element Dekoratif" class="gambar-bawah" />
    </div>

    <script src="{{ asset('js/verif.js') }}"></script>
</body>
</html>