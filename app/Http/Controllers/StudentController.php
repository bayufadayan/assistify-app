<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Student;

class StudentController extends Controller
{
    public function showUploadForm()
    {
        return view('admin.upload');
    }

    public function uploadFile(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');

        if (!$file) {
            return back()->withErrors(['file' => 'Please upload a valid file.']);
        }

        // Kirim file ke Flask untuk diproses
        $filePath = $file->getPathname();
        $fileName = $file->getClientOriginalName();

        $baseUrl = env('FLASK_API_URL');
        $url = $baseUrl . '/process';

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

            // Simpan data yang diproses ke database
            foreach ($data as $studentData) {
                // Pastikan $studentData adalah array atau object sebelum diproses
                if (is_array($studentData) || is_object($studentData)) {
                    // Simpan data mahasiswa
                    Student::updateOrCreate(
                        ['NPM' => $studentData['NPM']],
                        [
                            'Nama_Mahasiswa' => $studentData['Nama Mahasiswa'], // Sesuaikan kunci
                            'Algoritma' => $studentData['Algoritma'],
                            'Statistika' => $studentData['Statistika'],
                            'Nilai_Project' => $studentData['Nilai Project'],
                            'Motivasi' => $studentData['Motivasi'],
                            'Kedisiplinan_Akademik' => $studentData['Kedisiplinan Akademik'],
                            'Keaktifan' => $studentData['Keaktifan'],
                            'Peminatan' => $studentData['Peminatan'],
                            'Cluster' => $studentData['Cluster'],
                            'Label_Cluster' => $studentData['Label Cluster'] // Tambahkan Label_Cluster
                        ]
                    );
                }
            }

            return redirect()->route('admin.results')->with('success', 'File processed and data saved successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['file' => 'Failed to process file: ' . $e->getMessage()]);
        }
    }

    public function deleteAll()
    {
        Student::truncate();
        return redirect()->route('admin.dashboard')->with('success', 'All student data deleted successfully.');
    }

    public function showResults()
    {
        $results = Student::all();
        return view('admin.results', compact('results'));
    }
}
