<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KunjunganController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman kunjungan + submit form di satu halaman
Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan');
Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');
Route::get('/kunjungan/form', function () {
    return view('form'); // file resources/views/form.blade.php
})->name('kunjungan.create');
