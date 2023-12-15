@extends('layouts.main')


@section('content')
<!-- Header Slider-->
<div id="autoPLay" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/bannerHome.png" class="d-block w-100 h-100 object-fit-cover" alt="bannerHome">
    </div>
    <div class="carousel-item">
      <img src="images/slider-1.jpg" class="d-block w-100 h-100 object-fit-cover" alt="bannerHome">
    </div>
    <div class="carousel-item">
      <img src="images/slider-2.png" class="d-block w-100 h-100 object-fit-cover" alt="bannerHome">
    </div>
    <div class="carousel-item">
      <img src="images/slider-3.jpg" class="d-block w-100 h-100 object-fit-cover" alt="bannerHome">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#autoPLay" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#autoPLay" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
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
          <div class="icon">
            <i class="flaticon-shipped"></i>
          </div>
          <div class="icon_box_content">
            <h5>Free Delivery</h5>
            <p>If you are going to use of Lorem, you need to be sure there anything</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="icon_box icon_box_style1">
          <div class="icon">
            <i class="flaticon-money-back"></i>
          </div>
          <div class="icon_box_content">
            <h5>30 Day Return</h5>
            <p>If you are going to use of Lorem, you need to be sure there anything</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="icon_box icon_box_style1">
          <div class="icon">
            <i class="flaticon-support"></i>
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

@endsection
