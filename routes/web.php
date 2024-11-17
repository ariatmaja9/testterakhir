<?php

use App\Http\Controllers\MBController;
use App\Http\Controllers\M5Controller;
use App\Http\Controllers\M4Controller;
use App\Http\Controllers\CVController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamController;
use App\Models\Kategori;
use App\Models\Peminjam;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('m4/lat1', [M4Controller::class, 'lat1']);
Route::get('m4/lat2', [M4Controller::class, 'lat2']);
Route::get('m4/lat3', [M4Controller::class, 'lat3']);
Route::get('m4/lat4', [M4Controller::class, 'lat4']);
Route::get('m4/layout', [M4Controller::class, 'layout']);

Route::get('m4/identitas',[M4Controller::class, 'm4_identitas'])->name('m4.identitas');
Route::get('m4/pendidikan',[M4Controller::class, 'm4_pendidikan'])->name('m4.pendidikan');
Route::get('m4/skill',[M4Controller::class, 'm4_skill'])->name('m4.skill');



Route::get('m5/lat1', [M5Controller::class, 'lat1']);
Route::get('m5/lat2', [M5Controller::class, 'lat2']);
Route::post('m5/lat2_action', [M5Controller::class, 'lat2Action'])->name('m5.lat2.action');

Route::get('mb/balok', [MBController::class, 'balok']);
Route::post('mb/balok_action', [MBController::class, 'balokAction'])->name('mb.balok.action');
Route::get('mb/segitiga', [MBController::class, 'segitiga']);
Route::post('mb/segitiga_action', [MBController::class, 'segitigaAction'])->name('mb.segitiga.action');









Route::get('/identitas' , [CVController::class, 'identitas'])->name
('identitas');

Route::get('/pendidikan' , [CVController::class, 'pendidikan'])->name
('pendidikan');

Route::get('/skill' , [CVController::class, 'skill'])->name
('skill');


// Route::view('/home', 'welcome');

Route::get('/awal', function () {
    $url = route('kontak');
    echo '<a href="'. $url . '">Klik Disini Untuk Menghubungi Saya</a>';
});

Route::get('/kontak', function () {
    echo 'Selamat Datang Di Halaman Kontak <br><br> Yudis = 081234892232 <br> Ega  = 087898210923';
})->name('kontak');


Route::get('/tampil/{nama}/{alamat?}', function ($nama, $alamat='') {
    echo'Hallo nama saya '. $nama . ' saya suka Geprek Mahira, yang berlokasi di '. $alamat;
});

Route::get('/tampil/{nama}', function ($nama) {
    echo'Hallo nama saya '. $nama . ' saya suka Geprek Mahira';
});


Route::get('/cv', function () {
    echo'Hallo Sayang';
});

/*
|--------------------------------------------------------------------------Kat
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('password', [UserController::class, 'password'])->name('user.password');
    Route::post('password', [UserController::class, 'passwordAction'])->name('user.password.action');

    Route::resource('peminjam', PeminjamController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('kategori', KategoriController::class);

    Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::resource('user', UserController::class);
});


Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'loginAction'])->name('user.login.action');

Route::get('user', [UserController::class, 'index'])->name('user.index');

Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('peminjam', [PeminjamController::class, 'index'])->name('peminjam.index');
Route::get('/users/export-excel', [UserController::class, 'exportExcel'])->name('user.exportExcel');
Route::get('/produks/export-excel', [ProdukController::class, 'exportExcel'])->name('produk.exportExcel');
Route::get('/kategoris/export-excel', [KategoriController::class, 'exportExcel'])->name('kategori.exportExcel');
Route::get('/peminjams/export-excel', [PeminjamController::class, 'exportExcel'])->name('peminjam.exportExcel');
