<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('user', 'kelas_id')) {
            Schema::table('user', function (Blueprint $table) {
                $table->foreignId('kelas_id')
                    ->nullable()
                    ->constrained('kelas')
                    ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('user', 'kelas_id')) {
            Schema::table('user', function (Blueprint $table) {
                $table->dropForeign(['kelas_id']);
                $table->dropColumn('kelas_id');
            });
        }
    }
};
