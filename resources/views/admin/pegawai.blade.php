@extends('layouts.main')
<?php $route = 'pegawai'; ?>
@section('title', 'Pegawai')
<link rel="stylesheet" href="assets/css/style.css">
@section('style')
    @vite('public/assets/scss/iconly.scss')
@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
                
                
                        <li class="sidebar-item active ">
                            <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                
                        <li class="sidebar-item active  ">
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
                                <li class="submenu-item ">
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
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card shadow">

                    <div class="card-content">
                        <div class="card-body">
                            <form id="tambahPegawai" action="{{ route('store.pegawai') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column"></label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama" name="name" required="required">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"></label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                placeholder="No Telephone" name="No_telp" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column"></label>
                                            <select name="PTK" class="form-select" required="required">
                                                <option value="">PTK</option>
                                                <option value="B.inggris">Bahasa Inggris</option>
                                                <option value="Matematika">Matematika</option>
                                                <option value="RPL">RPL</option>
                                                <option value="Tendik">Tendik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating"></label>
                                            <input type="text" id="country-floating" class="form-control" name="NIP"
                                                placeholder="NIP" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column"></label>
                                            <input type="email" id="email-id-column" class="form-control" name="email"
                                                placeholder="Email" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column"></label>
                                            <input type="password" id="password-id-column" class="form-control"
                                                name="password" placeholder="Kata sandi" required="required">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button id="kirimButton" type="submit"
                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form id="updateForm" action="{{ route('update.pegawai') }}" method="POST" style="display: none">
            @csrf
            <input type="hidden" name="NIPtoUpdate" id="NIPtoUpdate">
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card shadow">
                            {{-- <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="newName">Nama</label>
                                                <input type="text" id="newName" class="form-control" placeholder="Nama"
                                                    name="newNama" required="required">

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="newTelp">No Telepone</label>
                                                <input type="text" id="newNo_telp" class="form-control"
                                                    placeholder="No Telephone" name="newNo_telp" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="ptk">
                                                <label for="city-column">PTK</label>
                                                <select id="newPTK" name="newPTK" class="form-control"
                                                    required="required">
                                                    <option value="">PTK</option>
                                                    <option value="B.inggris">Bahasa Inggris</option>
                                                    <option value="Matematika">Matematika</option>
                                                    <option value="RPL">RPL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="newNIP">NIP</label>
                                                <input type="text" id="newNIP" class="form-control" name="newNIP"
                                                    placeholder="NIP" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="newEmail">Email</label>
                                                <input type="email" id="newEmail" class="form-control"
                                                    name="newEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="newPassword">Kata sandi</label>
                                                <input type="password" id="newPassword" class="form-control"
                                                    name="newPassword" placeholder="Kata sandi" required="required">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>



        {{-- tabel --}}
        {{-- <form id="filterPTK" action="{{ route('filter.pegawai') }}" method="POST">
            @csrf --}}
            <div class="page-content">
                <section class="section">
                <div class="row" id="table-head">
                    <div class="col-12" style="padding-top: 2rem">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4 class="card-title">Table head options</h4>
                                <div class="row-mb-3">
                                    {{-- search --}}
                                    <div class="col-sm-6 col-md-4 mb-2">
                                        <input name="search" type="text" id="searchInput" class="form-control"
                                            style="margin-top: 12px" placeholder="search" value="">
                                    </div>
                                    {{-- filter PTK --}}
                                    <div class="col-sm-6 col-md-4">
                                        <div class="filterPtk ">
                                            <label class="form-label"></label>
                                            <select id="filterPtk" class="form-select">
                                                <option value="">PTK</option>
                                                <option value="B.inggris">B.Inggris</option>
                                                <option value="RPL">RPL</option>
                                                <option value="Tendik">Tendik</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- import excel --}}
                                <form action="{{ route('importExcelPost') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <input type="file" name="file" required>
                                        <button type="submit" class="btn-import">import</button>
                                    </div>
                                </form>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="flex items-center">
                                                <table class="table mb-0" id="pegawaiTable">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>NIP</th>
                                                            <th>No Telp</th>
                                                            <th>PTK</th>
                                                            <th>aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pegawai as $data)
                                                            <tr>
                                                                <td>{{ $data->user->name }}</td>
                                                                <td>{{ $data->user->email }}</td>
                                                                <td>{{ $data->NIP }}</td>
                                                                <td>{{ $data->No_telp }}</td>
                                                                <td>{{ $data->PTK }}</td>
                                                                <td>

                                                                    <a href="#"
                                                                        class="text-secondary font-weight-bold text-xs me-2"
                                                                        onclick="showUpdateForm( '{{ $data->NIP }}', '{{ $data->user->name }}', '{{ $data->user ? $data->user->email : '' }}', '{{ $data->No_telp }}', '{{ $data->PTK }}')">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                    </a>
                                                                    <a class="hapus"
                                                                        href="{{ route('delete.pegawai', $data->id_user) }}">
                                                                        <i class="fa-solid fa-trash-can"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- <p>Similar to tables and dark tables, use the modifier classes <code
                                                                      class="highlighter-rouge">.thead-light</code> or data-pegawai='<code
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
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          document.querySelector('table').addEventListener('click', function(event) {
              if (event.target.closest('.hapus')) {
                  event.preventDefault();

                  const deleteUrl = event.target.closest('.hapus').getAttribute('href');

                  Swal.fire({
                      title: 'Apakah Anda yakin?',
                      text: "Data yang dihapus tidak dapat dikembalikan!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Ya, hapus!',
                      cancelButtonText: 'Batal'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.href = deleteUrl;
                      }
                  });
              }
          });
      });

      document.getElementById('searchInput').addEventListener('input', function() {
          var input, filter, table, tr, td, i, j, txtValue;
          input = document.getElementById('searchInput');
          filter = input.value.toLowerCase();
          table = document.getElementById('pegawaiTable');
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

      function showUpdateForm(NIP, name, email, No_telp, PTK) {
          document.getElementById('NIPtoUpdate').value = NIP;
          document.getElementById('newNIP').value = NIP;
          document.getElementById('newName').value = name;
          document.getElementById('newEmail').value = email;
          document.getElementById('newNo_telp').value = No_telp; // Perbaiki variabel
          document.getElementById('newPTK').value = PTK;

          document.getElementById('updateForm').style.display = 'block';

          // Menyembunyikan form tambah pegawai
          var formTambah = document.getElementById('tambahPegawai');
          if (formTambah) {
              formTambah.style.display = 'none';
          }
      }

      // Fungsi untuk menutup form update
      function closeUpdateForm() {
          document.getElementById('updateForm').style.display = 'none';
          var formTambah = document.getElementById('tambahPegawai');
          if (formTambah) {
              formTambah.style.display = 'block';
          }
      }

      function closeTambahForm() {
          var formTambah = document.getElementById('tambahPegawai');
          if (formTambah) {
              formTambah.style.display = 'none';
          }
      }

      // Fungsi untuk menampilkan form tambah pegawai dan menyembunyikan form update pegawai
      function showTambahForm() {
          document.getElementById('tambahPegawai').style.display = 'block';

          // Menyembunyikan form update pegawai
          var formUpdate = document.getElementById('updateForm');
          if (formUpdate) {
              formUpdate.style.display = 'none';
          }
      }
  </script>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@vite('public/assets/static/js/pages/dashboard.js')
@endsection
