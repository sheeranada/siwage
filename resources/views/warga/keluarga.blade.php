@extends('adminlte::page')
@section('title', 'Keluarga')
@section('content_header')
    <div class="header-menu d-flex justify-content-between align-items-center">
        <div class="judul">
            <h1 class="m-0 text-dark">Data Keluarga</h1>
        </div>
        <div class="cari">
            <div class="input-group">
                <input type="text" class="form-control" id="search-input" placeholder="Cari data.." aria-label="Search"
                    aria-describedby="dynamic-search-button">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="dynamic-search-button">
                        <i class="bi bi-search"></i>
                        <span class="button-text">Cari</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <x-card>
        <x-slot name="header">
            <strong>Daftar Kepala Keluarga</strong>
        </x-slot>
        <div id="data-keluarga-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0 table-bordered table-hover table-sm">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Induk</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th style="width: 250px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $i => $warga)
                            <tr>
                                <td class="text-center">{{ $i + 1 }}</td>
                                <td>{{ $warga->nama }}</td>
                                <td class="text-center">{{ $warga->no_induk }}</td>
                                <td>{{ $warga->alamat }}</td>
                                <td>{{ $warga->no_telp }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{ route('keluarga.detail', ['kode' => explode('.', $warga->no_induk)[0]]) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-info-circle"></i> Tampilkan anggota keluarga
                                        </a>
                                    </div>
                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Tidak ada kepala keluarga ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
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
    <script>
        $(document).ready(function() {
            function fetchData(keyword = '', pageUrl = null) {
                let url = pageUrl ?? "{{ route('keluarga.search') }}";
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(response) {
                        $('#data-keluarga-body').html(response.html);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", error);
                    }
                });
            }

            function updateSearchButtonState(keyword) {
                const btnIcon = $('#dynamic-search-button i');
                const btnText = $('#dynamic-search-button .button-text');
                if (keyword.trim() === '') {
                    btnIcon.removeClass().addClass('bi bi-search');
                    btnText.text('Cari');
                } else {
                    btnIcon.removeClass().addClass('bi bi-x-circle');
                    btnText.text('Reset');
                }
            }
            $('#search-input').on('keyup', function() {
                let keyword = $(this).val();
                updateSearchButtonState(keyword);
                fetchData(keyword);
            });
            $('#dynamic-search-button').on('click', function() {
                let keyword = $('#search-input').val();
                if (keyword.trim() !== '') {
                    $('#search-input').val('');
                    updateSearchButtonState('');
                    fetchData('');
                }
            });
            $(document).on('click', '.pagination a', function(e) {
                let keyword = $('#search-input').val().trim();

                if (keyword !== '') {
                    e.preventDefault();
                    let pageUrl = $(this).attr('href');
                    fetchData(keyword, pageUrl);
                }
            });
            updateSearchButtonState($('#search-input').val());
        });
    </script>
    @vite(['resources/js/app.js'])
@endsection
