<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Sambutan;
use App\Models\Berita;
use App\Models\Karya;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::with([
            'gambarBesar',
            'gambarKecil1',
            'gambarKecil2',
            'gambarKecil3',
            'gambarKecil4',
            'gambarKecil5',
            'gambarKecil6',
            'gambarKecil7',
            'gambarKecil8',
            'gambarKecil9',
            'gambarKecil10',
        ])->first();

        $sambutan = Sambutan::with(['kepalaGuru', 'fotoKepala'])->first();

        $beritas = Berita::with('galeri')
            ->where('kategori', 'berita')
            ->latest('tanggal')
            ->take(9)
            ->get();

        $prestasiUtama = Berita::with('galeri')
            ->where('kategori', 'prestasi')
            ->latest('tanggal')
            ->first();

        $karyas = Karya::with(['gambar1','gambar2','gambar3'])
            ->latest('tanggal')
            ->take(4)
            ->get();

        return view('frontend.index', compact(
            'hero',
            'sambutan',
            'beritas',
            'prestasiUtama',
            'karyas'
        ));
    }
}
