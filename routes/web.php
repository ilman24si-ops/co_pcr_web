<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\KontakController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan');
Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');
Route::get('/kontak', function () {
    return view('kontak', ['nama' => 'Politeknik Caltex Riau']);
})->name('kontak');
Route::post('/kontak', [KontakController::class, 'send'])->name('kontak.send');