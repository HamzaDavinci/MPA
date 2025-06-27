<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\GuestPlaylistController;

// Homepage route
Route::get('/', [HomeController::class, 'index']);

// Andere pagina's
Route::get('/browse', [BrowseController::class, 'index'])->name('browse.index');

Route::middleware('auth')->group(function () {
    Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
    Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
    Route::patch('/playlists/{playlist}', [PlaylistController::class, 'update'])->name('playlists.update');
    Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');
    Route::get('/music/all', [PlaylistController::class, 'getAllMusic']);
});

// Guest playlist routes (no auth middleware)
Route::get('/guestplaylists', [GuestPlaylistController::class, 'index'])->name('guest.playlists.index');
Route::post('/guestplaylists', [GuestPlaylistController::class, 'store'])->name('guest.playlists.store');
Route::patch('/guestplaylists', [GuestPlaylistController::class, 'update'])->name('guest.playlists.update');
Route::delete('/guestplaylists', [GuestPlaylistController::class, 'destroy'])->name('guest.playlists.destroy');
Route::get('/music/{id}', [MusicController::class, 'detailpage'])->name('music.detailpage');

Route::post('/playlists/import-guest', [PlaylistController::class, 'importGuest'])->name('playlists.importGuest');
Route::post('/playlists/discard-guest', [PlaylistController::class, 'discardGuest'])->name('playlists.discardGuest');





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
