<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    // HasUuids: primary key otomatis berupa UUID (non-incrementing, tipe string)
    use HasUuids;

    protected $table = 'user';

    protected $fillable = [
        'nama',
        'nim',
        'kelas_id',
    ];

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Ambil semua user + nama kelasnya, sekarang pakai Eloquent (bukan DB::table)
    public function getUser()
    {
        return self::query()
            ->leftJoin('kelas', 'user.kelas_id', '=', 'kelas.id')
            ->select('user.*', 'kelas.nama_kelas')
            ->orderBy('user.created_at')
            ->get();
    }
}
