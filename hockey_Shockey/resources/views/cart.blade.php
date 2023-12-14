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
<div class="section">
  <div class="container">
    <div class="row">
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
          <div class="col-md-4 col-6">
            <div class="product">
              <div class="product_img">
                <a href="shop-product-detail.html">
                  <img src="assets/images/product_img2.jpg" alt="product_img2">
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
                <h6 class="product_title"><a href="shop-product-detail.html">Lether Gray Tuxedo</a></h6>
                <div class="product_price">
                  <span class="price">$55.00</span>
                  <del>$95.00</del>
                  <div class="on_sale">
                    <span>25% Off</span>
                  </div>
                </div>
                <div class="rating_wrap">
                  <div class="rating">
                    <div class="product_rate" style="width:68%"></div>
                  </div>
                  <span class="rating_num">(15)</span>
                </div>
                <div class="pr_desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id
                    varius nunc id varius nunc.</p>
                </div>
                <div class="pr_switch_wrap">
                  <div class="product_color_switch">
                    <span class="active" data-color="#847764" style="background-color: rgb(132, 119, 100);"></span>
                    <span data-color="#0393B5" style="background-color: rgb(3, 147, 181);"></span>
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
          <div class="col-md-4 col-6">
            <div class="product">
              <span class="pr_flash">New</span>
              <div class="product_img">
                <a href="shop-product-detail.html">
                  <img src="assets/images/product_img3.jpg" alt="product_img3">
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
                <h6 class="product_title"><a href="shop-product-detail.html">woman full sliv dress</a></h6>
                <div class="product_price">
                  <span class="price">$68.00</span>
                  <del>$99.00</del>
                </div>
                <div class="rating_wrap">
                  <div class="rating">
                    <div class="product_rate" style="width:87%"></div>
                  </div>
                  <span class="rating_num">(25)</span>
                </div>
                <div class="pr_desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id
                    varius nunc id varius nunc.</p>
                </div>
                <div class="pr_switch_wrap">
                  <div class="product_color_switch">
                    <span class="active" data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                    <span data-color="#7C502F" style="background-color: rgb(124, 80, 47);"></span>
                    <span data-color="#2F366C" style="background-color: rgb(47, 54, 108);"></span>
                    <span data-color="#874A3D" style="background-color: rgb(135, 74, 61);"></span>
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
          <div class="col-md-4 col-6">
            <div class="product">
              <div class="product_img">
                <a href="shop-product-detail.html">
                  <img src="assets/images/product_img4.jpg" alt="product_img4">
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
                <h6 class="product_title"><a href="shop-product-detail.html">light blue Shirt</a></h6>
                <div class="product_price">
                  <span class="price">$69.00</span>
                  <del>$89.00</del>
                  <div class="on_sale">
                    <span>20% Off</span>
                  </div>
                </div>
                <div class="rating_wrap">
                  <div class="rating">
                    <div class="product_rate" style="width:70%"></div>
                  </div>
                  <span class="rating_num">(22)</span>
                </div>
                <div class="pr_desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id
                    varius nunc id varius nunc.</p>
                </div>
                <div class="pr_switch_wrap">
                  <div class="product_color_switch">
                    <span class="active" data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                    <span data-color="#A92534" style="background-color: rgb(169, 37, 52);"></span>
                    <span data-color="#B9C2DF" style="background-color: rgb(185, 194, 223);"></span>
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
          <div class="col-md-4 col-6">
            <div class="product">
              <div class="product_img">
                <a href="shop-product-detail.html">
                  <img src="assets/images/product_img5.jpg" alt="product_img5">
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
                <h6 class="product_title"><a href="shop-product-detail.html">blue dress for woman</a></h6>
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
                    <span data-color="#5FB7D4" style="background-color: rgb(95, 183, 212);"></span>
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
          <div class="col-md-4 col-6">
            <div class="product">
              <span class="pr_flash bg-danger">Hot</span>
              <div class="product_img">
                <a href="shop-product-detail.html">
                  <img src="assets/images/product_img6.jpg" alt="product_img6">
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
                <h6 class="product_title"><a href="shop-product-detail.html">Blue casual check shirt</a></h6>
                <div class="product_price">
                  <span class="price">$55.00</span>
                  <del>$95.00</del>
                  <div class="on_sale">
                    <span>25% Off</span>
                  </div>
                </div>
                <div class="rating_wrap">
                  <div class="rating">
                    <div class="product_rate" style="width:68%"></div>
                  </div>
                  <span class="rating_num">(15)</span>
                </div>
                <div class="pr_desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id
                    varius nunc id varius nunc.</p>
                </div>
                <div class="pr_switch_wrap">
                  <div class="product_color_switch">
                    <span class="active" data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span>
                    <span data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
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
          <div class="col-md-4 col-6">
            <div class="product">
              <span class="pr_flash bg-success">Sale</span>
              <div class="product_img">
                <a href="shop-product-detail.html">
                  <img src="assets/images/product_img7.jpg" alt="product_img7">
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
                <h6 class="product_title"><a href="shop-product-detail.html">white black line dress</a></h6>
                <div class="product_price">
                  <span class="price">$68.00</span>
                  <del>$99.00</del>
                  <div class="on_sale">
                    <span>20% Off</span>
                  </div>
                </div>
                <div class="rating_wrap">
                  <div class="rating">
                    <div class="product_rate" style="width:87%"></div>
                  </div>
                  <span class="rating_num">(25)</span>
                </div>
                <div class="pr_desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id
                    varius nunc id varius nunc.</p>
                </div>
                <div class="pr_switch_wrap">
                  <div class="product_color_switch">
                    <span class="active" data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                    <span data-color="#7C502F" style="background-color: rgb(124, 80, 47);"></span>
                    <span data-color="#2F366C" style="background-color: rgb(47, 54, 108);"></span>
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
          <div class="col-md-4 col-6">
            <div class="product">
              <div class="product_img">
                <a href="shop-product-detail.html">
                  <img src="assets/images/product_img8.jpg" alt="product_img8">
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
                <h6 class="product_title"><a href="shop-product-detail.html">Men blue jins Shirt</a></h6>
                <div class="product_price">
                  <span class="price">$69.00</span>
                  <del>$89.00</del>
                  <div class="on_sale">
                    <span>20% Off</span>
                  </div>
                </div>
                <div class="rating_wrap">
                  <div class="rating">
                    <div class="product_rate" style="width:70%"></div>
                  </div>
                  <span class="rating_num">(22)</span>
                </div>
                <div class="pr_desc">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id
                    varius nunc id varius nunc.</p>
                </div>
                <div class="pr_switch_wrap">
                  <div class="product_color_switch">
                    <span class="active" data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
                    <span data-color="#444653" style="background-color: rgb(68, 70, 83);"></span>
                    <span data-color="#B9C2DF" style="background-color: rgb(185, 194, 223);"></span>
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
          <div class="col-md-4 col-6">
            <div class="product">
              <div class="product_img">
                <a href="shop-product-detail.html">
                  <img src="assets/images/product_img9.jpg" alt="product_img9">
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
                <h6 class="product_title"><a href="shop-product-detail.html">T-Shirt Form Girls</a></h6>
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
                    <span class="active" data-color="#B5B6BB" style="background-color: rgb(181, 182, 187);"></span>
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
            <h5 class="widget_title">Filter</h5>
            <div class="filter_price">
              <div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300"
                data-price-sign="$" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 10%; width: 50%;"></div><span
                  tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 10%;"></span><span
                  tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span>
              </div>
              <div class="price_range">
                <span>Price: <span id="flt_price">$50 - $300</span></span>
                <input type="hidden" id="price_first">
                <input type="hidden" id="price_second">
              </div>
            </div>
          </div>
          <div class="widget">
            <h5 class="widget_title">Brand</h5>
            <ul class="list_brand">
              <li>
                <div class="custome-checkbox">
                  <input class="form-check-input" type="checkbox" name="checkbox" id="Arrivals" value="">
                  <label class="form-check-label" for="Arrivals"><span>New Arrivals</span></label>
                </div>
              </li>
              <li>
                <div class="custome-checkbox">
                  <input class="form-check-input" type="checkbox" name="checkbox" id="Lighting" value="">
                  <label class="form-check-label" for="Lighting"><span>Lighting</span></label>
                </div>
              </li>
              <li>
                <div class="custome-checkbox">
                  <input class="form-check-input" type="checkbox" name="checkbox" id="Tables" value="">
                  <label class="form-check-label" for="Tables"><span>Tables</span></label>
                </div>
              </li>
              <li>
                <div class="custome-checkbox">
                  <input class="form-check-input" type="checkbox" name="checkbox" id="Chairs" value="">
                  <label class="form-check-label" for="Chairs"><span>Chairs</span></label>
                </div>
              </li>
              <li>
                <div class="custome-checkbox">
                  <input class="form-check-input" type="checkbox" name="checkbox" id="Accessories" value="">
                  <label class="form-check-label" for="Accessories"><span>Accessories</span></label>
                </div>
              </li>
            </ul>
          </div>
          <div class="widget">
            <h5 class="widget_title">Size</h5>
            <div class="product_size_switch">
              <span>xs</span>
              <span>s</span>
              <span>m</span>
              <span>l</span>
              <span>xl</span>
              <span>2xl</span>
              <span>3xl</span>
            </div>
          </div>
          <div class="widget">
            <h5 class="widget_title">Color</h5>
            <div class="product_color_switch">
              <span data-color="#87554B" style="background-color: rgb(135, 85, 75);"></span>
              <span data-color="#333333" style="background-color: rgb(51, 51, 51);"></span>
              <span data-color="#DA323F" style="background-color: rgb(218, 50, 63);"></span>
              <span data-color="#2F366C" style="background-color: rgb(47, 54, 108);"></span>
              <span data-color="#B5B6BB" style="background-color: rgb(181, 182, 187);"></span>
              <span data-color="#B9C2DF" style="background-color: rgb(185, 194, 223);"></span>
              <span data-color="#5FB7D4" style="background-color: rgb(95, 183, 212);"></span>
              <span data-color="#2F366C" style="background-color: rgb(47, 54, 108);"></span>
            </div>
          </div>
          <div class="widget">
            <div class="shop_banner">
              <div class="banner_img overlay_bg_20">
                <img src="assets/images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
              </div>
              <div class="shop_bn_content2 text_white">
                <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
