<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

/**
 * Pastikan primary key tabel `mata_kuliah` bertipe UUID.
 * Kalau di database kolom `id` masih angka (bigint), tabel dikonversi dan data lama dipertahankan.
 * Kalau sudah UUID, migration ini tidak melakukan apa-apa.
 */
return new class extends Migration
{
    public function up(): void
    {
        $idColumn = collect(Schema::getColumns('mata_kuliah'))->firstWhere('name', 'id');

        if (!$idColumn || !str_contains(strtolower($idColumn['type']), 'int')) {
            return; // sudah UUID
        }

        Schema::create('mata_kuliah_new', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_mk', 100);
            $table->integer('sks');
            $table->timestamps();
        });

        DB::table('mata_kuliah')->orderBy('id')->get()->each(function ($row) {
            DB::table('mata_kuliah_new')->insert([
                'id' => (string) Str::uuid(),
                'nama_mk' => $row->nama_mk,
                'sks' => $row->sks,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            ]);
        });

        Schema::drop('mata_kuliah');
        Schema::rename('mata_kuliah_new', 'mata_kuliah');
    }

    public function down(): void
    {
        // Sengaja kosong: UUID tidak dikembalikan ke angka.
    }
};
