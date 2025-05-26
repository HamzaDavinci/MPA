<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrowseController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/browse', [BrowseController::class, 'index'])->name('browse.index');

Route::get('playlists', function () {
    return view('playlists');
});

Route::get('login', function () {
    return view('login');
});