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
        <div class="col mb-5">
          <div class="card border-top-0 shadow:hover h-100">
            <!-- Product image-->
            <img class="card-img-top" src="images/hockey_caps.png" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Fancy Product</h5>
                <!-- Product price-->
                $40.00 - $80.00
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-primary btn-outline-white mt-auto" href="#">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col mb-5">
          <div class="card border-top-0 h-100">
            <!-- Sale badge-->
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
            <!-- Product image-->
            <img class="card-img-top" src="images/hockey_sticks.png" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Fancy Product</h5>
                <!-- Product price-->
                $40.00 - $80.00
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-primary btn-outline-white mt-auto" href="#">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col mb-5">
          <div class="card border-top-0 h-100">
            <!-- Sale badge-->
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
            <!-- Product image-->
            <img class="card-img-top" src="images/images1_tshirt.png" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Fancy Product</h5>
                <!-- Product price-->
                $40.00 - $80.00
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-primary btn-outline-white mt-auto" href="#">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col mb-5">
          <div class="card border-top-0 shadow:hover h-100">
            <!-- Sale badge-->
            <div class="badge text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
              <img src="images/newIcon.png" >
            </div>
            <!-- Product image-->
            <img class="card-img-top" src="images/hockey_caps.png" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Fancy Product</h5>
                <!-- Product price-->
                $40.00 - $80.00
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-primary btn-outline-white mt-auto" href="products-item.html">Add to carts</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col mb-5">
          <div class="card border-top-0 h-100">
            <!-- Sale badge-->
            <div class="badge text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
              <img src="images/newIcon.png" >
            </div>
            <!-- Product image-->
            <img class="card-img-top" src="images/hockey_sticks.png" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Fancy Product</h5>
                <!-- Product price-->
                $40.00 - $80.00
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-primary btn-outline-white mt-auto" href="#">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col mb-5">
          <div class="card border-top-0 h-100">
            <!-- Sale badge-->
            <div class="badge text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
              <img src="images/newIcon.png">
            </div>
            <!-- Product image-->
            <img class="card-img-top" src="images/images1_tshirt.png" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Fancy Product</h5>
                <!-- Product price-->
                $40.00 - $80.00
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-primary btn-outline-white mt-auto" href="#">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection