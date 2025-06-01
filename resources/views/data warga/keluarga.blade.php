@extends('layouts.base')
@section('content')
    {{-- tambah data --}}
    <div class="form-tambah d-flex flex-col justify-content-end align-items-center mb-3 gap-4 h-100">
        <x-alert />
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-plus"></i>
            Data Keluarga
        </button>
        <x-modal id="exampleModal" title="Tambah Data Keluarga" form-action="{{ route('keluarga.store') }}" method="POST"
            submit-text="Simpan">
            <div class="row">
                {{-- kode kk --}}
                <div class="col">
                    <x-input name="kode_kk" type="text" label="Kode KK (000-999)" />
                </div>
                {{-- wilayah --}}
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" id="kelompok_id" aria-label="Floating label select example"
                            name="kelompok_id" required>
                            <option selected disabled value>Pilih Kelompok</option>
                            @foreach ($kelompok as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <label for="area">Pilih Wilayah / Area</label>
                    </div>
                </div>
            </div>
            {{-- catatan --}}
            <x-input name="catatan" type="text" label="Catatan (isi dengan ' - ' jika tidak ada)" />
        </x-modal>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="text-center">
                    <th style="width: 80px">#</th>
                    <th>Kode KK</th>
                    <th>kelompok</th>
                    <th>Catatan</th>
                    <th style="width: 280px">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->kode_kk }}</td>
                        <td>{{ $item->kelompok->nama }}</td>
                        <td>{{ $item->catatan }}</td>
                        <td class="">
                            {{-- edit --}}
                            <div class="opsi d-flex justify-content-center align-items-center gap-2">
                                <div class="detail">


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#warga-{{ $item->id }}">
                                        <i class="fas fa-eye"></i> List Warga
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="warga-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="warga-{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="warga-{{ $item->id }}Label">Modal
                                                        title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered table-sm mb-0">
                                                        <thead class="table-light">
                                                            <tr class="text-center">
                                                                <th>No</th>
                                                                <th>No Induk</th>
                                                                <th>Nama</th>
                                                                <th>Status Keluarga</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (isset($wargasGrouped[$item->kodeKeluarga]) && count($wargasGrouped[$item->kodeKeluarga]) > 0)
                                                                @foreach ($wargasGrouped[$item->kodeKeluarga] as $index => $warga)
                                                                    <tr>
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td>{{ $warga->no_induk }}</td>
                                                                        <td>{{ $warga->nama }}</td>
                                                                        <td>{{ $warga->statusKeluarga->status_keluarga }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="4" class="text-center text-muted">Tidak
                                                                        ada warga
                                                                        ditemukan</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <div class="update">
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#keluarga-{{ $item->id }}">
                                        <i class="fas fa-pen-to-square"></i>
                                        Edit
                                    </button>
                                    <x-modal id="keluarga-{{ $item->id }}" title="Tambah Data Talenta"
                                        form-action="{{ route('keluarga.update', $item->id) }}" method="PUT"
                                        submit-text="Update">
                                        <div class="row">
                                            {{-- kode kk --}}
                                            <div class="col">
                                                <x-input name="kode_kk" type="text" label="Kode KK (000-999)"
                                                    value="{{ $item->kode_kk }}" />
                                            </div>
                                            {{-- wilayah --}}
                                            <div class="col">
                                                <div class="form-floating">
                                                    <select class="form-select" id="kelompok_id"
                                                        aria-label="Floating label select example" name="kelompok_id"
                                                        required>
                                                        <option selected value="{{ $item->kelompok->id }}">
                                                            {{ $item->kelompok->nama }}</option>
                                                        @foreach ($kelompok as $itemKelompok)
                                                            <option value="{{ $itemKelompok->id }}"
                                                                {{ $itemKelompok->id == $item->kelompok_id ? 'selected' : '' }}>
                                                                {{ $itemKelompok->nama }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    <label for="area">Pilih Wilayah / Area</label>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- catatan --}}
                                        <x-input name="catatan" type="text"
                                            label="Catatan (isi dengan ' - ' jika tidak ada)"
                                            value="{{ $item->catatan }}" />
                                    </x-modal>
                                </div>
                                {{-- delete --}}
                                <div class="delete">
                                    <form action="{{ route('keluarga.destroy', $item->id) }}" method="POST"
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
