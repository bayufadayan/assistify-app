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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('NPM');
            $table->string('Nama_Mahasiswa');
            $table->string('Algoritma');
            $table->string('Statistika');
            $table->integer('Nilai_Project');
            $table->integer('Motivasi');
            $table->decimal('Kedisiplinan_Akademik', 5, 2);
            $table->decimal('Keaktifan', 5, 2);
            $table->integer('Potensi')->nullable();
            $table->string('Label_Cluster')->nullable(); // Tambahkan kolom ini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
