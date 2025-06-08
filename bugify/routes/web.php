<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlaylistController;

// Homepage route
Route::get('/', [HomeController::class, 'index']);

// Andere pagina's
Route::get('/browse', [BrowseController::class, 'index'])->name('browse.index');

// Let op: deze moet BUITEN auth middleware zodat een net ingelogde user dit kan aanroepen
Route::post('/import-guest-playlist', [PlaylistController::class, 'importGuestPlaylist'])->name('playlists.importGuest');


Route::middleware('auth')->group(function () {
    Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
    Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
    Route::patch('/playlists/{playlist}', [PlaylistController::class, 'update'])->name('playlists.update');
    Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');
    Route::get('/music/all', [PlaylistController::class, 'getAllMusic']);
});


Route::get('login', function () {
    return view('login');
});

// Auth routes met middleware
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Laad auth routes uit auth.php (register, login, logout, etc)
require __DIR__.'/auth.php';
