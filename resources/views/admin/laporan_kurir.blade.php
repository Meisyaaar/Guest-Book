@extends('layouts.main')
<?php $route = 'LaporanKurir'; ?>
@section('title', 'Laporan Kurir')

@section('style')
    @vite('public/assets/scss/iconly.scss')
@endsection
@section('content')
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



                    <div class="card-body ">
                        <div class="col-sm-6 col-md-4 mb-2">
                            <input name="search" type="text" id="searchInput" class="form-control"
                                style="margin-top: 12px" placeholder="search" value="">
                        </div>
                        <table class="table table-striped " id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Kurir</th>
                                    <th>Ekspedisi</th>
                                    <th>No telp</th>
                                    <th>Pegawai</th>
                                    <th>Tanggal dan Waktu</th>
                                    <th>Status</th>
                                    <th>Detail</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($KedatanganEkspedisi as $Ked_ekspedisi)
                                    <tr>
                                        <td>{{ $Ked_ekspedisi->ekspedisi->Nama_kurir }}</td>
                                        <td>{{ $Ked_ekspedisi->ekspedisi->Ekspedisi }}</td>
                                        <td>{{ $Ked_ekspedisi->ekspedisi->No_Telp }}</td>
                                        <td>{{ $Ked_ekspedisi->pegawai->user->name }}</td>
                                        <td>{{ $Ked_ekspedisi->Tanggal_waktu }}</td>
                                        <td>{{ $Ked_ekspedisi->status }}
                                            <span class="badge bg-success">Terima</span>
                                        </td>
                                        <td>
                                            <i class="fa-solid fa-bars" data-bs-toggle="modal"
                                                data-bs-target="#detail{{ $Ked_ekspedisi->id }}" style="cursor: pointer;"></i>

                                            <!-- Modal Bootstrap -->
                                            <div class="modal fade" id="detail{{ $Ked_ekspedisi->id}}" tabindex="-1"
                                                aria-labelledby="detail{{ $Ked_ekspedisi->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="detail{{ $Ked_ekspedisi->id }}Label">Detail</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Konten modal -->
                                                            Nama Tamu: {{ $Ked_ekspedisi->ekspedisi->Nama_kurir }}<br>
                                                            Bertemu Dengan: {{ $Ked_ekspedisi->pegawai->user->name }}<br>
                                                            Waktu Pertemuan: {{ $Ked_ekspedisi->Tanggal_waktu }}<br>
                                                            @if ($Ked_ekspedisi->Foto)
                                                            <img src="{{ Storage::url('public/uploads/' . $Ked_ekspedisi->Foto) }}" alt="Foto">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
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
