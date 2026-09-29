<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;

// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Menampilkan form laporan
Route::get('/lapor', [LaporBanjirController::class, 'create'])
    ->name('lapor');

// Memproses laporan
Route::post('/lapor', [LaporBanjirController::class, 'store'])
    ->name('lapor.store');