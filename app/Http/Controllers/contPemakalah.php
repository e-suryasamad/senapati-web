<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class contPemakalah extends Controller
{
    public function search(Request $req){
        $artikels = DB::table('artikel')
        ->when($req->cari, function ($query) use ($req){
            $query->where('artikel_id', 'LIKE', "%{$req->cari}%");
            // ->orwhere('artikel_judul', 'LIKE', "%{$req->cari}%");
        })->get();
        
        return view('pemakalahCariArtikel', compact('artikels'));
    }

    public function cariArtikel(){

        $art = DB::table('pemakalah')
        ->join('artikel','pemakalah.artikel_id', '=', 'artikel.artikel_id')
        ->get();

        return view('pemakalahCariArtikel')
        ->with('art', $art);
    }

    // public function konfirmasiPembayaran(){
    //     return view('pemakalahKonfirmasiPembayaran');
    // }

    public function viewKonfirmasi($artikel_id){
        // $id_artikel = $req->cari;
        $pmk = DB::table('pemakalah')
        ->join('artikel','pemakalah.artikel_id', '=', 'artikel.artikel_id')
        ->where('pemakalah.artikel_id','=', $artikel_id)->first();
        $art = DB::table('artikel')
        ->where('artikel_id','=', $artikel_id)
        // ->first();
        ->get();
        // dd($art);

        return view('pemakalahKonfirmasiPembayaran')
        ->with('pmk', $pmk)
        ->with('art', $art);
    }

    public function prosesKonfirmasi(Request $req){
        $artikel_id = $req->artikel_id;
        // $artikel_judul = $req->artikel_judul;
        $artikel_penulis = $req->artikel_penulis;
        $pemakalah_email = $req->pemakalah_email;
        $pemakalah_telp = $req->pemakalah_telp;
        $pemakalah_nama_rek = $req->pemakalah_nama_rek;
        $pemakalah_bank = $req->pemakalah_bank;
        // $pemakalah_bukti = $req->pemakalah_bukti;
        // $artikel_status = $req->artikel_status;

        if($req->hasFile('pemakalah_bukti')){
            $file = $req->file('pemakalah_bukti');
            $upload = Storage::putFile('public/bukti', $file);
            $storage = 'storage/';
            $slash = '/';
            $cacah = explode("/", $upload);
            $pemakalah_bukti = $storage.$cacah[1].$slash.$cacah[2];
        }else{
            $pemakalah_bukti = 'user/img/noimage.png';
        }

        $pemakalah_pesan = $req->pemakalah_pesan;

        $edit = DB::table('pemakalah')
            ->where('artikel_id','=',$artikel_id)
            ->update(
                [
                    'pemakalah_nama' => $artikel_penulis, 
                    'pemakalah_telp' => $pemakalah_telp, 
                    'pemakalah_email' => $pemakalah_email, 
                    'pemakalah_bank' => $pemakalah_bank, 
                    'pemakalah_nama_rek' => $pemakalah_nama_rek, 
                    'pemakalah_bukti' => $pemakalah_bukti, 
                    'pemakalah_pesan' => $pemakalah_pesan
                ]
            );

        if($edit){
            return redirect('/');
        }else{
            return redirect('/pmk/prosesKonfirmasi');
        }
    }

    // public function viewPemakalah(){
    // }
}
