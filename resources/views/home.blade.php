<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@extends('layout.app')
@section('content')
    @auth
        <p>Selamat Datang <b>{{Auth::user()->nama}}</b></p>
    @endauth
    <div class="row">
        <div class="col-md-3 mt-3">
            <div class="card bg-primary text-white">
                <div class="card-header">
                    <i class="bi bi-people"></i>
                </div>
                <div class="card-body">
                    <h3>{{ $jumlah_user }} Data User</h3>
                </div>
                @if (Auth::user()->level == 'admin')
                <div class="card-footer text-end">
                    <a href="{{route('user.index')}}" class="text-white text-decoration-none"> Selekapnya &raquo;</a>
                </div>
                @endif
                @if (Auth::user()->level == 'user')
                <div class="card-footer text-end">
                    <a onclick="return confirm('Yeee Kocaaak, Cumaan Admin Doang Yang Bisa Woeee!!!')" href="#" class="text-white text-decoration-none"> Selekapnya &raquo;</a>
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card bg-info text-white">
                <div class="card-header">
                    <i class="bi bi-journal-text"></i>
                </div>
                <div class="card-body">
                    <h3>{{ $jumlah_produk }} Data Buku</h3>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('produk.index')}}" class="text-white text-decoration-none"> Selekapnya &raquo;</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card bg-success text-white">
                <div class="card-header">
                    <i class="bi bi-shop"></i>
                </div>
                <div class="card-body">
                    <h3>{{ $jumlah_peminjam }} Data Peminjam</h3>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('peminjam.index')}}" class="text-white text-decoration-none"> Selekapnya &raquo;</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card bg-danger text-white">
                <div class="card-header">
                    <i class="bi bi-journal-bookmark"></i>
                </div>
                <div class="card-body">
                    <h3>{{ $jumlah_kategori }} Data Kategori</h3>
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('kategori.index')}}" class="text-white text-decoration-none"> Selekapnya &raquo;</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <div id="container" class="my-5"></div>
    <script>
            Highcharts.chart('container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Grafik Peminjaman 30 Hari Terakhir'
                },
                xAxis: {
                    categories: <?= json_encode($categories) ?>
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Pinjaman'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                    name: 'Peminjaman',
                    data: <?= json_encode($data) ?>
                }]
            });
</script>
@endsection
