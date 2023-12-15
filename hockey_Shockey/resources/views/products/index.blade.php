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
          {{ $products->links() }}
        </div>

      </div>
    </div>
  </div>
</section>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
        <div class="sidebar">
          <div class="widget">
            <h5 class="widget_title">Categories</h5>
            <ul class="widget_categories">
              <li><a href="#"><span class="categories_name">Women</span><span class="categories_num">(9)</span></a></li>
              <li><a href="#"><span class="categories_name">Top</span><span class="categories_num">(6)</span></a></li>
              <li><a href="#"><span class="categories_name">T-Shirts</span><span class="categories_num">(4)</span></a>
              </li>
              <li><a href="#"><span class="categories_name">Men</span><span class="categories_num">(7)</span></a></li>
              <li><a href="#"><span class="categories_name">Shoes</span><span class="categories_num">(12)</span></a>
              </li>
            </ul>
          </div>
          <div class="widget">
            <div class="shop_banner">
              <div class="banner_img overlay_bg_20">
                <img src="/images/promotion.webp" alt="sidebar_banner_img">
              </div>
              <div class="shop_bn_content2 text_white">
                <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                <a href="/product" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
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
                  <select class="form-control form-control-sm">
                    <option value="order">Default sorting</option>
                    <option value="popularity">Sort by popularity</option>
                    <option value="date">Sort by newness</option>
                    <option value="price">Sort by price: low to high</option>
                    <option value="price-desc">Sort by price: high to low</option>
                  </select>
                </div>
              </div>
              <div class="product_header_right">
                <div class="products_view">
                  <a href="javascript:;" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                  <a href="javascript:;" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                </div>
                <div class="custom_select">
                  <select class="form-control form-control-sm first_null not_chosen">
                    <option value="">Showing</option>
                    <option value="9">9</option>
                    <option value="12">12</option>
                    <option value="18">18</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row shop_container list">
          <div class="col-md-4 col-6">
            <div class="product">
              <div class="product_img">
                <a href="shop-product-detail.html">
                  <img src="assets/images/product_img1.jpg" alt="product_img1">
                </a>
                <div class="product_action_box">
                  <ul class="list_none pr_action_btn">
                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                    <li><a href="#"><i class="icon-heart"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="product_info">
                <h6 class="product_title"><a href="shop-product-detail.html">Blue Dress For Woman</a></h6>
                <div class="product_price">
                  <span class="price">$45.00</span>
                  <del>$55.25</del>
                  <div class="on_sale">
                    <span>35% Off</span>
                  </div>
                </div>
                <div class="rating_wrap">
                  <div class="rating">
                    <div class="product_rate" style="width:80%"></div>
                  </div>
                  <span class="rating_num">(21)</span>
                </div>
                <div class="pr_desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id
                    varius nunc id varius nunc.</p>
                </div>
                <div class="pr_switch_wrap">
                  <div class="product_color_switch">
                    <span class="active" data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span>
                    <span data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                    <span data-color="#DA323F" style="background-color: rgb(218, 50, 63);"></span>
                  </div>
                </div>
                <div class="list_product_action_box">
                  <ul class="list_none pr_action_btn">
                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                    <li><a href="#"><i class="icon-heart"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <ul class="pagination mt-3 justify-content-center pagination_style1">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
