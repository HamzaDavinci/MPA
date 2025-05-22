<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/domains', fn() => view('placeholder', ['title' => 'Domains']));
Route::get('/web-hosting', fn() => view('placeholder', ['title' => 'Web Hosting']));
Route::get('/game-servers', fn() => view('placeholder', ['title' => 'Game Servers']));
Route::get('/vps', fn() => view('placeholder', ['title' => 'VPS']));
Route::get('/dedicated-servers', fn() => view('placeholder', ['title' => 'Dedicated Servers']));
Route::get('/more', fn() => view('placeholder', ['title' => 'More']));

Route::get('/login', fn() => 'Login pagina komt hier');
