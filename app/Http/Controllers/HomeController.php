<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Ekspedisi;
use Illuminate\Http\Request;
use App\Models\KedatanganTamu;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\KedatanganEkspedisi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
    public function kunjungan()
    {
        return view('pegawai.kunjungan');
    }

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
        // dd($request->all());
        $pegawai = Pegawai::with('user')->get();

        $tamu = Tamu::create([
            'Nama' => $request->name,
            'No_telp' => $request->No_telp,
            'Alamat' => $request->alamat,
            'Email' => $request->email,
        ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => 'PEG',
        // ]);

        if ($tamu) {

            $kedatangan_tamu = KedatanganTamu::create([
                'id_pegawai' => $request->pegawai,
                'id_tamu' => $tamu->id_tamu,
                // 'id_user' => $user->id,
                'QR_code' => $request->qr_code,
                'Tujuan' => $request->tujuan,
                'Instansi' => $request->instansi,
                'Waktu_perjanjian' => $request->waktu_perjanjian,

            ]);

            return redirect()->back()->with('success', 'janji temu berhasil dibuat');
        }
    }

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
}
