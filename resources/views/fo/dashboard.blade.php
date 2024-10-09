@extends('pegawai.component.main')

@section('content')
    <style>
        #main {
            background-color: white;
        }
    </style>
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
            {{-- <form id="scan-form" action="{{ route('frontoffice.scan') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="qr_code">QR Code</label>
                    <div class="col-lg-5">
                        <button type="button" id="open-scanner" class="btn btn-primary">Buka Scanner</button>
                        <div id="reader" style="display: none;"></div>
                        <input type="hidden" name="QR_code" id="qr_code" required>
                    </div>
                </div>


            </form>
            <form id="scan-form" action="{{ route('frontoffice.scan') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="qr_code">QR Code</label>
                    <div class="col-lg-5">
                        <div id="reader" width="600px"></div>
                        <input type="hidden" name="QR_code" id="qr_code" required autofocus>
                    </div>
                </div>
            </form> --}}

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scannerModal">
                Buka Scanner
            </button>

            <!-- Scanner Modal -->
            <div class="modal fade" id="scannerModal" tabindex="-1" aria-labelledby="scannerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scannerModalLabel">Scan QR Code</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="reader" style="width: 100%;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form for submitting QR code -->
            <form id="scan-form" action="{{ route('frontoffice.scan') }}" method="POST">
                @csrf
                <input type="hidden" name="QR_code" id="qr_code" required>
            </form>

            @if (session('tamuDetail'))
                <script>
                    var detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
                    detailModal.show();
                </script>
            @endif

            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail Tamu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>ID Tamu: {{ session('tamuDetail')->id_tamu }}</p>
                            <p>Nama: {{ session('tamuDetail')->Nama }}</p>
                            <p>No Telp: {{ session('tamuDetail')->No_telp }}</p>
                            <p>Alamat: {{ session('tamuDetail')->Alamat }}</p>
                            <p>Email: {{ session('tamuDetail')->Email }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
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


                            <li class="sidebar-item active ">
                                <a href="{{ route('pegawai.dashboard') }}" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-item  ">
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
            <div class="page-content">
                <section class="row">
                    {{-- <div class="col-12 col-lg-9"> --}}
                    <div class="card shadow rounded-18">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class='iconly-boldLogout'></i>
                            </button>
                        </form>
                        <div class="card-body px-4 py-4-5 bg-pink">
                            <div class="row">
                                {{-- tamu --}}
                                <div class="col-3 col-lg-3 col-md-3">
                                    <div class="card"
                                        style="background-color: #FFE2E5; width:150px; height:150px; margin-left:55px">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <h6 class="font-bold " style="font-size: 17px"> Total Tamu</h6>
                                                    <div class="stats-icon red mb-2">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="font-extrabold mb-0">0</h6>
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
                                    <div class="card"
                                        style="background-color: #F6FFDE; width:150px; height:150px; margin-left:47px">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <h6 class="font-bold " style="font-size: 17px"> Total Kurir</h6>
                                                    <div class="stats-icon orange mb-2">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="font-extrabold mb-0">0</h6>
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
                                    <div class="card"
                                        style="background-color: #DCFCE7; width:150px; height:150px; margin-left:42px">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <h6 class="font-bold"> Total Guru</h6>
                                                    <div class="stats-icon green mb-2 small-icon">
                                                        <i class="fa-solid fa-user-tie"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="font-extrabold mb-0"></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- tendik --}}
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card"
                                        style="background-color: #F3E8FF; width:150px; height:150px; margin-left:40px">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <h6 class="font-bold " style="font-size: 17px"> Total Tendik</h6>
                                                    <div class="stats-icon purple mb-2">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="font-extrabold mb-0">0</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">

                        <div class="row">
                            <div class="col-12" style="margin-top:2rem">
                                <div class="card shadow">

                                    <h4 style="padding: 2rem">Total Tamu Bulan ini</h4>
                                    <div class="card-body">
                                        <canvas id="roleCharts" width="400px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-primary" width="32" height="32" fill="blue"
                                                        style="width:10px">
                                                        <use
                                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Europe</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">862</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-europe"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-success" width="32" height="32" fill="blue"
                                                        style="width:10px">
                                                        <use
                                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">America</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">375</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-america"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                        style="width:10px">
                                                        <use
                                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Indonesia</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">1025</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-indonesia"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        {{-- <div class="col-12 col-xl-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Latest Comments</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Comment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="assets/images/faces/5.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Congratulations on your graduation!</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="assets/images/faces/2.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Wow amazing design! Can you make another
                                                                tutorial for
                                                                this design?</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                    </div>
            </div>
            <div class="col-12 col-lg-3">
                {{-- <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/1.jpg" alt="Face 1">
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
                                        <img src="assets/images/faces/4.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Hank Schrader</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/5.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Dean Winchester</h5>
                                        <h6 class="text-muted mb-0">@imdean</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/1.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">John Dodol</h5>
                                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                                    </div>
                                </div>
                                <div class="px-4">
                                    <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                        Conversation</button>
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

@push('myscript')
    {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
    const tamuData = @json($tamu_datap);
    const kurirData  = @json($kurir_datap);
    const ctx = document.getElementById('roleCharts').getContext('2d');
    const roleChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ],
            datasets: [{
                    label: 'Tamu',
                    data: tamuData,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Kurir',
                    data: kurirData,
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
});
</script> --}}

    {{-- <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Set nilai input qr_code
            document.getElementById('qr_code').value = decodedText;
            // Kirimkan form
            document.getElementById('scan-form').submit();
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script> --}}

    <script>
        const qrCodeSuccessCallback = (decodedText, decodedResult) => {
            document.getElementById('qr_code').value = decodedText;
            document.getElementById('scan-form').submit(); // Kirim form untuk mendapatkan data tamu
        };
        document.addEventListener('DOMContentLoaded', function() {
            const scannerModal = document.getElementById('scannerModal');
            const reader = document.getElementById('reader');
            let html5QrCode;

            scannerModal.addEventListener('show.bs.modal', function() {
                html5QrCode = new Html5Qrcode("reader");
                const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                    document.getElementById('qr_code').value = decodedText;
                    stopScanner();
                    bootstrap.Modal.getInstance(scannerModal).hide();
                    document.getElementById('scan-form').submit();
                };
                const config = {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                };

                html5QrCode.start({
                        facingMode: "environment"
                    }, config, qrCodeSuccessCallback)
                    .catch((err) => {
                        console.error("Error starting QR scanner:", err);
                    });
            });

            scannerModal.addEventListener('hidden.bs.modal', stopScanner);

            function stopScanner() {
                if (html5QrCode) {
                    html5QrCode.stop().then(() => {
                        console.log("QR Code scanning stopped.");
                    }).catch((err) => {
                        console.error("Error stopping QR scanner:", err);
                    });
                }
            }
        });
    </script>
@endpush
