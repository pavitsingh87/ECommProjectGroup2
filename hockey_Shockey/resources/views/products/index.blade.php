@extends('layouts.main')

@section('content')

<section class="products-page py-5 ">
  <div class="container">
    <div class="row">
      <!-- sidebar -->
      <div class="col-lg-3">
        <!-- Toggle button -->
        <button class="btn btn-outline-secondary mb-3 w-100 d-lg-none" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span>Show filter</span>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingCategories">
                <button class="accordion-button text-dark bg-light" type="button" data-mdb-toggle="collapse"
                  data-mdb-target="#panelsStayOpen-collapseCategories" aria-expanded="true"
                  aria-controls="panelsStayOpen-collapseCategories">
                  Categories
                </button>
              </h2>
              <div id="panelsStayOpen-collapseCategories" class="accordion-collapse collapse show"
                aria-labelledby="headingCategories">
                <div class="accordion-body">
                  <ul class="list-unstyled">
                    @foreach($categories as $category)
                    <li>
                      <a href="{{ route('products.index', ['category' => $category->id]) }}" class="text-dark">{{
                        $category->pct_name }}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar -->
      <!-- content -->
      <div class="col-lg-9">
        <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
          <strong class="d-block py-2">{{ $products->total() }} Items found</strong>
          <div class="ms-auto">
            <form method="post" action="{{ route('products.index') }}">
              @csrf
              <select name="orderBy" class="form-select d-inline-block w-auto border pt-1"
                onchange="this.form.submit()">
                <option value="default" {{ $orderBy=='default' ? 'selected' : '' }}>All</option>
                <option value="priceHighToLow" {{ $orderBy=='priceHighToLow' ? 'selected' : '' }}>Price: High to Low
                </option>
                <option value="priceLowToHigh" {{ $orderBy=='priceLowToHigh' ? 'selected' : '' }}>Price: Low to High
                </option>
              </select>
              <div class="btn-group shadow-0 border">
                <button type="submit" class="btn btn-light" title="List view">
                  <i class="fa fa-bars fa-lg"></i>
                </button>
                <button type="button" class="btn btn-light active" title="Grid view">
                  <i class="fa fa-th fa-lg"></i>
                </button>
              </div>
            </form>
          </div>
        </header>
        <div class="row">
          @forelse($products as $product)
          <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
            <div class="card w-100 my-2 border-top-0  text-center shadow:hover">
              <!--<a
                href="{{ route('products.show', ['category' => $product->product_category_type_id, 'name' => $product->product_name]) }}">
                click
              </a>-->

              <a
                href="{{ route('products.show', ['category' => $product->productCategoryType->pct_name, 'name' => $product->product_name]) }}">
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="card-img-top" />
                <div class="card-body d-flex flex-column">
                  <div class="d-flex flex-row justify-content-center ">
                    <h5 class="mb-1 me-1">{{ $product->price }}</h5>
                  </div>
                  <p class="card-text">{{ $product->product_name }}</p>
                </div>
              </a>
              <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                <a href="#!" class="btn btn-primary shadow-0 me-1">Add to cart</a>
                <a href="#!" class="btn btn-light border icon-hover px-2 pt-2"><i
                    class="fas fa-heart fa-lg text-secondary px-1"></i></a>
              </div>
            </div>
          </div>
          @empty
          <div class="col-12">
            <p>No products available.</p>
          </div>
          @endforelse

        </div>

        <hr />

        <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
          {{ $products->links() }}
        </nav>
      </div>
    </div>
  </div>
</section>

@endsection
