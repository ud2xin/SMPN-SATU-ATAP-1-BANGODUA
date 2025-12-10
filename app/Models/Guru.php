<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // Field yang boleh di–mass assign
    protected $fillable = [
        'user_id',
        'nama',
        'keterangan',
        'foto',
    ];

    /**
     * Relasi ke tabel users
     * Setiap guru dimiliki oleh 1 user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
