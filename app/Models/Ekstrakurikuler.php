<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $table = 'ekstrakulikulers';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'nama_ekskul',
        'slug',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}
