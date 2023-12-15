<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscription;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters',
        ]);

        // Store the email in the newsletters table
        Newsletter::create([
            'email' => $request->input('email'),
        ]);

        // Send a confirmation email (you need to create this mail class)
        Mail::to($request->input('email'))->send(new NewsletterSubscription());

        return redirect()->back()->with('success', 'Subscription successful! Please check your email for confirmation.');
    }
}
