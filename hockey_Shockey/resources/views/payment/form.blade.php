@extends('layouts.main')


@section('content')
<!-- resources/views/checkout.blade.php pavit -->
<div class="container">
    <div class="row">
        <!-- Left column for checkout form -->
        <div class="col-md-6"  style="background:#f2f2f2">
            <div class="col-md-12">
                <br><br>
                <!-- resources/views/payment/form.blade.php -->
                    <div class="box-inner-2">
                        <div>
                            <p class="fw-bold">Payment Details</p>
                            <p class="dis mb-3">Complete your purchase by providing your payment details</p>
                        </div>
                        <form method="post" action="{{ route('process.payment') }}">
                        @csrf
                            
                            <div>
                            <div class="my-3 cardname">
                                <p class="dis fw-bold mb-2">Cardholder name</p>
                                <input class="form-control" type="text" name="cardholder_name">
                            </div>
                            <p class="dis fw-bold mb-2">Card details</p>
                            <div class="d-flex align-items-center justify-content-between card-atm">
                                <input type="text" class="form-control" name="cc_number" id="cc_number" placeholder=" Card Details"> &nbsp;
                                <div class="d-flex w-50">
                                <input type="text" class="form-control px-0" placeholder=" MM/YY" name="expiry_date"> &nbsp;
                                <input type="password" maxlength="3" name="cvv" class="form-control px-0" placeholder=" CVV">
                                </div>
                            </div>
                            <div class="my-3 cardname">
                                <p class="dis fw-bold mb-2">Cardholder Type</p>
                                <input class="form-control" type="text" name="card_type" id="card_type" >
                            </div>
                            <div class="address">
                            @if(session('cart'))
                                @php
                                    $total = 0;
                                @endphp
                                @foreach(session('cart') as $product)
                                    @php
                                        $total += $product['price'] * $product['quantity'];
                                    @endphp

                                @endforeach
                            @endif
                            @if(session('cart'))
                             <div class="d-flex flex-column dis">
                             <div class="d-flex align-items-center justify-content-between mb-2">
                                <p>Subtotal</p>
                                <p>
                                    <span class="fas fa-dollar-sign"></span>$ {{ $cartTotal }}
                                </p>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <p>GST <span>(13%)</span></p>
                                <p>
                                    <span class="fas fa-dollar-sign"></span>${{ $gstAmount }}
                                </p>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <p class="fw-bold">Total</p>
                                <p class="fw-bold">
                                    <span class="fas fa-dollar-sign"></span>${{ $grandTotal }}
                                </p>
                            </div>

                            <button class="btn btn-primary mt-2">Pay <span class="fas fa-dollar-sign px-1"></span>{{ $grandTotal }} </button>

                            </div>
                                @endif
                            </div>
                            </div>
                        </form>
                    </div>
                <br><br>
            </div>
        </div>
        <!-- Right column for list of checkout products -->
        <!-- Right column for list of checkout products -->
        <div class="col-md-6">
            <div class="col-md-8">
                <br><br>
                <!-- Product List -->
                <h2>Your Cart</h2>

                @if(session('cart'))
                    @php
                        $total = 0;
                    @endphp
                    @foreach(session('cart') as $product)
                        @php
                            $total += $product['price'] * $product['quantity'];
                        @endphp
                        <div class="d-flex mb-3">
                            <img src="http://localhost:8000/storage/product_images/wc1FztG2oiyxe6LjxnwhnlBb0YbSJuqr3ckXEawE.jpg" alt="{{ $product['product_name'] }}" class="mr-3" style="width: 80px;">
                            <div>
                                <h5>{{ $product['product_name'] }}</h5>
                                <p>$ {{ $product['price'] }} X {{ $product['quantity'] }} = $ {{$product['price'] * $product['quantity']}}</p>
                            </div>
                        </div>
                        
                    @endforeach

                    <!-- Total -->
                    <div class="mt-4">
                    <h3>Total: ${{ $total }}</h3>

                    </div>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
                            

    </div>
</div>


@endsection
