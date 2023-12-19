@extends('layouts.app')

@section('content')
    <div>
        
    </div>
    <h1>User Transactions</h1>

    @foreach ($userOrders as $order)
        <div>
            <h2>Transaction ID: {{ $order['trans_id'] }}</h2>
            <p>Reference Number: {{ $order['ref_number'] }}</p>
            <p>Auth Code: {{ $order['auth_code'] }}</p>
            <p>Status: {{ $order['transaction_status'] }}</p>
            <p>Created At: {{ $order['created_at'] }}</p>
            <p>Updated At: {{ $order['updated_at'] }}</p>

            <h3>Products:</h3>
            <ul>
                @foreach ($order['productsArray'] as $product)
                    <li>
                        <strong>{{ $product['product_name'] }}</strong>
                        <p>Description: {{ $product['product_description'] }}</p>
                        <p>Size: {{ $product['product_size'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <hr>
    @endforeach
@endsection
