<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function signup(Request $request){
        $incoming_fields= $request->validate([
            'name' => ['required','min:3',Rule::unique('users','name')],   
            'email'=> ['required','email',Rule::unique('users','email')],
            'age'=> ['required','integer','min:1'],
            'password'=> ['required','min:5','max:20'], 
        ]);
        $incoming_fields['password']=bcrypt($incoming_fields['password']);
        $user=User::create($incoming_fields);
        Subscription::create(['status'=>'free','users_id'=>$user->id]);
        auth()->login($user);
        return redirect('/login');
    }

    public function login(Request $request){
        $incoming_fields= $request->validate([
            'email'=> ['required','email'],
            'password'=> ['required','min:5','max:20'], 
        ]);
        
        if (auth()->attempt(['email'=>$incoming_fields['email'],'password'=>$incoming_fields['password']])){
            $request->session()->regenerate();
            return redirect('/UI');
        }
        else{
            return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
        }
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}