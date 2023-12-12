<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function cart(){
      $title = 'Shopping Cart';
      return view('cart', compact('title'));
  }
    public function addToCart($id)
    {
        $product = Product::find($id);

        //getting cart out of session
        $cart = session()->get('cart');

        // checking if cart is empty and this is the first product in the cart
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

        // if cart not empty then check if this product exist and increment its quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->price,
            "cover_img" => $product->cover_img
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

   
    public static function TotalCar()
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

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->TotalCar();

            return response()->json(['total' => $total]);

            session()->flash('success', 'Product removed successfully');
        }
    }


    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            //checking the number of productes left in the database and sendin an ajax response accordingly

            $product_name = $cart[$request->id]["product_name"];

            $product = product::where('product_name' , '=', $product_name)->first();

            if ($product->quantity < 2) {
                $message = "Sorry, no more items left in stock";
                return response()->json(['message' => $message]);
            } elseif ((($product->quantity) - ($request->quantity)) >= 0) {

                $message = "Quantity updated";
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                $subTotal = round($cart[$request->id]['quantity'] * $cart[$request->id]['price'], 2);
                $total = round($this->TotalCar(),2);

                return response()->json(['total' => $total, 'subTotal' => $subTotal, 'message' => $message, 'quantity' => $request->quantity]);

                session()->flash('success', 'Cart updated successfully');
            } else {
                $message = "Sorry, there are only " . $product->quantity . " productes left in stock";
                return response()->json(['message' => $message, 'quantity' => $product->quantity]);
            }

        }
    }
}



