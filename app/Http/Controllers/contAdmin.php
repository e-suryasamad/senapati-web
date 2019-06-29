<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contAdmin extends Controller
{
    public function masterArtikel(){
        return view('adminMasterArtikel');
    }

    public function daftarPemakalah(){
        return view('adminDaftarPemakalah');
    }

    public function daftarNonPemakalah(){
        return view('adminDaftarNonPemakalah');
    }

    // public function registrasi(){
    //     return view('registrasi');
    // }

    // public function login(){
    //     return view('login');
    // }
}
