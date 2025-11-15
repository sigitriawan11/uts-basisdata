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
        Schema::create('polikliniks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rumah_sakit_id')->constrained();
            $table->string('kode_poli', 20)->unique();
            $table->string('nama_poli');
            $table->string('kategori')->nullable();
            $table->integer('kapasitas_per_hari')->default(0);
            $table->boolean('butuh_ruang_tindakan')->default(false);
            $table->json('fasilitas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polikliniks');
    }
};
