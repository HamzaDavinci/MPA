<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

// Homepage route
Route::get('/', [HomeController::class, 'index']);

// Andere pagina's
Route::get('/browse', [BrowseController::class, 'index'])->name('browse.index');

Route::get('playlists', function () {
    return view('playlists');
});

Route::get('login', function () {
    return view('login');
});

// Auth routes met middleware
Route::middleware(['auth', 'verified'])->group(function () {

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Laad auth routes uit auth.php (register, login, logout, etc)
require __DIR__.'/auth.php';
