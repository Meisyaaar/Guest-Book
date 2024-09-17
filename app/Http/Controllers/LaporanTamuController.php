<?php

namespace App\Http\Controllers;

use App\Models\KedatanganTamu;
use Illuminate\Http\Request;

class LaporanTamuController extends Controller
{
    public function LaporanTamu()
    {
        $KedatanganTamu = KedatanganTamu::with(['tamu', 'pegawai.user'])
        ->whereHas('pegawai.user')
        ->get();

        // $KedatanganTamu = KedatanganTamu::with('user');
        return view('admin.Laporan_tamu', compact('KedatanganTamu'));
    }
}
