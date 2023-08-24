<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hotel;

class PemesananController extends Controller
{
    function viewFormPemesanan()
    {
        $hotel = Hotel::get();
        
        return view('pemesanan.form-pemesanan', ['hotel'=> $hotel]);
    }

    // function createPemesanan(Request $request)
    // {
    //     $wisata = Wisata::find($request->id_wisata);

    //     if (!$wisata) {
    //         return redirect()->back()->with('error', 'Wisata tidak ditemukan');
    //     }

    //     $hargaWisata = $wisata->harga;
    //     $total = ($request->pengunjung_dws * $hargaWisata) + ($request->pengunjung_anak * $hargaWisata * 0.5);

        

    //     $pemesanan = Pemesanan::create([
    //         'nama' => $request->nama,
    //         'no_identitas' => $request->no_identitas,
    //         'no_hp' => $request->no_hp,
    //         'pengunjung_dws' => $request->pengunjung_dws,
    //         'pengunjung_anak' => $request->pengunjung_anak,
    //         'tanggal_kunjungan' => $request->tanggal_kunjungan,
    //         'id_wisata' => $request->id_wisata,
    //         'total' => $total,
            
    //     ]);

    //     return redirect()->back()->with('success', 'Pemesanan berhasil dilakukan');
    // }
}
