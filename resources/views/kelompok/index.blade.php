@extends('layouts.base')
@section('content')
    {{-- tambah data --}}
    <div class="form-tambah d-flex flex-col justify-content-end align-items-center mb-3 gap-4 h-100">
        <x-alert />
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-plus"></i>
            Data Kelompok
        </button>
        <x-modal id="exampleModal" title="Tambah Data Kelompok" form-action="{{ route('kelompok.store') }}" method="POST"
            submit-text="Simpan">
            <x-input name="nama" label="Nama Kelompok" type="text" />
            <div class="row">
                <div class="col-4">
                    <x-input name="kode_kelompok" label="Kode Kelompok (00-99)" type="text" />
                </div>
                <div class="col-8">
                    <div class="form-floating">
                        <select class="form-select" id="area" aria-label="Floating label select example" name="area"
                            required>
                            <option selected value disabled>Pilih ...</option>
                            <option value="induk">Induk</option>
                            <option value="wilayah">Wilayah</option>
                        </select>
                        <label for="area">Pilih Wilayah / Area</label>
                    </div>
                </div>
            </div>

        </x-modal>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="text-center">
                    <th style="width: 80px">#</th>
                    <th style="width: 180px">Kode Kelompok</th>
                    <th>Nama Kelompok</th>
                    <th>Area</th>
                    <th style="width: 180px">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->kode_kelompok }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->area }}</td>
                        <td class="">
                            {{-- edit --}}
                            <div class="opsi d-flex justify-content-center align-items-center gap-2">
                                <div class="update">
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#kelompok-{{ $item->id }}">
                                        <i class="fas fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                    <x-modal id="kelompok-{{ $item->id }}" title="Tambah Data Talenta"
                                        form-action="{{ route('kelompok.update', $item->id) }}" method="PUT"
                                        submit-text="Update">
                                        {{-- nama --}}
                                        <x-input name="nama" label="Kode Kelompok" type="text"
                                            value="{{ $item->nama }}" />
                                        <div class="row">
                                            {{-- kode --}}
                                            <div class="col-4">
                                                <x-input name="kode_kelompok" label="Kode Kelompok (00-99)" type="text"
                                                    value="{{ $item->kode_kelompok }}" />
                                            </div>
                                            {{-- area --}}
                                            <div class="col-8">
                                                <div class="form-floating">
                                                    <select class="form-select" id="area"
                                                        aria-label="Floating label select example" name="area" required>
                                                        <option selected value="{{ $item->area }}">{{ $item->area }}
                                                        </option>
                                                        <option value="induk">Induk</option>
                                                        <option value="wilayah">Wilayah</option>
                                                    </select>
                                                    <label for="area">Pilih Wilayah / Area</label>
                                                </div>
                                            </div>
                                        </div>
                                    </x-modal>
                                </div>
                                {{-- delete --}}
                                <div class="delete">
                                    <form action="{{ route('kelompok.destroy', $item->id) }}" method="POST"
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
