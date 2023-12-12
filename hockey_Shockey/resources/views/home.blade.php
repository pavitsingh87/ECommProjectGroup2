@extends('layouts.main')


@section('content')
  <!-- Header-->
  <div class="container-fluid mt-3" style="margin:0px;padding:0px">
    <img class="container-fluid"  style="margin:0px;padding:0px" src="images/bannerHome.png" alt="Banner Home">
  </div>
  <!-- Section-->
  <section class="products py-5">
    <div class="container px-4 px-lg-5">
      <h2 class="fs-1 align-items-center justify-content-center p-3 row"><span></span>Our Products<span></span></h2>
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">
      @if ($products !== null)
      @foreach ($products as $product)
          <div class="col mb-5">
              <div class="card border-top-0 shadow:hover h-100">
                  <!-- Product image -->
                  <img class="card-img-top" src="{{ $product->product_image }}" alt="{{ $product->product_name }}" />
                  
                  <!-- Product details -->
                  <div class="card-body p-4">
                      <div class="text-center">
                          <!-- Product name -->
                          <h5 class="fw-bolder">{{ $product->product_name }}</h5>
                          
                          <!-- Product price -->
                          ${{ $product->price }}
                      </div>
                  </div>
                  
                  <!-- Product actions -->
                  <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                      <div class="text-center">
                          <a class="btn btn-primary btn-outline-white mt-auto" href="#">Add to cart</a>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach

        @endif
        
      </div>
    </div>
  </section>
  
@endsection