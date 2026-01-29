<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>LOGIN</title>

        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />

        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
                <form action="#" method="post">
                    <div class="input-area">
                        <input
                            type="text"
                            id="nisn"
                            name="nisn"
                            class="input-field"
                            placeholder=" "
                            required
                        />
                        <label for="nisn" class="input-label">NISN</label>
                    </div>

                    <button class="btn-login" type="button"><a href="{{route('wizard')}}">Login</a></button>
                </form>
            </div>
        </div>

        <div class="elemen-bottom">
            <img src="{{ asset('assets/img/element.png')}}" alt="Element Dekoratif" class="gambar-bawah" />
        </div>
    </body>
</html>