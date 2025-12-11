<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osis extends Model
{
    use HasFactory;

    protected $table = 'osis';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'urut',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urut' => 'integer',
    ];
}
