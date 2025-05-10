<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription;
use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function signup(Request $request){
        $incoming_fields = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('users', 'name')],   
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'age' => ['required', 'integer', 'min:1'],
            'password' => ['required', 'min:5', 'max:20'], 
        ]);
        $incoming_fields['password'] = bcrypt($incoming_fields['password']);
        $user=User::create(['role' => 'user', 'name' => $incoming_fields['name'], 'email' => $incoming_fields['email'], 'age' => $incoming_fields['age'], 'password' => $incoming_fields['password']]);
        Subscription::create(['status' => 'free', 'users_id' => $user->id,'name'=>$user->name]);
        auth()->login($user);
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
    
            // Redirect based on the user's role
            if (auth()->user()->role === 'admin') {
                return redirect()->route('decisionpage');
            } elseif (auth()->user()->role === 'user') {
                return redirect()->route('UI');
            }
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function search(Request $request){
        if ($request->search) {
            $searchMovies = Movie::where('m_name', 'LIKE', '%' . $request->search . '%')->orderBy('id')->paginate(15);
            $searchSeries = Series::where('s_name', 'LIKE', '%' . $request->search . '%')->orderBy('id')->paginate(15);
            return view('search', compact('searchMovies', 'searchSeries'));
        } else {
            return redirect()->back()->with('message', 'Empty Search');
        }
    }

    public function decision(Request $request){
        $incoming_fields=$request->validate([
            'decision'=>'required',
        ]);

        if($incoming_fields['decision']=='user'){
            return redirect('/UI');
        }
        else{
            return redirect('/admin');
        }
    }

    public function index(){
        // Fetch top 10 most liked movies and series
        $topMovies = Movie::orderBy('liked', 'desc')->take(10)->get();
        $topSeries = Series::orderBy('liked', 'desc')->take(10)->get();

        return view('UI', compact('topMovies', 'topSeries'));
    }
}