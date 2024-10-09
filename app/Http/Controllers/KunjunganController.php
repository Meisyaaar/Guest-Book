<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\KedatanganTamu;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\KedatanganEkspedisi;
use Illuminate\Support\Facades\Auth;

class KunjunganController extends Controller
{
    public function Kunjungan()
    {

        // $idTamu = Auth::id();
        // $tamu = KedatanganTamu::where('id_tamu', $idTamu);
        // $status = KedatanganTamu::where('Status', 'Menunggu konfirmasi')->get();

        return view('admin.kunjungan');
    }

    public function list_kunjungan(Request $request)
    {
        $user_id = Auth::id();
        $pegawai = Pegawai::where('id_user', $user_id)->first();
        $nip = $pegawai->NIP; // Asumsikan user yang login adalah pegawai


        // // Query untuk Kedatangan Ekspedisi
        // $listKunjunganEkspedisi = KedatanganEkspedisi::select(
        //     'id_pegawai',
        //     'id_ekspedisi',
        //     DB::raw('NULL as Tujuan'), // Tidak ada tujuan untuk ekspedisi
        //     DB::raw('NULL as Instansi'), // Tidak ada instansi untuk ekspedisi
        //     'Tanggal_waktu as Waktu_perjanjian',
        //     'created_at',
        //     DB::raw('\'Ekspedisi\' as jenis_kunjungan') // Penanda eksplisit untuk ekspedisi
        // )
        //     ->with('ekspedisi') // Eager load untuk mengambil data kurir/ekspedisi
        //     ->with('pegawai') // Ambil data pegawai jika perlu
        //     ->where('id_pegawai', $nip)
        //     ->get(); // Use get() to fetch the results

        // // Query untuk Kedatangan Tamu
        // $listKunjunganTamu = KedatanganTamu::select(
        //     'id_pegawai',
        //     'id_tamu',
        //     'Tujuan',
        //     'Instansi',
        //     'Waktu_perjanjian',
        //     'created_at',
        //     DB::raw('\'Tamu\' as jenis_kunjungan') // Penanda eksplisit
        // )
        //     ->with('tamu') // Eager load untuk mengambil data tamu
        //     ->with('pegawai') // Ambil data pegawai jika perlu
        //     ->where('id_pegawai', $nip)
        //     ->get(); // Fetch results for tamu

        // Merge the two collections
        // $listKunjungan = $listKunjunganEkspedisi->concat($listKunjunganTamu);

        // // Sorting setelah penggabungan
        // $listKunjungan = $listKunjungan->sortByDesc('created_at');
        $kedatanganTamu = KedatanganTamu::with('pegawai.user')                                                                                          
            ->whereHas('pegawai', function ($query) use ($nip) {
                $query->where('NIP', $nip); // Filter berdasarkan NIP pegawai yang login
            })
            ->get();

        $kedatanganEkspedisi = KedatanganEkspedisi::with('pegawai.user')
            ->whereHas('pegawai', function ($query) use ($nip) {
                $query->where('NIP', $nip); // Filter berdasarkan NIP pegawai yang login
            })
            ->get();
        $listKunjungan = $kedatanganTamu->concat($kedatanganEkspedisi)->sortByDesc('Waktu_perjanjian');


        $bulan = Carbon::now()->month;
        $belumDiKonfir = KedatanganTamu::where('Status', 'Menunggu konfirmasi')
        ->whereMonth('created_at', $bulan)  // Filter berdasarkan bulan
        ->count();

        $Diterima = KedatanganTamu::where('Status', 'Diterima')
        ->whereMonth('created_at', $bulan)  // Filter berdasarkan bulan
        ->count();

        $Ditolak = KedatanganTamu::where('Status', 'Ditolak')
        ->whereMonth('created_at', $bulan)  // Filter berdasarkan bulan
        ->count();


        // Lanjutkan ke view
        return view('pegawai.kunjungan', compact(
            'listKunjungan',
            'belumDiKonfir',
            'Diterima',
            'Ditolak'
        ));
    }
    // public function getDetail($type, $id)
    // {
    //     if ($type === 'tamu') {
    //         $kedatangan = KedatanganTamu::with('pegawai.user')->findOrFail($id);
    //         $data = [
    //             'id' => $kedatangan->id,
    //             'jenis_kedatangan' => 'Kedatangan Tamu',
    //             'nama_pengunjung' => $kedatangan->tamu->Nama,
    //             'nama_pegawai' => $kedatangan->pegawai->user->name,
    //             'nip_pegawai' => $kedatangan->id_pegawai,
    //             'tujuan' => $kedatangan->Tujuan,
    //             'instansi' => $kedatangan->Instansi,
    //             'waktu_perjanjian' => $kedatangan->Waktu_perjanjian,
    //             'created_at' => $kedatangan->created_at->format('Y-m-d H:i:s')
    //         ];
    //     } elseif ($type === 'ekspedisi') {
    //         $kedatangan = KedatanganEkspedisi::with('pegawai.user')->findOrFail($id);
    //         $data = [
    //             'id' => $kedatangan->id,
    //             'jenis_kedatangan' => 'Kedatangan Ekspedisi',
    //             'nama_pengunjung' => $kedatangan->ekspedisi->Nama_kurir,
    //             'nama_pegawai' => $kedatangan->pegawai->user->name,
    //             'nip_pegawai' => $kedatangan->id_pegawai,
    //             'ekspedisi' => $kedatangan->ekspedisi->Ekspedisi,
    //             'waktu_perjanjian' => $kedatangan->Waktu_perjanjian,
    //             'created_at' => $kedatangan->created_at->format('Y-m-d H:i:s')
    //         ];
    //     } else {
    //         return response()->json(['error' => 'Invalid kedatangan type'], 400);
    //     }

    //     return response()->json($data);

    // }

    public function getDetail($id_kedatangan)
    {
        $item = KedatanganTamu::find($id_kedatangan) ?? KedatanganEkspedisi::find($id_kedatangan);
        if ($item) {
            $item->formatWaktu = Carbon::parse($item->waktu_kedatangan ?? $item->waktu_Tanggal_waktu)->translatedFormat('H:i l, d-m-Y');
            $item->type = ['tamu', 'kurir'];
        }

        return view('components.pegawai.card_detail', compact('item'))->render();
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'Status' => 'required|in:Diterima,Ditolak',
            'alasan' => 'required_if:Status,Ditolak',
        ]);

        $kedatangan = KedatanganTamu::findOrFail($id);
        $kedatangan->Status = $request->Status;

        if ($request->Status === 'Ditolak') {
            $kedatangan->alasan = $request->alasan;
        } else {
            $kedatangan->alasan = null; // Reset alasan jika status bukan Ditolak
        }

        $kedatangan->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
