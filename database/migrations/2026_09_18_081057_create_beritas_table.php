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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            // $table->uuid('id_berita')->primary;
            // $table->string('judul', 50);
            // $table->text('isi');
            // $table->date('tanggal');
            // $table->enum('status', ['drat', 'publish']);
            // $table->string('gambar', 100)->nullable();
            // $table->uuid('id_user');
            // $table->foreign('id_user')->references('id_user')->on('user')->onUpdate('cascade')->onDelete('restric');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
