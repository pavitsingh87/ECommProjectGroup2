@extends('layouts.main')

@section('content')

<section class="section products-page py-5 ">
  <div class="container">
    <div class="row">
      <!-- sidebar -->
      <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
        <div class="sidebar">
          <div class="widget">
            <h3 class="widget_title">Categories</h3>
            <ul class="widget_categories">
              @foreach($categories as $category)
              <li>
                <a class="categories_name" href="{{ route('products.index', ['category' => $category->id]) }}"
                  class="text-dark">
                  <i class="bi bi-caret-right-fill btn-primary"></i>
                  <span class="categories_name">{{
                    $category->pct_name }}</span>
                  <span class="categories_num">({{$category->products_count}})</span></a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="widget">
            <div class="shop_banner">
              <div class="banner_img overlay_bg_20">
                <img src="/images/promotion.webp" alt="sidebar_banner_img">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row align-items-center mb-4 pb-1">
          <div class="col-12">
            <div class="product_header">
              <div class="product_header_left">
                <div class="custom_select">
                  <form method="post" action="{{ route('products.index') }}">
                    @csrf
                    <select name="orderBy"
                      class="form-control form-control-sm form-select d-inline-block w-auto border pt-1"
                      onchange="this.form.submit()">
                      <option value="default" {{ $orderBy=='default' ? 'selected' : '' }}>Default Sorting</option>
                      <option value="priceHighToLow" {{ $orderBy=='priceHighToLow' ? 'selected' : '' }}>Price: High to
                        Low
                      </option>
                      <option value="priceLowToHigh" {{ $orderBy=='priceLowToHigh' ? 'selected' : '' }}>Price: Low to
                        High
                      </option>
                    </select>
                  </form>
                </div>
              </div>
              <div class="product_header_right">
                <div class="products_view">
                  <h3 class="d-block py-2">{{ $products->total() }} Items found</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          @forelse($products as $product)
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
                <!-- <a href="#!" class="btn btn-primary shadow-0 me-1">Add to cart</a> -->
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
          @empty
          <div class="col-12">
            <p>No products available.</p>
          </div>
          @endforelse

        </div>
        <div class="pagination justify-content-center mt-3">
          {{ $products->links('pagination::bootstrap-5') }}
        </div>

</section>

@endsection
