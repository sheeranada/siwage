@extends('adminlte::page')
@section('title', 'Warga')
@section('content_header')
    <div class="header-menu d-flex justify-content-between align-items-center">
        <div class="judul">
            <h1 class="m-0 text-dark">Data Warga</h1>
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
            @include('warga.input_warga')
        </x-slot>
        <div id="data-warga-body">
            <div class="table-responsive">
                <table
                    class="table table-sm table-hover table-bordered table-striped small display responsive nowrap mt-3 mb-3"
                    width="100%">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No Induk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">JK</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Kelompok</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $item->no_induk }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">{{ $item->jk }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td class="text-center">{{ $item->kelompok->nama_kelompok }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <div class="detail">
                                            @include('warga.detail_warga')
                                        </div>
                                        <div class="edit ml-2">
                                            @include('warga.edit_warga')
                                        </div>
                                        <div class="delete ml-2">
                                            <form action="{{ route('warga.delete', $item->id) }}" method="post">
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
            <div class="paginasi-halaman mt-3">
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
                let url = pageUrl ?? "{{ route('warga.search') }}";
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(response) {
                        $('#data-warga-body').html(response.html);
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
