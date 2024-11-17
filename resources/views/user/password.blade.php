<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if (session()->has('message'))
                <p class="alert alert-info">{{session('message')}}</p>
            @endif
            @if ($errors->any())
                <div class="alert alert-primary">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{$err}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{route('user.password.action')}}">
                @csrf
                <div class="mt-3 mb-3">
                    <label>Password Lama</label>
                    <input class="form-control" type="password" name="pass1" placeholder="Masukkan Password Lama">
                </div>
                <div class="mb-3">
                    <label>Password Baru</label>
                    <div class="input-group">
                        <input id="pass2" class="form-control" type="password" name="pass2" placeholder="Masukkan Password Baru">
                        <span class="input-group-text">
                            <i id="togglePass2" class="bi bi-eye"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Konfirmasi Password Baru</label>
                    <div class="input-group">
                        <input id="pass3" class="form-control" type="password" name="pass3" placeholder="Masukkan Konfirmasi Password Baru">
                        <span class="input-group-text">
                            <i id="togglePass3" class="bi bi-eye"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-4">
                    <button class="btn btn-primary me-2"><i class="bi bi-save"></i> Ubah Password</button>
                    <a class="btn btn-danger" href="{{route('produk.index')}}"><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const togglePass2 = document.getElementById('togglePass2');
        const pass2 = document.getElementById('pass2');

        togglePass2.addEventListener('click', function() {
            if (pass2.type === 'password') {
                pass2.type = 'text';
                togglePass2.classList.remove('bi-eye');
                togglePass2.classList.add('bi-eye-slash');
            } else {
                pass2.type = 'password';
                togglePass2.classList.remove('bi-eye-slash');
                togglePass2.classList.add('bi-eye');
            }
        });

        const togglePass3 = document.getElementById('togglePass3');
        const pass3 = document.getElementById('pass3');

        togglePass3.addEventListener('click', function() {
            if (pass3.type === 'password') {
                pass3.type = 'text';
                togglePass3.classList.remove('bi-eye');
                togglePass3.classList.add('bi-eye-slash');
            } else {
                pass3.type = 'password';
                togglePass3.classList.remove('bi-eye-slash');
                togglePass3.classList.add('bi-eye');
            }
        });
    </script>
@endsection
