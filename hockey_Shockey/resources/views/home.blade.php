@extends('layouts.main')


@section('content')
<!-- Header-->
<div class="container-fluid mt-3" style="margin:0px;padding:0px">
  <img class="container-fluid" style="margin:0px;padding:0px" src="images/bannerHome.png" alt="Banner Home">
</div>
<!-- Section-->
<section class="products py-5">
  <div class="container px-4 px-lg-5">
    <h2 class="fs-1 align-items-center justify-content-center p-3 row"><span></span>Our Products<span></span></h2>
    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-3 justify-content-center d-flex">
      @if ($products !== null)
      @foreach ($products as $product)
      <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 border-top-0  text-center shadow:hover">
          <a
            href="{{ route('products.show', ['category' => $product->productCategoryType->pct_name, 'name' => $product->product_name]) }}">
            <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}"
              class="card-img-top" />
            <div class="card-body d-flex align-items-cente flex-wrap">
              <div class="d-flex flex-row justify-content-center align-items-center">
                <h5 class="m-0">${{ $product->price }}</h5>
              </div>
              <!-- WishList View -->
              <form method="post" action="{{ route('wishlist.store', ['productId' => $product->product_id]) }}">
                @csrf
                <button type="submit" class="btn btn-link text-danger heart-icon">
                  <i class="bi bi-heart"></i>
                </button>
              </form>
              <p class="w-100 text-start card-text">{{ $product->product_name }}</p>
            </div>
          </a>
          <div class="card-footer w-100 d-flex align-items-end p-3 mt-auto">
            <div class="add_quick_wrapper w-100 d-flex justify-content-around">
              <!-- Add to cart -->
              <div class="product_add_to_cart text-center">
                <a class="btn btn-primary btn-outline-white mt-auto" href="add-to-cart/{{ $product->product_id }}"
                  data-id="{{ $product->product_id }}"> Add to
                  Cart</a>
              </div>
              <!-- Quick View -->
              <div class="product_quick_view text-center">
                <a class="btn btn-warning"
                  href="{{ route('products.show', ['category' => $product->productCategoryType->pct_name, 'name' => $product->product_name]) }}">
                  Quick View</a>
              </div>
            </div>

          </div>
        </div>
      </div>
      @endforeach

      @endif

    </div>
  </div>

  <div class="container">
    <div class="row g-0">
      <div class="col-lg-4">
        <div class="icon_box icon_box_style1">
          <div class="icon mb-4">
            <i class="bi bi-truck"></i>
          </div>
          <div class="icon_box_content">
            <h5>Free Delivery</h5>
            <p>If you are going to use of Lorem, you need to be sure there anything</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="icon_box icon_box_style1">
          <div class="icon mb-4">
            <i class="bi bi-cash-coin"></i>
          </div>
          <div class="icon_box_content">
            <h5>30 Day Return</h5>
            <p>If you are going to use of Lorem, you need to be sure there anything</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="icon_box icon_box_style1">
          <div class="icon mb-4">
            <i class="bi bi-clock"></i>
          </div>
          <div class="icon_box_content">
            <h5>27/4 Support</h5>
            <p>If you are going to use of Lorem, you need to be sure there anything</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                        <form method="post" action="{{ route('subscribe') }}" >
                        @csrf
                            <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email">
                                <span class="input-group-btn">
                                    <button class="btn btn-newsletter" type="submit">Subscribe Now</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
