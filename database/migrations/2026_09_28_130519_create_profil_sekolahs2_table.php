<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {

            $table->string('nama_sekolah')->nullable();
            $table->string('kepala_sekolah')->nullable();
            $table->string('foto')->nullable();
            $table->string('logo')->nullable();
            $table->string('npsn')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->text('visi_misi')->nullable();
            $table->string('tahun_berdiri')->nullable();
            $table->text('deskripsi')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {

            $table->dropColumn([
                'nama_sekolah',
                'kepala_sekolah',
                'foto',
                'logo',
                'npsn',
                'alamat',
                'kontak',
                'visi_misi',
                'tahun_berdiri',
                'deskripsi',
            ]);

        });
    }
};