<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pacewdd\Bx\_5bx;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Replace these values with your actual credentials
        define('BX_LOGIN', 'your_bx_login');
        define('BX_KEY', 'your_bx_api_key');

        $transaction = new _5bx(BX_LOGIN, BX_KEY);

        // Replace hard-coded values with data from the request
        $transaction->amount($request->input('amount'));
        $transaction->card_num($request->input('card_number'));
        $transaction->exp_date($request->input('expiry_date'));
        $transaction->cvv($request->input('cvv'));
        $transaction->ref_num($request->input('reference_number'));
        $transaction->card_type($request->input('card_type'));

        // Perform the authorization and capture
        $response = $transaction->authorize_and_capture();

        // Handle the response, you might want to redirect the user or show a success message
        dd($response);
    }

    public function showPaymentForm()
    {
        return view('payment.form'); // Create a Blade view for your payment form
    }
}

