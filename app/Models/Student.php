<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'NPM', 'Nama_Mahasiswa', 'Algoritma', 'Statistika', 'Nilai_Project', 'Motivasi', 'Kedisiplinan_Akademik', 'Keaktifan', 'Peminatan', 'Cluster', 'Label_Cluster'
    ];
}
