<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'heros';

    protected $guarded = [];

    public function gambarBesar()
    {
        return $this->belongsTo(Galeri::class, 'gambar_besar_id');
    }

    public function gambarKecil1() { return $this->belongsTo(Galeri::class, 'gambar_kecil_1_id'); }
    public function gambarKecil2() { return $this->belongsTo(Galeri::class, 'gambar_kecil_2_id'); }
    public function gambarKecil3() { return $this->belongsTo(Galeri::class, 'gambar_kecil_3_id'); }
    public function gambarKecil4() { return $this->belongsTo(Galeri::class, 'gambar_kecil_4_id'); }
    public function gambarKecil5() { return $this->belongsTo(Galeri::class, 'gambar_kecil_5_id'); }
    public function gambarKecil6() { return $this->belongsTo(Galeri::class, 'gambar_kecil_6_id'); }
    public function gambarKecil7() { return $this->belongsTo(Galeri::class, 'gambar_kecil_7_id'); }
    public function gambarKecil8() { return $this->belongsTo(Galeri::class, 'gambar_kecil_8_id'); }
    public function gambarKecil9() { return $this->belongsTo(Galeri::class, 'gambar_kecil_9_id'); }
    public function gambarKecil10() { return $this->belongsTo(Galeri::class, 'gambar_kecil_10_id'); }
}
