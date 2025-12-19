<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Spmb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SPMBController extends Controller
{
    public function index()
    {
        $spmb = SPMB::first();

        return view('admin.spmb.index', compact('spmb'));
    }

    public function edit($id)
    {
        // Ambil data pertama, kalau belum ada → buat kosong
        $spmb = SPMB::first();

        if (!$spmb) {
            $spmb = SPMB::create([
                'gambar' => null,
                'konten' => null,
                'link'   => null,
            ]);
        }

        return view('admin.spmb.edit', compact('spmb'));
    }

    public function update(Request $request, $id)
    {
        $spmb = SPMB::findOrFail($id);

        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'konten' => 'nullable|string',
            'link'   => 'nullable|url',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {

            if ($spmb->gambar && Storage::disk('public')->exists($spmb->gambar)) {
                Storage::disk('public')->delete($spmb->gambar);
            }

            $spmb->gambar = $request->file('gambar')
                                     ->store('spmb', 'public');
        }

        $spmb->konten = $request->konten;
        $spmb->link   = $request->link;
        $spmb->save();

        return redirect()
            ->route('admin.spmb.index')
            ->with('success', 'Data SPMB berhasil diperbarui');
    }
}
