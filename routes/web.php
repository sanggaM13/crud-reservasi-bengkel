<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservasiController;

// Dashboard - HARUS di atas resource routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// CRUD Routes - HAPUS duplikat
Route::resource('pelanggan', PelangganController::class);
Route::resource('mekanik', MekanikController::class);
Route::resource('reservasi', ReservasiController::class);

// Fallback route
Route::fallback(function () {
    return redirect()->route('dashboard');
});