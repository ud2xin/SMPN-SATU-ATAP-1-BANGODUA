<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karya;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryaController extends Controller
{
    public function index()
    {
        $karya = Karya::with(['user', 'galeri'])
                    ->orderBy('created_at', 'DESC')
                    ->paginate(10);

        return view('admin.karya.index', compact('karya'));
    }

    public function create()
    {
        $galeri = Galeri::all();
        return view('admin.karya.create', compact('galeri'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'nama'      => 'required|string|max:255',
            'jabatan'   => 'required|string|max:255',
            'kategori'  => 'required|in:siswa,guru',
            'galeri_id' => 'nullable|exists:galeri,id',
            'tanggal'   => 'nullable',
            'deskripsi' => 'nullable',
            'keterangan'=> 'nullable',
        ]);
        
        $validated['user_id'] = Auth::id();
        $validated['tanggal'] = now();
        
        Karya::create($validated);        

        return redirect()->route('admin.karya.index')->with('success', 'Karya berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Karya::findOrFail($id);
        $galeri = Galeri::all();

        return view('admin.karya.edit', compact('data', 'galeri'));
    }

    public function update(Request $request, $id)
    {
        $data = Karya::findOrFail($id);

        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'nama'      => 'required|string|max:255',
            'jabatan'   => 'required|string|max:255',
            'kategori'  => 'required|in:siswa,guru',
            'galeri_id' => 'nullable|exists:galeri,id',
            'tanggal'   => 'required|date',
            'deskripsi' => 'nullable',
            'keterangan'=> 'nullable',
        ]);

        $validated['tanggal'] = now();
        $data->update($validated);
        

        return redirect()->route('admin.karya.index')->with('success', 'Karya berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = Karya::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.karya.index')->with('success', 'Karya berhasil dihapus');
    }
}
