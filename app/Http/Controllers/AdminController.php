<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Movie;
use App\Models\Series;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function fetchUsers(){
        $records = User::all();
        return view('admin', compact('records'));
    }

    public function fetchMovies(){
        $records = Movie::all();
        return view('admin_movies', compact('records'));
    }

    public function admin_go(Request $request){
        $incoming_fields=$request->validate([
            'decision' => 'required',
        ]);
        if($incoming_fields['decision']=='user'){
            return redirect('/admin');
        }
        else if($incoming_fields['decision']=='subscription'){
            return redirect('/admin_subscription');
        }
        else if($incoming_fields['decision']=='movies'){
            return redirect('/admin_movies');
        }
        else if($incoming_fields['decision']=='series'){
            return redirect('/admin_series');
        }
        elseif($incoming_fields['decision']=='watchlist'){
            return redirect('/admin_watchlist');
        }
        else{
            return redirect()->back()->with('message', 'Invalid Decision');
        }
    }
}
