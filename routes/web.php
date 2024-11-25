<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller1;
use App\Http\Controllers\PenguranganTabunganController;



Route::get('/', [controller1::class, 'index'])->name('tabungan.index');
Route::get('/mytabungan/create', [controller1::class, 'create'])->name('tabungan.create');
Route::post('/mytabungan', [controller1::class, 'store'])->name('tabungan.store');
Route::get('/mytabungan{id}/edit', [controller1::class, 'edit'])->name('tabungan.edit');
Route::put('/mytabungan{id}', [controller1::class, 'update'])->name('tabungan.update');
Route::delete('/mytabungan{id}', [controller1::class, 'destroy'])->name('tabungan.destroy');

Route::post('/pengurangan', [PenguranganTabunganController::class, 'store'])->name('pengurangan.store');
Route::get('/pengurangan/create', [PenguranganTabunganController::class, 'create'])->name('pengurangan.create');
Route::get('/pengurangan', [PenguranganTabunganController::class, 'index'])->name('pengurangan.index');
