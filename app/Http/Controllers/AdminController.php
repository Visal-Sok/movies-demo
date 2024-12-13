<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Genre;
use App\Models\MovieType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function home()
    {
        return view('admin.dashboard');
    }
    public function manageMovies()
    {
        $movie = Movie::latest()->limit(1)->get();
        $type = MovieType::all();
        $director = Director::all();
        return view('admin.movies')->with([
            'movie' => $movie,
            'type' => $type,
            'director' => $director,
        ]);
    }
    public function manageDirectors()
    {
        $director = Director::latest()->get();
        return view('admin.directors')->with([
            'director' => $director,
        ]);
    }
    public function manageActors()
    {
        $actor = Actor::latest()->get();
        return view('admin.actors')->with([
            'actor' => $actor,
        ]);
        // dd($actor);
    }
    public function ViewActor(Actor $actor)
    {
        $date = Carbon::parse($actor->date_of_birth);
        $formattedDate = $date->format('d - M - Y');
        $dateOfBirth = $actor->date_of_birth;
        $today = Carbon::now();
        $age = $today->diffInYears($dateOfBirth);
        $portrait = $actor->portrait;
        $name = $actor->name;
        $id = $actor->id;
        return view('admin.actors')->with([
            'portrait' => $portrait,
            'name' => $name,
            'dob' => $formattedDate,
            'age' => $age,
            'id' => $id,
        ]);
    }
    public function createActors(Request $request)
    {
        dd($request->file());
        $actor = new Actor();
        $actor->id = $request->post('actorid');
        $actor->name = $request->post('actorname');
        $date = Carbon::parse($request->post('actordob'));
        $formattedDate = $date->format('Y-m-d') . ' 0: 00 : 00';
        $actor->date_of_birth = strval($formattedDate);
        if (is_null($request->portrait)) {
            $portraitname = '';
        } else {
            $portraitname = $request->post('actorname') . '_' . time() . '.' . $request->portrait->extension();
            $actor->portrait = $portraitname;
            $request->portrait->storeAs('public/image', $portraitname);
        }
        $actor->save();
        return redirect()->route('adminActors');
    }
    public function EditActor(Actor $actor)
    {
        $date = Carbon::parse($actor->date_of_birth);
        $formattedDate = $date->format('d - M - Y');
        $dateOfBirth = $actor->date_of_birth;
        $today = Carbon::now();
        $age = $today->diffInYears($dateOfBirth);
        $portrait = $actor->portrait;
        $name = $actor->name;
        $id = $actor->id;
        return view('adminedit.actor')->with([
            'portrait' => $portrait,
            'name' => $name,
            'dob' => $formattedDate,
            'age' => $age,
            'id' => $id,
        ]);
    }
    public function UpdateActor(Request $request)
    {
        $actor = Actor::find($request->post('actorid'));
        $actor->name = $request->post('actorname');
        $date = Carbon::parse($request->post('actordob'));
        $formattedDate = $date->format('Y-m-d') . ' 0: 00 : 00';
        $actor->date_of_birth = strval($formattedDate);
        if (is_null($request->portrait)) {
            $portraitname = '';
        } else {
            $portraitname = $request->post('actorname') . '_' . time() . '.' . $request->portrait->extension();
            $actor->portrait = $portraitname;
            $request->portrait->storeAs('public/image', $portraitname);
        }
        $actor->save();
        return redirect()->route('adminActors');
    }
    public function ViewDirector(Director $director)
    {
        $portrait = $director->portrait;
        $name = $director->name;
        $id = $director->id;
        return view('admin.directors')->with([
            'portrait' => $portrait,
            'name' => $name,
            'id' => $id,
        ]);
    }
    public function createDirector(Request $request)
    {
        $director = new Director();
        $director->id = $request->post('directorid');
        $director->name = $request->post('directorname');
        if (is_null($request->portrait)) {
            $portraitname = '';
        } else {
            $portraitname = $request->post('directorname') . '_' . time() . '.' . $request->portrait->extension();
            $director->portrait = $portraitname;
            $request->portrait->storeAs('public/image', $portraitname);
        }
        $director->save();
        return redirect()->route('adminDirectors');
    }
    public function EditDirector(Director $director)
    {
        $portrait = $director->portrait;
        $name = $director->name;
        $id = $director->id;
        return view('adminedit.director')->with([
            'portrait' => $portrait,
            'name' => $name,
            'id' => $id,
        ]);
    }
    public function UpdateDirector(Request $request)
    {
        $director = Director::find($request->post('directorid'));
        $director->name = $request->post('directorname');
        if (is_null($request->portrait)) {
            $portraitname = '';
        } else {
            $portraitname = $request->post('directorname') . '_' . time() . '.' . $request->portrait->extension();
            $director->portrait = $portraitname;
            $request->portrait->storeAs('public/image', $portraitname);
        }
        $director->save();
        return redirect()->route('adminDirectors');
    }
    public function ViewMovie(Movie $movie)
    {
        $type = MovieType::find($movie->type);
        $director = Director::find($movie->directed_by);
        $ratings = $movie->ratings;
        $cover = $movie->cover;
        $title = $movie->title;
        $status = $movie->status;
        $id = $movie->id;
        $genre = $movie->genres;
        // dd($genre);
        return view('admin.movies')->with([
            'ratings' => $ratings,
            'cover' => $cover,
            'type' => $type->type,
            'title' => $title,
            'status' => $status,
            'id' => $id,
            'genre' => $genre,
            'director' => $director->name,
        ]);
    }
    public function FetchActorToMovie(Movie $movie)
    {
        $actors = Actor::orderBy('name', 'asc')->get();
        return view('admin.movies')->with([
            'actors' => $actors,
            'movie' => $movie,
        ]);
    }
    public function AddActorToMovie(Request $request)
    {
        // dd($request);
        $movie = $request->post('movieid');
        $actor = $request->post('actor');
        DB::table('actors_movies')->insert([
            'actor_id' => $actor,
            'movie_id' => $movie,
        ]);
        return view('admin.movies');
    }
    public function FetchGenreToMovie(Movie $movie)
    {
        $genres = Genre::orderBy('genre', 'asc')->get();
        return view('admin.movies')->with([
            'genres' => $genres,
            'movie' => $movie,
        ]);
    }
    public function AddGenreToMovie(Request $request)
    {
        // dd($request);
        $movie = $request->post('movieid');
        $genre = $request->post('genre');
        DB::table('genres_movies')->insert([
            'genre_id' => $genre,
            'movie_id' => $movie,
        ]);
        return view('admin.movies');
    }
    public function createMovie(Request $request)
    {
        $movie = new Movie();
        $movie->id = $request->post('movieid');
        $movie->title = $request->post('movietitle');
        // dd($movie->title);
        $movie->views = rand(34201, 60928);
        $movie->ratings = $request->post('ratings');
        $movie->type = $request->post('type');
        $movie->directed_by = $request->post('directed_by');
        $movie->status = $request->post('status');
        if (is_null($request->cover)) {
            $covername = '';
        } else {
            $escape_letters = array(":", ";", '\\');
            $covertitle_sanitized = str_replace($escape_letters, "", $request->post('movietitle'));
            $covername = $covertitle_sanitized . '_' . time() . '.' . $request->cover->extension();
            $movie->cover = $covername;
            $request->cover->storeAs('public/image', $covername);
        }

        $movieTitle = $request->post('movietitle');
        // $rentName = $movieTitle . ' (Rent)';
        $saleName = $movieTitle . ' (Sale)';
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $priceResRent = $stripe->prices->create([
            'currency' => 'usd',
            'unit_amount' => 299,
            'recurring' => ['interval' => 'month'],
            'product_data' => ['name' => $saleName],
        ]);

        $priceResRentID = $priceResRent->product;

        $updatedprodRent = $stripe->products->retrieve($priceResRentID, []);
        $stripe->products->update($updatedprodRent->id, ['metadata' => ['category' => 'movie_for_sale']]);
        $movie->stripe_product_key = $updatedprodRent->id;

        // $movie->stripe_product_key = $updatedprodRent->

        $movie->save();
        return redirect()->route('adminMovies');

        // $priceResBuy = $stripe->prices->create([
        //     'currency' => 'usd',
        //     'unit_amount' => 699,
        //     'type' => 'one_time',
        //     'product_data' => ['name' => $saleName],
        // ]);

        // $priceResBuyID = $priceResBuy->product;

        // $updatedprodBuy = $stripe->products->retrieve($priceResRentID, []);
        // $stripe->products->update(
        //     $updatedprodBuy->id,
        //     ['metadata' => ['category' => 'movie_for_sale']]
        // );

        // dd($updatedprod);

        // dd($request->post('status'));
    }
    public function EditMovie(Movie $movie)
    {
        $type = MovieType::all();
        $director = Director::all();
        $ratings = $movie->ratings;
        $cover = $movie->cover;
        $title = $movie->title;
        $status = $movie->status;
        $id = $movie->id;
        $genre = $movie->genres;
        $all_genre = Genre::all();
        // dd($genre);
        $description = $movie->description;
        // dd($genre);
        return view('adminedit.movie')->with([
            'ratings' => $ratings,
            'cover' => $cover,
            'type' => $type,
            'title' => $title,
            'status' => $status,
            'id' => $id,
            'genre' => $genre,
            'all_genre' => $all_genre,
            'director' => $director,
            'description' => $description,
        ]);
    }
    public function UpdateMovie(Request $request)
    {
        $movie = Movie::find($request->post('movieid'));
        $movie->title = $request->post('movietitle');
        $movie->ratings = $request->post('ratings');
        $movie->type = $request->post('type');
        $movie->directed_by = $request->post('directed_by');
        $movie->status = $request->post('status');
        if (is_null($request->cover)) {
            $covername = '';
        } else {
            $covername = $request->post('movietitle') . '_' . time() . '.' . $request->cover->extension();
            $movie->cover = $covername;
            $request->cover->storeAs('public/image', $covername);
        }
        $movie->save();
        return redirect()->route('adminMovies');
        // dd($request->post('status'));
    }
}
