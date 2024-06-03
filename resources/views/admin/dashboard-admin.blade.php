@extends('admin.layout.master')

@section('content')
    <main>
        <h1>Dashboard Admin</h1>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Admin Harian Transaksi Preview Per Hari</h5>
                            <canvas id="chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Admin Kolaborasi Pengajuan Preview Per Bulan</h5>
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Admin Reservasi Tempat Preview Per Hari</h5>
                            <canvas id="chart3"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Admin Data Pelamar Preview Per Bulan</h5>
                            <canvas id="chart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Chart.register(ChartDataLabels);
            const pbi59 = @json($pbi59s);
            const pbi60 = @json($pbi60s);
            const pbi61 = @json($pbi61s);
            const pbi62 = @json($pbi62s);

            // Processing data for the first chart
            const labels_response = pbi59.map(data => data.dayname);
            const data_response = pbi59.map(data => data.count);

            const data = {
                labels: labels_response,
                datasets: [{
                    label: 'Admin Harian Transaksi Preview',
                    data: data_response,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)', // Light Red
                        'rgba(75, 192, 192, 0.7)', // Light Teal
                        'rgba(255, 206, 86, 0.7)', // Light Yellow
                        'rgba(153, 102, 255, 0.7)', // Light Purple
                        'rgba(54, 162, 235, 0.7)' // Light Blue
                    ],
                    hoverOffset: 4
                }],
                options: {
                    plugins: {
                        datalabels: {
                            color: '#ffffff'
                        }
                    }
                },
            };
            const ctx = document.getElementById('chart').getContext('2d');

            const config = {
                type: 'doughnut',
                data: data
            };

            new Chart(ctx, config);

            // Processing data for the second chart
            const labels_response2 = pbi60.map(data => data.month);
            const data_response2 = pbi60.map(data => data.count);

            const data2 = {
                labels: labels_response2,
                datasets: [{
                    label: 'Admin Kolaborasi Pengajuan Preview Per Bulan',
                    data: data_response2,
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.7)', // Light Orange
                        'rgba(75, 192, 192, 0.7)', // Light Teal
                        'rgba(153, 102, 255, 0.7)', // Light Purple
                        'rgba(255, 205, 86, 0.7)', // Light Yellow
                        'rgba(54, 162, 235, 0.7)' // Light Blue
                    ],
                    hoverOffset: 4
                }],
                options: {
                    plugins: {
                        datalabels: {
                            color: '#ffffff'
                        }
                    }
                },
            };

            const ctx2 = document.getElementById('chart2').getContext('2d');

            const config2 = {
                type: 'pie',
                data: data2
            };

            new Chart(ctx2, config2);

            // Processing data for the third chart
            const labels_response3 = pbi61.map(data => data.dayname);
            const data_response3 = pbi61.map(data => data.count);

            const data3 = {
                labels: labels_response3,
                datasets: [{
                    label: 'Admin Reservasi Tempat Preview Per Hari',
                    data: data_response3,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)', // Light Blue
                        'rgba(255, 99, 132, 0.7)', // Light Red
                        'rgba(255, 205, 86, 0.7)', // Light Yellow
                        'rgba(75, 192, 192, 0.7)', // Light Teal
                        'rgba(153, 102, 255, 0.7)' // Light Purple
                    ],
                    hoverOffset: 4
                }],
                options: {
                    plugins: {
                        datalabels: {
                            color: '#ffffff'
                        }
                    }
                },
            };

            const ctx3 = document.getElementById('chart3').getContext('2d');

            const config3 = {
                type: 'pie',
                data: data3
            };

            new Chart(ctx3, config3);

            // Processing data for the fourth chart
            const labels_response4 = pbi62.map(data => data.month);
            const data_response4 = pbi62.map(data => data.count);

            const data4 = {
                labels: labels_response4,
                datasets: [{
                    label: 'Admin Data Pelamar Preview Per Bulan',
                    data: data_response4,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.7)', // Light Teal
                        'rgba(255, 159, 64, 0.7)', // Light Orange
                        'rgba(153, 102, 255, 0.7)', // Light Purple
                        'rgba(54, 162, 235, 0.7)', // Light Blue
                        'rgba(255, 206, 86, 0.7)' // Light Yellow
                    ],
                    hoverOffset: 4
                }],
                options: {
                    plugins: {
                        datalabels: {
                            color: '#ffffff'
                        }
                    }
                },
            };

            const ctx4 = document.getElementById('chart4').getContext('2d');

            const config4 = {
                type: 'pie',
                data: data4
            };

            new Chart(ctx4, config4);
        });
    </script>

@endsection