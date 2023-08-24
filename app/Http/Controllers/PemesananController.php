<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{
    function viewFormPemesanan()
    {
        $hotel = Hotel::get();

        return view('pemesanan.form-pemesanan', ['hotel' => $hotel]);
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

    function createPemesanan(Request $request)
    {

        // validate request input
        $validator = Validator::make($request->all(), [
            "no_identitas" => "required|digits:16",
            "durasi" => "required|numeric|min:1",
        ], [
            "digits" => "isian salah..data harus 16 digit",
            "numeric" => "harus isi angka",
        ]);

        // dd($validator->fails());
        // jika validasi input form tidak valid
        if ($validator->fails()) {
            return redirect(route("pemesanan.form-pemesanan"))
                ->withErrors($validator)
                ->withInput();
        }

        // hitung total harga
        $totalHarga = $this->totalHarga($request->tipe_kamar, $request->durasi, $request->breakfast);
        $dataPemesanan = Pemesanan::create([
            "nama" => $request->nama,
            "id_hotel" => $request->tipe_kamar,
            "no_identitas" => $request->no_identitas,
            "jenis_kelamin" => $request->jk,
            "tanggal_pesan" => $request->tanggal_pesan,
            "durasi" => $request->durasi,
            "total" => $totalHarga,
        ]);
        return view("pemesanan.invoice", ["pemesanan" => $dataPemesanan]);
    }

    // total harga
    function totalHarga($idHotel, $durasi, $breakfast)
    {
        $hotel = Hotel::find($idHotel);
        $totalHarga = $hotel->harga * $durasi;
        // kalo durasinya lebih dari 3 hari kasih diskon 10%
        if ($durasi > 3) {
            $totalHarga = $totalHarga - ($totalHarga * 0.10);
        }

        // kalo mau breakfast tambah 80000 total harganya
        if ($breakfast) {
            $totalHarga += 80000;
        }

        return $totalHarga;
    }
}
