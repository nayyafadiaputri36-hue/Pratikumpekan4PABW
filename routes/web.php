
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;

Route::get('/', [LaporBanjirController::class, 'home'])
    ->name('home');

Route::get('/lapor', [LaporBanjirController::class, 'create'])
    ->name('lapor');

Route::post('/lapor', [LaporBanjirController::class, 'store'])
    ->name('lapor.store');

Route::get('/laporan', [LaporBanjirController::class, 'index'])
    ->name('laporan.index');

Route::get('/konfirmasi', [LaporBanjirController::class, 'konfirmasi'])
    ->name('konfirmasi');
