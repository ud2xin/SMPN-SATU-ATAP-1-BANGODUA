<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Osis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OsisController extends Controller
{
    public function index()
    {
        // pakai pagination agar pada view kita bisa pakai links()
        $osis = Osis::orderBy('urut')->paginate(10);
        return view('admin.osis.index', compact('osis'));
    }

    public function create()
    {
        return view('admin.osis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:4096',
            'urut' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['nama','jabatan','urut','is_active']);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('osis', 'public');
            $data['foto'] = $path;
        }

        Osis::create($data);

        return redirect()->route('admin.osis.index')->with('success', 'Anggota OSIS berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $osis = Osis::findOrFail($id);
        return view('admin.osis.edit', compact('osis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:4096',
            'urut' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $osis = Osis::findOrFail($id);

        $data = $request->only(['nama','jabatan','urut','is_active']);

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($osis->foto && Storage::disk('public')->exists($osis->foto)) {
                Storage::disk('public')->delete($osis->foto);
            }
            $path = $request->file('foto')->store('osis', 'public');
            $data['foto'] = $path;
        }

        $osis->update($data);

        return redirect()->route('admin.osis.index')->with('success', 'Data OSIS berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $osis = Osis::findOrFail($id);

        if ($osis->foto && Storage::disk('public')->exists($osis->foto)) {
            Storage::disk('public')->delete($osis->foto);
        }

        $osis->delete();

        return redirect()->route('admin.osis.index')->with('success', 'Anggota OSIS berhasil dihapus.');
    }
}
