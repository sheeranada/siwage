<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIWAGE</title>
    <link rel="stylesheet" href="{{ asset('asset/css/basic.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-sm bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('asset/img/gkjw.png') }}" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top">
                    SIWAGE
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('warga.index') }}">Kembali</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- <div class="container title">
            <div class="row mt-5 mb-3 text-center">
                <h1>Data Warga GKJW MOJOKERTO</h1>
            </div>
        </div> --}}
        <div class="container-fluid ">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-sm small" id="cetakWarga"
                    display="100%">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No Induk</th>
                            <th scope="col">Kelompok</th>
                            <th scope="col">Nama</th>
                            <th scope="col">JK</th>
                            <th scope="col">Telp</th>
                            <th scope="col">Status Nikah</th>
                            <th scope="col">Talenta dimiliki</th>
                            <th scope="col">Pendidikan Terakhir</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Status Keluarga</th>
                            <th scope="col">Status Warga</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tempat, Tanggal Lahir</th>
                            <th scope="col">Tempat, Tanggal Baptis</th>
                            <th scope="col">Tempat, Tanggal Sidhi</th>
                            <th scope="col">Tempat, Tanggal Menikah</th>
                        </tr>
                    </thead>
                    <tbody class="small">
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $item->no_induk }}</td>
                                <td>{{ $item->keluarga->kelompok->nama }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jk }}</td>
                                <td>{{ $item->telp }}</td>
                                <td>{{ $item->statusNikah->status_nikah }}</td>
                                <td>{{ $item->talenta->talenta }}</td>
                                <td>{{ $item->pendidikan->pendidikan }}</td>
                                <td>{{ $item->pekerjaan->pekerjaan }}</td>
                                <td>{{ $item->statusKeluarga->status_keluarga }}</td>
                                <td>{{ $item->statusWarga->status_warga }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->tempat_baptis }}, {{ $item->tanggal_baptis }}</td>
                                <td>{{ $item->tempat_sidhi }}, {{ $item->tanggal_sidhi }}</td>
                                <td>{{ $item->tempat_menikah }}, {{ $item->tanggal_menikah }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @vite('resources/js/cetakWarga.js')
</body>

</html>
