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
                    <a class="btn btn-success" href="{{route('kategori.create')}}"><i class="bi bi-file-earmark-plus"></i> Tambah</a>
                </div>
                @endif
                <div class="col">
                    <a class="text-white btn btn-info" href="{{ route('kategori.exportExcel') }}"><i class="bi bi-file-earmark-excel"></i> Unduh</a>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th class="table-primary">No</th>
                        <th class="table-primary">Nama Kategori</th>
                        <th class="table-primary">Id Kategori</th>
                        @if (Auth::user()->level == 'admin')
                        <th class="table-primary">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <?php //$no = 1;
                ?>
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$kategori->nama_kategori}}</td>
                        <td>{{$kategori->id_kategori}}</td>
                        @if (Auth::user()->level == 'admin')
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{route('kategori.edit', $kategori)}}"><i class="bi bi-pen"></i> Ubah</a>
                            <form method="POST" class="d-inline" action="{{route('kategori.destroy', $kategori)}}">
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
        @if ($kategoris->hasPages())
            <div class="card-footer">
                {{$kategoris->links()}}
            </div>
        @endif
    </div>
@endsection
