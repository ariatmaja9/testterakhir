<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $table = 'tb_peminjam';
    protected $primaryKey = 'id_pinjam';

    protected $fillable = ['id_pinjam', 'id_buku', 'id_member', 'tanggal_pinjam', 'tanggal_kembali', 'status_pinjam', 'denda'];
}
