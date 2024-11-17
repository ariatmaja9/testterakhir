<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KategorisExport;

class KategoriController extends Controller
{

    public function exportExcel()
    {
        return Excel::download(new KategorisExport, 'kategoris.xlsx');
    }
    public function index(Request $request)
    {
        $title = 'Data Kategori';
        $q =$request->query('q');
        $kategoris = Kategori::where('nama_kategori', 'like', '%' . $q . '%')
            ->paginate(10)
            ->withQueryString();
        $no = $kategoris->firstItem();
        return view('kategori.index', compact('title', 'kategoris', 'q', 'no'));
    }

    public function create()
    {
        $title = 'Tambah Kategori';
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('kategori.create', compact('title', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);
        $kategori = new Kategori($request->all());
        $kategori->save();
        return redirect()->route('kategori.index')->with(['message' => 'Data Berhasil Di Tambahkan']);
    }

    public function edit(Kategori $kategori)
    {
        $title = 'Ubah Produk';
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('kategori.edit', compact('title', 'kategori', 'kategoris'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with(['message' => 'Data Berhasil Di Ubah!']);
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with(['message' => 'Data Berhasil Di Hapus!']);
    }
}
