<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

/**
 * Modul 6: primary key tabel `user` diganti dari auto-increment (bigint) menjadi UUID.
 * Data lama tetap dipertahankan (tiap baris diberi UUID baru).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_new', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('nim');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->nullOnDelete();
            $table->timestamps();
        });

        DB::table('user')->orderBy('id')->get()->each(function ($row) {
            DB::table('user_new')->insert([
                'id' => (string) Str::uuid(),
                'nama' => $row->nama ?? '',
                'nim' => $row->nim ?? '',
                'kelas_id' => $row->kelas_id ?? null,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            ]);
        });

        Schema::drop('user');
        Schema::rename('user_new', 'user');
    }

    public function down(): void
    {
        Schema::create('user_old', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->nullOnDelete();
            $table->timestamps();
        });

        DB::table('user')->orderBy('created_at')->get()->each(function ($row) {
            DB::table('user_old')->insert([
                'nama' => $row->nama,
                'nim' => $row->nim,
                'kelas_id' => $row->kelas_id,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            ]);
        });

        Schema::drop('user');
        Schema::rename('user_old', 'user');
    }
};
