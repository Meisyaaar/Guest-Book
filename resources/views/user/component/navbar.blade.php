{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
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

</head>
<body>

</body>
</html> --}}
<nav>
    <div class="img">
        <img src="/img/logo/logo2.png" class="ms-0" alt="logo">
    </div>
    <ul>
        <li>
            <a href="{{ route('user.dashboard') }}">Beranda</a>
        </li>
        <li>
            <a href="{{ route('user_pegawai') }}">Pegawai</a>
        </li>
        <li>
            <a href="{{ route('about_us') }}">Tentang Kami</a>
        </li>
        <li>
            <button onclick="showLoginPopup()" class="btn btn-login">Login</button>
        </li>
    </ul>
    <div id="loginPopup" class="popup" style="display: none;">
        <div class="popup-content">
            <img src="{{ asset('img/user/login.png') }}" alt="Login Illustration" class="popup-image">
            <h6>Khusus <b>Pegawai</b>,<br>Apakah anda yakin ingin masuk?</h6>
            <div class="buttons" style="color:white">
                <button class="btn-no" onclick="closePopup()">Tidak</button>
                <a href="{{ route('login') }}" class="btn-yes" onclick="proceedLogin()">Ya</a>
            </div>
        </div>
    </div>
   <script>
     function showLoginPopup() {
            document.getElementById('loginPopup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('loginPopup').style.display = 'none';
        }
   </script>
</nav>
