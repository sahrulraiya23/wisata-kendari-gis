<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pariwisata extends Model
{
    protected $table = "pariwisata";

    protected $fillable = [
        'nama',
        'jenis_id',
        'kecamatan_id',
        'alamat',
        'deskripsi',
        'latitude',
        'longitude',
        'rating',
        'gambar'
    ];

    public function jenis() {
        return $this->belongsTo(JenisWisata::class, "jenis_id");
    }

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class, "kecamatan_id");
    }
}
