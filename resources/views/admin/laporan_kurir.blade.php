@extends('layouts.main')
<?php $route = 'LaporanKurir'; ?>
@section('title', 'Laporan Kurir')

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
                                <ul class="submenu active ">
                                    <li class="submenu-item">
                                        <a href="{{ route('admin.LaporanTamu') }}">Laporan Tamu</a>
                                    </li>
                                    <li class="submenu-item active ">
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
                                {{-- <h4>Data Kurir</h4> --}}
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Laporan Kurir</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card shadow">

                            <h5 class="card-title" style="text-align: center; padding-top:1rem">
                                Data Kurir
                            </h5>
                            <div class="card-body">
                                <div class="col-sm-6 col-md-4 mb-2">
                                    <input name="search" type="text" id="searchInput" class="form-control"
                                        style="margin-top: 12px" placeholder="search" value="">
                                </div>
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Ekspedisi</th>
                                            <th>No Telp</th>
                                            <th>Pegawai</th>
                                            {{-- <th>Foto</th> --}}
                                            <th>Tanggal & Waktu</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($KedatanganEkspedisi as $Ked_kurir)
                                            <tr>
                                                <td>{{ $Ked_kurir->ekspedisi->Nama_kurir }}</td>
                                                <td>{{ $Ked_kurir->ekspedisi->Ekspedisi }}</td>
                                                <td>{{ $Ked_kurir->ekspedisi->No_Telp }}</td>
                                                <td>{{ $Ked_kurir->pegawai->user->name }}</td>
                                                {{-- <td>{{ $Ked_kurir->Foto }}</td> --}}
                                                <td>{{ $Ked_kurir->Tanggal_waktu }}</td>
                                                {{-- <td>
                                                    {{ $Ked_kurir->status }}<span class="badge bg-success">Active</span>
                                                </td> --}}
                                                <td>
                                                    <button type="button" class="btn" data-bs-toggle="modal"
                                                        data-bs-target="#myModal{{ $Ked_kurir->id_kedatangan_ekspedisi }}">
                                                        <i class="fa-solid fa-bars"></i>
                                                    </button>
                                                </td>
                                                <div class="modal fade" id="myModal{{ $Ked_kurir->id_kedatangan_ekspedisi }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel{{ $Ked_kurir->id_kedatangan_ekspedisi }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="exampleModalLabel{{ $Ked_kurir->id_kedatangan_ekspedisi }}">Detail
                                                                    Kedatangan Kurir</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <b>Nama:</b> {{ $Ked_kurir->ekspedisi->Nama_kurir }}<br>
                                                                <b>Ekspedisi:</b> {{ $Ked_kurir->ekspedisi->Ekspedisi }}<br>
                                                                <b>No Telepon:</b> {{ $Ked_kurir->ekspedisi->No_Telp }}<br>
                                                                <b>Pegawai:</b> {{ $Ked_kurir->pegawai->user->name }}<br>
                                                                <b>Foto:</b> <img src="{{ Storage::url($Ked_kurir->Foto) }}"
                                                                    alt="Foto Kurir" class="img-fluid"><br>
                                                                <b>Waktu kedatangan:</b> {{ $Ked_kurir->Tanggal_waktu }}<br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>
        </div>
        </section>
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
