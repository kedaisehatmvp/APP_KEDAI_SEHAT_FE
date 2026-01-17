<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login - Kantin Sehat</title>

        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/datalogin.css') }}">
    </head>

    <body>
        <div class="wrap-page">
            <div class="brand-title">
                <img
                    src="{{ asset('images/logo-kantin-sehat.png') }}"
                    alt="Logo Kantin Sehat"
                    class="logo-kantin"
                />
                <h1>Kantin Sehat</h1>
            </div>

            <div class="card-box">
                <div class="data-found-box">
                    <div class="data-title">Data Ditemukan</div>
                    
                    <div class="data-row">
                        <div class="data-label">NISN</div>
                        <div class="data-value">2425112233</div>
                    </div>
                    
                    <div class="data-row">
                        <div class="data-label">Nama Lengkap</div>
                        <div class="data-value">Lewis Hamilton</div>
                    </div>
                    
                    <div class="data-row">
                        <div class="data-label">No. Telepon</div>
                        <div class="data-value">0812111122223333</div>
                    </div>
                    
                    <div class="data-row">
                        <div class="data-label">Kelas</div>
                        <div class="data-value">XI</div>
                    </div>
                    
                    <div class="data-row">
                        <div class="data-label">Jurusan</div>
                        <div class="data-value">Rekayasa Perangkat Lunak</div>
                    </div>
                </div>

                <form action="#" method="post">
                    <div class="input-area">
                        <input
                            type="text"
                            id="email"
                            name="email"
                            class="input-field"
                            placeholder=" "
                            required
                        />
                        <label for="email" class="input-label">Email Aktif</label>
                    </div>

                    <button type="submit" class="btn-login"><a href="{{route('verif')}}">Verifikasi Email</a></button>
                </form>
            </div>
        </div>

        <!-- Elemen Gambar Bawah -->
        <div class="elemen-bottom">
            <img src="{{ asset('assets/img/element.png') }}" alt="Element Dekoratif" class="gambar-bawah" />
        </div>
    </body>
</html>