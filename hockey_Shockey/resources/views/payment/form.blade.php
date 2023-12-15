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
                                <input class="form-control" type="text">
                            </div>
                            <p class="dis fw-bold mb-2">Card details</p>
                            <div class="d-flex align-items-center justify-content-between card-atm">
                                <div class="fab fa-cc-visa ps-3"></div>
                                <input type="text" class="form-control" placeholder=" Card Details"> &nbsp;
                                <div class="d-flex w-50">
                                <input type="text" class="form-control px-0" placeholder=" MM/YY"> &nbsp;
                                <input type="password" maxlength="3" class="form-control px-0" placeholder=" CVV">
                                </div>
                            </div>
                            
                            <div class="address">
                                
                                <div class="d-flex flex-column dis">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p>Subtotal</p>
                                    <p>
                                    <span class="fas fa-dollar-sign"></span>19.00
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                    <p class="pe-2">Discount <span class="d-inline-flex align-items-center justify-content-between bg-light px-2 couponCode">
                                        <span id="code" class="pe-2">BLACKFRIDAY</span>
                                        <span class="fas fa-times close"></span>
                                        </span>
                                    </p>
                                    </div>
                                    <p>
                                    <span class="fas fa-dollar-sign"></span>5.00
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p>VAT <span>(20%)</span>
                                    </p>
                                    <p>
                                    <span class="fas fa-dollar-sign"></span>2.80
                                    </p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="fw-bold">Total</p>
                                    <p class="fw-bold">
                                    <span class="fas fa-dollar-sign"></span>16.80
                                    </p>
                                </div>
                                <div class="btn btn-primary mt-2">Pay <span class="fas fa-dollar-sign px-1"></span>16.80 </div>
                                </div>
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
