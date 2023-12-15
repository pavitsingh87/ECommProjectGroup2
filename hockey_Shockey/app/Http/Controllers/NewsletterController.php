<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscription;

class NewsletterController extends Controller
{
    public function store(Request $request)
{
    \Log::info('Request received', $request->all());

    $request->validate([
        'email' => 'required|email|unique:newsletters,email,NULL,id',
    ]);

    // Store the email in the newsletters table
    Newsletter::create([
        'email' => $request->input('email'),
    ]);

    $emailContent = 'Thank you for subscribing to our newsletter!';
    $subject = 'Newsletter Subscription Confirmation';

    // Send confirmation email
    Mail::raw($emailContent, function ($message) use ($request, $subject) {
        $message->to($request->input('email'))
            ->subject($subject);
    });

    return redirect()->route('home')->with('success', 'Subscription successful! Please check your email for confirmation.');
}

    
}
