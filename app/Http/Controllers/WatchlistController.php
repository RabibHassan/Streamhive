<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function addwatchlist(Request $request)
    {
        $incoming_fields= $request->validate([
            'm_name' => 'required|string|max:255',
        ]);
        $exists = Watchlist::where('users_id', auth()->id())
        ->where('m_name', $incoming_fields['m_name'])
        ->exists();

        if ($exists) {
        return redirect()->back();
        }

        $age = auth()->user()->age;
        if ($age < 18) {
            return redirect()->back()->with('underage', true);
        }
        Watchlist::create([
                'name' => auth()->user()->name, 
                'm_name' => $incoming_fields['m_name'], 
                'users_id' => auth()->id(), 
                'users_age' => auth()->user()->age,
            ]);
        return redirect()->back()->with('success', 'Movie added to your watchlist!');
    }   

    public function fetchmovies(Request $request){
        $records = Watchlist::where('users_id', auth()->id())->get();
        return view('watchlist',compact('records'));
    }
}
