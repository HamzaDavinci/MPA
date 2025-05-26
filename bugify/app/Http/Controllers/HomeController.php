<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class HomeController extends Controller
{
    public function index()
    {

        $topGenres = Genre::whereIn('id', [1, 2, 3, 4])->get();

        return view('home', compact('topGenres'));
    }
}


// <?php

// namespace App\Http\Controllers;

// use App\Models\Genre;

// class HomeController extends Controller
// {
//     public function index()
//     {
//         $topGenres = Genre::whereIn('name', [
//             'Broken Beats',
//             '404 Hits',
//             'Laggy Loops',
//             'Corrupt Classics'
//         ])->get();

//         return view('home', compact('topGenres'));
//     }
// }
