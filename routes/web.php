<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/UI',function(){
    return view('UI');
})->name('UI');

Route::post('/login',[UserController::class,'login']);

Route::post('/signup',[UserController::class,'signup']);
