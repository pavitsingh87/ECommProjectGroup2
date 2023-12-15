<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use Illuminate\Support\Facades\Auth; // Make sure to import Auth

class CheckoutController extends Controller
{
    //checkout controller
    public function checkout()
    {
        Session::put('checkout', 1);
        $cartItems = Session::get('cart', []);
        return view('checkout');

    }
    public function processCheckout(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required',
            'delivery_method' => 'required',
            'country' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);

        // Create a new Order instance and fill it with the validated data
        $order = new Order($validatedData);

        // Associate the order with the currently authenticated user, if available
        if (Auth::check()) {
            $order->user_id = Auth::id();
        }

        // Save the order to the database
        $order->save();

        // Perform any additional actions as needed
        // Redirect to the payment form
        return redirect()->route('payment.form');
    }
}
