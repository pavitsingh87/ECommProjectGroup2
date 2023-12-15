@extends('layouts.main')

@section('content')

<section class="py-5">
  <div class="container px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
      <div class="col-md-6">
        <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/' . $product->product_image) }}"
          alt="{{ $product->product_name }}" />
      </div>
      <div class="col-md-6">
        <h1 class="display-5 fw-bolder">{{ $product->product_name }}</h1>
        <div class="fs-5 mb-5">
          <!-- <span class="text-decoration-line-through">${{ $product->original_price }}</span> -->
          <span>${{ $product->price }}</span>
        </div>
        <p class="lead">{{ $product->product_description }}</p>
        <div class="d-flex">
          <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1"
            style="max-width: 3rem" />
          <div class="product_add_to_cart text-center">
            <a class="btn btn-primary btn-outline-white mt-auto" href="/add-to-cart/{{ $product->product_id }}"
              data-id="{{ $product->product_id }}"> Add to
              Cart</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Related items section-->

@endsection
