<?php

use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdController::class, 'index'])->name('ads.index');
Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
Route::post('/ads', [AdController::class, 'store'])->name('ads.store');
Route::get('/ads/{id}/edit', [AdController::class, 'edit'])->name('ads.edit');
Route::put('/ads/{id}', [AdController::class, 'update'])->name('ads.update');
Route::delete('/ads/{id}', [AdController::class, 'destroy'])->name('ads.destroy');
