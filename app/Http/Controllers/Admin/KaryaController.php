<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karya;
use App\Models\Galeri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryaController extends Controller
{
    public function index()
    {
        $karyas = Karya::with(['user', 'gambar1', 'gambar2', 'gambar3'])
        ->latest()
        ->paginate(10);

        return view('admin.karya.index', compact('karyas'));
    }

    public function create()
    {
        return view('admin.karya.create', [
            'galeri' => \App\Models\Galeri::all(),
            'users' => \App\Models\User::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'gambar_1_id' => 'required',
            'gambar_2_id' => 'required',
            'gambar_3_id' => 'required',
            'cover' => 'required|in:gambar_1,gambar_2,gambar_3',
            'kategori' => 'required',
            'judul' => 'required',
            'nama' => 'required',
            'tanggal' => 'required|date',
            'foto_pemilik' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        // ✨ Upload foto pemilik
        $foto = null;
        if ($request->hasFile('foto_pemilik')) {
            $foto = $request->file('foto_pemilik')->store('karya/pemilik', 'public');
        }

        Karya::create([
            'user_id' => $request->user_id,
            'gambar_1_id' => $request->gambar_1_id,
            'gambar_2_id' => $request->gambar_2_id,
            'gambar_3_id' => $request->gambar_3_id,
            'cover' => $request->cover,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'konten' => $request->konten,
            'info_pemilik' => $request->info_pemilik,
            'foto_pemilik' => $foto,
        ]);

        return redirect()->route('admin.karya.index')
            ->with('success', 'Karya berhasil ditambahkan!');
    }

    public function edit($id)
    {
        return view('admin.karya.edit', [
            'karya' => Karya::findOrFail($id),
            'galeri' => \App\Models\Galeri::all(),
            'users' => \App\Models\User::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $karya = Karya::findOrFail($id);

        $request->validate([
            'user_id' => 'required',
            'gambar_1_id' => 'required',
            'gambar_2_id' => 'required',
            'gambar_3_id' => 'required',
            'cover' => 'required|in:gambar_1,gambar_2,gambar_3',
            'kategori' => 'required',
            'judul' => 'required',
            'nama' => 'required',
            'tanggal' => 'required|date',
            'foto_pemilik' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $foto = $karya->foto_pemilik;

        // ✨ Upload foto pemilik baru jika ada
        if ($request->hasFile('foto_pemilik')) {

            // Hapus foto lama jika ada
            if ($karya->foto_pemilik && Storage::disk('public')->exists($karya->foto_pemilik)) {
                Storage::disk('public')->delete($karya->foto_pemilik);
            }

            $foto = $request->file('foto_pemilik')->store('karya/pemilik', 'public');
        }

        $karya->update([
            'user_id' => $request->user_id,
            'gambar_1_id' => $request->gambar_1_id,
            'gambar_2_id' => $request->gambar_2_id,
            'gambar_3_id' => $request->gambar_3_id,
            'cover' => $request->cover,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'konten' => $request->konten,
            'info_pemilik' => $request->info_pemilik,
            'foto_pemilik' => $foto,
        ]);

        return redirect()->route('admin.karya.index')
            ->with('success', 'Karya berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $karya = Karya::findOrFail($id);

        // ✨ hapus foto pemilik
        if ($karya->foto_pemilik && Storage::disk('public')->exists($karya->foto_pemilik)) {
            Storage::disk('public')->delete($karya->foto_pemilik);
        }

        $karya->delete();

        return back()->with('success', 'Karya berhasil dihapus');
    }
}
