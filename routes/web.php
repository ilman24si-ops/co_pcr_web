<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KunjunganController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function () {
    return view('index');
});

Route::get('/home', [HomeController::class,'index']);


Route::get('/kunjungan', [KunjunganController::class, 'create'])->name('kunjungan.form');
Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');
