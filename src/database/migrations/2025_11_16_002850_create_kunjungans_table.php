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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained();
            $table->foreignId('dokter_id')->constrained();
            $table->foreignId('poliklinik_id')->constrained();

            $table->string('no_antrian')->nullable();
            $table->dateTime('waktu_kedatangan')->nullable();
            $table->dateTime('waktu_dilayani')->nullable();
            $table->dateTime('waktu_selesai')->nullable();

            $table->text('keluhan')->nullable();
            $table->text('diagnosa_awal')->nullable();
            $table->text('diagnosa_akhir')->nullable();
            $table->json('pemeriksaan_fisik')->nullable();
            $table->json('vital_sign')->nullable();
            $table->json('tindakan')->nullable();
            $table->enum('jenis_pembiayaan', ['umum', 'bpjs', 'asuransi', 'lainnya'])->default('umum');
            $table->decimal('biaya_kunjungan', 12, 2)->default(0);

            $table->enum('status', ['menunggu', 'dilayani', 'selesai', 'batal'])->default('menunggu');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
