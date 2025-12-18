<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sambutan;
use App\Models\Guru;
use Illuminate\Http\Request;

class SambutanController extends Controller
{
    public function index()
    {
        $sambutan = Sambutan::first(); // hanya 1 data

        return view('admin.sambutan.index', compact('sambutan'));
    }

    public function edit()
    {
        // Jika belum ada, buat data kosong
        $sambutan = Sambutan::firstOrCreate([]);

        $gurus = Guru::all();

        return view('admin.sambutan.edit', compact('sambutan', 'gurus'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kepala_guru_id' => 'nullable|exists:gurus,id',
            'foto_kepala_id' => 'nullable|exists:gurus,id',
            'sambutan_kepala' => 'nullable|string',
        ]);

        $sambutan = Sambutan::first();

        $sambutan->update($request->all());

        return redirect()
            ->route('admin.sambutan.index')
            ->with('success', 'Sambutan berhasil diperbarui');
    }
}
