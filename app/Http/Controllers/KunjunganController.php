<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    public function Kunjungan(){
        return view('admin.kunjungan');
    }
}
