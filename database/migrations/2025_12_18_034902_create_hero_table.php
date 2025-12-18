<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('heros', function (Blueprint $table) {
            $table->id();

            $table->foreignId('gambar_besar_id')
                ->nullable()
                ->constrained('galeri')
                ->nullOnDelete();

            for ($i = 1; $i <= 10; $i++) {
                $table->foreignId("gambar_kecil_{$i}_id")
                    ->nullable()
                    ->constrained('galeri')
                    ->nullOnDelete();
            }

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('heros');
    }
};
