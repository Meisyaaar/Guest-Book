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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('assets/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/dist/assets/images/favicon.svg') }}" type="image/x-icon">
</head>
<style>
    #main {
        margin-left: 300px;
        padding: 2rem;
    }

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
            
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>

    <div class="page-content">
        @yield('content')
    </div>



</body>
<script src="{{ asset('assets/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/dist/assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/dist/assets/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/dist/assets/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('assets/dist/assets/js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stack('myscript')

</html>
