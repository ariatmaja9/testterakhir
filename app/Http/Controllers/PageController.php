<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Peminjam;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

// class PageController extends Controller
// {
//     public function home()
//     {
//         $title = 'Home';

//         $jumlah_user = User::count();
//         $jumlah_produk = Produk::count();
//         $jumlah_peminjam = Peminjam::count();
//         $jumlah_kategori = Kategori::count();

//         $peminjams = Peminjam::selectRaw('tanggal_pinjam')->groupBy('tanggal_pinjam')->limit(30)->get();

//         $data = [];
//         $categories = [];
//         foreach  ($peminjams as $peminjam) {
//             $data[] = $jumlah_peminjam *1;
//             $categories[] = $peminjam->tanggal_pinjam;
//         }

//         return view('home', compact('title', 'jumlah_user', 'jumlah_produk', 'jumlah_peminjam', 'jumlah_kategori', 'data', 'categories'));
//     }
// }

class PageController extends Controller
{
    public function home()
    {
        $title = 'Home';

        $jumlah_user = User::count();
        $jumlah_produk = Produk::count();
        $jumlah_peminjam = Peminjam::count();
        $jumlah_kategori = Kategori::count();

        $peminjams = Peminjam::selectRaw('tanggal_pinjam, count(*) AS total')->groupBy('tanggal_pinjam')->limit(30)->get();
        $data = [];
        $categories = [];
        foreach ($peminjams as $peminjam){
            $data[] = $peminjam->total * 1;
            $categories[] = $peminjam->tanggal_pinjam;
        }

        return view('home', compact('title', 'jumlah_user', 'jumlah_kategori', 'jumlah_produk', 'jumlah_peminjam', 'data', 'categories'));
    }
}
