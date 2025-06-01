@extends('layouts.base')
@section('content')
    {{-- tambah data --}}
    <div class="form-tambah d-flex flex-col justify-content-end align-items-center mb-3 gap-4 h-100">
        <x-alert />
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-plus"></i>
            Data Talenta
        </button>
        <x-modal id="exampleModal" title="Tambah Data Talenta" form-action="{{ route('talenta.store') }}" method="POST"
            submit-text="Simpan">
            <div class="mb-3">
                <label for="talenta" class="form-label">Talenta</label>
                <input type="text" name="talenta" class="form-control" required>
            </div>
        </x-modal>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="text-center">
                    <th style="width: 80px">#</th>
                    <th>Talenta</th>
                    <th style="width: 180px">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->talenta }}</td>
                        <td class="">
                            {{-- edit --}}
                            <div class="opsi d-flex justify-content-center align-items-center gap-2">
                                <div class="update">
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#talenta-{{ $item->id }}">
                                        <i class="fas fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                    <x-modal id="talenta-{{ $item->id }}" title="Tambah Data Talenta"
                                        form-action="{{ route('talenta.update', $item->id) }}" method="PUT"
                                        submit-text="Update">
                                        <div class="mb-3">
                                            <label for="talenta" class="form-label">Talenta</label>
                                            <input type="text" name="talenta" class="form-control"
                                                value="{{ $item->talenta }}" required>
                                        </div>
                                    </x-modal>
                                </div>
                                {{-- delete --}}
                                <div class="delete">
                                    <form action="{{ route('talenta.destroy', $item->id) }}" method="POST"
                                        style="display:inline-block;" class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-arrow-up"></i>
                                            Hapus</button>
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
