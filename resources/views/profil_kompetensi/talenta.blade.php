@extends('adminlte::page')
@section('title', 'Talenta')
@section('content_header')
    <h1 class="m-0 text-dark">Data Talenta</h1>
@endsection
@section('content')
    <x-card>
        <x-slot name="header">
            <x-modal id="tambahTalenta" btn-label="Tambah Data" action="{{ route('talenta.store') }}" method="POST"
                icon="fa-plus" btn="success">
                <x-form.input name="id" label="Id" value="{{ $talenta->id ?? '' }}" type="text" />
                <x-form.input name="talenta" label="Talenta" value="{{ $talenta->talenta ?? '' }}" type="text" />
            </x-modal>
        </x-slot>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped table-sm">
                <thead>
                    <tr class="text-center">
                        <th scope="col" style="width: 150px">Id</th>
                        <th scope="col">Talenta</th>
                        <th scope="col" style="width: 120px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->talenta }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <div class="edit">
                                        <x-modal id="editTalenta-{{ $item->id }}" btn-label=""
                                            action="{{ route('talenta.update', $item->id) }}" method="PUT" icon="fa-pen"
                                            btn="warning">
                                            <x-form.input name="id" label="Id" value="{{ $item->id ?? '' }}"
                                                type="text" />
                                            <x-form.input name="talenta" label="Talenta" value="{{ $item->talenta ?? '' }}"
                                                type="text" />
                                        </x-modal>
                                    </div>
                                    <div class="delete ml-2">
                                        <form action="{{ route('talenta.delete', $item->id) }}" method="post">
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
