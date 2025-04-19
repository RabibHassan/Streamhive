<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Http\Request;

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

Route::post('/login',[UserController::class,'login']);

Route::post('/signup',[UserController::class,'signup']);

Route::post('/logout',[UserController::class,'logout']);

Route::post('/addwatchlist',[WatchlistController::class,'addwatchlist'])->name('addwatchlist');

Route::get('/watchlist', [WatchlistController::class, 'fetchmovies'])->name('watchlist'); //pt1
Route::get('/fetchmovies',[WatchlistController::class,'fetchmovies'])->name('fetchmovies');//pt2
