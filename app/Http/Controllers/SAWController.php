<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenilaianPendaftar;
use App\Models\Criteria;

class SAWController extends Controller
{
    public function index()
    {
        // Ambil data penilaian pendaftar dari database
        $penilaians = PenilaianPendaftar::all();

        // Ambil data kriteria dari database
        $criterias = Criteria::all()->keyBy('sub_criteria');

        // Mendapatkan bobot kriteria dari database
        $criteria_weights = [
            'Interview' => 0.27424315838208135,
            'Substance Test' => 0.15874651567076942,
            'Micro Teaching' => 0.2056420484329052,
            'Final Interview' => 0.3543294519800854,
            'Cluster' => 0.007038825534158614,
        ];

        // Menyesuaikan bobot sub-kriteria dengan bobot kriteria
        $adjusted_weights = [];
        foreach ($criterias as $criteria) {
            $adjusted_weight = $criteria->weight * $criteria_weights[$criteria->criteria_group];
            $adjusted_weights[$criteria->sub_criteria] = [
                'weight' => $adjusted_weight,
                'type' => $criteria->type,
                'name' => strtolower(str_replace(' ', '_', $criteria->sub_criteria))
            ];
        }

        // Menghitung normalisasi dan skor SAW
        foreach ($penilaians as $penilaian) {
            $normalized_values = [];
            foreach ($adjusted_weights as $sub_criteria => $details) {
                $column_name = $details['name'];
                $value = $penilaian->$column_name;
                $max_value = PenilaianPendaftar::max($column_name);
                $min_value = PenilaianPendaftar::min($column_name);

                // Normalisasi nilai berdasarkan tipe benefit atau cost
                if ($details['type'] == 'benefit') {
                    $normalized_value = $value / $max_value;
                } else {
                    $normalized_value = $min_value / $value;
                }

                // Mengalikan nilai yang dinormalisasi dengan bobot yang disesuaikan
                $weighted_value = $normalized_value * $details['weight'];
                $normalized_values[$sub_criteria] = $weighted_value;
            }

            // Menghitung total skor SAW
            $penilaian->SAW_Score = array_sum($normalized_values);
        }

        // Mengurutkan penilaian berdasarkan skor SAW secara descending
        $penilaians = $penilaians->sortByDesc('SAW_Score');

        // Menambahkan ranking berdasarkan skor SAW
        $rank = 1;
        foreach ($penilaians as $penilaian) {
            $penilaian->Rank = $rank++;
        }

        return view('saw.index', compact('penilaians', 'criterias'));
    }
}
