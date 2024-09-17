@extends('layouts.main')
@section('title', 'Dasboard')

@section('style')
    @vite('public/assets/scss/iconly.scss')
@endsection
@section('content')
    <section>
        <div class="card shadow rounded-18">
            <i class='iconly-boldLogout'></i>
            <div class="card-body px-4 py-4-5 bg-pink">
                <div class="row">
                    {{-- tamu --}}
                    <div class="col-3 col-lg-3 col-md-3">
                        <div class="card" style="background-color: #FFE2E5; width:150px; height:150px; margin-left:55px">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="d-flex">
                                        <h6 class="font-bold " style="font-size: 17px"> Total Tamu</h6>
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="font-extrabold mb-0">{{ $totalTamuHariIni }}</h6>
                                    </div>
                                    <div style="margin-top: 9px">
                                        <p class=" font-semibold"> Hari ini</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- kurir --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card" style="background-color: #F6FFDE; width:150px; height:150px; margin-left:47px">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="d-flex">
                                        <h6 class="font-bold " style="font-size: 17px"> Total Kurir</h6>
                                        <div class="stats-icon orange mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="font-extrabold mb-0">{{ $totalKurirHariIni }}</h6>
                                    </div>
                                    <div style="margin-top: 9px">
                                        <p class=" font-semibold"> Hari ini</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- guru --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card" style="background-color: #DCFCE7; width:150px; height:150px; margin-left:42px">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="d-flex">
                                        <h6 class="font-bold"> Total Guru</h6>
                                        <div class="stats-icon green mb-2 small-icon">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="font-extrabold mb-0">{{ $totalGuru }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tendik --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card" style="background-color: #F3E8FF; width:150px; height:150px; margin-left:40px">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="d-flex">
                                        <h6 class="font-bold " style="font-size: 17px"> Total Tendik</h6>
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="font-extrabold mb-0">{{ $totalTendik }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div>
    </div> --}}
        <div class="col-12 col-lg-9">

            <div class="row">
                <div class="col-12" style="margin-top:2rem">
                    <div class="card shadow">

                        <h4 style="padding: 2rem">Total Tamu Bulan ini</h4>
                        <div class="card-body">
                            <canvas id="roleChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        {{-- <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="assets/static/images/faces/1.jpg" alt="Face 1" />
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">John Duck</h5>
                            <h6 class="text-muted mb-0">@johnducky</h6>
                        </div>
                    </div>
                </div>
        </div> --}}
        {{-- <div class="card">
                <div class="card-header">
                    <h4>Recent Messages</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/static/images/faces/4.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Hank Schrader</h5>
                            <h6 class="text-muted mb-0">@johnducky</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/static/images/faces/5.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Dean Winchester</h5>
                            <h6 class="text-muted mb-0">@imdean</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/static/images/faces/1.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">John Dodol</h5>
                            <h6 class="text-muted mb-0">@dodoljohn</h6>
                        </div>
                    </div>
                    <div class="px-4">
                        <button class="btn btn-block btn-xl btn-outline-primary font-bold mt-3">
                            Start Conversation
                        </button>
                    </div>
                </div>
            </div> --}}
        {{-- <div class="card">
                <div class="card-header">
                    <h4>Visitors Profile</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div> --}}
        </div>
    </section>



@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @vite('public/assets/static/js/pages/dashboard.js')
@endsection

@push('myscript')
    <script>
        const tamuData = @json($tamu_data);
        const kurirData = @json($kurir_data);

        const ctx = document.getElementById('roleChart').getContext('2d');
        const roleChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                        label: 'Tamu',
                        data: tamuData, // Data tamu yang diambil dari backend
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Kurir',
                        data: kurirData, // Data kurir yang diambil dari backend
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Perbandingan Data Tamu dan Kurir untuk Tahun Ini'
                    }
                }
            }
        });
    </script>
@endpush
