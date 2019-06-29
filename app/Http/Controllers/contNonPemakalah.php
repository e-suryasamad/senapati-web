<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class contNonPemakalah extends Controller
{
    public function daftarNama(){
    $no_pmk = DB::table('peserta')->get();

        return view('nonPemakalahDaftar')
        ->with('no_pmk',$no_pmk)
        ->with('act','no_pmk');
}

public function regNpmk(){
    return view('nonPemakalahReg');
}

public function prosesTambahReq(Request $req){
    $peserta_nama = $req->peserta_nama;
    $peserta_telp = $req->peserta_telp;
    $peserta_email = $req->peserta_email;
    $peserta_bank = $req->peserta_bank;
    $peserta_nama_rek = $req->peserta_nama_rek;

    if($req->hasFile('peserta_bukti')){
        $req->file('peserta_bukti');

        $upload = Storage::putFile('public/bukti', $req->file('peserta_bukti'));

        $storage = 'storage/';
        $slash = '/';
        $cacah = explode("/", $upload);
        $peserta_bukti = $storage.$cacah[1].$slash.$cacah[2];
    }else{
        $peserta_bukti = 'tidak_upload';
    }

    $peserta_pesan = $req->peserta_pesan;

    
    $tambah = DB::table('peserta')->insert(
        ['peserta_nama' => $peserta_nama, 'peserta_telp' => $peserta_telp, 'peserta_email' =>  $peserta_email, 'peserta_bank' => $peserta_bank, 'peserta_nama_rek' => $peserta_nama_rek, 'peserta_pesan' => $peserta_pesan, 'peserta_bukti' => $peserta_bukti]
        );

    if($tambah){
        return redirect('/');
    }else{
        return redirect('/npmk');;
    }

}
}
