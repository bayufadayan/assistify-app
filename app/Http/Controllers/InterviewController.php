<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\PenilaianPendaftar;

class InterviewController extends Controller
{
    public function index()
    {
        $pendaftars = Pendaftar::all();
        return view('interview.index', compact('pendaftars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|string',
            'pemecahan_masalah' => 'required|integer|between:10,100',
            'komunikasi' => 'required|integer|between:10,100',
            'gestur' => 'required|integer|between:10,100',
            'kepemimpinan' => 'required|integer|between:10,100',
            'pengetahuan' => 'required|integer|between:10,100',
            'waktu_merespon' => 'required|integer|between:10,100',
        ]);

        $pendaftar = Pendaftar::where('NPM', $request->npm)->first();
        $potensi = $this->getPotensiValue($pendaftar->Label_Cluster);

        PenilaianPendaftar::updateOrCreate(
            ['NPM' => $request->npm],
            [
                'pemecahan_masalah' => $request->pemecahan_masalah,
                'komunikasi' => $request->komunikasi,
                'gestur' => $request->gestur,
                'kepemimpinan' => $request->kepemimpinan,
                'pengetahuan' => $request->pengetahuan,
                'waktu_merespon' => $request->waktu_merespon,
                'potensi' => $potensi
            ]
        );

        return back()->with('success', 'Nilai interview berhasil disimpan.');
    }

    private function getPotensiValue($labelCluster)
    {
        $mapping = [
            'Potensi Tinggi' => 4,
            'Potensi Sedang' => 3,
            'Potensi Rendah' => 2,
            'Tidak ada potensi' => 1,
        ];

        return $mapping[$labelCluster] ?? 0;
    }

    public function substance()
    {
        $pendaftars = Pendaftar::all();
        return view('substance.index', compact('pendaftars'));
    }

    public function storeSubstance(Request $request)
    {
        $request->validate([
            'npm' => 'required|string',
            'keterampilan_analitis' => 'required|integer|between:10,100',
            'pemahaman_konsep' => 'required|integer|between:10,100',
            'ketepatan' => 'required|integer|between:10,100',
            'waktu_penyelesaian' => 'required|integer|between:10,100',
        ]);

        $pendaftar = Pendaftar::where('NPM', $request->npm)->first();
        $potensi = $this->getPotensiValue($pendaftar->Label_Cluster);

        PenilaianPendaftar::updateOrCreate(
            ['NPM' => $request->npm],
            [
                'keterampilan_analitis' => $request->keterampilan_analitis,
                'pemahaman_konsep' => $request->pemahaman_konsep,
                'ketepatan' => $request->ketepatan,
                'waktu_penyelesaian' => $request->waktu_penyelesaian,
                'potensi' => $potensi
            ]
        );

        return back()->with('success', 'Nilai substance test berhasil disimpan.');
    }

    public function microTeaching()
    {
        $pendaftars = Pendaftar::all();
        return view('micro_teaching.index', compact('pendaftars'));
    }

    public function storeMicroTeaching(Request $request)
    {
        $request->validate([
            'npm' => 'required|string',
            'penyampaian_materi' => 'required|integer|between:10,100',
            'interaksi_dengan_peserta' => 'required|integer|between:10,100',
            'pengelolaan_waktu' => 'required|integer|between:10,100',
            'persiapan' => 'required|integer|between:10,100',
            'durasi_pengajaran' => 'required|integer|between:10,100',
        ]);

        $pendaftar = Pendaftar::where('NPM', $request->npm)->first();
        $potensi = $this->getPotensiValue($pendaftar->Label_Cluster);

        PenilaianPendaftar::updateOrCreate(
            ['NPM' => $request->npm],
            [
                'penyampaian_materi' => $request->penyampaian_materi,
                'interaksi_dengan_peserta' => $request->interaksi_dengan_peserta,
                'pengelolaan_waktu' => $request->pengelolaan_waktu,
                'persiapan' => $request->persiapan,
                'durasi_pengajaran' => $request->durasi_pengajaran,
                'potensi' => $potensi
            ]
        );

        return back()->with('success', 'Nilai micro teaching berhasil disimpan.');
    }

    public function finalInterview()
    {
        $pendaftars = Pendaftar::all();
        return view('final_interview.index', compact('pendaftars'));
    }

    public function storeFinalInterview(Request $request)
    {
        $request->validate([
            'npm' => 'required|string',
            'komitmen_jangka_panjang' => 'required|integer|between:10,100',
            'visi_pribadi' => 'required|integer|between:10,100',
            'kematangan_emosional' => 'required|integer|between:10,100',
            'etika_kerja' => 'required|integer|between:10,100',
            'kesesuaian_budaya' => 'required|integer|between:10,100',
            'keletihan_fisik' => 'required|integer|between:10,100',
        ]);

        $pendaftar = Pendaftar::where('NPM', $request->npm)->first();
        $potensi = $this->getPotensiValue($pendaftar->Label_Cluster);

        PenilaianPendaftar::updateOrCreate(
            ['NPM' => $request->npm],
            [
                'komitmen_jangka_panjang' => $request->komitmen_jangka_panjang,
                'visi_pribadi' => $request->visi_pribadi,
                'kematangan_emosional' => $request->kematangan_emosional,
                'etika_kerja' => $request->etika_kerja,
                'kesesuaian_budaya' => $request->kesesuaian_budaya,
                'keletihan_fisik' => $request->keletihan_fisik,
                'potensi' => $potensi
            ]
        );

        return back()->with('success', 'Nilai final interview berhasil disimpan.');
    }
}
