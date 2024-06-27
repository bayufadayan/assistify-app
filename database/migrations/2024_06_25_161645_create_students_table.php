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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('NPM');
            $table->string('Nama_Mahasiswa');
            $table->string('Algoritma');
            $table->string('Statistika');
            $table->integer('Nilai_Project');
            $table->integer('Motivasi');
            $table->decimal('Kedisiplinan_Akademik', 5, 2);
            $table->decimal('Keaktifan', 5, 2);
            $table->string('Peminatan');
            $table->integer('Cluster');
            $table->string('Label_Cluster');  // Tambahkan kolom ini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
