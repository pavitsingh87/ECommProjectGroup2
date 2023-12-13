<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {
        $cartItems = Session::get('cart', []);
        //print_r($cartItems);
        return view('checkout');

    }
}
