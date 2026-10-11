<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Kolom nama & nim sudah dibuat di create_user_table, jadi cek dulu supaya tidak duplikat
        if (Schema::hasColumn('user', 'nama') && Schema::hasColumn('user', 'nim')) {
            return;
        }

        Schema::table('user', function (Blueprint $table) {
            $table->string('nama')->after('id');
            $table->string('nim')->after('nama');
        });
    }

    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn(['nama', 'nim']);
        });
    }
};