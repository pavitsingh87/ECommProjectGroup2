<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //checkout controller
    public function checkout()
    {
        $cartItems = Session::get('cart', []);
        //print_r($cartItems);
        return view('checkout');

    }
    public function processCheckout(Request $request)
    {
        $request->validate([
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

        // Your logic to handle the checkout process goes here

         return redirect()->route('checkout.success');
    }
}
