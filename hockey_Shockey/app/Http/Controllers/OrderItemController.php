<?php

// app/Http/Controllers/OrderItemController.php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            // Add any other validation rules
        ]);

        // Create a new OrderItem instance and fill it with the validated data
        $orderItem = OrderItem::create([
            'order_id' => $request->input('order_id'),
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            // Add any other fields you need to save
        ]);

        return response()->json($orderItem, 201);
    }

    // Add other methods as needed
}
