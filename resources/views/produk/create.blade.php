<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-primary">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{$err}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{route('produk.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mt-3 mb-3">
                    <label>ID Buku</label>
                    <input class="form-control" type="number" name="id_buku" placeholder="Masukkan ID Buku" value="{{old('id_buku')}}">
                </div>
                <div class="mt-3 mb-3">
                    <label>Judul Buku</label>
                    <input class="form-control" type="text" name="judul" placeholder="Masukkan Judul Buku" value="{{old('judul')}}">
                </div>
                <div class="mb-3">
                    <label>Pengarang</label>
                    <input class="form-control" type="text" name="pengarang" placeholder="Masukkan Pengarang" value="{{old('pengarang')}}">
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <select class="form-select" name="id_kategori">
                        @foreach ($kategoris as $kategori)
                            @if (old('id_kategori') == $kategori->id_kategori)
                                <option value="{{$kategori->id_kategori}}" selected> {{$kategori->nama_kategori}}</option>
                            @else
                                <option value="{{$kategori->id_kategori}}"> {{$kategori->nama_kategori}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tahun Terbit</label>
                    <input class="form-control" type="text" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" value="{{old('tahun_terbit')}}">
                </div>
                <div class="mb-3">
                    <label>Gambar</label>
                    <input class="form-control" type="file" name="gambar" placeholder="Masukkan gambar">
                </div>
                <div class="mb-4">
                    <button class="btn btn-primary me-2"><i class="bi bi-save"></i> Simpan</button>
                    <a class="btn btn-danger" href="{{route('produk.index')}}"><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
