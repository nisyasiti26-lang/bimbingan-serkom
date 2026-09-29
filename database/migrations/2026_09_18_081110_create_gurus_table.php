<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('nama_guru', 100);
            $table->string('nip', 30)->nullable();
            $table->string('mapel', 100)->nullable();
            $table->string('foto')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};