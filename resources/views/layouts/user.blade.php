<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/css/admin.css'])
    @yield('style')
</head>


<body>


    <div id="main2">
        <!-- page heading -->
        <header class="mb-3">
            <div class="page-heading row align-items-center">
                {{-- <div class="col-12 col-xl-12">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </div> --}}
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
        {{-- <footer>
            @include('layouts.footer')
        </footer> --}}
        <!-- end footer  -->
    </div>
    {{-- <main>
        @yield('content')
    </main> --}}
    @stack('myscript')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (Session::has('success'))
                Swal.fire({
                    title: "Sukses!",
                    text: "{{ Session::get('success') }}",
                    imageUrl: "{{ asset('img/user/sukses.png') }}",  // Menggunakan gambar lokal
                    imageWidth: 100,  // Sesuaikan lebar gambar
                    imageHeight: 100,  // Sesuaikan tinggi gambar
                    imageAlt: "Sukses",
                    confirmButtonText: "OK"
                });
            @endif
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
