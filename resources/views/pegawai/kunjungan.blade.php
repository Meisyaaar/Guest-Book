@extends('pegawai.component.main')

@section('content')
<style>
    #main{
        background-color:white;
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

                    <li class="sidebar-item active  ">
                        <a href="{{ route('pegawai.kunjungan') }}" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Kunjungan</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-collection-fill"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{ route('pegawai.Laporan_tamu') }}">Laporan Tamu</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ route('pegawai.Laporan_kurir') }}">Laporan Kurir</a>
                            </li>

                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-grid-1x2-fill"></i>
                            <span>Layouts</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="layout-default.html">Default Layout</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="layout-vertical-1-column.html">1 Column</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="layout-vertical-navbar.html">Vertical with Navbar</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="layout-horizontal.html">Horizontal Menu</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-title">Forms &amp; Tables</li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Form Elements</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="form-element-input.html">Input</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-element-input-group.html">Input Group</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-element-select.html">Select</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-element-radio.html">Radio</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-element-checkbox.html">Checkbox</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-element-textarea.html">Textarea</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="form-layout.html" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Form Layout</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-pen-fill"></i>
                            <span>Form Editor</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="form-editor-quill.html">Quill</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-editor-ckeditor.html">CKEditor</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-editor-summernote.html">Summernote</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="form-editor-tinymce.html">TinyMCE</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="table.html" class='sidebar-link'>
                            <i class="bi bi-grid-1x2-fill"></i>
                            <span>Table</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="table-datatable.html" class='sidebar-link'>
                            <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                            <span>Datatable</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Extra UI</li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-pentagon-fill"></i>
                            <span>Widgets</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="ui-widgets-chatbox.html">Chatbox</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="ui-widgets-pricing.html">Pricing</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="ui-widgets-todolist.html">To-do List</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-egg-fill"></i>
                            <span>Icons</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="ui-icons-bootstrap-icons.html">Bootstrap Icons </a>
                            </li>
                            <li class="submenu-item ">
                                <a href="ui-icons-fontawesome.html">Fontawesome</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="ui-icons-dripicons.html">Dripicons</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-bar-chart-fill"></i>
                            <span>Charts</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="ui-chart-chartjs.html">ChartJS</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="ui-chart-apexcharts.html">Apexcharts</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="ui-file-uploader.html" class='sidebar-link'>
                            <i class="bi bi-cloud-arrow-up-fill"></i>
                            <span>File Uploader</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-map-fill"></i>
                            <span>Maps</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="ui-map-google-map.html">Google Map</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="ui-map-jsvectormap.html">JS Vector Map</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-title">Pages</li>

                    <li class="sidebar-item  ">
                        <a href="application-email.html" class='sidebar-link'>
                            <i class="bi bi-envelope-fill"></i>
                            <span>Email Application</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="application-chat.html" class='sidebar-link'>
                            <i class="bi bi-chat-dots-fill"></i>
                            <span>Chat Application</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="application-gallery.html" class='sidebar-link'>
                            <i class="bi bi-image-fill"></i>
                            <span>Photo Gallery</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="application-checkout.html" class='sidebar-link'>
                            <i class="bi bi-basket-fill"></i>
                            <span>Checkout Page</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                            <span>Authentication</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="auth-login.html">Login</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="auth-register.html">Register</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="auth-forgot-password.html">Forgot Password</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-x-octagon-fill"></i>
                            <span>Errors</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="error-403.html">403</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="error-404.html">404</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="error-500.html">500</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-title">Raise Support</li>

                    <li class="sidebar-item  ">
                        <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
                            <i class="bi bi-life-preserver"></i>
                            <span>Documentation</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
                            <i class="bi bi-puzzle"></i>
                            <span>Contribute</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="https://github.com/zuramai/mazer#donate" class='sidebar-link'>
                            <i class="bi bi-cash"></i>
                            <span>Donate</span>
                        </a>
                    </li>

                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <!-- Kolom untuk Card 1, 2, 3 -->
                    <div class="col-md-8">
                        <div class="card shadow rounded-18">
                            <div class="card-body px-4 py-4-5 bg-pink">
                                <div class="row">
                                    <!-- Kartu 1 -->
                                    <div class="col-md-4 col-sm-12 mb-4 mb-md-0">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon purple">
                                                            <i class="iconly-boldShow"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Belum di Konfirmasi</h6>
                                                        <h6 class="font-extrabold mb-0">0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Kartu 2 -->
                                    <div class="col-md-4 col-sm-12 mb-4 mb-md-0">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon blue">
                                                            <i class="iconly-boldProfile"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Sudah <br>Diterima</h6>
                                                        <h6 class="font-extrabold mb-0">0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Kartu 3 -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon green">
                                                            <i class="iconly-boldAdd-User"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Sudah <br>Ditolak<br></h6>
                                                        <h6 class="font-extrabold mb-0">0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Kolom untuk Chart -->
                    <div class="col-md-4">
                        <div class="card">
                            {{-- <h4>data tamu & kurir</h4> --}}
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card shadow">
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
                                    {{-- @foreach ($KedatanganEkspedisi as $Ked_ekspedisi)
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
                                    @endforeach --}}
    
    
                                </tbody>
                            </table>

                        </div>

                    </div>
                    {{-- <div class="col-md-6">
                        <div class="card shadow">
                            <div>

                            </div>
                            

                        </div>

                    </div> --}}
                </section>
            </div>

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

@endsection

{{-- <script>
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
</script> --}}
