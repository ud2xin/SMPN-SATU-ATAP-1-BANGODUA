<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('galeri')->latest()->paginate(10);

        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        $galeri = Galeri::all();
        return view('admin.berita.create', compact('galeri'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'galeri_id' => 'required|exists:galeri,id',
            'kategori' => 'required|in:berita,prestasi'
        ]);

        $validated['slug'] = Str::slug($validated['judul']);
        $validated['user_id'] = Auth::id();
        $validated['tanggal'] = now()->toDateString();

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Berita::findOrFail($id);
        $galeri = Galeri::all();

        return view('admin.berita.edit', compact('data', 'galeri'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'galeri_id' => 'required|exists:galeris,id',
            'kategori' => 'required|in:berita,prestasi'
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        Berita::findOrFail($id)->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Berita::findOrFail($id)->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
