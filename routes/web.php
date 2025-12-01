<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/pegawai', [PegawaiController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
})->name('mahasiswa.show');

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: ' . $param1;
});

Route::get('/home', [HomeController::class, 'index']); {
}

Route::get('/about', function () {
    return view('halaman-about');
});

// tambahkan di atas resource
Route::post(
    '/pelanggan/{id}/upload-files',
    [PelangganController::class, 'uploadFiles']
)->name('pelanggan.uploadFiles');

Route::delete(
    '/pelanggan/delete-file/{id}',
    [PelangganController::class, 'deleteFile']
)->name('pelanggan.deleteFile');

// Resource harus di bawahnya
Route::resource('pelanggan', PelangganController::class);

//Route::resource('pelanggan', PelangganController::class);

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('dash', [DashboardController::class, 'index'])->name('dashboard')->middleware('checkislogin');

Route::group(['middleware' => ['checkrole:admin']], function(){
Route::resource('users', UserController::class);
});

Route::get('/auth', [AuthController::class, 'index'])->name('auth');

Route::post('/auth/store', [AuthController::class, 'login'])->name('auth.login');

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
