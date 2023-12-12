<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    //
    public function addDummyTShirtsToCart()
    {
        $cartItems = Session::get('cart', []);

        // Dummy T-shirt data
        $dummyTShirts = [
            [
                'id' => 1,
                'name' => 'Red T-shirt',
                'quantity' => 2,
                'price' => 19.99,
                // Add other product details as needed
            ],
            [
                'id' => 2,
                'name' => 'Blue T-shirt',
                'quantity' => 1,
                'price' => 24.99,
                // Add other product details as needed
            ],
            [
                'id' => 3,
                'name' => 'Green T-shirt',
                'quantity' => 3,
                'price' => 29.99,
                // Add other product details as needed
            ],
        ];

        // Add dummy T-shirts to the cart
        foreach ($dummyTShirts as $tShirt) {
            $productId = $tShirt['id'];

            // Check if the product already exists in the cart
            if (isset($cartItems[$productId])) {
                // If it exists, update the quantity
                $cartItems[$productId]['quantity'] += $tShirt['quantity'];
            } else {
                // If it doesn't exist, add the product to the cart
                $cartItems[$productId] = $tShirt;
            }
        }

        // Save the updated cart to the session
        Session::put('cart', $cartItems);

        //return redirect()->route('view_cart')->with('success', 'Dummy T-shirts added to the cart.');
    }
    public function checkout()
    {
        $cartItems = Session::get('cart', []);
        //print_r($cartItems);
        return view('checkout');

    }
}