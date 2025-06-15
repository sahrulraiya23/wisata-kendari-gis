<?php

namespace App\Http\Controllers;

use App\Models\JenisWisata;
use App\Models\Kecamatan;
use App\Models\Pariwisata;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function index(Request $request)
    {
        $jenis_wisata = JenisWisata::latest()->get();
        $daftar_kecamatan = Kecamatan::latest()->get();

        $query = Pariwisata::query();

        // Filter jenis wisata kalau ada input
        if ($request->filled('jenis_id')) {
            $query->where('jenis_id', $request->jenis_id);
        }

        // Filter kecamatan kalau ada input
        if ($request->filled('kecamatan_id')) {
            $query->where('kecamatan_id', $request->kecamatan_id);
        }

        $daftar_wisata = $query->latest()->get();

        return view('maps.index', compact('daftar_wisata', 'jenis_wisata', 'daftar_kecamatan'));
    }
}
