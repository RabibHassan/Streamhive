<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Show the profile page
    public function showProfile()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('profile', compact('user'));
    }

    // Update the name field
    public function updateUsername(Request $request)
    {
        // Validate the name field
        $incoming_fields=$request->validate([
            'name' => 'required|string|max:255|unique:users,name', // Ensure the name is unique
        ]);

        // Get the authenticated user
        $user = Auth::user(); // Get the currently authenticated user

        // Update the name field
        // $user->name = $request->input('name');

        // Save the updated name
        User::updateOrCreate([
            'name' => $incoming_fields['name'],
            'email'=> $user->email,
            'age'=> $user->age,
            'password'=> $user->password,
            'role'=> $user->role,
        ]);
        // $user->save(); // Save the changes to the database

        // Redirect back with a success message
        return redirect()->route('profile')->with('success', 'Name updated successfully!');
    }
}