<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = "kecamatan";

    public function pariwisata()
    {
        return $this->hasMany(Pariwisata::class, "kecamatan_id");
    }
}
