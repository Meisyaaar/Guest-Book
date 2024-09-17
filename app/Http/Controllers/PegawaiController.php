<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Imports\PegawaiImport;
use App\Models\KedatanganTamu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        // $pegawai = Pegawai::whereHas('user', function ($query) {
        //     $query->where('role', 'ADM');
        // })->get();

        
        $pegawai= Pegawai::all();
        // $pegawai = Pegawai::with("user")->get();
        return view('admin.pegawai',compact('pegawai'));
    }

    public function storePegawai(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'PEG',
        ]);

        // Cek apakah user berhasil dibuat
        if ($user) {
            // Buat pegawai baru
            $pegawai = Pegawai::create([
                'id_user' => $user->id,
                'NIP' => $request->NIP,
                'No_telp' => $request->No_telp,
                'PTK' => $request->PTK,
            ]);

            return redirect()->back()->with('success', 'Pegawai berhasil ditambahkan');

        }    
            return redirect()->back()->with('error', 'Gagal menambahkan pegawai');
    }


    public function updatePegawai(Request $request)
    {
        // dd($request->all());


        // Ambil data pegawai berdasarkan nip
        $pegawai = Pegawai::where('NIP', $request->input('NIPtoUpdate'))->first();

        if ($pegawai) {
            // Update atribut-atribut yang sesuai dari model Pegawai
            $pegawai->NIP = $request->input('newNIP');
            $pegawai->No_telp = $request->input('newNo_telp');
            $pegawai->PTK = $request->input('newPTK');

            // Simpan perubahan pada pegawai
            $pegawai->save();

            // Update juga atribut user jika diperlukan
            if ($pegawai->user) {
                $pegawai->user->name = $request->input('newNama');
                $pegawai->user->email = $request->input('newEmail');
                // Pastikan untuk mengenkripsi password jika diubah
                if (!empty($request->input('newPassword'))) {
                    $pegawai->user->password = bcrypt($request->input('newPassword'));
                }
                $pegawai->user->save();

            }
            // dd($request->all());

            return redirect()->back()->with('message', 'Pegawai updated successfully');
        } else {
            return redirect()->back()->with('error', 'Pegawai not found');
        }
    }


    public function deletePegawai($id_user){
            $pegawai=Pegawai::with('user')->where('id_user', $id_user)->firstOrFail();
            // dd($pegawai);
            $pegawai->delete();
            $pegawai->user->delete();
            return redirect('pegawai')->with('success', 'Pegawai berhasil di hapus');
    }


    // public function importExcel(){
    //     return view('admin.pegawai');
    // }

    public function importExcelPost(Request $request){
        // dd($request->all());
        $request->validate([

            'file' => 'required|mimes:xls,xlsx'

        ]);

        // dd($request->all());
        try {
            Excel::import(new PegawaiImport, $request->file('file'));

            return redirect()->back()->with('success', 'Data pegawai berhasil diimport');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengimport data: ' . $e->getMessage());
        }



    }

   
}
