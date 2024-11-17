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
            <form method="POST" action="{{route('user.update', $user)}}">
                @method('PUT')
                @csrf
                <div class="mt-3 mb-3">
                    <label>Nama User</label>
                    <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama User" value="{{old('nama', $user->nama)}}">
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Masukkan Username" value="{{old('username', $user->username)}}">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Masukkan Password">
                    <p class="form-text">Kosongkan Jika Tidak Ingin Merubah Paasword!</p>
                </div>
                <div class="mb-3">
                    <label>alamat</label>
                    <input class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat" value="{{old('alamat', $user->alamat)}}">
                </div>
                <div class="mb-3">
                    <label>No Telepon</label>
                    <input class="form-control" type="text" name="no_telepon" placeholder="Masukkan No Telepon" value="{{old('no_telepon', $user->no_telepon)}}">
                </div>
                <div class="mb-3">
                    <label>Level</label>
                    <select class="form-select" name="level">
                        @foreach ($levels as $level)
                            @if (old('level', $user->level) == $level)
                                <option value="{{$level}}" selected> {{$level}}</option>
                            @else
                                <option value="{{$level}}" > {{$level}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <button class="btn btn-primary me-2"><i class="bi bi-save"></i> Simpan</button>
                    <a class="btn btn-danger" href="{{route('user.index')}}"><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
