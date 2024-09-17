@extends('layouts.user')

@section('content')
{{-- <img src="{{ asset('img/user/blur_background.svg') }}" class="position-absolute h-100 bottom 0 bg" alt=""> --}}
@include('user.component.navbar')
 <div class="container-fluid">
     <div class="row">
         <div class="col-lg-5">
             <h1>Selamat datang di</h1>
             <h2>GUEST BOOK</h2>

             <div class="p">
                 <p class="mb-0">Datanglah dengan senang hati</p>
                 <p>Kami layani sepenuh hati</p>
             </div>
             <div class="card-container">
                 <a href="{{ route('formTamu') }}" style="text-decoration: none">
                     <div class="card-tamu">
                         <p class="par">Tamu</p>
                         <i class="fa-solid fa-user icon-tamu"></i>
                     </div>
                 </a>

                 <a href="{{ route('formKurir') }}" style="text-decoration: none">
                     <div class="card-kurir">
                         <p class="par2">Kurir</p>
                         <div class="kurir">
                             <i class="fa-solid fa-truck-fast icon-kurir"></i>
                         </div>
                     </div>
                 </a>
             </div>
         </div>

         <div class="col-lg-6 imgs">
             <img src="/img/user/2.png" alt="">
         </div>
     </div>
 </div>
@endsection
    


