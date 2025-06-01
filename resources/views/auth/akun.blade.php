@extends('layouts.base')
@section('content')
    <div class="container">
        <h5>Selamat datang, <b>{{ auth()->user()->name }}</b></h5>
        <x-alert />
        <div class="d-flex justify-content-end align-items-center mt-5">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus"></i>
                Akun Baru
            </button>
            <x-modal id="exampleModal" title="Tambah Data Pekerjaan" form-action="{{ route('akun.register') }}" method="POST"
                submit-text="Simpan">
                <x-input name="name" label="Name" type="text" />
                <x-input name="username" label="Username" type="text" />
                <x-input name="password" label="Password" type="password" />
                <x-input name="password_confirmation" label="Password Confirmation" type="password" />
            </x-modal>
        </div>
        <div class="card mt-3 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Profil Pengguna</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label text-muted fw-semibold">Nama</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted fw-semibold">Username</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->username }}" readonly>
                </div>
                <div class="text-end mt-4">
                    <a href="{{ route('akun.show', auth()->user()->id) }}" class="btn btn-outline-primary"
                        data-bs-toggle="modal" data-bs-target="#akun->{{ $data->id }}">
                        <i class="bi bi-pencil-square me-1"></i> Edit Profil
                    </a>
                </div>
                <x-modal id="akun->{{ $data->id }}" title="Edit Akun"
                    form-action="{{ route('akun.update', $data->id) }}" method="PUT">
                    <x-input name="name" label="Name" type="text" value="{{ $data->name }}" />
                    <x-input name="username" label="Username" type="text" value="{{ $data->username }}" />
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password_confirmation" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password Confirmation</label>
                    </div>
                </x-modal>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                let bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 3000); // 3 detik
    </script>
@endsection
