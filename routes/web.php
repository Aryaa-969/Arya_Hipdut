<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PelangganController;

Route::get('/pegawai', [PegawaiController::class, 'index']);{
}


Route::get('/', function () {
    return view ('welcome');
})->name('mahasiswa.show');

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/home', [HomeController::class,'index']); {
};

Route::get('/about', function () {
    return view('halaman-about');
});

Route::resource('pelanggan', PelangganController::class);

Route::post('question/store', [QuestionController::class, 'store'])
        ->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
