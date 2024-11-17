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
            <form method="POST" action="{{ route('peminjam.update', $peminjam) }}">
                @csrf
                @method('put')
                {{-- <div class="mt-3 mb-3">
                    <label>ID Pinjam</label>
                    <input class="form-control" type="number" name="id_pinjam" placeholder="Masukkan ID Buku" value="{{old('id_pinjam', $peminjam->id_pinjam)}}">
                </div> --}}
                <div class="mb-3">
                    <label>Judul Buku</label>
                    <select class="form-select" name="id_buku">
                        @foreach ($produks as $produk)
                            @if (old('id_buku', $peminjam->id_buku) == $produk->id_buku)
                                <option value="{{$produk->id_buku}}" selected> {{$produk->judul}}</option>
                            @else
                                <option value="{{$produk->id_buku}}"> {{$produk->judul}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                {{-- <div class="mt-3 mb-3">
                    <label>ID User</label>
                    <input class="form-control" type="number" name="id_member" placeholder="Masukkan Tanggal Kembalian" value="{{old('id_member', $peminjam->id_member)}}">
                </div> --}}
                <div class="mb-3">
                    <label>Nama User</label>
                    <select class="form-select" name="id_member">
                        @foreach ($users as $user)
                            @if (old('id_member', $peminjam->id_member) == $user->id_member)
                                <option value="{{$user->id_member}}" selected> {{$user->nama}}</option>
                            @else
                                <option value="{{$user->id_member}}"> {{$user->nama}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label>Nama User</label>
                    <select class="form-select" name="id_member">
                        @if(Auth::user()->level == 'admin')
                            @if(old('id_member'))
                                <option value="{{ old('id_member', $peminjam->id_member) }}" selected>{{ old('id_member') }}</option>
                            @else
                                <option value="" selected disabled>Pilih Nama User</option>
                            @endif
                            @foreach ($users as $user)
                                <option value="{{ $user->id_member }}" {{ (old('id_member') == $user->id_member) ? 'selected' : '' }}>{{ $user->nama }}</option>
                            @endforeach
                        @elseif(Auth::user()->level == 'user')
                            <option value="{{ Auth::user()->id_member }}" selected>{{ Auth::user()->nama }}</option>
                        @endif
                    </select>
                </div> --}}
                <div class="mt-3 mb-3">
                    <label>Tanggal Pinjam</label>
                    <input class="form-control" type="date" name="tanggal_pinjam" placeholder="Masukkan Tanggal Pinjam" value="{{old('tanggal_pinjam', $peminjam->tanggal_pinjam)}}">
                </div>
                <div class="mt-3 mb-3">
                    <label>Tanggal Kembalian</label>
                    <input class="form-control" type="date" name="tanggal_kembali" placeholder="Masukkan Tanggal Kembalian" value="{{old('tanggal_kembali', $peminjam->id_kembali)}}">
                </div>
                {{-- <div class="mt-3 mb-3">
                    <label>Status Pinjam</label>
                    <input class="form-control" type="text" name="status_pinjam" placeholder="Masukkan Status Pinjam" value="{{old('status_pinjam')}}">
                </div> --}}
                <div class="mt-3 mb-3">
                    <label>Status Pinjam</label>
                    <select class="form-control" name="status_pinjam">
                        <option value="selesai" {{ old('status_pinjam', $peminjam->status_pinjam) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="belum_selesai" {{ old('status_pinjam', $peminjam->status_pinjam) == 'belum_selesai' ? 'selected' : '' }}>Belum Selesai</option>
                    </select>
                </div>
                <div class="mt-3 mb-3">
                    <label>Denda</label>
                    <input class="form-control" type="text" name="denda" placeholder="Masukkan Denda" value="{{old('denda', $peminjam->denda)}}">
                </div>
                <div class="mb-4">
                    <button class="btn btn-primary me-2"><i class="bi bi-save"></i> Simpan</button>
                    <a class="btn btn-danger" href="{{route('peminjam.index')}}"><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
