@extends('layouts.main')
<?php $route = 'pegawai'; ?>
@section('title', 'Pegawai')
<link rel="stylesheet" href="assets/css/style.css">
@section('style')
    @vite('public/assets/scss/iconly.scss')
@endsection
@section('content')

@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu updated budi</li>
    
    
            <li class="sidebar-item active ">
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
    
            <li class="sidebar-item  has-sub">
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
    <div id="main">
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Multiple Column</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        {{-- <form action="{{ route('update.pegawai',$pegawai->id)}}" method="POST"> --}}
                            @csrf

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column"></label>
                                        <input type="text" id="first-name-column" class="form-control"
                                            placeholder="Nama" value="{{ $pegawai->user->name}}" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column"></label>
                                        <input type="text" id="last-name-column" class="form-control"
                                            placeholder="No Telephone" value="{{ $pegawai->No_telp}}" name="No_telp">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="ptk">
                                        <label for="city-column"></label>
                                        <select name="PTK" class="form-control"  >
                                            <option value="{{ $pegawai->PTK}}">PTK</option>
                                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                                            <option value="Matematika">Matematika</option>
                                            <option value="RPL">RPL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating"></label>
                                        <input type="text" id="country-floating" class="form-control"
                                            name="NIP" value="{{ $pegawai->NIP}}" placeholder="NIP">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column"></label>
                                        <input type="text" id="company-column" class="form-control"
                                            name="company-column" placeholder="Alamat">
                                    </div>
                                </div> --}}
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column"></label>
                                        <input type="email" id="email-id-column" class="form-control"
                                            name="email" value="{{ $pegawai->user->email}}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column"></label>
                                        <input type="password" id="password-id-column" class="form-control"
                                            name="password"value='{{ $pegawai->user->password}}' placeholder="Kata sandi">
                                    </div>
                                </div>
                                {{-- <div class="form-group col-12">
                                    <div class='form-check'>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox5" class='form-check-input' checked>
                                            <label for="checkbox5">Remember Me</label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>


    {{-- tabel --}}

    {{-- <div class="page-content">
        <section class="section">
          <div class="row" id="table-head">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Table head options</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="table-responsive">
                      <div class="flex items-center">
                        <table class="table mb-0">
                          <thead class="thead-dark">
                            <tr>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>No Telp</th>
                              <th>PTK</th>
                              <th>aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach   ($pegawai as $pegawai)
                            <tr>
                            <td>{{$data->user->name}}</td>
                            <td >{{$data->user->email}}</td>
                            <td>{{$data->No_telp}}</td>
                            <td>{{$data->PTK}}</td>
                            <td>
                              <a href="{{ route('edit.pegawai','$data->id')}}"
                                ><i
                                 class="fa-solid fa-pen-to-square"
                                ></i
                              ></a>
                            </td>
                            </tr>


                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- <p>Similar to tables and dark tables, use the modifier classes <code
                                          class="highlighter-rouge">.thead-light</code> or <code
                                          class="highlighter-rouge">.thead-dark</code> to
                                      make <code class="highlighter-rouge">&lt;thead&gt;</code>s appear light or dark gray.
                                  </p> -->
                  </div>
                  <!-- table head dark -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
  </section> --}}

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @vite('public/assets/static/js/pages/dashboard.js')
@endsection
