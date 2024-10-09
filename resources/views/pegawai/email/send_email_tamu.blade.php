<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Pemberitahuan permintaan kunjungan</h1>

    @if ($kedatangan_tamu->Status == 'Diterima')
        <p>Selamat permintaan pertemuan anda {{ $kedatangan_tamu->Status }}</p>
        <p>QR Code untuk kunjungan Anda telah dilampirkan dalam email ini. Silakan unduh dan simpan QR Code tersebut.</p>
        {{-- <img src="{{ $message->embed($qrCodePath) }}" alt="QR Code" width="300"> --}}
    @endif

    @if ($kedatangan_tamu->Status == 'Ditolak')
        <p>Mohon maaf, permintaan pertemuan anda {{ $kedatangan_tamu->Status }}</p>
        <p>dengan keterangan: {{ $kedatangan_tamu->alasan }}</p>
    @endif

    <p></p>
</body>

</html>
