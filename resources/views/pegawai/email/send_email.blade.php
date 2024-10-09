<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberitahuan Kedatangan Tamu</title>
</head>
<body>
    <h1>Pemberitahuan Kedatangan Tamu</h1>
    <p>Kepada Yth. {{ $kedatangan_tamu->pegawai->user->name }},</p>
    <p>Anda memiliki tamu yang akan datang dengan detail sebagai berikut:</p>
    <ul>
        <li>Nama Tamu: {{ $kedatangan_tamu->tamu->Nama }}</li>
        <li>Tujuan: {{ $kedatangan_tamu->Tujuan }}</li>
        <li>Waktu Perjanjian: {{ $kedatangan_tamu->Waktu_perjanjian }}</li>
    </ul>
    <p>Silakan konfirmasi kedatangan tamu ini:</p>
    
    <a href="{{ route('kedatangan.submit-terima', ['id' => $kedatangan_tamu->id_kedatangan_tamu, 'token' => $kedatangan_tamu->token, 'action' => 'terima']) }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; margin: 4px 2px;">Terima</a>
    <a href="{{ route('kedatangan.submit-terima', ['id' => $kedatangan_tamu->id_kedatangan_tamu, 'token' => $kedatangan_tamu->token, 'action' => 'tolak']) }}" style="background-color: #f44336; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; margin: 4px 2px;">Tolak</a>
    
    <p>Jika Anda menolak kedatangan tamu, silakan klik tombol "Tolak" dan berikan alasan penolakan pada halaman yang akan muncul.</p>
    
    <p>Terima kasih atas perhatiannya.</p>
</body>
</html>