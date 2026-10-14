<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('beritas', 'judul')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->string('judul', 50)->nullable();
            });
        }

        if (!Schema::hasColumn('beritas', 'isi')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->longText('isi')->nullable();
            });
        }

        if (!Schema::hasColumn('beritas', 'tanggal')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->date('tanggal')->nullable();
            });
        }

        if (!Schema::hasColumn('beritas', 'gambar')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->string('gambar')->nullable();
            });
        }

        if (!Schema::hasColumn('beritas', 'id_user')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->unsignedBigInteger('id_user')->nullable();
            });
        }

        if (!Schema::hasColumn('beritas', 'status')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->string('status')->default('draft');
            });
        }
    }

    public function down(): void
    {
        // Kolom tidak dihapus agar data tetap aman.
    }
};
