@extends('layouts.base')
@section('content')
    {{-- tambah data --}}
    <div class="d-flex align-items-center justify-content-end mb-3 gap-2">
        <x-alert />
        <a href="{{ route('cetak.warga') }}" type="button" class="btn btn-info">
            <i class="fas fa-print"></i>
            Cetak </a>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahWarga">
            <i class="fas fa-plus"></i>
            Tambah Warga
        </button>
        <x-modal-lg id="tambahWarga" title="Form Tambah Data Warga" formAction="{{ route('warga.store') }}" method="POST"
            submitText="Simpan">
            @include('data warga.inputWarga')
        </x-modal-lg>
    </div>

    {{-- tambah data --}}
    {{-- data tables responsive --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped table-sm display responsive nowrap " id="myTable"
            width="100%">
            <thead>
                <tr class="text-center">
                    <th style="width: 80px">#</th>
                    <th>No Induk</th>
                    <th>Kelompok</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Status Warga</th>
                    <th>Status Nikah</th>
                    <th>Talenta dimiliki</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Pekerjaan</th>
                    <th>Status Keluarga</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Tempat, Tanggal Baptis</th>
                    <th>Tempat, Tanggal Sidhi</th>
                    <th>Tempat, Tanggal Menikah</th>
                    <th style="width: 180px">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->no_induk }}</td>
                        <td>{{ $item->keluarga->kelompok->nama }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jk }}</td>
                        <td>{{ $item->telp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->statusWarga->status_warga }}</td>
                        <td>{{ $item->statusNikah->status_nikah }}</td>
                        <td>{{ $item->talenta->talenta }}</td>
                        <td>{{ $item->pendidikan->pendidikan }}</td>
                        <td>{{ $item->pekerjaan->pekerjaan }}</td>
                        <td>{{ $item->statusKeluarga->status_keluarga }}</td>
                        <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->tempat_baptis }}, {{ $item->tanggal_baptis }}</td>
                        <td>{{ $item->tempat_sidhi }}, {{ $item->tanggal_sidhi }}</td>
                        <td>{{ $item->tempat_menikah }}, {{ $item->tanggal_menikah }}</td>
                        <td class="d-flex gap-2 justify-content-center align-items-center">
                            <div class="update">
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editWarga-{{ $item->id }}">
                                    <i class="fas fa-pen-to-square"></i>
                                    Edit
                                </button>
                                <x-modal-lg id="editWarga-{{ $item->id }}" title="Form Edit Data Warga"
                                    formAction="{{ route('warga.update', $item->id) }}" method="PUT" submitText="Update">
                                    <p>ID Warga: {{ $item->id }}</p> {{-- debug --}}
                                    @include('data warga.updateWarga', ['warga' => $item])
                                </x-modal-lg>
                            </div>
                            <div class="delete">
                                <form action="{{ route('warga.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block;" class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-arrow-up"></i>
                                        Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
