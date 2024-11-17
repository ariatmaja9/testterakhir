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
                <div class="col">
                    <a class="btn btn-success" href="{{route('peminjam.create')}}"><i class="bi bi-file-earmark-plus"></i> Tambah</a>
                </div>
                <div class="col">
                    <a class="text-white btn btn-info" href="{{ route('peminjam.exportExcel') }}"><i class="bi bi-file-earmark-excel"></i> Unduh</a>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th class="table-primary">No</th>
                        {{-- <th class="table-primary">Id Pinjam</th> --}}
                        <th class="table-primary">Judul Buku</th>
                        <th class="table-primary">Nama</th>
                        <th class="table-primary">No Telepon</th>
                        <th class="table-primary">Alamat</th>
                        <th class="table-primary">Tanggal Peminjam</th>
                        <th class="table-primary">Tanggal Kembalian</th>
                        <th class="table-primary">Status Pinjam</th>
                        <th class="table-primary">Denda</th>
                        @if (Auth::user()->level == 'admin')
                        <th class="table-primary">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <?php //$no = 1;
                ?>
                @foreach ($peminjams as $peminjam)
                    <tr>
                        <td>{{$no++}}</td>
                        {{-- <td>{{$peminjam->id_pinjam}}</td> --}}
                        <td>{{$peminjam->judul}}</td>
                        <td>{{$peminjam->nama}}</td>
                        <td>{{$peminjam->no_telepon}}</td>
                        <td>{{$peminjam->alamat}}</td>
                        <td>{{$peminjam->tanggal_pinjam}}</td>
                        <td>{{$peminjam->tanggal_kembali}}</td>
                        <td>{{$peminjam->status_pinjam}}</td>
                        <td>{{'Rp '.number_format($peminjam->denda)}}</td>
                        @if (Auth::user()->level == 'admin')
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{route('peminjam.edit', $peminjam)}}"><i class="bi bi-pen"></i> Ubah</a>
                            <form method="POST" class="d-inline" action="{{route('peminjam.destroy', $peminjam)}}">
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
        @if ($peminjams->hasPages())
            <div class="card-footer">
                {{$peminjams->links()}}
            </div>
        @endif
    </div>
@endsection
