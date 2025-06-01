@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card d-flex justify-content-center align-items-center h-100">
                    <div class="card-header w-100">
                        Statistik Warga
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong>Total warga :</strong>
                            {{ $totalWarga }}
                        </h5>
                        <canvas id="wargaChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6 ">
                <div class="card d-flex justify-content-center align-items-center h-100">
                    <div class="card-header w-100">
                        Statistik Usia
                    </div>
                    <div class="card-body w-100 h-100">
                        <canvas id="usiaChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-4">
                <div class="card" style="width: 32rem; height: 32rem;">
                    <div class="card-header">
                        Statistik Pekerjaan
                    </div>
                    <div class="card-body">
                        <canvas id="pekerjaanChart" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-4">
                <div class="card d-flex justify-content-center align-items-center">
                    <div class="card-header w-100">
                        Statistik Status Perkawinan
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong>Total Status Nikah:</strong> {{ $totalStatusNikah }}
                        </h5>
                        <canvas id="nikahChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Chart Jenis Kelamin
                const ctxGender = document.getElementById('wargaChart').getContext('2d');
                const genderLabels = ['Laki-laki', 'Perempuan'];
                const genderData = [{{ $jumlahLaki }}, {{ $jumlahPerempuan }}];
                window.createWargaChart(ctxGender, genderLabels, genderData);

                // Chart Usia (langsung render manual)
                const ctxUsia = document.getElementById('usiaChart').getContext('2d');
                new Chart(ctxUsia, {
                    type: 'bar',
                    data: {
                        labels: ['Anak (<12)', 'Remaja (13–18)', 'Dewasa (19–59)', 'Lansia (60+)'],
                        datasets: [{
                            label: 'Jumlah',
                            data: [{{ $usiaAnak }}, {{ $usiaRemaja }}, {{ $usiaDewasa }},
                                {{ $usiaLansia }}
                            ],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 205, 86, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                'rgba(201, 203, 207, 0.7)'
                            ],
                            borderColor: [
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

                // Chart status nikah dinamis
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
                                position: 'bottom',
                            },
                            title: {
                                display: true,
                                text: 'Status Perkawinan Warga'
                            }
                        }
                    }
                });

                // chart pekerjaan
                const ctxPekerjaan = document.getElementById('pekerjaanChart').getContext('2d');

                const pekerjaanLabels = {!! json_encode($pekerjaanStats->pluck('pekerjaan')) !!};
                const pekerjaanData = {!! json_encode($pekerjaanStats->pluck('warga_count')) !!};

                new Chart(ctxPekerjaan, {
                    type: 'bar',
                    data: {
                        labels: pekerjaanLabels,
                        datasets: [{
                            label: 'Jumlah Warga',
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
