@extends('layouts.main')

@section('content')

<div class="container page my-5">
  {{-- Display an error message if it exists in the session --}}
  @if (Session::has('error'))
  <p class="alert alert-danger">{{ Session::get('error') }}</p>
  @endif
  <span id="status"></span>

  {{-- Display the shopping cart table --}}
  <table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%" class="bg-light">Product</th>
        <th style="width:10%" class="bg-light">Price</th>
        <th style="width:8%" class="bg-light">Quantity</th>
        <th style="width:22%" class="text-center bg-light">Subtotal</th>
        <th style="width:10%" class="bg-light"></th>
      </tr>
    </thead>
    <tbody>

      <?php $total = 0 ?>

      {{-- Iterate through the items in the cart --}}
      @foreach((array) session('cart') as $id => $details)

      <?php $total += $details['price'] * $details['quantity'] ?>
      <tr>
        <td data-th="Product" class="align-middle">
          <div class="row">

            <div class="col-sm-3 hidden-xs">
              {{-- Display the product image --}}
              <img src="{{ asset('storage/' . $details['product_image']) }}" alt="{{ $details['product_image'] }}" width="100"
                height="100" class="img-responsive" />
            </div>

            <div class="col-sm-9 align-middle">
              {{-- Display the product name --}}
              <h4 class="mt-3">{{$details['product_name']}}</h4>
            </div>
          </div>
        </td>
        {{-- Display the product price --}}
        <td data-th="Price">{{$details['price']}}</td>
        <td data-th="Quantity">
          {{-- Display and allow the user to update the quantity --}}
          <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" data-id="{{ $id }}" />
        </td>
        <td data-th="Subtotal" class="text-center">$<span class="product-subtotal">{{ $details['price'] *
            $details['quantity'] }}</span></td>
        <td class="actions" data-th="">
          {{-- Button to remove the product from the cart --}}
          <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
              class="bi bi-trash"></i></button>
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr class="visible-xs">
        <td colspan="5" class="text-right"><strong><span class="message text-danger"></span></strong></td>
      </tr>
      {{-- Display the total price and checkout buttons --}}
      <tr>
        <td colspan="5" class="text-right"><strong>Total $<span class="cart-total">{{ $total }}</span></strong></td>
      </tr>
      <tr>
        <td><a href="{{ url('/product') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
            Shopping</a></td>
        <td colspan="3" class="hidden-xs"></td>
        <td><a href="" class="btn btn-primary"> Checkout</a></td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection
