<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InternshipApplicationController;
use App\Http\Controllers\AdminApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// USER ROUTES (FR2, FR3, FR4)
Route::middleware('auth')->group(function () {
    Route::get('/applications', [InternshipApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/create', [InternshipApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications', [InternshipApplicationController::class, 'store'])->name('applications.store');
    
    Route::get('/applications/{application}/edit', [InternshipApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('/applications/{application}', [InternshipApplicationController::class, 'update'])->name('applications.update');
    Route::delete('/applications/{application}', [InternshipApplicationController::class, 'destroy'])->name('applications.destroy');
});

// ADMIN ROUTES (FR5)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/applications', [AdminApplicationController::class, 'index'])->name('admin.applications');
    
    // THIS IS THE NEW HISTORY ROUTE
    Route::get('/applications/history', [AdminApplicationController::class, 'history'])->name('admin.history');
    
    Route::patch('/applications/{application}/approve', [AdminApplicationController::class, 'approve'])->name('admin.approve');
    Route::patch('/applications/{application}/reject', [AdminApplicationController::class, 'reject'])->name('admin.reject');
});

require __DIR__.'/auth.php';