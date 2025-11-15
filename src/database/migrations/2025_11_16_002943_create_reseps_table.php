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
        Schema::create('reseps', function (Blueprint $t) {
            $t->id();
            $t->foreignId('kunjungan_id')->constrained();
            $t->foreignId('obat_id')->constrained();

            $t->integer('jumlah')->default(1);
            $t->string('dosis')->nullable();
            $t->string('frekuensi')->nullable();
            $t->string('durasi')->nullable();
            $t->string('cara_pakai')->nullable();
            $t->string('catatan')->nullable();

            $t->decimal('harga_satuan', 12, 2)->nullable();
            $t->decimal('subtotal', 12, 2)->nullable();

            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
