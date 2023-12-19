<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pacewdd\Bx\_5bx;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;

use App\Models\Order;

use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'cc_number' => 'required|numeric',
            'expiry_date' => 'required|date_format:m/y',
            'cvv' => 'required|numeric|digits:3',
            'reference_number' => 'required|string',
            'card_type' => 'required|in:visa,mastercard,amex', // Adjust card types as needed
            'cardholder_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Replace these values with your actual credentials
        //dd($request);
        define('BX_LOGIN', '2398711');
        define('BX_KEY', '8520deeec6145fefc656a117921f2993');

        $transaction = new _5bx(BX_LOGIN, BX_KEY);

        // Replace hard-coded values with data from the request

        $cartItems = session('cart', []);

        // Calculate cart total
        $cartTotal = 0;
        foreach ($cartItems as $product) {
            $cartTotal += $product['price'] * $product['quantity'];
        }

        // Calculate GST (13%)
        $gstPercentage = 13;
        $gstAmount = ($cartTotal * $gstPercentage) / 100;

        // Calculate Grand Total
        $grandTotal = $cartTotal + $gstAmount;
        $grandTotal = round($grandTotal, 2);
        //dd($grandTotal);
        $transaction->amount($grandTotal);

        $transaction->card_num($request->input('cc_number'));
        $transaction->exp_date($request->input('expiry_date'));
        $transaction->cvv($request->input('cvv'));
        $transaction->ref_num($request->input('reference_number'));
        $transaction->card_type($request->input('card_type'));

        $card_holder_name = $request->input('cardholder_name');
        

        // Perform the authorization and capture
        $response = $transaction->authorize_and_capture();

            // Determine the transaction status based on response codes
            $responseCode = $response->transaction_response->response_code;
            $transactionStatus = $responseCode == '1' ? 'success' : ($responseCode == '2' ? 'error' : 'pending');

            // Store the transaction data in the database
            Transaction::create([
                'ref_number' => $response->ref_number,
                'result_code' => $response->result_code,
                'result_message' => $response->result_message,
                'response_code' => $responseCode,
                'auth_code' => $response->transaction_response->auth_code,
                'errors' => json_encode($response->transaction_response->errors),
                'trans_id' => $response->transaction_response->trans_id,
                'status' => $transactionStatus,
                // Add any other fields you need
            ]);
            $order_id = Session::get('order_id');
             // Update the order payment_status
            // dd($order_id);
            $order = Order::where('order_id', $order_id)->first();
            //dd($order);
            // Check if the order exists
            if ($order) {
                // Get the id from the order
                $orderId = $order->id;

                // Update the order status based on the id
                Order::where('id', $orderId)->update([
                    'payment_status' => $transactionStatus,
                ]);
            }
            

            // Handle the response, you might want to redirect the user or show a success message
            // Handle the response based on the status
            if ($transactionStatus === 'success') {
                // Perform actions for a successful payment
                // e.g., update order status, send confirmation email, update inventory, etc.
                // ...

                // Redirect or display a thank you page
                //return redirect()->route('payment.thankyou');
                Session::forget('cart');
                Session::forget('order_id');
                return redirect()->route('thankyou');

            } elseif ($transactionStatus === 'error') {
                // Perform actions for a failed payment
                // e.g., update order status, send notification, log information, etc.
                // ...

                // Redirect or display an error page
                return redirect()->route('payment.error')->with('error_message', 'Payment failed. Please try again.');
            } else {
                // Handle other cases (e.g., pending payment)
                // ...

                // Redirect or display a general message
                return redirect()->route('payment.error')->with('message', 'Payment is pending. You will be notified once processed.');
            }
    }

    public function showPaymentForm()
    {
        // Retrieve cart items from the session or database
        $cartItems = session('cart', []);
        // Calculate cart total
        $order_id = Session::get('order_id');
        //dd($order_id);
        $cartTotal = 0;
        foreach ($cartItems as $product) {
            $cartTotal += $product['price'] * $product['quantity'];
        }

        // Calculate GST (13%)
        $gstPercentage = 13;
        $gstAmount = ($cartTotal * $gstPercentage) / 100;

        // Calculate Grand Total
        $grandTotal = $cartTotal + $gstAmount;
        return view('payment.form', compact('cartTotal', 'gstAmount', 'grandTotal')); // Create a Blade view for your payment form
    }
}

