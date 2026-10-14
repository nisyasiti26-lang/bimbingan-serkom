<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            if (!Schema::hasColumn('galeris', 'sumber_video')) {
                $table->string('sumber_video')->nullable();
            }

            if (!Schema::hasColumn('galeris', 'link_video')) {
                $table->text('link_video')->nullable();
            }

            $table->string('file')->nullable()->change();
        });
    }

    public function down(): void
    {
        $columns = [];

        if (Schema::hasColumn('galeris', 'sumber_video')) {
            $columns[] = 'sumber_video';
        }

        if (Schema::hasColumn('galeris', 'link_video')) {
            $columns[] = 'link_video';
        }

        if (!empty($columns)) {
            Schema::table('galeris', function (Blueprint $table) use ($columns) {
                $table->dropColumn($columns);
            });
        }
    }
};