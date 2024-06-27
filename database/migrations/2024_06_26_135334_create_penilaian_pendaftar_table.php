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
        Schema::create('penilaian_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->string('NPM');
            $table->integer('pemecahan_masalah')->default(0);
            $table->integer('komunikasi')->default(0);
            $table->integer('gestur')->default(0);
            $table->integer('kepemimpinan')->default(0);
            $table->integer('pengetahuan')->default(0);
            $table->integer('waktu_merespon')->default(100);
            $table->integer('keterampilan_analitis')->default(0);
            $table->integer('pemahaman_konsep')->default(0);
            $table->integer('ketepatan')->default(0);
            $table->integer('waktu_penyelesaian')->default(100);
            $table->integer('penyampaian_materi')->default(0);
            $table->integer('interaksi_dengan_peserta')->default(0);
            $table->integer('pengelolaan_waktu')->default(0);
            $table->integer('persiapan')->default(0);
            $table->integer('durasi_pengajaran')->default(100);
            $table->integer('komitmen_jangka_panjang')->default(0);
            $table->integer('visi_pribadi')->default(0);
            $table->integer('kematangan_emosional')->default(0);
            $table->integer('etika_kerja')->default(0);
            $table->integer('kesesuaian_budaya')->default(0);
            $table->integer('keletihan_fisik')->default(100);
            $table->integer('potensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_pendaftar');
    }
};

