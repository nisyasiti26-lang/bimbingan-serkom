<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
    'nisn',
    'nama_siswa',
    'jenis_kelamin',
    'tahun_masuk',
];
}