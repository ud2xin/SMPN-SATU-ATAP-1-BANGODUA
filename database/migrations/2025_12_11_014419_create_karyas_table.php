<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karyas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('gambar_1_id')->constrained('galeri');
            $table->foreignId('gambar_2_id')->constrained('galeri');
            $table->foreignId('gambar_3_id')->constrained('galeri');
            $table->foreignId('gambar_4_id')->constrained('galeri');
            $table->enum('cover', ['gambar_1','gambar_2','gambar_3','gambar_4']);
            $table->string('foto_pemilik')->nullable();
            $table->string('judul');
            $table->string('nama');
            $table->string('jabatan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyas');
    }
};
