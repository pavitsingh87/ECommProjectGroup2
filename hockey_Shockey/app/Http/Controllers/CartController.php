<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
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
                    "product_id"=>$product->product_id,
                    "product_name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "product_image" => $product->product_image
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added successfully!');
        }

        // Increment the quantity if the product already exists in the cart
        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added successfully!');
        }

        // Add the product to the cart with quantity = 1 if it doesn't exist
        $cart[$id] = [
            "product_id"=>$product->product_id,
            "product_name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->price,
            "product_image" => $product->product_image
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added successfully!');
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
                $message = "No more items left in stock";
                return response()->json(['message' => $message]);
            } elseif ((($product->quantity) - ($request->quantity)) >= 0) {

                $message = "Done Update";
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                $subTotal = round($cart[$request->id]['quantity'] * $cart[$request->id]['price'], 2);
                $total = round($this->getCartTotal(), 2);

                return response()->json(['total' => $total, 'subTotal' => $subTotal, 'message' => $message, 'quantity' => $request->quantity]);

                session()->flash('success', 'Updated successfully');
            } else {
                $message = "There are only " . $product->quantity . " products out of in stock";
                return response()->json(['message' => $message, 'quantity' => $product->quantity]);
            }
        }
    }

    public static function getCartItemsTotal()
    {
        if (session()->has('cart')) {
            $totalItems = 0;

            $cart = session()->get('cart');

            foreach ($cart as $id => $details) {
                $totalItems += $details['quantity'];
            }

            return $totalItems;
        }
    }

    public function getTotal()
    {
        try {
            $total = $this->getCartItemsTotal();
            return response()->json(['total' => $total]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

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
