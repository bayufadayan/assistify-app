<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianPendaftar extends Model
{
    use HasFactory;

    protected $table = 'penilaian_pendaftar';

    protected $fillable = [
        'NPM', 'pemecahan_masalah', 'komunikasi', 'gestur', 'kepemimpinan', 'pengetahuan', 'waktu_merespon',
        'keterampilan_analitis', 'pemahaman_konsep', 'ketepatan', 'waktu_penyelesaian',
        'penyampaian_materi', 'interaksi_dengan_peserta', 'pengelolaan_waktu', 'persiapan', 'durasi_pengajaran',
        'komitmen_jangka_panjang', 'visi_pribadi', 'kematangan_emosional', 'etika_kerja', 'kesesuaian_budaya', 'keletihan_fisik',
        'potensi'
    ];
}
