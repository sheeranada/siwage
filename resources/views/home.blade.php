@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1 class="m-0 text-dark">Home</h1>
@endsection

@section('content')
    <div class="row">
        {{-- Chart JK --}}
        <div class="col-md-6 mb-3 d-flex">
            <div class="card w-100 d-flex flex-column">

                <div class="card-body d-flex flex-column align-items-center justify-content-center flex-fill"
                    style="min-height: 300px;">
                    <canvas id="wargaChart" data-laki="{{ $totalLaki }}" data-perempuan="{{ $totalPerempuan }}"
                        style="max-height: 300px; width: 100%;">
                    </canvas>
                    <div class="text-center mt-2">
                        <h6>Total Warga: <strong>{{ $totalWarga }}</strong></h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Chart Kelompok --}}
        <div class="col-md-6 mb-3 d-flex">
            <div class="card w-100 d-flex flex-column">

                <div class="card-body d-flex flex-column align-items-center justify-content-center flex-fill"
                    style="min-height: 300px;">
                    <canvas id="kelompokChart" style="max-height: 300px; width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        {{-- Chart Pendidikan --}}
        <div class="col-md-6 mb-3 d-flex">
            <div class="card w-100 d-flex flex-column">

                <div class="card-body d-flex flex-column align-items-center justify-content-center flex-fill"
                    style="min-height: 300px;">
                    <canvas id="pendidikanChart" style="max-height: 300px; width: 100%;"
                        data-labels='@json($pendidikanData->pluck('nama_pendidikan'))' data-values='@json($pendidikanData->pluck('total'))'>
                    </canvas>
                </div>
            </div>
        </div>
        {{-- Chart Pekerjaan --}}
        <div class="col-md-6 mb-3 d-flex">
            <div class="card w-100 d-flex flex-column">
                <div class="card-body d-flex flex-column align-items-center justify-content-center flex-fill"
                    style="min-height: 300px;">
                    <canvas id="pekerjaanChart" style="max-height: 300px; width: 100%;"
                        data-labels='@json($pekerjaanData->pluck('nama_pekerjaan'))' data-values='@json($pekerjaanData->pluck('total'))'>
                    </canvas>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        {{-- Chart Umur --}}
        <div class="col-md-6 mb-3 d-flex">
            <div class="card w-100 d-flex flex-column">
                <div class="card-body d-flex flex-column align-items-center justify-content-center flex-fill"
                    style="min-height: 300px;">
                    <canvas id="umurChart" style="max-height: 300px; width: 100%;"
                        data-labels='@json($umurData->pluck('kategori_umur'))' data-values='@json($umurData->pluck('total'))'>
                    </canvas>
                </div>
            </div>
        </div>
        {{-- Chart Status Nikah --}}
        <div class="col-md-6 mb-3 d-flex">
            <div class="card w-100 d-flex flex-column">
                <div class="card-body d-flex flex-column align-items-center justify-content-center flex-fill"
                    style="min-height: 300px;">
                    <canvas id="statusNikahChart" style="max-height: 300px; width: 100%;"
                        data-labels='@json($statusNikahData->pluck('status'))' data-values='@json($statusNikahData->pluck('total'))'>
                    </canvas>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('js')
    <script>
        window.kelompokChartData = @json($kelompokData);
    </script>
@endsection
@section('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
