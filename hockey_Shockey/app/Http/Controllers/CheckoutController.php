<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Function to display the checkout page
    public function checkout()
    {
        Session::put('checkout', 1);
        $cartItems = Session::get('cart', []);
        return view('checkout');
    }

    // Function to process the checkout
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

        // Generate a unique order_id
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

    // Function to get user transactions
    public function getUserTransactions()
    {
        $userId = Auth::id();
        
        $query = "
            SELECT 
                transactions.id AS trans_id,
                transactions.ref_number,
                transactions.result_code,
                transactions.result_message,
                transactions.response_code,
                transactions.auth_code,
                transactions.errors,
                transactions.trans_id,
                transactions.status AS transaction_status,
                transactions.created_at AS transaction_created_at,
                transactions.updated_at AS transaction_updated_at,
                orders.id AS order_id,
                orders.email,
                orders.delivery_method,
                orders.country,
                orders.first_name,
                orders.last_name,
                orders.address,
                orders.city,
                orders.state,
                orders.zip_code,
                orders.payment_status,
                orders.user_id,
                orders.created_at AS order_created_at,
                orders.updated_at AS order_updated_at
            FROM transactions
            JOIN orders ON transactions.ref_number = orders.order_id
            GROUP BY transactions.id, orders.id
        ";

        $result = DB::select($query);

        if (empty($result)) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        $formattedItems = [];

        foreach ($result as $item) {
            $query1 = "
                SELECT 
                    order_items.*,
                    products.*
                FROM transactions
                JOIN orders ON transactions.ref_number = orders.order_id
                LEFT JOIN order_items ON orders.id = order_items.order_id 
                LEFT JOIN products ON products.product_id = order_items.product_id 
                WHERE transactions.ref_number = ?
            ";
            $result1 = DB::select($query1, [$item->ref_number]);

            if (empty($result1)) {
                return response()->json(['error' => 'Data not found'], 404);
            }

            $productsArray = [];

            foreach ($result1 as $item1) {
                $productsArray[] = [
                    'product_name' => $item1->product_name,
                    'product_description' => $item1->product_description,
                    'short_description' => $item1->short_description,
                    'product_image' => $item1->product_image,
                    'product_size' => $item1->product_size,
                ];
            }       
            
            $formattedItems[] = [
                'trans_id' => $item->trans_id,
                'ref_number' => $item->ref_number,
                'auth_code' => $item->auth_code,
                'transaction_status' => $item->transaction_status,
                'created_at' => $item->transaction_created_at,
                'updated_at' => $item->transaction_updated_at,
                'productsArray' => $productsArray 
            ];
        }

        $userOrders = $formattedItems;

        // Render the 'ordersProfile' view with the results
        return view('ordersProfile', compact('userOrders'));
    }
}