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
                                    <input class="form-control @error('cardholder_name') is-invalid @enderror" type="text" name="cardholder_name" value="{{ old('cardholder_name') }}">
                                    @error('cardholder_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <p class="dis fw-bold mb-2">Card details</p>
                                <div class="d-flex align-items-center justify-content-between card-atm">
                                    <input type="text" class="form-control @error('cc_number') is-invalid @enderror" name="cc_number" id="cc_number" placeholder=" Card Details" maxlength="16" value="{{ old('cc_number') }}"> &nbsp;
                                    <div class="d-flex w-100">
                                        <input type="text" class="form-control @error('expiry_date') is-invalid @enderror" placeholder=" MM/YY" name="expiry_date" value="{{ old('expiry_date') }}"> &nbsp;
                                        <input type="password" maxlength="3" name="cvv" class="form-control @error('cvv') is-invalid @enderror" placeholder=" CVV" value="{{ old('cvv') }}">
                                    </div>
                                </div>
                                @error('cc_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('expiry_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('cvv')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="my-3 cardname">
                                    <p class="dis fw-bold mb-2">Cardholder Type</p>
                                    <input class="form-control @error('card_type') is-invalid @enderror" type="text" name="card_type" id="card_type" readonly value="{{ old('card_type') }}">
                                    @error('card_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Rest of your form -->

                                <div class="address">
                                    <!-- Other form elements -->

                                    <button class="btn btn-primary mt-2">Pay <span class="fas fa-dollar-sign px-1"></span>{{ $grandTotal }} </button>
                                </div>
                            </div>
                        </form>

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

                    <!-- Calculate Taxes -->
                    @php
                        // GST (Goods and Services Tax) - Federal Tax
                        $gstRate = 0.05; // Example GST rate (5%)
                        $gst = $total * $gstRate;

                        // PST (Provincial Sales Tax) - Adjust based on your province
                        $pstRate = 0.08; // Example PST rate (8%)
                        $pst = $total * $pstRate;

                        // Total with Taxes
                        $totalWithTaxes = $total + $gst + $pst;
                    @endphp

                    <!-- Total -->
                    <div class="mt-4">
                        <table class="col-md-12">
                            <tr><td class="col-md-6"><b>Subtotal: </b></td><td>${{ number_format($total, 2) }}</td></tr>
                            <tr><td><b>GST (5%):       </b></td><td>${{ number_format($gst, 2) }}</td></tr>
                            <tr><td><b>PST (8%): </b></td><td>${{ number_format($pst, 2) }}</td></tr>
                            <tr><td><b>Total with Taxes: </b></td><td>${{ number_format($totalWithTaxes, 2) }}</td></tr>
                        </table>
                        
                    </div>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
                            

    </div>
</div>


@endsection
