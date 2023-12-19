<!-- resources/views/user/orders.blade.php -->

@extends('layouts.main') 
@section('content')
    <h1>Your Orders</h1>

    @if($userOrders->isEmpty())
        <p>No orders found.</p>
    @else
        <ul>
            @foreach($userOrders as $order)
                <li>
                    Order ID: {{ $order->order_id }}
                    Product ID: {{ $order->product_id }}
                    Quantity: {{ $order->quantity }}
                    Price: {{ $order->price }}
                </li>
            @endforeach
        </ul>
    @endif
@endsection
