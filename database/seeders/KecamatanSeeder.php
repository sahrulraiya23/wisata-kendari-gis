<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kecamatan = [
            'Nambo',
            'Abeli',
            'Kendari Barat',
            'Mandonga',
            'Kadia',
            'Kambu',
            'Baruga',
            'Poasia',
            'Puuwatu',
        ];

        foreach ($kecamatan as $nama) {
            Kecamatan::create(['nama' => $nama]);
        }
    }
}
