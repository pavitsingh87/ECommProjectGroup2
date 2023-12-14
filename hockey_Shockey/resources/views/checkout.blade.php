@extends('layouts.main')


@section('content')
<!-- resources/views/checkout.blade.php pavit -->
<div class="container">
    <div class="row">
        <!-- Left column for checkout form -->
        <div class="col-md-6"  style="background:#f2f2f2">
            <div class="col-md-12">
                <br><br>
                <form  method="post" action="{{ route('checkout.process') }}" novalidate>
                    @csrf

                    <!-- Contact Information -->
                    <h2>Contact Information</h2>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email    " required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="newsletter" value="1">
                            <label class="form-check-label" for="newsletter">Email me with news and offers</label>
                        </div>
                    </div>

                    <!-- Delivery Information -->
                    <h2>Delivery Information</h2>
                    <div class="mb-3">
                        <label for="delivery_method" class="form-label">Choose a delivery method</label>
                        <select class="form-select @error('delivery_method') is-invalid @enderror" name="delivery_method" required>
                            <option value="ship">Ship</option>
                            <!--<option value="pick_up">Pick up</option>-->
                        </select>
                        @error('delivery_method')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Shipping Address</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Country:</strong></div>
                            <div class="col-md-12">
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="" />
                                    @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <style>
                            .inline-form {
                                display: flex;
                                align-items: center;
                            }

                            .inline-form label {
                                margin-right: 10px; /* Adjust the spacing between labels and inputs */
                                width:50%;
                            }

                            .inline-form input {
                                margin-right: 30px; /* Adjust the spacing between inputs */
                            }
                        </style>
                        <div class="inline-form form-group col-md-12">
                            <div class="col-md-5">
                                <input type="text" placeholder="First Name" name="first_name" class="form-control mb-2 mr-sm-2 @error('first_name') is-invalid @enderror" value="" />
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                            <input type="text" placeholder="Last Name" name="last_name" class="form-control mb-2 mr-sm-2 @error('last_name') is-invalid @enderror" value="" />
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    
                                @enderror
                            </div>
                        </div>
                        
                        
                        

                        <div class="form-group">
                            <div class="col-md-12"><strong>Address:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror" value="" />
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="inline-form form-group mb-3">
                            <div class="col-md-3 mt-2">
                                <input type="text" placeholder="City" name="city" class="form-control mr-2 @error('city') is-invalid @enderror" value="" />
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3 mt-2">
                                <input type="text" placeholder="State" name="state" class="form-control mr-2 @error('state') is-invalid @enderror" value="" />
                                @error('state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-3 mt-2">
                                <input type="text" placeholder="Zip / Postal Code" name="zip_code" class="form-control mr-2 @error('zip_code') is-invalid @enderror" value="" />
                                @error('zip_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    
                    <button type="submit" class="btn btn-primary">Proceed to Payment</button>

                </form>
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
