<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticable
{
    use HasFactory;

    protected $table = 'tb_anggota';
    protected $primaryKey = 'id_member';

    protected $fillable = ['id_member', 'nama', 'username', 'password', 'alamat', 'no_telepon', 'level'];
}
