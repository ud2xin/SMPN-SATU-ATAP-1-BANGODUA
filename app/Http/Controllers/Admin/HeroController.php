<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Galeri;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Hero admin selalu tampil
     */
    public function index()
    {
        // kalau belum ada → buat kosong (mirip web lama)
        $hero = Hero::firstOrCreate([]);

        return view('admin.hero.index', compact('hero'));
    }

    /**
     * Edit hero
     */
    public function edit(Hero $hero)
    {
        $galeris = Galeri::latest()->get();

        return view('admin.hero.edit', compact('hero', 'galeris'));
    }

    /**
     * Update hero
     */
    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'gambar_besar_id' => 'nullable|exists:galeri,id',
            'gambar_kecil_1_id' => 'nullable|exists:galeri,id',
            'gambar_kecil_2_id' => 'nullable|exists:galeri,id',
            'gambar_kecil_3_id' => 'nullable|exists:galeri,id',
            'gambar_kecil_4_id' => 'nullable|exists:galeri,id',
            'gambar_kecil_5_id' => 'nullable|exists:galeri,id',
            'gambar_kecil_6_id' => 'nullable|exists:galeri,id',
            'gambar_kecil_7_id' => 'nullable|exists:galeri,id',
            'gambar_kecil_8_id' => 'nullable|exists:galeri,id',
            'gambar_kecil_9_id' => 'nullable|exists:galeri,id',
            'gambar_kecil_10_id' => 'nullable|exists:galeri,id',
        ]);

        $hero->update($request->all());

        return redirect()
            ->route('admin.hero.index')
            ->with('success', 'Hero berhasil diperbarui');
    }
}
