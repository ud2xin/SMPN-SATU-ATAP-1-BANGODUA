<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048',
            'deskripsi' => 'nullable|string',
            'pembina' => 'nullable|string|max:255',
            'jadwal' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler.edit', ['ekskul' => $ekstrakurikuler]);
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048',
            'deskripsi' => 'nullable|string',
            'pembina' => 'nullable|string|max:255',
            'jadwal' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->update($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diupdate');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if ($ekstrakurikuler->gambar) {
            Storage::disk('public')->delete($ekstrakurikuler->gambar);
        }

        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus');
    }
}
