{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</head>
<body>
    <div class="absolute">
        <div class="absolute inset-0 justify-center flex">
            <!-- Kolom Pertama (Form) -->
            <div class="col-lg-6">
            <div class="form-column" >
                <div class="image-coloumn">
                <img src="{{asset('img/logo/logo.png')}}"  alt="logo" class="image">
                </div>
                <div class="bg-shape1 bg-yellow opacity-50 bg-blur"></div>

                <div class="card" style="margin-left: 2cm; background:none; border:none;">

                   <h2 class="custom-h2" >Halo! Selamat Datang</h2>
                   <p class="pr">silahkan log in</p>
                    <form method="POST" action="{{ route('login') }}" class="form-center">
                        @csrf
                        <div class="input-box" >
                            <x-text-input id="email" class="block mt-1 w-full custom-font" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <img src="img/circle-thin.png" alt="" id="clear" style="cursor: pointer;">
                        </div>

                        <div class="input-box">
                            <x-text-input id="password" class="block mt-1 w-full custom-font" type="password" name="password" required autocomplete="current-password" placeholder="Password"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <img src="img/mdi-light--eye-off.png" alt="" id="eyeicon" style="cursor: pointer;">
                        </div>

                        <div class="flex justify-between items-center">
                            @if (Route::has('password.request'))
                                <a class="forgot underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn-submit ms-3">
                                <p style="margin-bottom: 2px">{{ __('Log in') }}</p>
                            </button>
                        </div>
                    </form>
                    <a href="{{ route('register') }}" class="pr2 u">Sign up</a>
                </div>
            </div>
            </div>

            <!-- Kolom Kedua (Gambar) -->
            <div class="col-lg-6">
            <div class="image-column" style="margin-left: 3cm">
                <img src="{{ asset('img/login/1.png') }}" alt="gambar login">
            </div>
        </div>
        </div>
    </div>

    <script>
        // Clear button functionality
        let clearButton = document.getElementById("clear");
        let emailInput = document.getElementById("email");

        clearButton.onclick = function() {
            emailInput.value = "";
        }

        // Show/hide password functionality
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");

        eyeicon.onclick = function() {
            if (password.type === "password") {
                password.type = "text";
                eyeicon.src = "img/mdi-light--eye.png";
            } else {
                password.type = "password";
                eyeicon.src = "img/mdi-light--eye-off.png";
            }
        }
    </script>
</body>
</html>
