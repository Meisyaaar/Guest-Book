@extends('layouts.user')


@section('content')
    @include('user.component.navbar')

    <section id="multiple-column-form">
        <div class="row match-height">
            {{-- <img src="{{ asset('img/user/kotak-blur.svg') }}" class="blurr position-absolute end-0" alt=""> --}}
            <div class="col-12">
                <div class="card shadow">

                    <div class="card-content" style="margin: 2rem">
                        <div class="card-body" style="padding: 0">
                            <h4>Kurir</h4>
                            <form id="tambahKurir" action="{{ route('add_kurir') }}" method="POST">
                                @csrf
                                <div class="row" style="margin: 2rem">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama</label>
                                            <input type="text" id="first-name-column" class="form-control2"
                                                placeholder="Nama" name="nama" required="required">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Ekspedisi</label>
                                            <select name="ekspedisi" class="form-select2" required="required">
                                                <option value="">Ekspedisi</option>
                                                <option value="JNT">JNT</option>
                                                <option value="JNE">JNE</option>
                                                <option value="TiKi">TiKi</option>
                                                <option value="SiCepat">SiCepat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Pegawai</label>
                                            <select name="pegawai" class="form-select2" required="required">
                                                <option value="" disabled selected>Pilih Pegawai</option>
                                                <!-- Opsi default -->
                                                @foreach ($pegawai as $data)
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
                                            <label for="'">No Telephone</label>
                                            <input type="text" id="no_telp" class="form-control2" name="no_telp"
                                                placeholder="Masukan No Telephone" required="required">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Tanggal Pertemuan</label>
                                            <input type="datetime-local" id="country-floating" class="form-control2"
                                                name="tanggal_waktu" placeholder="Set tanggal kedatangan"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Foto</label>

                                            <button type="button" class="btn-control" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Open Camera
                                            </button>

                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Silahkan Foto
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <video id="video" class="w-100 rounded-lg" width="320"
                                                                height="240" autoplay></video>
                                                            <canvas id="canvas" width="320" height="240"
                                                                style="display: none"></canvas>
                                                            <img class="rounded-lg" id="foto-preview" src=""
                                                                alt="Foto Preview" style="display: none" />
                                                            <input type="hidden" id="foto-data" name="image">
                                                            <div class="d-flex justify-content-center mt-2">
                                                                <button type="button" id="snap"
                                                                    class="btn btn-primary">
                                                                    Foto
                                                                    <img src="assets/icons/camera-light.svg" class="ms-2"
                                                                        alt="camera" width="24">
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal" id="close">
                                                                Close
                                                            </button>
                                                            <button type="button" id="save" class="btn btn-primary"
                                                                style="display: none">
                                                                Kirim
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" id="foto-data" name="foto">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1 mt-1"
                                            style="border-radius: 12px">Kirim </button>
                                        {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                    </div>
                                    {{-- <div id="success-popup" class="popup" style="display: none;">
                                        <div class="popup-content">
                                            <img src="{{ asset('img/user/sukses.png') }}" alt="Sukses" class="popup-image">
                                            <h3>Sukses!</h3>
                                            <p>Formulir Anda telah berhasil dikirim.</p>
                                            <button class="btn btn-login" onclick="closePopup()">OK</button>
                                        </div>
                                    </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const snapButton = document.getElementById('snap');
            const saveButton = document.getElementById('save');
            const closeButton = document.getElementById('close');
            const fotoPreview = document.getElementById('foto-preview');
            const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            let stream;
            let fotoTaken = false;

            function startCamera() {
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(function(s) {
                        stream = s;
                        video.srcObject = stream;
                        video.play();
                    })
                    .catch(function(err) {
                        console.log("An error occurred: " + err);
                    });
            }

            function stopCamera() {
                if (stream) {
                    stream.getTracks().forEach(function(track) {
                        track.stop();
                    });
                }
            }

            document.getElementById('exampleModal').addEventListener('show.bs.modal', function(e) {
                if (fotoTaken) {
                    video.style.display = 'none';
                    fotoPreview.style.display = 'block';
                    snapButton.style.display = 'none';
                    saveButton.style.display = 'inline-block';
                } else {
                    video.style.display = 'block';
                    fotoPreview.style.display = 'none';
                    snapButton.style.display = 'inline-block';
                    saveButton.style.display = 'none';
                    startCamera();
                }
            });

            document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function(e) {
                stopCamera();
            });

            snapButton.addEventListener('click', async function(data_uri) {
                image = data_uri;
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                fotoPreview.src = canvas.toDataURL('image/jpeg');
                fotoPreview.style.display = 'block';
                video.style.display = 'none';
                snapButton.style.display = 'none';
                saveButton.style.display = 'inline-block';
                fotoTaken = true;
                stopCamera();
            });

            saveButton.addEventListener('click', function() {
                const fotoDataInput = document.getElementById('foto-data');
                fotoDataInput.value = fotoPreview.src; // Assign base64 image data to the hidden input
                modal.hide();
            });

            closeButton.addEventListener('click', function() {
                fotoTaken = false;
                fotoPreview.src = '';
                video.style.display = 'block';
                fotoPreview.style.display = 'none';
                snapButton.style.display = 'inline-block';
                saveButton.style.display = 'none';
            });
        });
    </script>
