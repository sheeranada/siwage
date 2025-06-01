<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIWAGE | LOGIN</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    <style>
        *,
        html,
        body,
        a,
        h1,
        h2,
        h3,
        h4,
        h5,
        p,
        span {
            margin: 0;
            padding: 0;
        }

        .wrapper {
            background-image: url('asset/img/bg1.jpg');
            background-position: center;
            background-size: cover;
            width: 100vw;
            height: 100dvh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container-form {
            width: 350px;
            height: auto;
            padding: 24px;
            display: flex;
            gap: 18px;
            flex-direction: column;
            background: rgba(255, 255, 255, 0.753);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(6.9px);
            -webkit-backdrop-filter: blur(6.9px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .logo {
            text-align: center;
        }

        .logo img {
            height: 100px;
            margin-bottom: 8px;
        }

        .logo h1 {
            font-weight: 2em;
        }

        .form {
            padding: 12px;
            display: flex;
            flex-direction: column;
        }

        .form h2 {
            font-size: 1.5em;
            font-weight: bold;
        }

        .icon-login {
            height: 18px
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-form">
            <div class="logo">
                <img src="{{ asset('asset/img/gkjw.png') }}" alt="">
                <h1>SIWAGE</h1>
            </div>
            <div class="form">
                <h2>Sign In</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3 mt-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('asset/icon/user.svg') }}" alt="username" class="icon-login">
                            </span>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required
                                autocomplete="username" name="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <img src="{{ asset('asset/icon/key.svg') }}" alt="username" class="icon-login">
                            </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit"
                                class="btn btn-primary w-auto d-flex justify-content-center align-items-center gap-2">
                                <img src="{{ asset('asset/icon/lock.svg') }}" alt="username" class="icon-login">
                                <span>Login</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
