<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaFrontendController extends Controller
{
    public function index()
    {
        // GRID UTAMA SEMUA BERITA
        $beritas = Berita::with('galeri')
            ->latest()
            ->paginate(4);

        // Karena ini halaman index, tidak ada berita aktif
        $currentBeritaId = null;

        // SIDEBAR → BERITA TERBARU
        $beritaTerbaru = Berita::with('galeri')
            ->where('kategori', 'berita')
            ->latest()
            ->take(5)
            ->get();

        // SIDEBAR → PRESTASI TERBARU
        $prestasiTerbaru = Berita::with('galeri')
            ->where('kategori', 'prestasi')
            ->latest()
            ->take(5)
            ->get();

        return view('frontend.berita', compact(
            'beritas', 'beritaTerbaru', 'prestasiTerbaru', 'currentBeritaId'
        ));
    }

    public function show($slug)
    {
        $berita = Berita::with(['user', 'galeri'])
            ->where('slug', $slug)
            ->firstOrFail();

        $currentBeritaId = $berita->id;

        // SIDEBAR → BERITA TERBARU (exclude current)
        $beritaTerbaru = Berita::with('galeri')
            ->where('kategori', 'berita')
            ->where('id', '!=', $currentBeritaId)
            ->latest()
            ->take(5)
            ->get();

        // SIDEBAR → PRESTASI TERBARU (exclude current)
        $prestasiTerbaru = Berita::with('galeri')
            ->where('kategori', 'prestasi')
            ->where('id', '!=', $currentBeritaId)
            ->latest()
            ->take(5)
            ->get();

        return view('frontend.single-berita', compact(
            'berita', 'beritaTerbaru', 'prestasiTerbaru', 'currentBeritaId'
        ));
    }
}
