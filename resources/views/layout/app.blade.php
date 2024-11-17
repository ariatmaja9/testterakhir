<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpus Ari Atmaja</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('icon/bootstrap-icons.min.css')}}">
  </head>
  <style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .navbar-nav .nav-link {
        transition: background-color 0.9s, color 0.9s;
    }

    .navbar-nav .nav-item.active {
        display: flex;
        align-items: center;
    }

    .navbar-nav .nav-link.active {
        color: #fff;
        background-color: #51a0f5;
        width: 110px;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.9s, color 0.9s;
    }

    .navbar-nav .nav-link.active:hover {
        color: #ffffff;
    }

    .wrapper {
        flex: 1;
    }

    footer {
        padding: 20px;
        background-color: #0d6efd;
        text-align: center;
    }
</style>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand ms-5" href="{{route('home')}}"><b><i class="bi bi-book"></i> ARI PERPUS</b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item rounded ms-3">
                <a class="nav-link {{request()->is('/') ? 'active' : ''}}" href="{{route('home')}}"><i class="bi bi-house"></i> Home </a>
              </li>
              @if (Auth::user()->level == 'admin')
              <li class="nav-item rounded ms-3">
                <a class="nav-link {{request()->is('user*') ? 'active' : ''}}" href="{{route('user.index')}}"><i class="bi bi-person"></i> User </a>
              </li>
              @endif
              <li class="nav-item rounded ms-3">
              <a class="nav-link {{request()->is('produk*') ? 'active' : ''}}" href="{{route('produk.index')}}"><i class="bi bi-journal-text"></i> Buku </a>
             </li>
             <li class="nav-item rounded ms-3">
              <a class="nav-link {{request()->is('kategori*') ? 'active' : ''}}" href="{{route('kategori.index')}}"><i class="bi bi-journal-bookmark"></i> Kategori </a>
            </li>
             <li class="nav-item rounded ms-3">
              <a class="nav-link {{request()->is('peminjam*') ? 'active' : ''}}" href="{{route('peminjam.index')}}"><i class="bi bi-journal-medical"></i> Peminjam </a>
            </li>
              <li class="nav-item rounded ms-3">
                <a class="nav-link {{request()->is('password*') ? 'active' : ''}}" href="{{route('user.password')}}"><i class="bi bi-key"></i> Password </a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto me-5">
              <li class="nav-item">
                <a class="btn btn-light text-primary" onclick="return confirm('Apakah Anda Ingin Logout?')" href="{{route('user.logout')}}"><b><i class="bi bi-box-arrow-left"></i> Logout</b></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,256L16,229.3C32,203,64,149,96,122.7C128,96,160,96,192,122.7C224,149,256,203,288,224C320,245,352,235,384,234.7C416,235,448,245,480,245.3C512,245,544,235,576,240C608,245,640,267,672,245.3C704,224,736,160,768,165.3C800,171,832,245,864,277.3C896,309,928,299,960,288C992,277,1024,267,1056,240C1088,213,1120,171,1152,170.7C1184,171,1216,213,1248,192C1280,171,1312,85,1344,80C1376,75,1408,149,1424,186.7L1440,224L1440,0L1424,0C1408,0,1376,0,1344,0C1312,0,1280,0,1248,0C1216,0,1184,0,1152,0C1120,0,1088,0,1056,0C1024,0,992,0,960,0C928,0,896,0,864,0C832,0,800,0,768,0C736,0,704,0,672,0C640,0,608,0,576,0C544,0,512,0,480,0C448,0,416,0,384,0C352,0,320,0,288,0C256,0,224,0,192,0C160,0,128,0,96,0C64,0,32,0,16,0L0,0Z"></path></svg>
      <div class="container">
        <h1>{{$title}}</h1>
        @yield('content')
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,160L48,133.3C96,107,192,53,288,64C384,75,480,149,576,160C672,171,768,117,864,122.7C960,128,1056,192,1152,192C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
      <footer class="text-center text-light">
        <p>Copyright &copy; 2023 Ari Atmaja</p>
    </footer>
  </body>
</html>
