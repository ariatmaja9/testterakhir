<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProduksExport;

class ProdukController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new ProduksExport, 'produks.xlsx');
    }




    public function index(Request $request)
    {
        $title = 'Data Buku';
        $q =$request->query('q');
        $produks = Produk::where('judul', 'like', '%' . $q . '%')
            ->leftJoin('tb_kategori', 'tb_kategori.id_kategori', 'tb_buku.id_kategori')
            ->paginate(10)
            ->withQueryString();
        $no = $produks->firstItem();
        return view('produk.index', compact('title', 'produks', 'q', 'no'));
    }




    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        $title = 'Tambah Produk';
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('produk.create', compact('title', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'id_kategori' => 'required',
            'tahun_terbit' => 'required',
        ]);
        $produk = new Produk($request->all());

        if ($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $filename = rand(1000, 9999) . $gambar->getClientOriginalName();
            $gambar->move('images/produk', $filename);
            $produk->gambar = $filename;
        }

        $produk->save();
        return redirect()->route('produk.index')->with(['message' => 'Data Berhasil Di Tambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $title = 'Ubah Produk';
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('produk.edit', compact('title', 'produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $data = $request->all();
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $filename = rand(1000, 9999) . $gambar->getClientOriginalName();
            $gambar->move('images/produk', $filename);
            $data['gambar'] = $filename;
        }
        $produk->update($data);
        return redirect()->route('produk.index')->with(['message' => 'Data Berhasil Di Ubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with(['message' => 'Data Berhasil Di Hapus!']);
    }
}
