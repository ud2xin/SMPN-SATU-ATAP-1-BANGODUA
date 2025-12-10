<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class GaleriFrontendController extends Controller
{
    public function index()
    {
        // Hanya kategori galeri (bukan kegiatan)
        $galeri = Galeri::where('kategori', 'galeri')
                        ->orderBy('id', 'desc')
                        ->paginate(12);

        return view('frontend.galeri.index', compact('galeri'));
    }

    public function show($id)
    {
        $data = Galeri::findOrFail($id);

        return view('frontend.galeri.show', compact('data'));
    }
}
