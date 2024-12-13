<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Normal Routes

Route::get('/', [PageController::class, 'goToBrowse'])->name('browseMovies');
Route::get('/browse', [PageController::class, 'goToBrowse'])->name('browseMovies');
Route::get('/actors', [PageController::class, 'goToActors'])->name('actors');
Route::get('/popular', [PageController::class, 'goToPopular'])->name('popular');
Route::get('/actors/{actor}', [PageController::class, 'goToActorsDetail'])->name('actorsdetail');
Route::get('/movies/{movie}', [PageController::class, 'goToMoviesDetail'])->name('moviesdetail');
Route::get('/movies', [PageController::class, 'goToMovies'])->name('movies');
Route::get('/tvshows', [PageController::class, 'goToSeries'])->name('tvshows');
Route::get('/animes', [PageController::class, 'goToAnimes'])->name('animes');
Route::get('/upcoming', [PageController::class, 'goToUpcoming'])->name('upcoming');
Route::get('/testing', [PageController::class, 'testingRequests'])->name('testing');
// Route::fallback(function() { return redirect()->to('/browse'); });


// Route::get('/api/movies', [APIController::class, 'goToMovies'])->name('movies');



// Middlewares

Route::get('/dashboard', [PageController::class, 'goToBrowse'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings', function () { return view('apps.settings'); })->name('settings');
    Route::get('/manage', [SubscriptionController::class, 'manageSubscription'])->name('manage');
    Route::post('/buy_movie', [SubscriptionController::class, 'buyMovie'])->name('buyMovie');
    
    Route::get('hello', [SubscriptionController::class, 'prepping'])->name('test');
    // Subscription

    // Route::get('/plans', [PlanController::class, 'index'])->name('plans');
    Route::get('/plans', [SubscriptionController::class, 'showSubscription'])->name('subscribe');
    Route::post('/plans', [SubscriptionController::class, 'CreditCardPage'])->name('pickedSubscription');
    // Route::post('/subscription', [SubscriptionController::class, 'registerSubscription'])->name('subscription');
    // Route::post('/subscribe', [SubscriptionController::class, 'processSubscription']);
    Route::post('/subscribe', [SubscriptionController::class, 'processSubscription'])->name('processSubscription');
    Route::post('/cancel', [SubscriptionController::class, 'cancelSubscription'])->name('cancelSubscription');
    Route::post('/resume', [SubscriptionController::class, 'resumeSubscription'])->name('resumeSubscription');



    // Admin side

    Route::get('/admin', [AdminController::class, 'home'])->name('admin');

    Route::get('/admin/actors', [AdminController::class, 'manageActors'])->name('adminActors');
    Route::post('/admin/actors', [AdminController::class, 'createActors'])->name('createActors');
    Route::get('/admin/actors/{actor}', [AdminController::class, 'viewActor'])->name('ViewActor');
    Route::get('/admin/editactor/{actor}', [AdminController::class, 'EditActor'])->name('EditActor');
    Route::post('/admin/editactor/{actor}', [AdminController::class, 'UpdateActor'])->name('UpdateActor');

    Route::get('/admin/movies', [AdminController::class, 'manageMovies'])->name('adminMovies');
    Route::get('/admin/createmovies', [AdminController::class, 'createMovie'])->name('createMovieViaGet');
    Route::post('/admin/movies', [AdminController::class, 'createMovie'])->name('createMovie');
    Route::get('/admin/movies/{movie}', [AdminController::class, 'ViewMovie'])->name('ViewMovie');
    Route::get('/admin/add_actor_to_movie/{movie}', [AdminController::class, 'FetchActorToMovie'])->name('MovieAddActor');
    Route::post('/admin/add_actor_to_movie', [AdminController::class, 'AddActorToMovie'])->name('addactortomovie');
    Route::get('/admin/add_genre_to_movie/{movie}', [AdminController::class, 'FetchGenreToMovie'])->name('MovieAddGenre');
    Route::post('/admin/add_genre_to_movie', [AdminController::class, 'AddGenreToMovie'])->name('addgenretomovie');
    Route::get('/admin/editmovie/{movie}', [AdminController::class, 'EditMovie'])->name('EditMovie');
    Route::post('/admin/editmovie/{movie}', [AdminController::class, 'UpdateMovie'])->name('UpdateMovie');

    Route::get('/admin/directors', [AdminController::class, 'manageDirectors'])->name('adminDirectors');
    Route::post('/admin/directors', [AdminController::class, 'createDirector'])->name('createDirector');
    Route::get('/admin/directors/{director}', [AdminController::class, 'ViewDirector'])->name('ViewDirector');
    Route::get('/admin/editdirector/{director}', [AdminController::class, 'EditDirector'])->name('EditDirector');
    Route::post('/admin/editdirector/{director}', [AdminController::class, 'UpdateDirector'])->name('UpdateDirector');
});

require __DIR__.'/auth.php';
