<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kartu Keluarga GKJW Mojokerto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/kk.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="img-overlay">
            <div class="watermark-group">
                <img src="{{ asset('assets/img/gkjw_logo.png') }}" alt="gkjw" class="watermark" />
            </div>
        </div>

        <header>
            <div class="logo">
                <img src="{{ asset('assets/img/gkjw_logo.png') }}" alt="" />
                <div class="brand">
                    <h1>GREJA KRISTEN JAWI WETAN</h1>
                    <h2>JEMAAT MOJOKERTO</h2>
                    <p>Jl. Letkol Sumardjo 61, Kota Mojokerto</p>
                </div>
            </div>
            <table class="info-keluarga">
                <tr>
                    <td class="label">No. KK</td>
                    <td class="colon">:</td>
                    <td class="value">{{ $kode }}</td>
                </tr>
                <tr>
                    <td class="label">Kelompok</td>
                    <td class="colon">:</td>
                    <td class="value">{{ $kelompok ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td class="colon">:</td>
                    <td class="value alamat">
                        {{ $kepala->alamat ?? '-' }}
                    </td>
                </tr>
            </table>
        </header>
        <div class="title">KARTU KELUARGA</div>
        <main>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>LP</th>
                    <th>No Induk</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Status Pernikahan</th>
                    <th>Pekerjaan</th>
                    <th>Pendidikan</th>
                    <th>Tempat Baptis</th>
                    <th>Tgl Baptis</th>
                    <th>Tempat Sidhi</th>
                    <th>Tgl Sidhi</th>
                    <th>Tempat Menikah</th>
                    <th>Tgl Menikah</th>
                    <th>Status Dalam Keluarga</th>
                    <th>Talenta</th>
                </tr>

                @foreach ($data as $i => $warga)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $warga->nama }}</td>
                        <td>{{ $warga->jk }}</td>
                        <td>{{ $warga->no_induk }}</td>
                        <td>{{ $warga->tempat_lahir }}</td>
                        <td>{{ $warga->tanggal_lahir == '30-11--0001' ? '-' : $warga->tanggal_lahir }}</td>
                        <td>{{ $warga->statusNikah->status_nikah ?? '' }}</td>
                        <td>{{ $warga->pekerjaan->pekerjaan ?? '' }}</td>
                        <td>{{ $warga->pendidikan->pendidikan ?? '' }}</td>
                        <td>{{ $warga->tempat_baptis }}</td>
                        <td>{{ $warga->tanggal_baptis == '30-11--0001' ? '-' : $warga->tanggal_baptis }}</td>
                        <td>{{ $warga->tempat_sidhi }}</td>
                        <td>{{ $warga->tanggal_sidhi == '30-11--0001' ? '-' : $warga->tanggal_sidhi }}</td>
                        <td>{{ $warga->tempat_nikah }}</td>
                        <td>{{ $warga->tanggal_nikah == '30-11--0001' ? '-' : $warga->tanggal_nikah }}</td>
                        <td>{{ $warga->statusKeluarga->status_keluarga ?? '' }}</td>
                        <td>{{ $warga->talenta->talenta ?? '' }}</td>
                    </tr>
                @endforeach

                {{-- Baris kosong biar total tetap 12 --}}
                @for ($i = count($data); $i < 12; $i++)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        @for ($j = 0; $j < 16; $j++)
                            <td>&nbsp;</td> {{-- atau kosongkan dengan style border aja --}}
                        @endfor
                    </tr>
                @endfor
            </table>

        </main>
        <footer>
            <div class="note">
                <p>Catatan :</p>
                <ol>
                    <li>
                        Kartu Keluarga ini digunakan untuk mendapatkan
                        pelayanan Administrasi, Kematian, Baptisan,
                        Kepindahan dll
                    </li>
                    <li>
                        Apabila terjadi perubahan data Kepala Keluarga, maka
                        wajib melaporkan ke Sekretariat
                    </li>
                </ol>
            </div>
            <div class="ttd-kk">
                <div class="kiri">
                    <p>KEPALA KELUARGA</p>
                    <div class="ttd-space"></div>
                    <div class="ttd-line">{{ $kepala->nama }}</div>
                </div>
                <div class="kanan">
                    <span class="tanggal">Mojokerto, {{ $tanggal }}</span>
                    <p>
                        Pelayan Harian Majelis Jemaat <br />
                        GKJW Jemaat Mojokerto
                    </p>
                    <div class="ttd-space"></div>
                    <h4>Pdt. Indro Sujarwo, S.Ag.</h4>
                    <span>Ketua</span>
                </div>
            </div>
        </footer>
    </div>


    <script>
        window.addEventListener('load', function() {
            window.print();

            // opsional auto-close tab
            window.onafterprint = function() {
                window.close();
            };
        });
    </script>

</body>

</html>
