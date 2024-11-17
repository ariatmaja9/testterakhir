<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class M4Controller extends Controller
{
    public function lat1()
    {
        $nama = 'I Kadek Ari Atmaja';
        $alamat = 'Jl. Raya Mas No.136 Ubud';
        return view('m4.lat1', compact('nama', 'alamat'));
    }

    public function lat2()
    {
        $nama = 'I Kadek Ari Atmaja';
        $nilai = '50';
        return view('m4.lat2', compact('nama', 'nilai'));
    }
    public function lat3()
    {
        $nama = 'I Kadek Ari Atmaja';
        $hobi = ['Mencari Korun'];
        $skill = ['Anti Indomaret'];
        return view('m4.lat3', compact('nama', 'hobi' , 'skill'));
    }
    public function layout()
    {
        return view('m4.pendidikan');
    }
    public function lat4()
    {
        $nama = 'I Kadek Ari Atmaja';
        $alamat = 'Jl. Raya Mas No.136 Ubud';
        return view('m4.lat4', compact('nama', 'alamat'));
    }


    public function m4_identitas()
    {
        $nama = 'I Kadek Ari Atmaja';
        $alamat = 'Jl. Raya Mas No.136 Ubud';
        return view('m4.identitas', compact('nama', 'alamat'));
    }
    public function m4_pendidikan()
    {
        return view('m4.pendidikan');
    }
    public function m4_skill()
    {
        $nama = 'I Kadek Ari Atmaja';
        $skill = ['Anti Indomaret'];
        return view('m4.skill', compact('skill'));
    }
}
