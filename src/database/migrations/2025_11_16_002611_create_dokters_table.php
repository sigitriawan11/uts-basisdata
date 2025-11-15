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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('kode_dokter', 20)->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('spesialisasi');
            $table->string('sub_spesialis')->nullable();
            $table->string('sip')->nullable();
            $table->string('str')->nullable();

            $table->string('pendidikan_terakhir')->nullable();
            $table->json('sertifikasi')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();

            $table->foreignId('poliklinik_id')->constrained();
            $table->boolean('status_aktif')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
