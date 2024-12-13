<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Movie;

class APIController extends Controller
{
    public function goToMovies() {
        $movies = Movie::all();
        // dd($movies);
        return response()->json($movies, 200);
    }
}
