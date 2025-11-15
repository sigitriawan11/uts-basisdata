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
        Schema::create('obats', function (Blueprint $t) {
            $t->id();
            $t->string('kode_obat', 30)->unique();
            $t->string('nama_obat');
            $t->string('kategori');
            $t->string('bentuk')->nullable();
            $t->string('satuan_dosis')->nullable();
            $t->string('aturan_default')->nullable();

            $t->integer('stok')->default(0);
            $t->integer('stok_minimum')->default(0);
            $t->date('kadaluarsa')->nullable();

            $t->decimal('harga_modal', 12, 2)->nullable();
            $t->decimal('harga_jual', 12, 2)->nullable();

            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
