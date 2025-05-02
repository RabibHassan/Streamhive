<?php

use App\Models\Series;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', function () {
    return view('login');
});

Route::get('/signup',function(){
    return view('signup');
})->name('signup'); //using this cos we are using route helper instead of directly giving url in form like action="/login"

Route::get('/login',function(){
    return view('login');
})->name('login'); //using this cos we are using route helper instead of directly giving url in form like action="/login"

Route::get('/watchlist',function(){
    return view('watchlist');
})->name('watchlist'); 

Route::get('/UI',function(){
    return view('UI');
})->name('UI');

Route::get('/subscription',function(){
    return view('subscription');
})->name('subscription');

Route::get('/movies',function(){
    return view('movies');
})->name('movies');

Route::get('/series',function(){
    return view('series');
})->name('series');

Route::get('/decisionpage', function(){
    return view('decisionpage');
})->middleware('auth');

Route::get('/admin',function(){
    return view('admin');
})->middleware('auth');

Route::get('/admin_movies',function(){
    return view('admin_movies');
})->middleware('auth');

Route::get('/admin_series',function(){
    return view('admin_series');
})->middleware('auth');

Route::get('/admin_watchlist',function(){
    return view('admin_watchlist');
})->middleware('auth');

Route::get('/admin_subscription',function(){
    return view('admin_subscription');
})->middleware('auth');

Route::get('/watchlist', [WatchlistController::class, 'fetchmovies'])->name('watchlist'); //pt1
Route::get('/fetchmovies',[WatchlistController::class,'fetchmovies'])->name('fetchmovies');//pt2

Route::get('/admin',[AdminController::class,'fetchUsers'])->name('fetchUsers')->middleware('auth');

Route::get('/admin_subscription',[AdminController::class,'fetchSubscription'])->name('fetchSubscription')->middleware('auth');
Route::get('/admin_movies',[AdminController::class,'fetchMovies'])->name('fetchMovies')->middleware('auth');
Route::get('/admin_series',[AdminController::class,'fetchSeries'])->name('fetchSeries')->middleware('auth');
Route::get('/admin_watchlist',[AdminController::class,'fetchWatchlist'])->name('fetchWatchlist')->middleware('auth');

Route::put('/subscription', [SubscriptionController::class, 'subscription'])->name('subscription');

Route::get('/movies',[MoviesController::class,'fetchmovies'])->name('movies');
Route::get('/series',[SeriesController::class,'fetchseries'])->name('series');

Route::get('/search',[UserController::class,'search'])->name('search');

Route::post('/login',[UserController::class,'login']);

Route::post('/signup',[UserController::class,'signup']);

Route::post('/logout',[UserController::class,'logout']);

Route::post('/addwatchlist',[WatchlistController::class,'addwatchlist'])->name('addwatchlist');

Route::post('/decision',[UserController::class,'decision'])->name('decision');

Route::post('/admin_go',[AdminController::class,'admin_go'])->name('admin_go');
