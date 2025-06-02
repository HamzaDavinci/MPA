<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
class DashboardController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('id', 'asc')->get();
        return view('dashboard', compact('genres'));
    }
}

