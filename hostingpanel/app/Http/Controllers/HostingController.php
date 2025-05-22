<?php

namespace App\Http\Controllers;

use App\Models\HostingType; // model maken we zo
use Illuminate\Http\Request;

class HostingController extends Controller
{
    public function index()
    {
        $types = HostingType::all();
        return view('hosting.index', compact('types'));
    }
}
