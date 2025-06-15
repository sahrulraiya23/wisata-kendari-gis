<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pariwisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('jenis_id');
            $table->unsignedBigInteger('kecamatan_id');
            $table->string('alamat');
            $table->text('deskripsi');
            $table->decimal('latitude', 10, 6);
            $table->decimal('longitude', 10, 6);
            $table->float('rating')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();

            $table->foreign('jenis_id')->references('id')->on('jenis_wisata');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pariwisata');
    }
};
