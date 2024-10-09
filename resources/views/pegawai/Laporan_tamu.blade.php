@extends('pegawai.component.main')
@section('content')
    <style>
        #main {
            background-color: white;
        }
    </style>
    <div id="app">
        {{-- SIDEBAR --}}

        <div id="sidebar" class="active " style="border: 1px">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                {{-- SIDEBAR --}}
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>


                        <li class="sidebar-item ">
                            <a href="{{ route('pegawai.dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="{{ route('pegawai.kunjungan') }}" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Kunjungan</span>
                            </a>
                        </li>

                        <li class="sidebar-item active has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Laporan</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item active ">
                                    <a href="{{ route('pegawai.Laporan_tamu') }}">Laporan Tamu</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="{{ route('pegawai.Laporan_kurir') }}">Laporan Kurir</a>
                                </li>

                            </ul>
                        </li>


                        
                            </a>
                        </li>

                    </ul>
                </div>
        </div>

        <div id="main">
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

                            <div class="card-body">
                                <div class="col-sm-6 col-md-4 mb-2">
                                    <input name="search" type="text" id="searchInput" class="form-control"
                                        style="margin-top: 12px" placeholder="search" value="">
                                </div>
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
                                        {{-- @foreach ($KedatanganTamu as $Ked_tamu)
                                    <tr>
                                        <td>{{ $Ked_tamu->tamu->Nama}}</td>
                                        <td>{{ $Ked_tamu->tamu->Alamat}}</td>
                                        <td>{{ $Ked_tamu->tamu->No_telp }}</td>
                                        <td>{{ $Ked_tamu->Tujuan }}</td>
                                        <td>{{ $Ked_tamu->Instansi }}</td>
                                        <td>{{ $Ked_tamu->pegawai->user->name }}</td>
                                        <td>{{ $Ked_tamu->Waktu_perjanjian }}</td>

                                        <td>
                                            {{ $Ked_tamu->status }}<span class="badge bg-success">Active</span>
                                        </td>
                                        <td></td>

                                    </tr>
                                @endforeach --}}
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>
            </section>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    </body>
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
