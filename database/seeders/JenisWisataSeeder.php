<?php

namespace Database\Seeders;

use App\Models\JenisWisata;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = [
            'Alam',
            'Multifungsi (rekreasi, budaya, kuliner)',
            'Multifungsi (Kuliner, Rekreasi, Hiburan)',
            'Religi',
            'Edukasi dan Budaya',
            'Sarana Olahraga',
            'Wisata Alam',
            'Wisata Buatan/Rekreasi',
            'Sarana Publik',
            'Alam/Rekreasi',
        ];

        foreach ($jenis as $nama) {
            JenisWisata::create(['nama' => $nama]);
        }
    }
}
