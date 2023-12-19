@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row p-4">
        @include('layouts.partials.sidebarProfile')
        <div class="col-lg-9">
            <div class="row">
                <h2 class="heading">User Transactions</h2>

                @foreach ($userOrders as $order)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Transaction ID: {{ $order['trans_id'] }}</h2>
                        <p class="card-text">Reference Number: {{ $order['ref_number'] }}</p>
                        <p class="card-text">Auth Code: {{ $order['auth_code'] }}</p>
                        <p class="card-text">Status: {{ $order['transaction_status'] }}</p>
                        <p class="card-text">Created At: {{ $order['created_at'] }}</p>
                        <p class="card-text">Updated At: {{ $order['updated_at'] }}</p>

                        <h3 class="mt-4">Products:</h3>
                        <ul class="list-group d-flex flex-wrap">
                            @foreach ($order['productsArray'] as $product)
                            <li class="list-group-item">
                                <div class="d-flex flex-row align-items-center">
                                    <img src="{{ asset('storage/' . $product['product_image']) }}"
                                        alt="{{ $product['product_name'] }}" class="img-fluid rounded-3 me-3"
                                        style="max-width: 80px;" />
                                    <div>
                                        <h5 class="card-title">{{ $product['product_name'] }}</h5>
                                        <p class="card-text">Description: {{ $product['product_description'] }}</p>
                                        <p class="card-text">Size: {{ $product['product_size'] }}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
