<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscription(Request $request)
    {
        // Validate the incoming request
        $incoming_fields = $request->validate([
            'status' => 'required|string|max:255', // Validate the status field
        ]);
    
        // Update or create the subscription for the logged-in user
        Subscription::updateOrCreate(
            ['users_id' => auth()->id()], // Match the subscription by the logged-in user's ID
            ['status' => $incoming_fields['status']] // Update the status
        );
    
        return redirect()->back()->with('success', 'Subscription updated successfully!');
    }
}