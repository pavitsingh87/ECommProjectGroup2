<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use Illuminate\Support\Facades\Auth; // Make sure to import Auth
use Illuminate\Support\Str;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;


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
            'email' => 'required|email',
            'delivery_method' => 'required',
            'country' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            // Add any other fields you need to validate
        ]);

        // Generate a random order_id and check its uniqueness
        $order_id = $this->generateUniqueOrderId();

        // Check if the generated order_id already exists
        while (Order::where('order_id', $order_id)->exists()) {
            $order_id = $this->generateUniqueOrderId();
        }

        // Create a new Order instance and fill it with the validated data
        $order = new Order($validatedData);
        $order->order_id = $order_id;

        // Associate the order with the currently authenticated user, if available
        if (Auth::check()) {
            $order->user_id = Auth::id();
        }

        // Save the order to the database
        $order->save();

        // Retrieve cart items from the session or wherever you store them
        $cartItems = session('cart', []);
        
        // Save order items
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem([
                'order_id' => $order->id,
                'product_id' => $cartItem['product_id'],
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['price'],
                // Add any other fields you need to save
            ]);

            $orderItem->save();
        }
        Session::put('order_id', $order->order_id);
        // Perform any additional actions as needed

        // Redirect to the payment form with the order_id
        return redirect()->route('payment.form');
    }

    // Helper function to generate a unique order_id
    private function generateUniqueOrderId()
    {
        return Str::random(8); // Adjust the length as needed
    }
    public function getUserTransactions()
    {
        $userId = Auth::id();

        $userOrders = DB::table('transactions')
            ->join('orders', 'transactions.ref_number', '=', 'orders.order_id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('orders.user_id', '=', $userId)
            ->select('transactions.*', 'orders.*', 'order_items.*')
            ->get();
        //dd($userTransactions);
        return view('ordersProfile', compact('userOrders'));

        //return view('/transaction.index', compact('userTransactions'));
        
    }

}   
