<?php

namespace App\Http\Controllers;

use App\Models\Pariwisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PariwisataController extends Controller
{
    /**
     * Menampilkan daftar data pariwisata dengan paginasi dan fitur pencarian.
     */
    public function index(Request $request)
    {
        // Query dasar untuk mengambil data, diurutkan dari yang terbaru
        $query = Pariwisata::latest();

        // Logika untuk fitur pencarian
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('alamat', 'like', '%' . $search . '%');
        }

        // Gunakan .paginate() untuk membuat paginasi (misal: 10 item per halaman)
        $daftar_wisata = $query->paginate(10);

        return view('wisata.index', compact('daftar_wisata'));
    }

    /**
     * Menampilkan detail satu data pariwisata.
     */
    public function show($id)
    {
        // Ambil 1 data wisata berdasarkan id dengan relasi kecamatan dan jenis
        $wisata = Pariwisata::with(['kecamatan', 'jenis'])->findOrFail($id);

        // Kirim ke view detail
        return view('wisata.show', compact('wisata'));
    }

    // --- Method lainnya bisa Anda aktifkan kembali nanti jika dibutuhkan ---

    // public function create() { ... }
    // public function store(Request $request) { ... }
    // public function edit($id) { ... }
    // public function update(Request $request, $id) { ... }
    // public function destroy($id) { ... }
}
