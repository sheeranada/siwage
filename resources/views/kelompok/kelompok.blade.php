@extends('adminlte::page')
@section('title', 'Kelompok')
@section('content_header')
    <h1 class="m-0 text-dark">Data Kelompok</h1>
@endsection
@section('content')
    <x-card>
        <x-slot name="header">
            <x-modal id="tambahKelompok" btn-label="Tambah Data" action="{{ route('kelompok.store') }}" method="POST"
                icon="fa-plus" btn="success">
                <x-form.input name="kode_kelompok" label="Kode Kelompok" value="{{ $kelompok->kode_kelompok ?? '' }}"
                    type="text" />
                <x-form.input name="nama_kelompok" label="Nama Kelompok" value="{{ $kelompok->nama_kelompok ?? '' }}"
                    type="text" />
                <x-form.select name="area" label="Pilih Area">
                    <option selected value disabled>Pilih...</option>
                    <option value="wilayah">Wilayah</option>
                    <option value="induk">Induk</option>
                    <option value="cajem">Cajem</option>
                </x-form.select>
            </x-modal>
        </x-slot>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped table-sm">
                <thead>
                    <tr class="text-center">
                        <th scope="col" style="width: 150px">Kode Kelompok</th>
                        <th scope="col">Nama Kelompok</th>
                        <th scope="col">Area</th>
                        <th scope="col" style="width: 120px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->kode_kelompok }}</td>
                            <td>{{ $item->nama_kelompok }}</td>
                            <td>{{ $item->area }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="edit">
                                        <x-modal id="tambahKelompok-{{ $item->kode_kelompok }}" btn-label=""
                                            action="{{ route('kelompok.update', $item->kode_kelompok) }}" method="PUT"
                                            icon="fa-pen" btn="warning">
                                            <x-form.input name="kode_kelompok" label="Kode Kelompok"
                                                value="{{ $item->kode_kelompok ?? '' }}" type="text" />
                                            <x-form.input name="nama_kelompok" label="Nama Kelompok"
                                                value="{{ $item->nama_kelompok ?? '' }}" type="text" />
                                            <x-form.select name="area" label="Pilih Area">
                                                <option selected value="{{ $item->area }}">{{ $item->area }}</option>
                                                <option value="wilayah">Wilayah</option>
                                                <option value="induk">Induk</option>
                                                <option value="cajem">Cajem</option>
                                            </x-form.select>
                                        </x-modal>
                                    </div>
                                    <div class="delete ml-2">
                                        <form action="{{ route('kelompok.delete', $item->kode_kelompok) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger show_confirm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="paginasi-halaman">
            {{ $data->links('pagination::bootstrap-5') }}
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
