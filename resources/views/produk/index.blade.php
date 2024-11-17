<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@extends('layout.app')
@section('content')
    @if (session()->has('message'))
        <p class="alert alert-info">{{session('message')}}</p>
    @endif
    <div class="card mt-3">
        <div class="card-header">
            <form class="row row-cols-auto g-1">
                <div class="col">
                    <input class="form-control" name="q" value="{{$q}}" placeholder="Pencarian...">
                </div>
                <div class="col">
                    <button class="ms-2 btn btn-primary"><i class="bi bi-search"></i> Cari</button>
                </div>
                @if (Auth::user()->level == 'admin')
                <div class="col">
                    <a class="btn btn-success" href="{{route('produk.create')}}"><i class="bi bi-file-earmark-plus"></i> Tambah</a>
                </div>
                @endif
                <div class="col">
                    <a class="text-white btn btn-info" href="{{ route('produk.exportExcel') }}"><i class="bi bi-file-earmark-excel"></i> Unduh</a>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th class="table-primary">No</th>
                        <th class="table-primary">Judul Buku</th>
                        <th class="table-primary">Id Buku</th>
                        <th class="table-primary">Pengarang</th>
                        <th class="table-primary">Tahun Terbit</th>
                        <th class="table-primary">Kategori</th>
                        <th class="table-primary">Gambar</th>
                        @if (Auth::user()->level == 'admin')
                        <th class="table-primary">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <?php //$no = 1;
                ?>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$produk->judul}}</td>
                        <td>{{$produk->id_buku}}</td>
                        <td>{{$produk->pengarang}}</td>
                        <td>{{$produk->tahun_terbit}}</td>
                        <td>{{$produk->nama_kategori}}</td>
                        <td>
                            <img src="{{ $produk->getImage() }}" height="100" alt="ini gambar">
                        </td>
                        @if (Auth::user()->level == 'admin')
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{route('produk.edit', $produk)}}"><i class="bi bi-pen"></i> Ubah</a>
                            <form method="POST" class="d-inline" action="{{route('produk.destroy', $produk)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')"><i class="bi bi-trash3"></i> Hapus</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
        @if ($produks->hasPages())
            <div class="card-footer">
                {{$produks->links()}}
            </div>
        @endif
    </div>
@endsection
