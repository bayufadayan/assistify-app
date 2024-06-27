<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'NPM', 'Nama_Mahasiswa', 'Algoritma', 'Statistika', 'Nilai_Project', 'Motivasi', 'Kedisiplinan_Akademik', 'Keaktifan', 'Potensi', 'Label_Cluster'
    ];
}
