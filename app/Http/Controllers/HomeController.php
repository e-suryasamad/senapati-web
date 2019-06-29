<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function masterArtikel()
    {
        $art = DB::table('artikel')
            // ->join('pemakalah', 'artikel.artikel_id', '=', 'pemakalah.artikel_id')
            ->select('artikel.artikel_id', 'artikel_judul', 'artikel_penulis')
            ->get();

        return view('adminMasterArtikel')
            ->with('art', $art)
            ->with('act', 'viewMasterArtikel');
    }
    public function tambahArtikel()
    {
        return view('adminMasterArtikel')
            ->with('act', 'viewTambahArtikel');
    }

    public function prosesTambahArtikel(Request $req){
        $artikel_id = $req->artikel_id;
        $artikel_judul = $req->artikel_judul;
        $artikel_penulis = $req->artikel_penulis;
        $artikel_abstrak = $req->artikel_abstrak;
        $artikel_status = $req->artikel_status;

        DB::table('artikel')
            ->insert(
                [
                    'artikel_id' => $artikel_id,
                    'artikel_judul' => $artikel_judul, 
                    'artikel_penulis' => $artikel_penulis, 
                    'artikel_abstrak' => $artikel_abstrak, 
                    'artikel_status' => $artikel_status, 
                ]
            );

        return redirect('admin/masterArtikel');
            // ->with('act', 'viewMasterArtikel');
    }

    public function editArtikel($artikel_id){
        $art = DB::table('artikel')
            ->where('artikel_id','=',$artikel_id)
            ->first();

        return view('adminMasterArtikel')
            ->with('art', $art)
            ->with('act', 'viewEditArtikel');
    }

    public function prosesEditArtikel(Request $req){
        $artikel_id = $req->artikel_id;
        $artikel_judul = $req->artikel_judul;
        $artikel_penulis = $req->artikel_penulis;
        $artikel_abstrak = $req->artikel_abstrak;
        $artikel_status = $req->artikel_status;

        $edit = DB::table('artikel')
            ->where('artikel_id','=',$artikel_id)
            ->update(
                [
                    'artikel_judul' => $artikel_judul, 
                    'artikel_penulis' => $artikel_penulis, 
                    'artikel_abstrak' => $artikel_abstrak, 
                    'artikel_status' => $artikel_status, 
                ]
            );

        return redirect('admin/masterArtikel')
            ->with('act', 'viewMasterArtikel');
    }

    public function deleteArtikel($artikel_id){
        $delete = DB::table('artikel')
            ->where('artikel_id','=',$artikel_id)
            ->delete();

        return redirect('admin/masterArtikel')
            ->with('act', 'viewMasterArtikel');
    }

    public function detailArtikel($artikel_id){
        // $pmk = DB::table('pemakalah')
        //     ->where('artikel_id','=',$artikel_id)
        //     ->first();
        $art = DB::table('artikel')
            ->where('artikel_id','=',$artikel_id)
            ->first();

        return view('adminMasterArtikel')
            // ->with('pmk', $pmk)
            ->with('art', $art)
            ->with('act', 'viewDetailArtikel');
    }

    public function daftarPemakalah(){
        // $pmk = DB::table('pemakalah')
        // ->select('pemakalah_tanggal')
        // ->get();
        // ->join('artikel','pemakalah.artikel_id', '=', 'artikel.artikel_id')
        // // ->where('pemakalah.artikel_id','=', $artikel_id)
        // ->get();
        $art = DB::table('artikel')
            ->join('pemakalah', 'artikel.artikel_id', '=', 'pemakalah.artikel_id')
            ->select('artikel.artikel_id', 'artikel_judul', 'artikel_status', 'pemakalah_tanggal')
            ->get();

        return view('adminDaftarPemakalah')
        // ->with('pmk', $pmk)
        ->with('art', $art)
        ->with('act','viewDaftarPemakalah');
        // return view('adminDaftarPemakalah');
    }

    public function detailPemakalah($artikel_id){
        $pmk = DB::table('pemakalah')
            ->where('artikel_id','=',$artikel_id)
            ->first();
        $art = DB::table('artikel')
            ->where('artikel_id','=',$artikel_id)
            ->first();

        return view('adminDaftarPemakalah')
            ->with('pmk', $pmk)
            ->with('art', $art)
            ->with('act', 'viewDetailPemakalah');
    }

    public function validasiPemakalah(Request $req){
        $artikel_status = $req->artikel_status;
        $artikel_id = $req->artikel_id;

        DB::table('artikel')
            ->where('artikel_id','=',$artikel_id)
            ->update(
                [
                    'artikel_status' => $artikel_status
                ]
            );
        $art = DB::table('artikel')
        ->join('pemakalah', 'artikel.artikel_id', '=', 'pemakalah.artikel_id')
        ->select('artikel.artikel_id', 'artikel_judul', 'artikel_status', 'pemakalah_tanggal')
        ->get();

            return redirect('admin/daftarPemakalah')
                ->with('art', $art)
                ->with('act', 'viewDaftarPemakalah');
        // return view('adminDaftarPemakalah')
        //     ->with('art', $art)
        //     ->with('act','viewDaftarPemakalah');
    }

    public function daftarNonPemakalah(){

        $no_pmk = DB::table('peserta')->get();

            return view('adminDaftarNonPemakalah')
            ->with('no_pmk',$no_pmk)
            ->with('act','no_pmk');
    }

    public function detailNonPemakalah($peserta_id){

        $no_pmk = DB::table('peserta')
            ->where('peserta_id','=',$peserta_id)
            ->first();
        
            return view('adminDetailNonPemakalah')
            ->with('no_pmk',$no_pmk)
            ->with('act','viewDetailNonPemakalah');
    }

    public function prosesKonfirmNoPmk(Request $req){
        $peserta_id = $req->peserta_id;
        $peserta_bukti = $req->peserta_bukti;

        $no_pmk = DB::table('peserta')->get()
        ->where('peserta_id','=',$peserta_id)
        ->update(['peserta_id' => $peserta_id, 'peserta_bukti' => $peserta_bukti]);

        return view('/adminDaftarNonPemakalah');
    }
}
