<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_buku')->insert([
            'id_buku' => '1',
            'judul' => 'Attack On Titan',
            'pengarang' => 'Hajime',
            'id_kategori' => '1',
            'tahun_terbit' => '2012',
        ]);
        DB::table('tb_buku')->insert([
            'id_buku' => '2',
            'judul' => 'Naruto',
            'pengarang' => 'Ajinomoto',
            'id_kategori' => '1',
            'tahun_terbit' => '2000',
        ]);
        DB::table('tb_buku')->insert([
            'id_buku' => '3',
            'judul' => 'Shadow Garden',
            'pengarang' => 'Cid',
            'id_kategori' => '1',
            'tahun_terbit' => '2023',
        ]);
        DB::table('tb_buku')->insert([
            'id_buku' => '4',
            'judul' => 'Bahasa Indonesia',
            'pengarang' => 'Puspa Dewi',
            'id_kategori' => '3',
            'tahun_terbit' => '2012',
        ]);
        DB::table('tb_buku')->insert([
            'id_buku' => '5',
            'judul' => 'Bahasa Jepang',
            'pengarang' => 'Sugiono',
            'id_kategori' => '3',
            'tahun_terbit' => '2000',
        ]);
        DB::table('tb_buku')->insert([
            'id_buku' => '6',
            'judul' => 'Bahasa Jerman',
            'pengarang' => 'Anto',
            'id_kategori' => '3',
            'tahun_terbit' => '2015',
        ]);
        DB::table('tb_buku')->insert([
            'id_buku' => '7',
            'judul' => 'Bahasa Inggris',
            'pengarang' => 'Juliet',
            'id_kategori' => '3',
            'tahun_terbit' => '2016',
        ]);
        DB::table('tb_buku')->insert([
            'id_buku' => '8',
            'judul' => 'Manajen Bisnis',
            'pengarang' => 'Jojo',
            'id_kategori' => '2',
            'tahun_terbit' => '2023',
        ]);
        DB::table('tb_buku')->insert([
            'id_buku' => '9',
            'judul' => 'E Bisnis',
            'pengarang' => 'Messi',
            'id_kategori' => '2',
            'tahun_terbit' => '2023',
        ]);
        DB::table('tb_buku')->insert([
            'id_buku' => '10',
            'judul' => 'Bisnis Digital',
            'pengarang' => 'Ega',
            'id_kategori' => '2',
            'tahun_terbit' => '2001',
        ]);
        DB::table('tb_anggota')->insert([
            'id_member' => '1',
            'nama' => 'Ari Atmaja',
            'username' => 'ari',
            'password' => Hash::make('ari'),
            'alamat' => 'Ubud',
            'no_telepon' => '082194359207',
            'level' => 'user',
        ]);
        // DB::table('tb_anggota')->insert([
        //     'id_member' => '2',
        //     'nama' => 'Browww',
        //     'username' => 'brow123',
        //     'password' => Hash::make('09876'),
        //     'alamat' => 'Denpasar',
        //     'no_telepon' => '082194359333',
        // ]);
        DB::table('tb_anggota')->insert([
            'id_member' => '2',
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'alamat' => 'admin',
            'no_telepon' => 'admin',
            'level' => 'admin',
        ]);
        // DB::table('tb_anggota')->insert([
        //     'id_member' => '4',
        //     'nama' => 'Hendrawan',
        //     'username' => 'hendra',
        //     'password' => Hash::make('hendra'),
        //     'alamat' => 'Mengwi',
        //     'no_telepon' => '082194111211',
        // ]);
        DB::table('tb_kategori')->insert([
            'id_kategori' => '1',
            'nama_kategori' => 'Komik',
        ]);
        DB::table('tb_kategori')->insert([
            'id_kategori' => '2',
            'nama_kategori' => 'Ekonomi',
        ]);
        DB::table('tb_kategori')->insert([
            'id_kategori' => '3',
            'nama_kategori' => 'Bahasa',
        ]);

    }
}
