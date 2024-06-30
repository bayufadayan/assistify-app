<?php
// app/Models/Pendaftar.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'NPM', 'Nama_Mahasiswa', 'Algoritma', 'Statistika', 'Nilai_Project', 'Motivasi', 'Kedisiplinan_Akademik', 'Keaktifan', 'Potensi', 'Label_Cluster'
    ];

    public function getPotensiAttribute($value)
    {
        $mapping = [
            'Potensi Tinggi' => 50,
            'Potensi Sedang' => 40,
            'Potensi Rendah' => 30,
            'Tidak ada potensi' => 10,
        ];

        return $mapping[$this->attributes['Label_Cluster']] ?? 0;
    }
}
