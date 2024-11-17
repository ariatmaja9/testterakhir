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
            <form method="POST" action="{{route('kategori.update', $kategori)}}">
                @csrf
                @method('put')
                <div class="mt-3 mb-3">
                    <label>ID Kategori</label>
                    <input class="form-control" type="number" name="id_kategori" placeholder="Masukkan ID Buku" value="{{old('id_kategori', $kategori->id_kategori)}}">
                </div>
                <div class="mt-3 mb-3">
                    <label>Nama Kategori</label>
                    <input class="form-control" type="text" name="nama_kategori" placeholder="Masukkan Judul Buku" value="{{old('nama_kategori', $kategori->nama_kategori)}}">
                </div>
                <div class="mb-4">
                    <button class="btn btn-primary me-2"><i class="bi bi-save"></i> Simpan</button>
                    <a class="btn btn-danger" href="{{route('kategori.index')}}"><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection