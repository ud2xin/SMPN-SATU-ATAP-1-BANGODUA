<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class GaleriFrontendController extends Controller
{
    public function index()
    {
        $kategori = request('kategori'); // ambil ?kategori=...

        $galeri = Galeri::when($kategori, function($q) use ($kategori) {
                        return $q->where('kategori', $kategori);
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(12);

        return view('frontend.galeri.index', compact('galeri', 'kategori'));
    }


    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('frontend.galeri.show', [
            'galeri' => $galeri
        ]);
    }

}
