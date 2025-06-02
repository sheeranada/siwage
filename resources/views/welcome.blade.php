<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIWAGE</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a {
            color: black;
            text-decoration: none;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            overflow: auto;
            /* biar bisa scroll kalau perlu */
        }

        /* WRAPPER */
        .wrapper {
            height: 100vh;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr;
            grid-auto-rows: auto 4fr;
            grid-template-areas:
                "header"
                "logo";
            gap: 12px;

            background: linear-gradient(120deg,
                    #ff4e00,
                    #ffa500,
                    #ffff00,
                    #fff1cc,
                    #ffa500,
                    #ff4e00);
            background-size: 500% 500%;
            animation: fireGlow 8s ease-in-out infinite;

            position: relative;
            z-index: 0;
            /* default z-index */
            overflow: hidden;
        }

        /* EFek Blur Glow */
        .wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            filter: blur(40px);
            opacity: 0.4;
            z-index: -1;
            /* penting! biar nggak nutupin konten */
            animation: fireGlow 8s ease-in-out infinite;
        }

        @keyframes fireGlow {
            0% {
                background-position: 0% 50%;
            }

            25% {
                background-position: 50% 60%;
            }

            50% {
                background-position: 100% 50%;
            }

            75% {
                background-position: 50% 40%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        header {
            grid-area: header;
            display: flex;
            justify-content: end;
            align-items: center;
            padding: 1em 2em;
            z-index: 1;
            /* kasih z-index lebih tinggi biar selalu di atas */
        }

        header a {
            font-size: 1.2em;
            font-weight: 700;
        }

        header a:hover {
            color: red;
        }

        .logo {
            grid-area: logo;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .logo img {
            height: 300px;
            padding: 8px;
            margin-bottom: 12px;
        }

        .logo h1 {
            text-shadow: 2px 3px 4px rgba(0, 0, 0, 0.322);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header>
            @if (auth()->check())
                <a href="{{ route('home') }}" style="margin-right: 15px;">Home</a>

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif

        </header>
        <div class="logo">
            <img src="{{ asset('asset/img/gkjw.png') }}" alt="">
            <h1>SIWAGE</h1>
        </div>
    </div>
</body>

</html>
