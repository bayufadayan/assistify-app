<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteria = [
            ['criteria_group' => 'Interview', 'sub_criteria' => 'Pemecahan Masalah', 'type' => 'benefit', 'weight' => 0.069210],
            ['criteria_group' => 'Interview', 'sub_criteria' => 'Komunikasi', 'type' => 'benefit', 'weight' => 0.058260],
            ['criteria_group' => 'Interview', 'sub_criteria' => 'Gestur', 'type' => 'benefit', 'weight' => 0.023384],
            ['criteria_group' => 'Interview', 'sub_criteria' => 'Kepemimpinan', 'type' => 'benefit', 'weight' => 0.045962],
            ['criteria_group' => 'Interview', 'sub_criteria' => 'Pengetahuan', 'type' => 'benefit', 'weight' => 0.070388],
            ['criteria_group' => 'Interview', 'sub_criteria' => 'Waktu Merespon', 'type' => 'cost', 'weight' => 0.007039],
            ['criteria_group' => 'Substance Test', 'sub_criteria' => 'Keterampilan Analitis', 'type' => 'benefit', 'weight' => 0.070388],
            ['criteria_group' => 'Substance Test', 'sub_criteria' => 'Pemahaman Konsep', 'type' => 'benefit', 'weight' => 0.070388],
            ['criteria_group' => 'Substance Test', 'sub_criteria' => 'Ketepatan', 'type' => 'benefit', 'weight' => 0.010931],
            ['criteria_group' => 'Substance Test', 'sub_criteria' => 'Waktu Penyelesaian', 'type' => 'cost', 'weight' => 0.007039],
            ['criteria_group' => 'Micro Teaching', 'sub_criteria' => 'Penyampaian Materi', 'type' => 'benefit', 'weight' => 0.070388],
            ['criteria_group' => 'Micro Teaching', 'sub_criteria' => 'Interaksi dengan Peserta', 'type' => 'benefit', 'weight' => 0.057827],
            ['criteria_group' => 'Micro Teaching', 'sub_criteria' => 'Pengelolaan Waktu', 'type' => 'benefit', 'weight' => 0.070388],
            ['criteria_group' => 'Micro Teaching', 'sub_criteria' => 'Persiapan', 'type' => 'benefit', 'weight' => 0.070388],
            ['criteria_group' => 'Micro Teaching', 'sub_criteria' => 'Durasi Pengajaran', 'type' => 'cost', 'weight' => 0.007039],
            ['criteria_group' => 'Final Interview', 'sub_criteria' => 'Komitmen Jangka Panjang', 'type' => 'benefit', 'weight' => 0.070388],
            ['criteria_group' => 'Final Interview', 'sub_criteria' => 'Visi Pribadi', 'type' => 'benefit', 'weight' => 0.070388],
            ['criteria_group' => 'Final Interview', 'sub_criteria' => 'Kematangan Emosional', 'type' => 'benefit', 'weight' => 0.065765],
            ['criteria_group' => 'Final Interview', 'sub_criteria' => 'Etika Kerja', 'type' => 'benefit', 'weight' => 0.070388],
            ['criteria_group' => 'Final Interview', 'sub_criteria' => 'Kesesuaian Budaya', 'type' => 'benefit', 'weight' => 0.070361],
            ['criteria_group' => 'Final Interview', 'sub_criteria' => 'Keletihan Fisik', 'type' => 'cost', 'weight' => 0.007039],
            ['criteria_group' => 'Cluster', 'sub_criteria' => 'Potensi', 'type' => 'benefit', 'weight' => 0.007039],
        ];

        foreach ($criteria as $criterion) {
            Criteria::create($criterion);
        }
    }
}
