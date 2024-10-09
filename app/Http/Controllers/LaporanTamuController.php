<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\KedatanganTamu;

class LaporanTamuController extends Controller
{
    public function LaporanTamu(Request $request)
{
    // Mendapatkan input tanggal dari form (datetime-local)
    $startDate = $request->input('start');
    $endDate = $request->input('end');

    // Jika tidak ada input, gunakan tanggal bulan ini sebagai default
    if (!$startDate || !$endDate) {
        $startDate = Carbon::now()->startOfMonth()->toDateTimeString();
        $endDate = Carbon::now()->endOfMonth()->toDateTimeString();
    }

    // Query kedatangan tamu berdasarkan rentang waktu
    $KedatanganTamu = KedatanganTamu::with(['tamu', 'pegawai.user'])
        ->whereHas('pegawai.user')
        ->whereBetween('Waktu_perjanjian', [$startDate, $endDate])
        // ->get()
        ->paginate(7);

    // Kirim data ke view
    return view('admin.Laporan_tamu', compact(
        'KedatanganTamu',
        'startDate',
        'endDate'
    ));
}






}
