<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;


class UserController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function index(Request $request)
    {
        $title = 'Data User';
        $q =$request->query('q');
        $users = User::where('nama', 'like', '%' . $q . '%')
            ->paginate(10)
            ->withQueryString();
        $no = $users->firstItem();
        return view('user.index', compact('title', 'users', 'q', 'no'));
    }

    public function create()
    {
        $title = 'Tambah User';
        $levels = ['admin', 'user'];
        return view('user.create', compact('title', 'levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'level' => 'required',
        ]);

        if (User::where('username', $request->username)->first())
            return back()->withErrors(['username' => 'Username Sudah Terdaftar!']);

        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index')->with(['message' => 'Data Berhasil Di Tambahkan!']);
    }

    public function edit(User $user)
    {
        $title = 'Ubah User';
        $levels = ['admin', 'user'];
        return view('user.edit', compact('title', 'user', 'levels'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'level' => 'required',
        ]);

        if (User::where('username', $request->username)->where('id_member', '<>', $user->id_member)->first())
            return back()->withErrors(['username' => 'Username Sudah Terdaftar!']);

        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->alamat = $request->alamat;
        $user->no_telepon = $request->no_telepon;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect()->route('user.index')->with(['message' => 'Data Berhasil Di Ubah!']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with(['message' => 'Data Berhasil Di Hapus!']);
    }

    public function passwordAction(Request $request)
    {
        $request->validate([
            'pass1' => 'required',
            'pass2' => 'required',
            'pass3' => 'required',
        ]);

        if (!Hash::check($request->pass1, Auth::user()->password))
            return back()->withErrors(['pass1' => 'Password Lama Salah!']);

        if ($request->pass2 !=$request->pass3)
            return back()->withErrors(['pass2' => 'Password Baru Dan Komfirmasi Password Harus Sama']);

        User::where('id_member', Auth::id())->update([
            'password'  => Hash::make($request->pass2)
        ]);
        return redirect()->route('user.password')->with(['message' => 'Password Berhasil Di Ubah']);
    }

    public function password()
    {
        $title = 'Ubah Password';
        return view('user.password', compact('title'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function loginAction(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return Redirect()->route('home');
            // return 'Login berhasil';
        }

        return back()->withErrors([
            'username' => 'Username Atau Password Anda Salah'
        ]);
    }

    public function login()
    {
        $title = 'LOGIN';
        return view('user.login', compact('title'));
    }

    // public function index()
    // {
    //     $title = 'Data User';
    //     $users = User::all();
    //     return view('user.index', compact('title', 'users'));
    // }

}
?>
