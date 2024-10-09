<?php

namespace App\Http\Controllers;

use DNS2D;
use App\Models\Tamu;
use App\Models\User;
use App\Mail\SendEmail;
use App\Models\Pegawai;
use App\Models\Ekspedisi;
use App\Mail\SendEmailTamu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KedatanganTamu;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\KedatanganEkspedisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function index()
    {
        $currentDay = Carbon::today()->day;
        $totalTamuHariIni = KedatanganTamu::whereDay('waktu_kedatangan', $currentDay)->count();
        $totalKurirHariIni = KedatanganEkspedisi::whereDay('tanggal_waktu', $currentDay)->count();
        // $totalGuru = ... // Anda perlu menambahkan logika untuk ini

        $totalGuru = Pegawai::where('PTK', '!=', 'Tendik')->count();

        // Menghitung total tendik
        $totalTendik = Pegawai::where('PTK', 'Tendik')->count();


        $route = 'admin.dashboard'; // atau route lain yang sesuai

        // Query untuk tamu
        $tamu_per_bulan = DB::table('kedatangan_tamu')
            ->select(DB::raw('MONTH(Waktu_kedatangan) as bulan'), DB::raw('COUNT(*) as jumlah_tamu'))
            ->whereYear('Waktu_kedatangan', Carbon::now()->year)
            ->groupBy(DB::raw('MONTH(Waktu_kedatangan)'))
            ->pluck('jumlah_tamu', 'bulan')
            ->toArray();

        // Query untuk kurir
        $kurir_per_bulan = DB::table('kedatangan_ekspedisi')
            ->select(DB::raw('MONTH(Tanggal_waktu) as bulan'), DB::raw('COUNT(*) as jumlah_kurir'))
            ->whereYear('Tanggal_waktu', Carbon::now()->year)
            ->groupBy(DB::raw('MONTH(Tanggal_waktu)'))
            ->pluck('jumlah_kurir', 'bulan')
            ->toArray();

        $tamu_data = array_fill(1, 12, 0);
        $kurir_data = array_fill(1, 12, 0);

        // Isi array tamu berdasarkan bulan
        foreach ($tamu_per_bulan as $bulan => $jumlah) {
            $tamu_data[(int)$bulan] = $jumlah;
        }

        // Isi array kurir berdasarkan bulan
        foreach ($kurir_per_bulan as $bulan => $jumlah) {
            $kurir_data[(int)$bulan] = $jumlah;
        }

        // Konversi ke format yang diharapkan oleh Chart.js
        $tamu_data = array_values($tamu_data);
        $kurir_data = array_values($kurir_data);

        return view('admin.dashboard', compact(
            'totalTamuHariIni',
            'totalKurirHariIni',
            'tamu_data',
            'kurir_data',
            'totalGuru',
            'totalTendik',
            'route'
        ));

        // return view('admin.dashboard', compact('route', 'totalTamuHariIni', 'totalKurirHariIni', 'tamu_data', 'kurir_data'));
    }

    // public function admin()
    // {
    //     return view ('admin.dashboard');
    // }
    public function FO()
    {
        return view('fo.dashboard');
    }


    public function handleScan(Request $request)
    {
        // Ambil nilai ID dari QR code
        $id_kedatangan_tamu = $request->QR_code; // QR code di sini adalah id_kedatangan_tamu

        // Cari tamu berdasarkan ID kedatangan tamu
        $kedatangan_tamu = KedatanganTamu::with('tamu')->find($id_kedatangan_tamu); // Pastikan untuk memuat relasi

        // Jika tamu tidak ditemukan, kembalikan pesan error
        if (!$kedatangan_tamu) {
            return redirect()->back()->with('error', 'Tamu tidak ditemukan.');
        }

        // Cek apakah tamu sudah check-in sebelumnya
        if ($kedatangan_tamu->Waktu_kedatangan) {
            $checkinTime = $kedatangan_tamu->Waktu_kedatangan->format('d/m/Y H:i:s');
            return redirect()->back()->with('warning', "Tamu {$kedatangan_tamu->tamu->Nama} sudah check-in pada {$checkinTime}.");
        }

        // Update field Waktu_kedatangan dengan waktu saat ini
        $kedatangan_tamu->Waktu_kedatangan = Carbon::now(); // Waktu saat ini
        $kedatangan_tamu->save(); // Simpan perubahan ke database

        // Simpan detail tamu ke session
        session(['tamuDetail' => $kedatangan_tamu->tamu]);

        // Berikan pesan sukses setelah check-in berhasil
        return redirect()->back()->with('success', 'Check-in berhasil untuk tamu: ' . $kedatangan_tamu->tamu->Nama);
    }


    public function pegawai()
    {

        $user_id = Auth::id();

        // Ambil NIP pegawai berdasarkan ID pengguna
        $pegawai = Pegawai::where('id_user', $user_id)->first();

        $nip = $pegawai->NIP;
        $currentDay = Carbon::today()->day;

        // Hitung total tamu berdasarkan NIP pegawai
        $totalTamuPegawai = KedatanganTamu::where('id_pegawai', $nip)
            ->whereDay('waktu_kedatangan', $currentDay)
            ->count();

        // Hitung total kurir berdasarkan NIP pegawai
        $totalKurirPegawai = KedatanganEkspedisi::where('id_pegawai', $nip)
            ->whereDay('tanggal_waktu', $currentDay)
            ->count();

        // Query untuk tamu

        $tamu_peg_bulan = DB::table('kedatangan_tamu')
            ->select(DB::raw('MONTH(Waktu_kedatangan) as bulan'), DB::raw('COUNT(*) as jumlah_tamu'))
            ->whereYear('Waktu_kedatangan', Carbon::now()->year)
            ->where('id_pegawai', $nip) // Filter berdasarkan user_id
            ->groupBy(DB::raw('MONTH(Waktu_kedatangan)'))
            ->pluck('jumlah_tamu', 'bulan')
            ->toArray();

        // Query untuk kurir
        $kurir_peg_bulan = DB::table('kedatangan_ekspedisi')
            ->select(DB::raw('MONTH(Tanggal_waktu) as bulan'), DB::raw('COUNT(*) as jumlah_kurir'))
            ->whereYear('Tanggal_waktu', Carbon::now()->year)
            ->where('id_pegawai', $nip) // Filter berdasarkan user_id
            ->groupBy(DB::raw('MONTH(Tanggal_waktu)'))
            ->pluck('jumlah_kurir', 'bulan')
            ->toArray();

        // Inisialisasi array dengan 0 untuk semua bulan
        $tamu_datap = array_fill(1, 12, 0);
        $kurir_datap = array_fill(1, 12, 0);

        // Isi array tamu berdasarkan bulan
        foreach ($tamu_peg_bulan as $bulan => $jumlah) {
            $tamu_datap[(int)$bulan] = $jumlah;
        }

        // Isi array kurir berdasarkan bulan
        foreach ($kurir_peg_bulan as $bulan => $jumlah) {
            $kurir_datap[(int)$bulan] = $jumlah;
        }

        // Konversi ke format yang diharapkan oleh Chart.js
        $tamu_datap = array_values($tamu_datap);
        $kurir_datap = array_values($kurir_datap);



        // Kirim data ke view
        return view('pegawai.dashboard', compact(
            'pegawai',
            'totalTamuPegawai',
            'totalKurirPegawai',
            'tamu_datap',
            'kurir_datap',
        ));
    }

    public function Laporantamu()
    {
        return view('pegawai.Laporan_tamu');
    }

    public function Laporankurir()
    {
        return view('pegawai.Laporan_kurir');
    }
    // public function kunjungan()
    // {
    //     return view('pegawai.kunjungan');
    // }

    public function formTamu()
    {
        $pegawai = Pegawai::all();
        $kedatangan_tamu = KedatanganTamu::all();
        return view('user.formTamu', compact('pegawai', 'kedatangan_tamu'));
    }

    public function formKurir()
    {
        $pegawai = Pegawai::all();
        $kedatangan_ekspedisi = KedatanganEkspedisi::all();
        return view('user.formKurir', compact('pegawai', 'kedatangan_ekspedisi'));
    }



    public function user_pegawai()
    {
        $pegawai = Pegawai::all();
        return view('user.pegawai', compact('pegawai'));
    }

    public function about_us()
    {
        return view('user.about_us');
    }

    public function add_tamu(Request $request)
    {
        $pegawai = Pegawai::with('user')->find($request->pegawai);


        $tamu = Tamu::create([
            'Nama' => $request->name,
            'No_telp' => $request->No_telp,
            'Alamat' => $request->alamat,
            'Email' => $request->email,
        ]);

        $token = Str::random(60);

        $pegawai = Pegawai::with('user')->find($request->pegawai);
        $imageData = $request->input('image');
        $fileName = uniqid() . '.jpg';
        $filePath = 'uploads/' . $fileName;
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        $kedatangan_tamu = KedatanganTamu::create([
            'id_pegawai' => $request->pegawai,
            'id_tamu' => $tamu->id_tamu,
            'Tujuan' => $request->tujuan,
            'Instansi' => $request->instansi,
            'Waktu_perjanjian' => $request->waktu_perjanjian,
            'Foto' => $filePath,
            'Waktu_kedatangan' => $request->waktu_kedatangan,
            'Status' => 'Menunggu konfirmasi',
            'token' => $token,
        ]);


        // Simpan file ke storage
        Storage::put('public/' . $filePath, $image);

        $qrCodeContent = $kedatangan_tamu->id_kedatangan_tamu;
        $qrCodePng = \DNS2D::getBarcodePNG($qrCodeContent, 'QRCODE');

        // Save QR code to storage
        $qrCodePath = 'qrcodes/' . $kedatangan_tamu->id_kedatangan_tamu . '.png';
        Storage::put('public/' . $qrCodePath, base64_decode($qrCodePng));

        // Update the database with the QR code path
        $kedatangan_tamu->QR_code = $qrCodePath;
        $kedatangan_tamu->save();

        // Send email to staff
        Mail::to($pegawai->user->email)->send(new SendEmail($kedatangan_tamu, $tamu));




        return redirect()->back()->with('success', 'Berhasil membuat janji temu.');
    }
    public function konfirmasiKedatangan($id, $token, $action)
    {
        $kedatangan_tamu = KedatanganTamu::findOrFail($id);
        $tamu = Tamu::findOrFail($kedatangan_tamu->id_tamu);

        if ($kedatangan_tamu->token !== $token) {
            return redirect()->back();
        }

        if ($action === 'terima') {

            $kedatangan_tamu->update(['Status' => 'Diterima', 'token' => null]);
            $qrCodePath = 'qrcode/' . $kedatangan_tamu->id_kedatangan_tamu . 'png';
            \Storage::disk('public')->put($qrCodePath, base64_decode($kedatangan_tamu->QR_code));
            $fullQr_code = public_path('storage/' . $qrCodePath);

            // Mail::to($tamu->email)->send(new SendEmailTamu($kedatangan_tamu, $tamu));

            $kedatangan_tamu->update(['Status' => 'Diterima', 'token' => null]);

            Mail::to($tamu->Email)->send(new SendEmailTamu($kedatangan_tamu, $tamu));

            return view('pegawai.email.confir_terima', ['status' => 'Diterima']);
        } elseif ($action === 'tolak') {
            
            return view('pegawai.email.alasan', compact('id', 'token'));
        }

        // return view('pegawai.email.confir_terima');
    }

    public function submitTolak(Request $request, $id, $token)
    {
        // $kedatangan_tamu = KedatanganTamu::findOrFail($id);

        $request->validate([
            'alasan' => 'required|string|max:255'
        ]);

        $kedatangan_tamu = KedatanganTamu::findOrFail($id);
        $tamu = Tamu::findOrFail($kedatangan_tamu->id_tamu);

        if ($kedatangan_tamu->token !== $token) {
            return view('pegawai.email.confir_terima');
        }

        $kedatangan_tamu->update([
            'Status' => 'Ditolak',
            'alasan' => $request->input('alasan'),
            'token' => null
        ]);
        Mail::to($tamu->Email)->send(new SendEmailTamu($kedatangan_tamu, $tamu));

        return view('pegawai.email.confir_terima', ['status' => 'Ditolak', 'nama' => $kedatangan_tamu->tamu->nama]);
    }

    // public function tolakKedatangan(Request $request, $id, $token)
    // {
    //     $kedatangan = KedatanganTamu::findOrFail($id);

    //     if ($kedatangan->token_konfirmasi !== $token) {
    //         return redirect()->back()->with('error', 'Token tidak valid.');
    //     }

    //     $kedatangan->update([
    //         'Status' => 'Ditolak',
    //         'alasan' => $request->alasan
    //     ]);

    //     return redirect()->back()->with('success', 'Kedatangan tamu telah ditolak.');
    // }



    public function add_kurir(Request $request)
    {
        // dd($request->all());
        $pegawai = Pegawai::with('user')->get();

        $imageData = $request->input('image');
        $fileName = uniqid() . '.jpg';
        $filePath = 'uploads/' . $fileName;
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));

        // Simpan file ke storage
        Storage::put('public/' . $filePath, $image);

        // Buat record Ekspedisi
        $ekspedisi = Ekspedisi::create([
            'Nama_kurir' => $request->nama,
            'Ekspedisi' => $request->ekspedisi,
            'No_Telp' => $request->no_telp,  // Tambahkan baris ini
        ]);

        // Buat record KedatanganEkspedisi
        $kedatangan_ekspedisi = KedatanganEkspedisi::create([
            'id_ekspedisi' => $ekspedisi->id_ekspedisi,
            'id_pegawai' => $request->pegawai,
            'Foto' => $filePath,  // Simpan hanya path relatif
            'Tanggal_waktu' => $request->tanggal_waktu,
        ]);

        return redirect()->back()->with('success', 'berhasil');
    }




    public function updateStatusEmail($id, $status, $token)
    {
        // Temukan kedatangan berdasarkan ID
        $kedatangan = KedatanganTamu::find($id);

        // Validasi token yang dikirim dari email
        if (!$kedatangan || $kedatangan->token !== $token) {
            return redirect()->back()->with('error', 'Token tidak valid atau kedatangan tidak ditemukan.');
        }

        // Cek apakah status valid
        if (!in_array($status, ['Diterima', 'Ditolak'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        // Update status
        $kedatangan->Status = $status;

        // Jika statusnya Ditolak, arahkan ke form penolakan, jika Diterima simpan langsung
        if ($status === 'Ditolak') {
            return view('kedatangan.form_penolakan', compact('kedatangan'));
        } else {
            $kedatangan->save();
            return redirect()->back()->with('success', 'Status kunjungan telah diperbarui menjadi Diterima.');
        }
    }

    public function submitPenolakan(Request $request, $id, $token)
    {
        $kedatangan = KedatanganTamu::find($id);

        // Validasi token
        if (!$kedatangan || $kedatangan->token !== $token) {
            return redirect()->back()->with('error', 'Token tidak valid.');
        }

        // Simpan alasan penolakan
        $kedatangan->Status = 'Ditolak';
        $kedatangan->alasan = $request->input('alasan');
        $kedatangan->save();

        return redirect()->back()->with('success', 'Kunjungan telah ditolak dengan alasan.');
    }
}
