<?php

namespace App\Http\Controllers;

use App\Models\KedatanganEkspedisi;
use Illuminate\Http\Request;

class LaporanKurirController extends Controller
{
    public function LaporanKurir()
    {

        $KedatanganEkspedisi = KedatanganEkspedisi::with(['ekspedisi', 'pegawai.user'])
        ->whereHas('pegawai.user')
        ->get();

        return view('admin.laporan_kurir',compact('KedatanganEkspedisi'));
    }

    public function tabel_kurir()
    {
        
    }
}
