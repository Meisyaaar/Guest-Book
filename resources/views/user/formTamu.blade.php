@extends('layouts.user')


@section('content')

@include('user.component.navbar')

<section id="multiple-column-form">
    <div class="row match-height">
        <img src="{{ asset('img/user/kotak-blur.svg') }}" class="blurr position-absolute end-0" alt="">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-content" style="margin: 2rem">
                    <div class="card-body" style="padding: 0" >
                        <h4>Tamu</h4>
                        <form id="tambahTamu" action="{{ route('add_tamu') }}" method="POST">
                            @csrf
                            <div class="row" style="margin: 2rem">
                                <div class="col-md-6 col-12">
                                    <div class="form-group" >
                                        <label for="first-name-column">Nama</label>
                                        <input type="text" id="first-name-column" class="form-control2"
                                            placeholder="Nama" name="name" required="required">

                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">No Telepone</label>
                                        <input type="text" id="last-name-column" class="form-control2"
                                            placeholder="No Telephone" name="No_telp" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Pegawai</label>
                                        <select name="pegawai" class="form-select2" required="required">
                                            <option value="" disabled selected>Pilih Pegawai</option> <!-- Opsi default -->
                                            @foreach ($pegawai as $data )
                                            <option value="{{ $data->NIP }}">{{ $data->user->name }}</option>
                                            @endforeach

                                            {{-- <option value="B.inggris">Bahasa Inggris</option>
                                            <option value="Matematika">Matematika</option>
                                            <option value="RPL">RPL</option>
                                            <option value="Tendik">Tendik</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Email</label>
                                        <input type="text" id="country-floating" class="form-control2" name="email"
                                            placeholder="Masukan Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Alamat</label>
                                        <input type="text" id="email-id-column" class="form-control2" name="alamat"
                                            placeholder="Masukan Alamat" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Instansi</label>
                                        <input type="text" id="" class="form-control2"
                                            name="instansi" placeholder="Masukan Instansi" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Tujuan</label>
                                        <input type="text" id="" class="form-control2"
                                            name="tujuan" placeholder="Masukan Tujuan" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Tanggal Pertemuan</label>
                                        <input type="datetime-local" id="password-id-column" class="form-control2"
                                            name="waktu_perjanjian" placeholder="Set Tanggal pertemuan" required="required">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button id="kirimButton" type="submit"
                                        class="btn btn-primary me-1 mb-1 mt-1" style="border-radius: 12px">Kirim </button>
                                    {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
