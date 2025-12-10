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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('galeri_id')->nullable()->constrained('galeri')->nullOnDelete();
            $table->enum('kategori', ['siswa', 'guru']);
            $table->string('foto')->nullable();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('keterangan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('judul')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyas');
    }
};
