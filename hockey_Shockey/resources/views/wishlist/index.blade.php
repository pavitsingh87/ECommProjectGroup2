@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row p-4">
    @include('layouts.partials.sidebarProfile')

    <div class="col-md-9">
      <h2 class="heading pb-4">My Wishlist</h2>
      <div class="row wishlist">
        @forelse($wishlistItems as $item)
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <a href="{{ route('products.show', ['category' => $item->product->productCategoryType->pct_name, 'name' => $item->product->product_name]) }}"
                class="no_link_style">
                <img src="{{ asset('storage/' . $item->product->product_image) }}"
                  alt="{{ $item->product->product_name }}" class="img-fluid rounded-start" />
              </a>
            </div>
            <div class="col-md-8">
              <a href="{{ route('products.show', ['category' => $item->product->productCategoryType->pct_name, 'name' => $item->product->product_name]) }}"
                class="no_link_style">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->product->product_name }}</h5>
                  <p class="card-text">{{ $item->product->product_description }}</p>
                  <p class="card-text">${{ $item->product->price }}</p>
                  <p class="card-text">
                    <small class="text-muted">Last updated {{ $item->product->updated_at->format('Y-m-d') }}</small>
                  </p>
                </div>
              </a>
              <div class="card-footer d-flex justify-content-start align-items-center gap-3">
                <!-- Add to cart -->
                <div class="product_add_to_cart text-center">
                  <a href="add-to-cart/{{ $item->product->product_id }}" data-id="{{ $item->product->product_id }}"
                    class="btn btn-success" title="Add to cart">
                    <i class="bi bi-cart"></i>
                  </a>
                </div>

                <!-- Remove from Wishlist -->
                <form method="post" action="{{ route('wishlist.destroy', $item->id) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" title="Remove from wishlist"><i
                      class="bi bi-x-lg"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12">
          <p>Your wishlist is empty.</p>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</div>

@endsection
