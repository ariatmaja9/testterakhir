<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku Ari Atmaja - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      body {
        background-color: #3498db;
        color: #fff;
        height: 85vh; /* Menjamin tinggi penuh untuk mengatur card di tengah. */
        display: flex;
        align-items: center; /* Menengahkan vertikal */
        justify-content: center; /* Menengahkan horizontal */
      }
      .warna {
        color: #fff;
      }

      .card {
        background-color: #2980b9;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        height: 350px;
      }

      .card-header {
        background-color: #2980b9;
        color: #fff;
        border-bottom: none;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
      }

      .card-footer {
        background-color: #2980b9;
        border-top: none;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
      }

      .form-control {
        color: #000000;
        border: none;
        height: 40px;
        border-radius: 20px;
      }

      .btn-primary {
        background-color: #3498db;
        border: none;
        width: 380px;
        border-radius:20px;
        height: 40px;
      }
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-4 mx-auto">
          <form method="POST" action="{{ route('user.login.action') }}">
            @csrf
            <div class="card">
              <div class="card-header text-center mt-4">
                <h3>{{$title}}</h3>
              </div>
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-info">
                    <ul>
                      @foreach ($errors->all() as $err)
                        <li>{{$err}}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <div class="mb-3">
                    <label class="mb-2 warna">Username</label>
                  <input class="form-control warna" type="text" name="username" placeholder="Massukan Username" required>
                </div>
                <div class="mb-3">
                    <label class="mb-2 warna">Password</label>
                  <input class="form-control warna" type="password" name="password" placeholder="Massukan Password" required>
                </div>
              </div>
              <div class="card-footer">
                <center><button class="btn btn-primary btn-block mb-3">Login</button></center>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
