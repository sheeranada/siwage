<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404</title>
    <link rel="stylesheet" href="{{ asset('assets/errors/css/style.css') }}" />
    <link href="{{ asset('assets/css/bootstrap5_err.css') }}" rel="stylesheet" crossorigin="anonymous" />
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" type="image/x-icon" />
</head>

<body>
    <div class="wrapper d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-sm">
            <div class="container">
                <a class="navbar-brand" href="/"> NYASAR</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container flex-grow-1 d-flex">
            <div class="row flex-grow-1 w-100">
                <div class="col-6 d-flex flex-column justify-content-center align-items-start ps-3">
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <img src="{{ asset('assets/errors/img/nailong.png') }}" alt="nailong" style="height: 80px" />
                        <h1>WHOOPS !</h1>
                    </div>
                    <p>
                        404, boss! Halaman ini lagi liburan, coba refresh otak atau balik
                        ke homepage dulu.
                    </p>
                </div>

                <div class="col-6 d-flex justify-content-end align-items-center">
                    <img src="{{ asset('assets/errors/img/bakso.png') }}" alt="nailong" class="img-fluid"
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
                        <img src="{{ asset('assets/errors/icon/facebook.svg') }}" alt="fb" class="logo-footer" />
                    </a>
                    <a href="https://www.instagram.com/aditeljuno?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                        target="_blank">
                        <img src="{{ asset('assets/errors/icon/instagram.svg') }}" alt="" class="logo-footer" />
                    </a>
                    <a href="https://wa.me/6282336791287" target="_blank">
                        <img src="{{ asset('assets/errors/icon/whatsapp.svg') }}" alt="" class="logo-footer" />
                    </a>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('assets/js/bootstrap_err.js') }}" crossorigin="anonymous"></script>
</body>

</html>
