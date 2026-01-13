<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatElektromedis extends Model
{
    use HasFactory;

    protected $table = 'alat_elektromedis';

    protected $fillable = [
        'nama_alat',
        'gambar',
        'merk',
        'tipe',
        'tahun_pengadaan',
        'kondisi',
        'lokasi',
    ];
}
