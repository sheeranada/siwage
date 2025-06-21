@extends('adminlte::page')

@section('title', 'Manajemen User')

@section('content_header')
    <h1>Manajemen User</h1>
@endsection

@section('content')
    <x-card>

        {{-- Modal Tambah User --}}
        <x-modal id="tambahUser" btn-label="Tambah User" icon="fa-plus" btn="primary" action="{{ route('users.store') }}"
            method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username <span class="text-danger">*</span></label>
                <input type="text" name="username" id="username"
                    class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password <span class="text-danger">*</span></label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    required>
            </div>
        </x-modal>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-sm">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td class="text-center">
                                @if (auth()->id() === $user->id)
                                    <div class="d-flex justify-content-center flex-wrap">

                                        {{-- Modal Edit Profil --}}
                                        <div class="mr-1 mb-1">
                                            <x-modal id="editProfil-{{ $user->id }}" btn-label="" icon="fa-user-edit"
                                                btn="warning" action="{{ route('users.updateSelf') }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label for="name">Nama Lengkap <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name"
                                                        value="{{ old('name', $user->name) }}"
                                                        class="form-control @error('name') is-invalid @enderror" required>
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="username">Username <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="username"
                                                        value="{{ old('username', $user->username) }}"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        required>
                                                    @error('username')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </x-modal>
                                        </div>

                                        {{-- Modal Ganti Password --}}
                                        <div class="mr-1 mb-1">
                                            <x-modal id="ubahPassword-{{ $user->id }}" btn-label="" icon="fa-key"
                                                btn="secondary" action="{{ route('users.updatePassword') }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label for="current_password">Password Lama <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" name="current_password"
                                                        class="form-control @error('current_password') is-invalid @enderror"
                                                        required>
                                                    @error('current_password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="new_password">Password Baru <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" name="new_password"
                                                        class="form-control @error('new_password') is-invalid @enderror"
                                                        required>
                                                    @error('new_password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="new_password_confirmation">Konfirmasi Password Baru <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" name="new_password_confirmation"
                                                        class="form-control" required>
                                                </div>
                                            </x-modal>
                                        </div>

                                        {{-- Hapus Akun --}}
                                        <div class="mb-1">
                                            <form action="{{ route('users.destroySelf') }}" method="POST"
                                                class="hapus-akun-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger show_confirm"
                                                    title="Hapus Akun">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                @else
                                    <span class="text-muted">Tidak bisa edit</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </x-card>
@endsection
@section('css')
    @vite(['resources/css/app.css'])
@endsection

@section('js')
    <script>
        window.successMessage = {!! json_encode(session('success')) !!};
        window.validationErrors = {!! json_encode($errors->all()) !!};
    </script>

    @vite(['resources/js/app.js'])
@endsection
