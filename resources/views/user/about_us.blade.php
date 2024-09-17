@extends('layouts.user')

@section('content')
    @include('user.component.navbar')

    <div class="row">
        <div class="col-6" style="padding-top: 6rem; padding-left:5rem; padding-right:8rem; margin-left:3rem">

            <p style="line-height: 1.5; color:black; font-family:'Poppins'"> <b style="color:black; font-size:20px">GuBook</b>
                atau Guset Book merupakan Website yang bertujuan untuk memberikan kemudahan bagi tamu sekolah dalam
                menjadwalkan pertemuan dengan para guru di lingkungan pendidikan.</p>

        </div>

        <div class="col-5">
            <img src="{{ asset('img/user/2.png') }}" alt="" style="width: 343px; margin-left: 10rem">

        </div>
        <div>
            <h4 style="color: black; text-align:center; font-family:'Poppins'"> Mengapa kami penting?</h4>



        </div>
        <div class="row">
            <div class="card-containerr">
                <div class="card-keamanan m-5">
                    <div class="">
                        <p class="card-judul">Keamanan Terjamin</p>
                        {{-- <div class="card-icon"></div> --}}
                        <img src="{{ asset('img/user/keamanan.png') }}" alt="" style="width: 150px;">
                        <p class="card-teks">Dengan mendaftar, Anda<br>membantu kami menjaga<br>lingkungan sekolah</p>
                    </div>
                </div>

                <div class="card-keamanan m-5">
                    <p class="card-judul" style="font-size:medium">Kenyamanan Kunjungan</p>
                    {{-- <div class="card-icon"></div> --}}
                    <img class="" src="{{ asset('img/user/kenyamanan.png') }}" alt="" style="width: 150px;">
                    <p class="card-teks">Membantu kami menyambut anda dengan lebih baik dan mempersingkat waktu</p>
                </div>

                <div class="card-keamanan m-5">
                    <p class="card-judul">Fleksibelitas</p>
                    {{-- <div class="card-icon"></div> --}}
                    <img class="" src="{{ asset('img/user/flexibel.png') }}" alt="" style="width: 150px;">
                    <p class="card-teks">Anda dapat mengatur pertemuan kapan saja <br> dan dimana saja tanpa harus
                        terikat oleh waktu</p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.002498366064!2d107.5583301!3d-6.8905271!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6bd6aaaaaab%3A0xf843088e2b5bf838!2sSMK%20Negeri%2011%20Bandung!5e0!3m2!1sen!2sid!4v1725437798559!5m2!1sen!2sid"
                            width="600" height="450"
                            style="border:0; width:442px; height:222px; margin:4rem; border-radius:20px" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col" style="margin-top: 60px">
                    <h3 style="color: black; font-family: 'Poppins' ">Hubungi Kami</h3>
                    <div class="row">
                        <div class="col d-flex" style="padding: 11px">
                        <div class="card-info">
                            <i class="fa-solid fa-location-dot icon "></i>
                            <p class="jl">Jl. Budi, Cilember <br> Kota Bandung </p>

                        </div>

                        <div class="card-info">
                            <i class="fa-solid fa-envelope icon"></i>
                            <p class="jl" style="margin-top: 12px">smkn11bdg@gmail.com </p>

                        </div>

                        <div class="card-info">
                            <i class="fa-solid fa-phone icon"></i>
                            <p class="jl" style="margin-top: 12px">022-6652442</p>

                        </div>
                    </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
