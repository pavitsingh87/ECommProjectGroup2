@extends('layouts.main')

@section('content')

<section class="h-100 h-custom" style="background-color: #d2c9ff;">
  {{-- Display an error message if it exists in the session --}}
  @if (Session::has('error'))
  <p class="alert alert-danger">{{ Session::get('error') }}</p>
  @endif
  <div class="container py-5 h-100">
    <?php $total = 0 ?>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                  </div>
                  <hr class="my-4">

                  {{-- Iterate through the items in the cart --}}
                  @foreach((array) session('cart') as $id => $details)
                  <?php $total += $details['price'] * $details['quantity'] ?>
                  <div class="item-sale row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img src="{{ asset('storage/' . $details['product_image']) }}" class="img-fluid rounded-3"
                        alt="{{ $details['product_image'] }}">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-black mb-0">{{$details['product_name']}}</h6>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2">
                      <h6 class="mb-0">{{$details['price']}}</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <div data-th="Quantity">
                        {{-- Display and allow the user to update the quantity --}}
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity"
                          data-id="{{ $id }}" />
                      </div>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2">
                      <h6 data-th="Subtotal" class="product-subtotal text-center" class="mb-0">{{ $details['price'] *
                        $details['quantity'] }}</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}" data-bs-toggle="modal"
                        data-bs-target="#itemsModal"><i class="bi bi-trash"></i></button>
                    </div>
                  </div>
                  @endforeach

                  <hr class="my-4">

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="{{ url('/product') }}" class="btn btn-primary"><i
                          class="bi bi-arrow-left me-2"></i>Back
                        to shop</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5><strong>$<span class="cart-total">{{ $total }}</span></strong></h5>
                  </div>

                  <button type="button" class="btn btn-primary" onclick="redirectToCheckout()">Checkout</button>
                  <script>
                    function redirectToCheckout() {
                        // Assuming you have a global variable in your Blade view indicating the authentication status
                        var isAuthenticated = @json(auth()->check());

                        if (isAuthenticated) {
                            // User is logged in, redirect to the checkout page
                            window.location.href = "{{ route('checkout.page') }}"; // Replace 'checkout.page' with your actual route name
                        } else {
                            // User is not logged in, redirect to the signup page
                            window.location.href = "{{ route('login') }}"; // Replace 'signup.page' with your actual signup route name
                        }
                    }
                </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="itemsModal" tabindex="-1" aria-labelledby="itemsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemsModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection
