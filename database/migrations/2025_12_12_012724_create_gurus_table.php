<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->integer('urut')->nullable()->comment('Urutan tampil (integer)');
            $table->string('nama');
            $table->string('jabatan')->nullable()->comment('Mapel / Jabatan');
            $table->string('foto')->nullable(); // path di storage/app/public/gurus/...
            $table->string('notelp')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
