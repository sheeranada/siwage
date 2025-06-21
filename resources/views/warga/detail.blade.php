@extends('adminlte::page')
@section('title', 'Anggota Keluarga')
@section('content_header')
    <h1 class="m-0 text-dark">Data Keluarga</h1>
@endsection
@section('content')
    <x-card>
        <x-slot name="header">
            <div class="w-100 d-flex justify-content-between align-items-center">
                <div class="judul">
                    <p style="margin: 0;padding: 0;"> Detail Anggota Keluarga:
                        <strong>{{ $kepala->nama ?? 'Nama Tidak Diketahui' }}</strong>
                    </p>
                </div>
                <div class="cetak d-flex">
                    <div class="back">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button>
                    </div>
                    <div class="print ml-2">
                        <a href="{{ route('keluarga.cetakKK', ['kode' => explode('.', $kepala->no_induk)[0]]) }}"
                            target="_blank" class="btn btn-info btn-sm">
                            <i class="fas fa-print"></i> Cetak Kartu Keluarga
                        </a>

                    </div>
                </div>
            </div>
        </x-slot>
        <table class="table table-striped mb-0 table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Induk</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $i => $warga)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $warga->nama }}</td>
                        <td>{{ $warga->no_induk }}</td>
                        <td>{{ $warga->statusKeluarga->status_keluarga ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Tidak ada anggota keluarga ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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
