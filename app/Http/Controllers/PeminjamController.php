<?php

namespace App\Http\Controllers;

use App\Exports\PeminjamsExport;
use App\Models\Peminjam;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PeminjamController extends Controller
{

    public function exportExcel()
    {
        return Excel::download(new PeminjamsExport, 'peminjams.xlsx');
    }
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $title = 'Data Peminjam';
    //     $q =$request->query('q');
    //     $peminjams = Peminjam::where('nama', 'like', '%' . $q . '%')
    //         ->leftJoin('tb_buku', 'tb_buku.id_buku', 'tb_peminjam.id_buku', 'tb_anggota', 'tb_anggota.id_member', 'tb_peminjam.id_member')
    //         ->paginate(10)
    //         ->withQueryString();
    //     $no = $peminjams->firstItem();
    //     return view('peminjam.index', compact('title', 'peminjams', 'q', 'no'));
    // }
    public function index(Request $request)
{
    $title = 'Data Peminjam';
    $q = $request->query('q');

    $peminjams = Peminjam::where('judul', 'like', '%' . $q . '%')
        ->leftJoin('tb_buku', 'tb_buku.id_buku', '=', 'tb_peminjam.id_buku')
        ->leftJoin('tb_anggota', 'tb_anggota.id_member', '=', 'tb_peminjam.id_member')
        ->paginate(10)
        ->withQueryString();

    $no = $peminjams->firstItem();

    return view('peminjam.index', compact('title', 'peminjams', 'q', 'no'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Peminjam';
        $produks = Produk::orderBy('judul')->get();
        $users = User::orderBy('nama')->get();
        return view('peminjam.create', compact('title', 'produks', 'users'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id_pinjam' => 'required',
            'id_buku' => 'required',
            'id_member' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'status_pinjam' => 'required',
            'denda' => 'required',
        ]);
        $peminjam = new Peminjam($request->all());
        $peminjam->save();
        return redirect()->route('peminjam.index')->with(['message' => 'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */

    public function show(Peminjam $peminjam)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjam $peminjam)
    {
        $title = 'Ubah Peminjam';
        $produks = Produk::orderBy('judul')->get();
        $users = User::orderBy('nama')->get();
        return view('peminjam.edit', compact('title', 'produks', 'users', 'peminjam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjam $peminjam)
    {
        $peminjam->update($request->all());
        return redirect()->route('peminjam.index')->with(['message' => 'Data Berhasil Di Ubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjam $peminjam)
    {
        $peminjam->delete();
        return redirect()->route('peminjam.index')->with(['message' => 'Data Berhasil Di Hapus!']);
    }
}
