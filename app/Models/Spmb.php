<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPMB extends Model
{
    use HasFactory;

    protected $table = 'spmb';

    protected $fillable = [
        'gambar',
        'konten',
        'link',
    ];
}
