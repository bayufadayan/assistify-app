<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PendaftarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/admin/dashboard', function () {
        if (!auth()->user()->is_admin) {
            return redirect()->route('user.dashboard');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Tambahkan rute untuk unggah file dan melihat hasil
    Route::get('/admin/upload', [StudentController::class, 'showUploadForm'])->name('admin.upload');
    Route::post('/admin/upload', [StudentController::class, 'uploadFile'])->name('admin.uploadFile');
    Route::delete('/admin/delete-all', [StudentController::class, 'deleteAll'])->name('admin.deleteAll');
    Route::get('/admin/results', [StudentController::class, 'showResults'])->name('admin.results');

    Route::get('/interview', [InterviewController::class, 'index'])->name('interview.index');
    Route::post('/interview', [InterviewController::class, 'store'])->name('interview.store');

    Route::get('/substance', [InterviewController::class, 'substance'])->name('substance.index');
    Route::post('/substance', [InterviewController::class, 'storeSubstance'])->name('substance.store');

    Route::get('/micro-teaching', [InterviewController::class, 'microTeaching'])->name('micro_teaching.index');
    Route::post('/micro-teaching', [InterviewController::class, 'storeMicroTeaching'])->name('micro_teaching.store');

    Route::get('/final-interview', [InterviewController::class, 'finalInterview'])->name('final_interview.index');
    Route::post('/final-interview', [InterviewController::class, 'storeFinalInterview'])->name('final_interview.store');

    Route::get('/user/upload-pendaftar', [PendaftarController::class, 'showUploadForm'])->name('pendaftar.uploadForm');
    Route::post('/user/upload-pendaftar', [PendaftarController::class, 'uploadFile'])->name('pendaftar.uploadFile');
    Route::get('/user/results-pendaftar', [PendaftarController::class, 'showResults'])->name('pendaftar.showResults');
    Route::delete('/user/delete-all-pendaftar', [PendaftarController::class, 'deleteAll'])->name('pendaftar.deleteAll');
});
