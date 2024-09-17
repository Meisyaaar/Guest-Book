@extends('layouts.user')

@section('content')
    <img src="{{ asset('img/user/kotak-pegawai.svg') }}" class="position-absolute h-100" alt="">
    @include('user.component.navbar')



    <h3 style="text-align: center;">Guru dan Tenaga Kependidikan </h3>
    <div class="pp">
        <a href="">
            <button id="btn-guru" class="btn-pegawai">Guru</button>
        </a>

        <a href="" style="margin-left: 2rem">
            <button id="btn-tendik" class="btn-pegawai">Tendik</button>
        </a>
    </div>

    <div class="page-content">
        <section class="section">
            <div class="row" id="table-head">
                <div class="tbl-peg-usr">
                    <div class="card shadow " style="margin-left: 4rem; margin-right:4rem">
                        <div class="card-header">
                            <div class="row-mb-3">
                                {{-- search --}}
                                <div class="col-sm-6 col-md-4 mb-2">
                                    <input name="search" type="text" id="searchInput" class="form-control"
                                        style="margin-top: 12px" placeholder="search" value="">
                                </div>
                                {{-- filter PTK --}}
                                {{-- <div class="col-sm-6 col-md-4">
                                    <div class="filterPtk ">
                                        <label class="form-label"></label>
                                        <select id="filterPtk" class="form-select">
                                            <option value="">PTK</option>
                                            <option value="B.inggris">B.Inggris</option>
                                            <option value="RPL">RPL</option>
                                            <option value="Tendik">Tendik</option>

                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                            {{-- import excel --}}
                            {{-- <form action="{{ route('importExcelPost') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <input type="file" name="file" required>
                                    <button type="submit" class="btn-import">import</button>
                                </div>
                            </form> --}}
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="flex items-center">
                                            <table class="table mb-0" id="pegawaiTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>NIP</th>
                                                        <th>PTK</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pegawai as $data)
                                                        <tr data-ptk="{{ $data->PTK }}">
                                                            <td>{{ $data->user->name }}</td>
                                                            <td>{{ $data->NIP }}</td>
                                                            <td>{{ $data->PTK }}</td>
                                                            <td>{{ $data->user->email }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <!-- <p>Similar to tables and dark tables, use the modifier classes <code
                                                                  class="highlighter-rouge">.thead-light</code> or data-pegawai='<code
                                              class="highlighter-rouge">.thead-dark</code> to
                                          make <code class="highlighter-rouge">&lt;thead&gt;</code>s appear light or dark gray.
                                      </p> -->
                                </div>
                                <!-- table head dark -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('myscript')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnGuru = document.getElementById('btn-guru');
    const btnTendik = document.getElementById('btn-tendik');
    const rows = document.querySelectorAll('#pegawaiTable tbody tr');

    function filterTable(showTendik) {
        rows.forEach(row => {
            const ptk = row.getAttribute('data-ptk').toLowerCase();
            if (showTendik) {
                row.style.display = ptk === 'tendik' ? '' : 'none';
            } else {
                row.style.display = ptk !== 'tendik' ? '' : 'none';
            }
        });
    }

    btnGuru.addEventListener('click', function(e) {
        e.preventDefault();
        filterTable(false);
        btnGuru.classList.add('active');
        btnTendik.classList.remove('active');
    });

    btnTendik.addEventListener('click', function(e) {
        e.preventDefault();
        filterTable(true);
        btnTendik.classList.add('active');
        btnGuru.classList.remove('active');
    });

    // Tampilkan data Guru saat halaman pertama kali dimuat
    filterTable(false);
    btnGuru.classList.add('active');
});
</script>
@endpush

