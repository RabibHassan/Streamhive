<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionReceiptMail;

class SubscriptionController extends Controller
{
    public function subscription(Request $request)
    {
        $incoming_fields = $request->validate([
            'status' => 'required|string|max:255', 
            'payment_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:payment_date',
        ]);
        
        if ($incoming_fields['status'] != 'Free') {
            Subscription::updateOrCreate(
                ['users_id' => auth()->id()], 
                [
                    'status' => $incoming_fields['status'],
                    'payment_date' => $incoming_fields['payment_date'],
                    'expiry_date' => $incoming_fields['expiry_date'],
                ] 
            );
        } else {
            Subscription::updateOrCreate(
                ['users_id' => auth()->id()], 
                [
                    'status' => $incoming_fields['status'],
                    'payment_date' => null,
                    'expiry_date' => null,
                ] 
            );
        }

        $data = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'status' => $incoming_fields['status'],
            'payment_date' => $incoming_fields['payment_date'],
            'expiry_date' => $incoming_fields['expiry_date'],
            'cost' => $incoming_fields['status'] === 'Individual' ? '100 BDT' : '250 BDT',
        ];
    
        $pdf = Pdf::loadView('pdf.subscription_receipt', $data)->output();
    
        Mail::to($data['email'])->send(new SubscriptionReceiptMail($data, $pdf));
    
        return redirect()->route('subscription')->with('success', 'Subscription updated and receipt emailed successfully!');
    }

    public function payment(Request $request)
    {
        $incoming_fields = $request->validate([
            'status' => 'required', 
        ]);
    
        $status = $incoming_fields['status'] ?? 'Free';
        $payment_date = now();
        $expiry_date = now()->addDays(30);
    
        if ($status == 'Individual') {
            $cost = '100';
        } elseif ($status == 'Family') {
            $cost = '250';
        } else {
            return redirect()->back()->with('error', 'Invalid subscription status.');
        }

        return view('payment', compact('status', 'payment_date', 'expiry_date', 'cost'));
    }
}