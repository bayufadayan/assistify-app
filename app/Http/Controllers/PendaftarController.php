<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Student;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class PendaftarController extends Controller
{
    public function showUploadForm()
    {
        return view('user.upload_pendaftar');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');
        $baseUrl = env('FLASK_API_URL');
        $url = $baseUrl . '/process_daftar';

        if (!$file) {
            return back()->withErrors(['file' => 'Please upload a valid file.']);
        }

        $filePath = $file->getPathname();
        $fileName = $file->getClientOriginalName();

        try {
            $response = Http::attach(
                'file',
                file_get_contents($filePath),
                $fileName
            )->post($url);

            if ($response->failed()) {
                throw new \Exception('Failed to process file: ' . $response->body());
            }

            $data = $response->json();

            if (!is_array($data)) {
                return back()->withErrors(['file' => 'Failed to process file: Invalid response from server.']);
            }

            DB::transaction(function () use ($data) {
                foreach ($data as $pendaftarData) {
                    Pendaftar::updateOrCreate(
                        ['NPM' => $pendaftarData['NPM']],
                        [
                            'Nama_Mahasiswa' => $pendaftarData['Nama Mahasiswa'],
                            'Algoritma' => $pendaftarData['Algoritma'],
                            'Statistika' => $pendaftarData['Statistika'],
                            'Nilai_Project' => $pendaftarData['Nilai Project'],
                            'Motivasi' => $pendaftarData['Motivasi'],
                            'Kedisiplinan_Akademik' => $pendaftarData['Kedisiplinan Akademik'],
                            'Keaktifan' => $pendaftarData['Keaktifan'],
                            'Potensi' => $pendaftarData['Potensi'],
                            'Label_Cluster' => $pendaftarData['Label Cluster']
                        ]
                    );
                }
            });

            return redirect()->route('pendaftar.showResults')->with('success', 'File processed and data saved successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['file' => 'Failed to process file: ' . $e->getMessage()]);
        }
    }


    public function deleteAll()
    {
        Pendaftar::truncate();
        return redirect()->route('pendaftar.uploadForm')->with('success', 'All pendaftar data deleted successfully.');
    }

    public function showResults()
    {
        $results = Pendaftar::all();
        return view('user.results', compact('results'));
    }
}
