<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('medicines', MedicineController::class);
});

// User routes (medicines view only)
Route::middleware(['auth'])->group(function () {
    Route::get('medicines', [MedicineController::class, 'index'])->name('medicines.index');
    Route::get('medicines/{medicine}', [MedicineController::class, 'show'])->name('medicines.show');
});

require __DIR__.'/auth.php';