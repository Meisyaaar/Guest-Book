<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Mazer Admin Dashboard</title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/dist/assets/css/bootstrap.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/dist/assets/vendors/iconly/bold.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/dist/assets/css/app.css') }}">
        <link rel="shortcut icon" href="{{ asset('assets/dist/assets/images/favicon.svg') }}" type="image/x-icon">
</head>
<style>
    body {
        background-color: white;
    }
</style>
<body>

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
        @yield('content')
    </div>


    
</body>
<script src="{{ asset('assets/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js' )}}"></script>
    <script src="{{ asset('assets/dist/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/dist/assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/dist/assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/dist/assets/js/main.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('myscript')

</html>
