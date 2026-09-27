<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    protected $table = 'user';

    protected $fillable = [
        'nama',
        'nim',
        'kelas_id',
    ];

    public function getUser()
    {
        return DB::table('user')
            ->join('kelas', 'user.kelas_id', '=', 'kelas.id')
            ->select(
                'user.id',
                'user.nama',
                'user.nim',
                'user.kelas_id',
                'kelas.nama_kelas'
            )
            ->orderBy('user.id')
            ->get();
    }
}
