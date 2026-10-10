<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';

    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'keterangan',
        'kategori',
        'tanggal',
        'file',
        'sumber_video',
        'link_video',
    ];
}
