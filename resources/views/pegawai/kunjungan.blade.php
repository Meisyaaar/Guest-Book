@extends('pegawai.component.main')

@section('content')
    <style>
        #main {
            background-color: white;
        }

        .status-btn {
            padding: 10px;
            margin: 5px;
            border: none;
            background-color: #f0f0f0;
            cursor: pointer;
        }

        .status-btn.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
    <div id="app">

        {{-- SIDEBAR --}}

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


                        <li class="sidebar-item ">
                            <a href="{{ route('pegawai.dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item active  ">
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



                        </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Daftar Kunjungan</h3>
            </div>

            <div class="page-content">
                <section class="row">
                    <!-- Kolom untuk Card 1, 2, 3 -->
                    <div class="col-md-12">
                        <div class="card shadow rounded-18 mb-4">
                            <div class="card-body px-4 py-4-5 bg-pink">
                                <div class="row">
                                    <!-- Kartu 1 -->
                                    <div class="col-md-4 col-sm-12 mb-4 mb-md-0">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon purple">
                                                            <i class="iconly-boldShow"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Belum di Konfirmasi</h6>
                                                        <h6 class="font-extrabold mb-0">{{ $belumDiKonfir }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Kartu 2 -->
                                    <div class="col-md-4 col-sm-12 mb-4 mb-md-0">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon blue">
                                                            <i class="iconly-boldProfile"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Diterima</h6>
                                                        <h6 class="font-extrabold mb-0">{{ $Diterima }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Kartu 3 -->
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-body px-3 py-4-5">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="stats-icon green">
                                                            <i class="iconly-boldAdd-User"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="text-muted font-semibold">Ditolak<br></h6>
                                                        <h6 class="font-extrabold mb-0">{{ $Ditolak }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- LIST KUNJUNGAN UDH DI KONFIR --}}
                @section('content')
                    <div class="page-content">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-md-4 mb-2">
                                <i nput name="search" type="text" id="searchInput" class="form-control"
                                    style="margin-top: 12px" placeholder="search" value="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card shadow rounded-18">
                                    <div class="card-body">
                                        <h5 class="card-title">Daftar Kunjungan Sudah di Konfirmasi</h5>
                                        <div class="scrollable-card-container" style="height: 500px; overflow-y: auto;">
                                            <tbody>
                                                @forelse ($listKunjungan as $kedatangan)
                                                    @if ($kedatangan->Status != 'Menunggu konfirmasi')
                                                        <div class="col">
                                                            <div class="card mb-3 ">
                                                                <div class="card-body" style="width: 400px; height: 200px">
                                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                                        @if ($kedatangan->tamu)
                                                                            Kedatangan Tamu
                                                                        @else
                                                                            Kedatangan Ekspedisi
                                                                        @endif
                                                                        </h5>
                                                                        <p class="card-text">
                                                                            <strong>Nama Pengunjung:</strong>
                                                                            @if ($kedatangan->tamu)
                                                                                {{ $kedatangan->tamu->Nama }}
                                                                            @elseif($kedatangan->ekspedisi)
                                                                                {{ $kedatangan->ekspedisi->Nama_kurir }}
                                                                            @else
                                                                                Tidak tersedia
                                                                            @endif
                                                                            <br>
                                                                            {{-- <p class="card-text">
                                                <strong>Nama Pengunjung:</strong>
                                                {{ $kedatangan instanceof \App\Models\KedatanganTamu ? $kedatangan->Nama : $kedatangan->Nama_kurir }}<br> --}}
                                                                            <strong>Pegawai yang Dikunjungi:</strong>
                                                                            {{ $kedatangan->pegawai->user->name }}<br>
                                                                            @if ($kedatangan->tamu)
                                                                                <strong>Waktu Kedatangan:</strong>
                                                                                {{ $kedatangan->Waktu_kedatangan }}
                                                                            @else
                                                                                <strong>Waktu Kedatangan:</strong>
                                                                                {{ $kedatangan->Tanggal_waktu }} <br>
                                                                                <strong>Ekspedisi:</strong>
                                                                                {{ $kedatangan->ekspedisi->Ekspedisi }}
                                                                            @endif
                                                                            <strong>Status:</strong>
                                                                            {{ $kedatangan->Status }}
                                                                            @if ($kedatangan->Status === 'Ditolak')
                                                                                <strong>Alasan Penolakan:</strong>
                                                                                {{ $kedatangan->alasan }}
                                                                            @endif

                                                                            <button type="button" class="btn btn-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#detailModal{{ $kedatangan->id_kedatangan_tamu }}">
                                                                                <i class="fa-solid fa-bars"></i> Detail
                                                                            </button>

                                                                            <!-- Modal -->
                                                                        <div class="modal fade"
                                                                            id="detailModal{{ $kedatangan->id_kedatangan_tamu }}"
                                                                            tabindex="-1"
                                                                            aria-labelledby="detailModalLabel{{ $kedatangan->id_kedatangan_tamu }}"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            id="detailModalLabel{{ $kedatangan->id_kedatangan_tamu }}">
                                                                                            Detail Kedatangan
                                                                                            {{ $kedatangan->tamu ? 'Tamu' : 'Kurir' }}
                                                                                        </h5>
                                                                                        <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        @if ($kedatangan->tamu)
                                                                                            <b>Nama Tamu:</b>
                                                                                            {{ $kedatangan->tamu->Nama }}<br>
                                                                                            <b>Asal Instansi:</b>
                                                                                            {{ $kedatangan->tamu->Asal_instansi }}<br>
                                                                                            <b>No Telepon:</b>
                                                                                            {{ $kedatangan->tamu->No_telp }}<br>
                                                                                            <b>Email:</b>
                                                                                            {{ $kedatangan->tamu->Email }}<br>
                                                                                            <b>Tujuan Kunjungan:</b>
                                                                                            {{ $kedatangan->tamu->Tujuan_kunjungan }}<br>
                                                                                        @else
                                                                                            <b>Nama Kurir:</b>
                                                                                            {{ $kedatangan->ekspedisi->Nama_kurir }}<br>
                                                                                            <b>Ekspedisi:</b>
                                                                                            {{ $kedatangan->ekspedisi->Ekspedisi }}<br>
                                                                                            <b>No Telepon:</b>
                                                                                            {{ $kedatangan->ekspedisi->No_Telp }}<br>
                                                                                        @endif
                                                                                        <b>Pegawai yang Dikunjungi:</b>
                                                                                        {{ $kedatangan->pegawai->user->name }}<br>
                                                                                        <b>Waktu Kedatangan:</b>
                                                                                        {{ $kedatangan->tamu ? $kedatangan->Waktu_kedatangan : $kedatangan->Tanggal_waktu }}<br>
                                                                                        <b>Foto:</b>
                                                                                        <img src="{{ Storage::url($kedatangan->Foto) }}"
                                                                                            alt="Foto {{ $kedatangan->tamu ? 'Tamu' : 'Kurir' }}"
                                                                                            class="img-fluid">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @empty
                                                    <div class="col-12">
                                                        <p class="text-center">Tidak ada kunjungan yang menunggu
                                                            konfirmasi.</p>
                                                    </div>
                                                @endforelse
                                            </tbody>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- LIST KUNJUNGAN BLM DI KONFIR --}}
                            <div class="col-lg-6">
                                <div class="card shadow rounded-18">
                                    <div class="card-body">
                                        <h5 class="card-title">Daftar Kunjungan Belum di konfirmasi</h5>
                                        <div class="scrollable-card-container" style="height: 500px; overflow-y: auto;">
                                            @forelse ($listKunjungan as $kedatangan)
                                                @if ($kedatangan->Status === 'Menunggu konfirmasi')
                                                    <div class="card mb-3">
                                                        <div class="card-body" style="width: 400px; height: 200px">
                                                            <h6 class="card-subtitle mb-2 text-muted">
                                                                @if ($kedatangan->tamu)
                                                                    Kedatangan Tamu
                                                                @else
                                                                    Kedatangan Ekspedisi
                                                                @endif
                                                            </h6>
                                                            <p class="card-text">
                                                                <strong>Nama Pengunjung:</strong>
                                                                @if ($kedatangan->tamu)
                                                                    {{ $kedatangan->tamu->Nama }}
                                                                @elseif($kedatangan->ekspedisi)
                                                                    {{ $kedatangan->ekspedisi->Nama_kurir }}
                                                                    <br><strong>Ekspedisi:</strong>
                                                                    {{ $kedatangan->ekspedisi->Ekspedisi }}
                                                                @else
                                                                    Tidak tersedia
                                                                @endif
                                                                <br>
                                                                <strong>Pegawai yang Dikunjungi:</strong>
                                                                {{ $kedatangan->pegawai->user->name }}
                                                            </p>

                                                            <div class="d-flex flex-wrap" style="gap: 8px;">
                                                                <form
                                                                    action="{{ route('kedatangan.update-status', ['id' => $kedatangan->id_kedatangan_tamu]) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input type="hidden" name="Status"
                                                                        value="Diterima">
                                                                    <button type="submit" class="btn btn-success btn-sm">
                                                                        <i class="fas fa-check"></i> Diterima
                                                                    </button>
                                                                </form>

                                                                <form
                                                                    action="{{ route('kedatangan.update-status', ['id' => $kedatangan->id_kedatangan_tamu]) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input type="hidden" name="Status" value="Ditolak">
                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                        <i class="fas fa-times"></i> Ditolak
                                                                    </button>
                                                                </form>

                                                                <button type="button" class="btn btn-primary btn-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#detailModal{{ $kedatangan->id_kedatangan_tamu }}">
                                                                    <i class="fa-solid fa-bars"></i> Detail
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @empty
                                                <p class="text-center">Tidak ada kunjungan yang menunggu konfirmasi.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <footer>
                                <div class="footer clearfix mb-0 text-muted">
                                    <div class="float-start">
                                        <p>2021 &copy; Mazer</p>
                                    </div>
                                    <div class="float-end">
                                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span>
                                            by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
            </div>
            </body>

        @endsection
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.getElementById('searchInput').addEventListener('input', function() {
                var input, filter, cardContainer, cards, cardBody, i, j, txtValue;

                // Ambil input dari user dan konversi menjadi huruf kecil
                input = document.getElementById('searchInput');
                filter = input.value.toLowerCase();

                // Ambil semua card
                cardContainer = document.querySelector('.scrollable-card-container');
                cards = cardContainer.getElementsByClassName('card');

                // Loop melalui semua card dan sembunyikan yang tidak sesuai dengan input pencarian
                for (i = 0; i < cards.length; i++) {
                    cardBody = cards[i].getElementsByClassName('card-body')[0];

                    if (cardBody) {
                        txtValue = cardBody.textContent || cardBody.innerText;

                        // Jika card mengandung teks yang cocok dengan input, tampilkan, jika tidak, sembunyikan
                        if (txtValue.toLowerCase().includes(filter)) {
                            cards[i].style.display = '';
                        } else {
                            cards[i].style.display = 'none';
                        }
                    }
                }
            });

            function konfirmasiStatus(status) {
                let title, text, icon, confirmButtonText;

                if (status === 'Diterima') {
                    title = "Terima Kunjungan?";
                    text = "Anda akan menerima kunjungan ini. Lanjutkan?";
                    icon = "question";
                    confirmButtonText = "Ya, Terima";
                } else {
                    title = "Tolak Kunjungan?";
                    text = "Anda akan menolak kunjungan ini. Lanjutkan?";
                    icon = "warning";
                    confirmButtonText = "Ya, Tolak";
                }

                Swal.fire({
                    title: title,
                    text: text,
                    icon: icon,
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: confirmButtonText,
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (status === 'Ditolak') {
                            document.getElementById('alasanField').style.display = 'block';
                            document.getElementById('alasan').focus();
                        } else {
                            document.getElementById('formDiterima').submit();
                        }
                    }
                });
            }

            document.getElementById('formDitolak').addEventListener('submit', function(e) {
                e.preventDefault();
                const alasan = document.getElementById('alasan').value.trim();
                if (alasan === '') {
                    Swal.fire({
                        title: "Error!",
                        text: "Mohon isi alasan penolakan.",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                } else {
                    this.submit();
                }
            });

            function submitPenolakan() {
                const alasan = document.getElementById('alasan').value.trim(); // Ambil nilai dari textarea 'alasan'

                if (alasan === '') {
                    Swal.fire({
                        title: "Error!",
                        text: "Mohon isi alasan penolakan.",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                } else {
                    // Submit form langsung tanpa hidden input
                    document.getElementById('formDitolak').submit();
                }
            }
        </script>
        {{-- <script>
                    function updateStatus(Status, button) {
                        var alasan = '';
                        if (Status === 'Ditolak') {
                            alasan = document.getElementById('alasan').value.trim();
                            if (alasan === '') {
                                alert('Mohon isi alasan penolakan.');
                                return;
                            }
                        }

                        var id = {{ $kedatangan->id_kedatangan_tamu }}; // Ambil ID dari variabel PHP

                        // Kirim permintaan AJAX
                        fetch(`/kedatangan/${id}/update-status`, {
                                method: 'PATCH',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    Status: Status,
                                    alasan: alasan
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Update tampilan
                                    document.getElementById('currentStatus').textContent = Status;

                                    // Sembunyikan tombol status
                                    var statusButtons = document.getElementById('Status');
                                    if (statusButtons) statusButtons.style.display = 'none';

                                    var alasanDisplay = document.getElementById('alasanDisplay');
                                    if (Status === 'Ditolak') {
                                        document.getElementById('currentAlasan').textContent = alasan;
                                        alasanDisplay.style.display = 'block';
                                    } else {
                                        alasanDisplay.style.display = 'none';
                                    }

                                    // Sembunyikan field alasan
                                    var alasanField = document.getElementById('alasanField');
                                    if (alasanField) alasanField.style.display = 'none';
                                } else {
                                    alert('Terjadi kesalahan saat memperbarui status.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Terjadi kesalahan saat memperbarui status.');
                            });
                    }

                    // Tambahkan event listener untuk tombol status
                    document.querySelectorAll('.status-btn').forEach(button => {
                        button.addEventListener('click', function() {
                            var Status = this.textContent.trim();
                            if (Status === 'Ditolak') {
                                document.getElementById('alasanField').style.display = 'block';
                            } else {
                                document.getElementById('alasanField').style.display = 'none';
                            }
                        });
                    });
                </script> --}}
        {{-- <script>
                    function showDetails(type, id) {
                        fetch(`/kedatangan/${type}/${id}/detail`)
                            .then(response => response.json())
                            .then(data => {
                                let detailHtml = `
                <h5 class="card-title">${data.jenis_kedatangan}</h5>
                <p>
                    <strong>Nama Pengunjung:</strong> ${data.nama_pengunjung}<br>
                    <strong>Pegawai yang Dikunjungi:</strong> ${data.nama_pegawai}<br>
                    <strong>NIP Pegawai:</strong> ${data.nip_pegawai}<br>
                    ${data.tujuan ? `<strong>Tujuan:</strong> ${data.tujuan}<br>` : ''}
                    ${data.instansi ? `<strong>Instansi:</strong> ${data.instansi}<br>` : ''}
                    ${data.ekspedisi ? `<strong>Ekspedisi:</strong> ${data.ekspedisi}<br>` : ''}
                    <strong>Waktu:</strong> ${data.waktu_perjanjian}<br>
                    <strong>Dibuat pada:</strong> ${data.created_at}
                </p>
            `;
                                document.getElementById('detailContent').innerHTML = detailHtml;
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                document.getElementById('detailContent').innerHTML = 'Terjadi kesalahan saat mengambil data';
                            });
                    }
                </script> --}}

        {{-- <script>
            document.querySelectorAll('select[name="status"]').forEach(select => {
                select.addEventListener('change', function() {
                    const modalId = this.closest('.modal').id;
                    const alasanGroup = document.querySelector(
                        `#${modalId} #alasanGroup${modalId.replace('konfirmasiModal', '')}`);
                    alasanGroup.classList.toggle('d-none', this.value !== 'ditolak');
                });
            });
        </script> --}}

        {{-- <script>
    const tamuData = @json($tamu_data);
    const kurirData = @json($kurir_data);

    const ctx = document.getElementById('roleChart').getContext('2d');
    const roleChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ],
            datasets: [{
                    label: 'Tamu',
                    data: tamuData, // Data tamu yang diambil dari backend
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Kurir',
                    data: kurirData, // Data kurir yang diambil dari backend
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Perbandingan Data Tamu dan Kurir untuk Tahun Ini'
                }
            }
        }
    });
</script> --}}
