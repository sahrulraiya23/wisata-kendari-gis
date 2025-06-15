<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisWisata extends Model
{
    protected $table = "jenis_wisata";

    public function pariwisata() {
        return $this->hasMany(Pariwisata::class, "jenis_id");
    }
}
