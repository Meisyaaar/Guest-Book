@if(session('tamuDetail'))
    <script>
        var detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
        detailModal.show();
    </script>
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Tamu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>ID Tamu: {{ session('tamuDetail')->id_tamu }}</p>
                    <p>Nama: {{ session('tamuDetail')->Nama }}</p>
                    <p>No Telp: {{ session('tamuDetail')->No_telp }}</p>
                    <p>Alamat: {{ session('tamuDetail')->Alamat }}</p>
                    <p>Email: {{ session('tamuDetail')->Email }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endif
