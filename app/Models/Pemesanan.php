<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_hotel',
        'no_identitas',
        'jenis_kelamin',
        'tanggal_kunjungan',
        'durasi',
        'total',
    ];

    protected $table = 'pemesanans';

    function hotel()
    {
        return $this->belongsTo(hotel::class, 'id_hotel','id');}
}
