<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wisatas = Wisata::all();
        
        $wst_favorit = Wisata::JOIN('pesan_tiket as p','wisata.idwisata','p.wisata_idwisata')
        ->JOIN('jadwal_has_wisata as jw','wisata.idwisata','jw.wisata_idwisata')
        ->select(DB::raw('count(p.nomor_tiket) AS total_kunjungan, MIN(jw.tarif) as minHarga, MAX(jw.tarif) as maxHarga'),'wisata.*')
        ->groupBy('wisata.idwisata')
        ->orderByRaw('total_kunjungan DESC')
        ->limit(3)
        ->get();

        return view('home', compact('wisatas','wst_favorit'));

    }

    public function loadSelectBox($id)
    {
        $jadwals = Wisata::JOIN('jadwal_has_wisata as jw','wisata.idwisata','jw.wisata_idwisata')->JOIN('jadwal as j','jw.jadwal_idjadwal','j.idjadwal')
        ->WHERE('wisata.idwisata','=',$id)->SELECT('j.idjadwal','j.hari','j.jam_awal', 'j.jam_akhir')->get();

        //dd($jadwals);
        return response()->json(['data' => $jadwals], 200);
    }
}
