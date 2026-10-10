
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();

            $table->string('judul', 50);
            $table->text('keterangan');
            $table->string('kategori', 20);
            $table->date('tanggal');

            // File foto atau video, boleh kosong jika memakai link
            $table->string('file')->nullable();

            // Sumber video: file atau link
            $table->string('sumber_video')->nullable();
            $table->text('link_video')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
