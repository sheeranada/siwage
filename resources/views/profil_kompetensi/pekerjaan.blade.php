@extends('adminlte::page')
@section('title', 'Pekerjaan')
@section('content_header')
    <h1 class="m-0 text-dark">Data Pekerjaan</h1>
@endsection
@section('content')

    <x-card>
        <x-slot name="header">
            <x-modal id="tambahPekerjaan" btn-label="Tambah Data" action="{{ route('pekerjaan.store') }}" method="POST"
                icon="bi-plus" btn="success">
                <x-form.input name="id" label="Id" value="{{ $pekerjaan->id ?? '' }}" type="text" />
                <x-form.input name="pekerjaan" label="Pekerjaan" value="{{ $pekerjaan->pekerjaan ?? '' }}" type="text" />
            </x-modal>
        </x-slot>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped table-sm align-middle">
                <thead>
                    <tr class="text-center">
                        <th scope="col" style="width: 150px">Id</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col" style="width: 120px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <div class="edit">
                                        <x-modal id="editPekerjaan-{{ $item->id }}" btn-label=""
                                            action="{{ route('pekerjaan.update', $item->id) }}" method="PUT"
                                            icon="fa-pen" btn="warning">
                                            <x-form.input name="id" label="Id" value="{{ $item->id ?? '' }}"
                                                type="text" />
                                            <x-form.input name="pekerjaan" label="Pekerjaan"
                                                value="{{ $item->pekerjaan ?? '' }}" type="text" />
                                        </x-modal>
                                    </div>
                                    <div class="delete ml-2">
                                        <form action="{{ route('pekerjaan.delete', $item->id) }}" method="post">
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
