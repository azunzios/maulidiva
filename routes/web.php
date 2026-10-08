<?php

use App\Http\Controllers\PublikasiController;

Route::get('/publikasi', [PublikasiController::class, 'index'])->name('publikasi.index');
Route::get('/publikasi/form', [PublikasiController::class, 'form'])->name('publikasi.form');
Route::post('/publikasi', [PublikasiController::class, 'store'])->name('publikasi.store');
Route::delete('/publikasi/{publikasi}', [PublikasiController::class, 'destroy'])->name('publikasi.destroy');
Route::get('/publikasi/{publikasi}/edit', [PublikasiController::class, 'edit'])->name('publikasi.edit');
Route::put('/publikasi/{publikasi}', [PublikasiController::class, 'update'])->name('publikasi.update');

return view('publikasi.index');