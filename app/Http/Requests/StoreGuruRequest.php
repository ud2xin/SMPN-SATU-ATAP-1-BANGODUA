<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuruRequest extends FormRequest
{
    public function authorize()
    {
        // pastikan hanya admin => return auth()->check() && auth()->user()->isAdmin;
        return true;
    }

    public function rules()
    {
        return [
            'urut' => 'nullable|integer|min:0',
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'notelp' => 'nullable|string|max:50',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
