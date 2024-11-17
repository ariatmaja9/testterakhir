<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MBController extends Controller
{

    public function balok()
    {
        return view('mb.balok');
    }
    public function balokAction(Request $request)
    {
        $request->validate([
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric',
            'tinggi' => 'required|numeric',         
        ]);

        $panjang =$request->input('panjang');
        $lebar =$request->input('lebar');
        $tinggi =$request->input('tinggi');
        $hasil = $panjang * $lebar * $tinggi;
        return view('mb.balok_hasil', compact('panjang', 'lebar','tinggi','hasil'));
    }

    public function segitiga()
    {
        return view('mb.segitiga');
    }
    public function segitigaAction(Request $request)
    {
        $request->validate([
            'alas' => 'required|numeric',
            'tinggi' => 'required|numeric',      
        ]);

        $alas =$request->input('alas');
        $tinggi =$request->input('tinggi');
        $hasil = 1/2 *$alas * $tinggi;
        return view('mb.segitiga_hasil', compact('alas','tinggi','hasil'));
    }
}