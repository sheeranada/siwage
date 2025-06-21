@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('title', 'Login - Siwage')

@section('auth_header', 'Login')

@section('auth_body')
    <form action="{{ route('login') }}" method="POST">
        @csrf

        {{-- Username --}}
        <div class="input-group mb-3">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                value="{{ old('username') }}" placeholder="Username" autofocus required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('username')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="form-check mb-3">
            <input type="checkbox" name="remember" id="remember" class="form-check-input"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Remember Me
            </label>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary btn-block">
            <i class="fas fa-sign-in-alt mr-2"></i> Login
        </button>
    </form>
@endsection

@section('auth_footer')
    <p class="my-0">
        Lupa password? <a href="#">Hubungi Admin</a>
    </p>
    <p class="my-1">
        Belum punya akun? <a href="#">Daftar Dulu</a>
    </p>
@endsection
