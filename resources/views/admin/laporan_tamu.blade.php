@extends('layouts.main')
<?php $route = 'LaporanTamu'; ?>
@section('title', 'Laporan Tamu')

@section('style')
    @vite('public/assets/scss/iconly.scss')
@endsection
@section('content')
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>
                <p>Selamat datang, {{ Auth::user()->name }}!</p>
            </div>
            {{-- SIDEBAR --}}
            <div id="sidebar" class="active " style="border: 1px">
                <div class="sidebar-wrapper active">
                    <div class="sidebar-header">
                        <div class="d-flex justify-content-between">
                            <div class="logo">
                                <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"
                                        srcset=""></a>
                            </div>
                            <div class="toggler">
                                <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                        class="bi bi-x bi-middle"></i></a>
                            </div>
                        </div>
                    </div>
                    {{-- SIDEBAR --}}
                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-title">Menu</li>


                            <li class="sidebar-item ">
                                <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-item  ">
                                <a href="{{ route('admin.pegawai') }}" class='sidebar-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>Pegawai</span>
                                </a>
                            </li>

                            <li class="sidebar-item active has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i class="bi bi-collection-fill"></i>
                                    <span>Laporan</span>
                                </a>
                                <ul class="submenu ">
                                    <li class="submenu-item active ">
                                        <a href="{{ route('admin.LaporanTamu') }}">Laporan Tamu</a>
                                    </li>
                                    <li class="submenu-item ">
                                        <a href="{{ route('admin.LaporanKurir') }}">Laporan Kurir</a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                </div>
            </div>
            <section class="row">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                {{-- <h4>Data Tamu</h4> --}}
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Laporan Tamu</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card shadow ">

                            <h5 class="card-title" style="text-align: center; padding-top:1rem">
                                Data Tamu
                            </h5>
                            {{-- SEARCH BY TGL --}}
                            <div class="card-body">
                                <form action="{{ route('admin.LaporanTamu') }}" method="get">
                                    <div class="col-sm-6 col-md-4 mb-2 d-flex justify-content-between">
                                        <input name="start" type="date" id="startInput" class="form-control"
                                               style="margin-top: 12px"
                                               value="{{ $startDate }}">
                                
                                        <input name="end" type="date" id="endInput" class="form-control"
                                               style="margin-top: 12px"
                                               value="{{ $endDate }}">
                                
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                                
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Tujuan</th>
                                            <th>Instansi</th>
                                            <th>Pegawai</th>
                                            <th>Tanggal & Waktu</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($KedatanganTamu as $Ked_tamu)
                                            <tr>
                                                <td>{{ $Ked_tamu->tamu->Nama }}</td>
                                                <td>{{ $Ked_tamu->tamu->Alamat }}</td>
                                                <td>{{ $Ked_tamu->tamu->No_telp }}</td>
                                                <td>{{ $Ked_tamu->Tujuan }}</td>
                                                <td>{{ $Ked_tamu->Instansi }}</td>
                                                <td>{{ $Ked_tamu->pegawai->user->name }}</td>
                                                <td>{{ $Ked_tamu->Waktu_perjanjian }}</td>

                                                <td>
                                                    {{ $Ked_tamu->Status }}
                                                </td>
                                                <td></td>

                                            </tr>
                                        @endforeach
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>
            </section>
            <div class="d-flex justify-content-center my-4">
                {{ $KedatanganTamu->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <script>
            document.getElementById('searchInput').addEventListener('input', function() {
                var input, filter, table, tr, td, i, j, txtValue;
                input = document.getElementById('searchInput');
                filter = input.value.toLowerCase();
                table = document.getElementById('table1');
                tr = table.getElementsByTagName('tr');

                for (i = 1; i < tr.length; i++) {
                    tr[i].style.display = 'none';
                    td = tr[i].getElementsByTagName('td');
                    for (j = 0; j < td.length; j++) {
                        if (td[j]) {
                            txtValue = td[j].textContent || td[j].innerText;
                            if (txtValue.toLowerCase().includes(filter)) {
                                tr[i].style.display = '';
                                break;
                            }
                        }
                    }
                }

            });
        </script>

    @endsection
    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        @vite('public/assets/static/js/pages/dashboard.js')
    @endsection
