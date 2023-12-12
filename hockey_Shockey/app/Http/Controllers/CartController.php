<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    // Display the shopping cart
    public function cart()
    {
        $title = 'Shopping Cart';
        return view('cart', compact('title'));
    }

    // Add a product to the shopping cart
    public function addToCart($id)
    {
        $product = Product::find($id);

        // Retrieve the cart from the session
        $cart = session()->get('cart');

        // Check if the cart is empty and add the first product
        if (!$cart) {

            $cart = [
                $id => [
                    "product_name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "cover_img" => $product->cover_img
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // Increment the quantity if the product already exists in the cart
        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // Add the product to the cart with quantity = 1 if it doesn't exist
        $cart[$id] = [
            "product_name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->price,
            "cover_img" => $product->cover_img
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Get the total value of the items in the cart
    public static function getCartTotal()
    {
        if (session()->has('cart')) {
            $total = 0;

            $cart = session()->get('cart');

            foreach ($cart as $id => $details) {
                $total += $details['price'] * $details['quantity'];
            }

            return round($total, 2);
        }
    }

    // Remove a product from the cart
    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            return response()->json(['total' => $total]);

            session()->flash('success', 'Product removed successfully');
        }
    }

    // Update the quantity of a product in the cart
    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            // Check the remaining quantity in the database and send an AJAX response accordingly
            $product_name = $cart[$request->id]["product_name"];

            $product = Product::where('product_name', '=', $product_name)->first();

            if ($product->quantity < 2) {
                $message = "Sorry, no more items left in stock";
                return response()->json(['message' => $message]);
            } elseif ((($product->quantity) - ($request->quantity)) >= 0) {

                $message = "Quantity updated";
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                $subTotal = round($cart[$request->id]['quantity'] * $cart[$request->id]['price'], 2);
                $total = round($this->getCartTotal(), 2);

                return response()->json(['total' => $total, 'subTotal' => $subTotal, 'message' => $message, 'quantity' => $request->quantity]);

                session()->flash('success', 'Cart updated successfully');
            } else {
                $message = "Sorry, there are only " . $product->quantity . " products left in stock";
                return response()->json(['message' => $message, 'quantity' => $product->quantity]);
            }
        }
    }
}
