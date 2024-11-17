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
                    <a class="btn btn-success" href="{{route('user.create')}}"><i class="bi bi-file-earmark-plus"></i> Tambah</a>
                </div>
                <div class="col">
                    <a class="text-white btn btn-info" href="{{ route('user.exportExcel') }}"><i class="bi bi-file-earmark-excel"></i> Unduh</a>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <th class="table-primary">No</th>
                        <th class="table-primary">Nama</th>
                        <th class="table-primary">Username</th>
                        <th class="table-primary">Alamat</th>
                        <th class="table-primary">No. Telepon</th>
                        <th class="table-primary">Level</th>
                        <th class="table-primary">Aksi</th>
                    </tr>
                </thead>
                <?php $no = 1; ?>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$user->nama}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->alamat}}</td>
                        <td>{{$user->no_telepon}}</td>
                        <td>{{$user->level}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{route('user.edit', $user)}}"><i class="bi bi-pen"></i> Ubah</a>
                            <form method="POST" class="d-inline" action="{{route('user.destroy', $user)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')"><i class="bi bi-trash3"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
             </table>
        </div>
    </div>
@endsection
