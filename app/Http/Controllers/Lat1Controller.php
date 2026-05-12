<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Lat1Controller extends Controller
{
    // NAMA : Alfin Adriansyah
    // NIM  : 2311102264

    public function index(){
        $data["nama"] = "Agus";
        $data["asal"] = "Bandung";
        return view('v_latihan1', $data);
    }

    public function method2(){
        $data['title'] = "Daftar Mahasiswa";
        $data['daf_mhs'] = [
            ["nama" => "Agus", "asal" => "Bandung"],
            ["nama" => "Budi", "asal" => "Jakarta"],
            ["nama" => "Roni", "asal" => "Surabaya"]
        ];
        return view('v_latihan2', $data);
    }
}
