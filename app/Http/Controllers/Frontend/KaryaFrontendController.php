<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Karya;
use Illuminate\Http\Request;

class KaryaFrontendController extends Controller
{
    public function index(Request $request)
    {
        // Ambil kategori dari URL
        $kategori = $request->get('kategori', 'semua');

        $query = Karya::with(['gambar1', 'gambar2', 'gambar3']);

        if ($kategori === 'siswa') {
            $query->where('kategori', 'karya_siswa');
        } elseif ($kategori === 'guru') {
            $query->where('kategori', 'karya_guru');
        }

        $karyas = $query->latest()->paginate(9);

        return view('frontend.karya', [
            'karyas' => $karyas,
            'kategori' => $kategori,
        ]);
    }


    // =========================
    // 📌 HALAMAN SINGLE KARYA
    // =========================
    public function show($id)
{
    // Ambil karya + gambar
    $karya = Karya::with(['gambar1', 'gambar2', 'gambar3'])
        ->findOrFail($id);

    // Gallery array
    $galeri = collect([
        $karya->gambar1,
        $karya->gambar2,
        $karya->gambar3,
    ])->filter();

    // Karya terbaru (kecuali karya ini)
    $related = Karya::where('id', '!=', $karya->id)
        ->latest()
        ->take(3)
        ->get();

    return view('frontend.single-karya', [
        'karya' => $karya,
        'galeri' => $galeri,
        'related' => $related,
    ]);
}

}
