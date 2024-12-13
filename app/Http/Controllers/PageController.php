<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \App\Models\Actor;
use \App\Models\Movie;
use Carbon\Carbon;


class PageController extends Controller
{

    public function testingRequests(Request $request) {

        ;
        // $jsonData = $request->query('Stripe\Product_JSON');
        // $productData = json_decode($jsonData, true);

        dd($request->all());
        
    }

    public function goToMovies() {
        $movies = Movie::where('type', '=', '1')->orderBy('ratings', 'DESC')->get();
        return view('apps.movies')->with([
            'movies' => $movies,
        ]);
        
    }

    public function goToAnimes() {
        $movies = Movie::where('type', '=', '3')->orderBy('ratings', 'DESC')->get();
        return view('apps.animes')->with([
            'movies' => $movies,
        ]);
        // dd($movies);
    }

    public function goToSeries() {
        $movies = Movie::where('type', '=', '2')->orderBy('ratings', 'DESC')->get();
        return view('apps.popular')->with([
            'movies' => $movies,
        ]);
    }

    public function goToPopular() {
        $movies = Movie::where('status', '=', '1')->orderBy('views', 'DESC')->get();
        return view('apps.popular')->with([
            'movies' => $movies,
        ]);
    }

    public function goToUpcoming() {
        $movies = Movie::where('status', "=", "0")->get();
        return view('apps.upcoming')->with([
            'movies' => $movies,
        ]);
        // dd($movies);
    }

    public function goToBrowse(){
        $cover = Movie::find(4);
        $actors = Actor::oldest()->limit(4)->get();
        $movies = Movie::oldest()->limit(3)->get();
        return view('apps.browse')->with([
            'movies' => $movies,
            'actors' => $actors,
            'cover' => $cover,
        ]);
        // dd($cover);
    }
    public function goToActors() {
        $actors = Actor::orderBy('name', 'asc')->get();
        return view('components.details')->with([
            'title' => 'Actors',
            'actors' => $actors,
    ]);
    // dd($movies);
    }
    public function goToActorsDetail(Actor $actor) {
        $date = Carbon::parse($actor->date_of_birth);
        $formattedDate = $date->format('d - M - Y');
        $dateOfBirth = $actor->date_of_birth;
        $today = Carbon::now();
        $age = $today->diffInYears($dateOfBirth);
        $inmovies = $actor->movies;
        return view('details.actors')->with([
            'inmovies' => $inmovies,
            'dob' => $formattedDate,
            'actor'=> $actor,
            'age' => $age,
        ]);
        // dd($inmovies);
    }

    public function goToMoviesDetail(Movie $movie, Request $request) {
        $date = Carbon::parse($movie->created_at);
        $formattedDate = $date->format('d - M - Y');
        $stars = $movie->actors;
        $director = $movie->directors->name;
        $genres = $movie->genres;
        // dd($movie);
        return view('details.movies')->with([
            'movie' => $movie,
            'release_date' => $formattedDate,
            'starring' => $stars,
            'director' => $director,
            'genres' => $genres,
            'request' => $request,
        ]);
        // dd($movie);
    }
}
