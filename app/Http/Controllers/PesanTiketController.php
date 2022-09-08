<?php

namespace App\Http\Controllers;

use App\Models\PesanTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wisata;

class PesanTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wisatas = Wisata::all();
        return view('pesantiket.form', compact('wisatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesanTiket  $pesanTiket
     * @return \Illuminate\Http\Response
     */
    public function show(PesanTiket $pesanTiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesanTiket  $pesanTiket
     * @return \Illuminate\Http\Response
     */
    public function edit(PesanTiket $pesanTiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PesanTiket  $pesanTiket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesanTiket $pesanTiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesanTiket  $pesanTiket
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesanTiket $pesanTiket)
    {
        //
    }

    public function cekTiket(Request $request)
    {
        $destinasi = $request->nama_wisata;
        $tanggal_pesan = $request->tanggal_pesan;
        $jamWisata = $request->jam_wisata;
        $qty_tktdewasa = $request->tiket_dewasa;
        $qty_tktanak = $request->tiket_anak;

        $cekTotalPemesan = PesanTiket::JOIN('wisata as w','pesan_tiket.wisata_idwisata','w.idwisata')
        ->WHERE('w.idwisata','=',$destinasi)
        ->WHERE('pesan_tiket.tgl_kunjungan','=',$tanggal_pesan)
        ->WHERE('pesan_tiket.jadwal_idjadwal','=',$jamWisata)
        ->SELECT(DB::raw('sum(pesan_tiket.qty_tiket) as total_pemesan, pesan_tiket.jadwal_idjadwal,pesan_tiket.tgl_kunjungan'))
        ->groupBy('pesan_tiket.jadwal_idjadwal','pesan_tiket.tgl_kunjungan')
        ->get();

        $kuota = Wisata::JOIN('jadwal_has_wisata as jw','wisata.idwisata','jw.wisata_idwisata')
        ->WHERE('jw.wisata_idwisata','=', $destinasi)
        ->WHERE('jw.jadwal_idjadwal','=', $jamWisata)
        ->SELECT('jw.kuota')
        ->get();

        return response()->json(["total_pemesan" => $cekTotalPemesan, "kuota" => $kuota]);
    }
}
