<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = 'karyas';

    protected $fillable = [
        'user_id',
        'gambar_1_id',
        'gambar_2_id',
        'gambar_3_id',
        'cover',
        'kategori',
        'foto_pemilik',
        'info_pemilik',
        'judul',
        'nama',
        'deskripsi',
        'konten',
        'tanggal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gambar1()
    {
        return $this->belongsTo(Galeri::class, 'gambar_1_id');
    }

    public function gambar2()
    {
        return $this->belongsTo(Galeri::class, 'gambar_2_id');
    }

    public function gambar3()
    {
        return $this->belongsTo(Galeri::class, 'gambar_3_id');
    }

    // Akses gambar cover otomatis
    public function getCoverImageAttribute()
    {
        return match ($this->cover) {
            'gambar_1' => $this->gambar1,
            'gambar_2' => $this->gambar2,
            'gambar_3' => $this->gambar3,
            default => null
        };
    }
}
