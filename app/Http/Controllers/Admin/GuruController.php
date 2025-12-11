<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::orderByRaw('COALESCE(urut, 9999), nama')->get();
        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(StoreGuruRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();

            // simpan ke storage/app/public/guru
            $file->storeAs('guru', $filename, 'public');

            $data['foto'] = 'guru/' . $filename;
        }

        Guru::create($data);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(UpdateGuruRequest $request, Guru $guru)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();

            // simpan file baru
            $file->storeAs('guru', $filename, 'public');

            $data['foto'] = 'guru/' . $filename;
        }

        $guru->update($data);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Guru dihapus.');
    }
}
