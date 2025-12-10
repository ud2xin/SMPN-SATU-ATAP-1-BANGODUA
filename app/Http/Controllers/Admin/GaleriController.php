<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderBy('id', 'asc')->paginate(2);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:galeri,kegiatan',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|max:5120', // max 5MB
        ]);

        $path = $request->file('gambar')->store('galeri', 'public');

        Galeri::create([
            'judul' => $data['judul'],
            'kategori' => $data['kategori'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:galeri,kegiatan',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            // hapus file lama jika ada
            if ($galeri->gambar) {
                Storage::disk('public')->delete($galeri->gambar);
            }
            $galeri->gambar = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->judul = $data['judul'];
        $galeri->kategori = $data['kategori'];
        $galeri->deskripsi = $data['deskripsi'] ?? null;
        $galeri->save();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus file gambar
        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        // Hapus dari database
        $galeri->delete();

        // ============================================
        //  REORDER ID AGAR BERURUT TANPA CELAH
        // ============================================
        \DB::statement('SET @no = 0');
        \DB::statement('UPDATE galeri SET id = (@no := @no + 1) ORDER BY id');

        // Set auto increment ke id terakhir + 1
        $lastId = Galeri::max('id') ?? 0;
        \DB::statement('ALTER TABLE galeri AUTO_INCREMENT = ' . ($lastId + 1));
        // ============================================

        return back()->with('success', 'Galeri berhasil dihapus.');
    }
}
