<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - Guest Book </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @yield('style')
    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/css/admin.css'])

</head>

<body>
    <div id="app">
        <div id="sidebar">
            @include('layouts.sidebar')
        </div>

        <div id="main">
            <!-- page heading -->
            <header class="mb-3">
                <div class="page-heading row align-items-center">
                    <div class="col-2 col-xl-12">
                        <a href="#" class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                    </div>
                    <div class="col-7 col-xl-9">
                        <h3 class="mb-0">@yield('title')</h3>
                    </div>
                </div>
            </header>
            <!-- page heading  -->

            <!-- content -->
            <div class="page-content">
                @yield('content')
            </div>
            <!-- end content -->

            <!-- footer -->
            <footer>
                @include('layouts.footer')
            </footer>
            <!-- end footer  -->
        </div>
    </div>
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   @stack('myscript')
    
</body>

</html>
