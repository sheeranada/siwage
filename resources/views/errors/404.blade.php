<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404</title>
    <link rel="shortcut icon" href="{{ asset('asset/img/favicon.ico') }}" type="image/x-icon" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        *,
        html,
        a,
        h1,
        h2,
        h3,
        h4,
        h5,
        p,
        body {
            margin: 0;
            padding: 0;
            text-decoration: none;
            color: black;
        }

        .wrapper {
            background-image: url('/asset/img/bg.jpg');
            background-size: cover;
            background-position: center;
            width: 100%;
            min-height: 100vh;
        }


        main h1 {
            font-size: 3.5em;
            font-weight: bold;
            text-shadow: 2px 3px 3px rgba(0, 0, 0, 0.144);
        }

        main p {
            font-size: 1em;
        }

        .logo-footer {
            height: 18px;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

</head>

<body>
    <div class="wrapper d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"> NYASAR</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container flex-grow-1 d-flex">
            <div class="row flex-grow-1 w-100">
                <div class="col-6 d-flex flex-column justify-content-center align-items-start ps-3">
                    <div class="d-flex justify-content-end align-items-center gap-2 mb-3">
                        <img src="{{ asset('asset/img/nailong.png') }}" alt="nailong" style="height: 70px" />
                        <h1>WHOOPS !</h1>
                    </div>
                    <p>
                        404, boss! Halaman ini lagi liburan, coba refresh otak atau balik
                        ke homepage dulu.
                    </p>
                </div>

                <div class="col-6 d-flex justify-content-end align-items-center">
                    <img src="{{ asset('asset/img/bakso.png') }}" alt="nailong" class="img-fluid"
                        style="max-height: 75vh; width: auto" loading="lazy" />
                </div>
            </div>
        </main>
        <footer class="bg-light text-white p-2 mt-auto">
            <div class="container text-center d-flex justify-content-between align-items-center">
                <div class="c text-secondary">
                    Copyright © 2025 Sheeranada | Dibuat dengan passion & kopi ☕ | Keep
                    it real!
                </div>
                <div class="sosmed d-flex justify-content-between gap-5">
                    <a href="https://web.facebook.com/adit.eljuno/" target="_blank">
                        <img src="/asset/icon/facebook.svg" alt="fb" class="logo-footer" />
                    </a>
                    <a href="https://www.instagram.com/aditeljuno?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                        target="_blank">
                        <img src="/asset/icon/instagram.svg" alt="" class="logo-footer" />
                    </a>
                    <a href="https://wa.me/6282336791287" target="_blank">
                        <img src="/asset/icon/whatsapp.svg" alt="" class="logo-footer" />
                    </a>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>
