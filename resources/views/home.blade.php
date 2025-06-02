@extends('layouts.base')

@section('content')
    {{-- Baris 1 --}}
    <div class="row mb-3">
        <div class="col-md-6 d-flex">
            <div class="card w-100" style="height: 400px; display: flex; flex-direction: column;">
                <div class="card-header">
                    Statistik Warga
                </div>
                <div class="card-body d-flex justify-content-center align-items-center flex-column mt-2 mb-2">
                    <h5 class="card-title">
                        <strong>Total warga :</strong> {{ $totalWarga }}
                    </h5>
                    <canvas id="wargaChart" height="100"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card w-100" style="height: 400px; display: flex; flex-direction: column;">
                <div class="card-header">
                    Statistik Usia
                </div>
                <div class="card-body d-flex justify-content-center align-items-center flex-column mt-2 mb-2">
                    <canvas id="usiaChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6 d-flex">
            <div class="card w-100" style="height: 400px; display: flex; flex-direction: column;">
                <div class="card-header">
                    Statistik Pekerjaan
                </div>
                <div class="card-body d-flex justify-content-center align-items-center flex-column mt-2 mb-2">
                    <canvas id="pekerjaanChart" height="100"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card w-100" style="height: 400px; display: flex; flex-direction: column;">
                <div class="card-header">
                    Statistik Status Perkawinan
                </div>
                <div class="card-body d-flex justify-content-center align-items-center flex-column mt-2 mb-2">
                    <h5 class="card-title">
                        <strong>Total Status Nikah:</strong> {{ $totalStatusNikah }}
                    </h5>
                    <canvas id="nikahChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart 1: Jenis Kelamin
            const ctxGender = document.getElementById('wargaChart').getContext('2d');
            const genderLabels = ['Laki-laki', 'Perempuan'];
            const genderData = [{{ $jumlahLaki }}, {{ $jumlahPerempuan }}];
            window.createWargaChart(ctxGender, genderLabels, genderData);
            window.createWargaChart = function(ctx, labels, data) {
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah',
                            data: data,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 99, 132, 0.6)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }


            // Chart 2: Usia
            const ctxUsia = document.getElementById('usiaChart').getContext('2d');
            new Chart(ctxUsia, {
                type: 'bar',
                data: {
                    labels: ['Anak (<12)', 'Remaja (13–18)', 'Dewasa (19–59)',
                    'Lansia (60+)'], //dewasa sesuai tgl sidhi masuk / kawin
                    datasets: [{
                        label: 'Jumlah',
                        data: [{{ $usiaAnak }}, {{ $usiaRemaja }}, {{ $usiaDewasa }},
                            {{ $usiaLansia }}
                        ],
                        backgroundColor: ['rgba(75, 192, 192, 0.7)', 'rgba(255, 205, 86, 0.7)',
                            'rgba(153, 102, 255, 0.7)', 'rgba(201, 203, 207, 0.7)'
                        ],
                        borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 205, 86, 1)',
                            'rgba(153, 102, 255, 1)', 'rgba(201, 203, 207, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Distribusi Usia Warga'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Chart 3: Status Nikah
            const ctxNikah = document.getElementById('nikahChart').getContext('2d');
            const nikahLabels = @json($statusLabels);
            const nikahData = @json($statusData);

            new Chart(ctxNikah, {
                type: 'doughnut',
                data: {
                    labels: nikahLabels,
                    datasets: [{
                        label: 'Jumlah Warga',
                        data: nikahData,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 159, 64, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 205, 86, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(201, 203, 207, 0.7)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 205, 86, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(201, 203, 207, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        title: {
                            display: true,
                            text: 'Status Perkawinan Warga'
                        }
                    }
                }
            });

            // Chart 4: Pekerjaan
            const ctxPekerjaan = document.getElementById('pekerjaanChart').getContext('2d');
            const pekerjaanLabels = {!! json_encode($pekerjaanStats->pluck('pekerjaan')) !!};
            const pekerjaanData = {!! json_encode($pekerjaanStats->pluck('warga_count')) !!};

            new Chart(ctxPekerjaan, {
                type: 'bar',
                data: {
                    labels: pekerjaanLabels,
                    datasets: [{
                        label: 'Data Pekerjaan Warga',
                        data: pekerjaanData,
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Distribusi Pekerjaan Warga'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
