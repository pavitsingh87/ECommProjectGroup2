@extends('layouts.main')

@section('content')
    
    <div class="container">
        <div class="row p-4">
            <!-- Sidebar -->
            <div class="col-md-3 mt-5 ">
                <div class="list-group d-flex flex-column">
                    <a href="/edituserprofile" class="list-group-item list-group-item-action">Edit Profile</a>
                    <a href="#" class="list-group-item list-group-item-action">My Orders</a>
                    <a href="/wishlist" class="list-group-item list-group-item-action">My Wishlist</a>
                    <a href="{{ route('change-password') }}" class="list-group-item list-group-item-action">Change
                        Password</a>
                </div>
            </div>

            <div class="col-md-9">
                <h2 class="heading">My Wishlist</h2>
                    <div class="row">
                        @forelse($wishlistItems as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-4 d-flex wishlist">
                                <div class="card w-100 my-2 border-top-0 text-center">
                                    <a href="{{ route('products.show', ['category' => $item->product->productCategoryType->pct_name, 'name' => $item->product->product_name]) }}" class="no_link_style">
                                        <img src="{{ asset('storage/' . $item->product->product_image) }}" alt="{{ $item->product->product_name }}" class="card-img-top" />

                                        <div class="card-body d-flex flex-wrap align-items-center">
                                            <div class="d-flex flex-row justify-content-center align-items-center">
                                                <h5 class="m-0">${{ $item->product->price }}</h5>

                                                <!-- Wishlist View -->
                                                @if(auth()->check() && auth()->user()->wishlist->contains('product_id', $item->product->product_id))

                                                    <!-- If product is in wishlist, show filled heart -->
                                                    <form method="post" action="{{ route('wishlist.destroy', $item->id) }}" class="ms-2" onsubmit="return confirm('Are you sure you want to remove this item from the wishlist?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger heart-icon">
                                                            <i class="bi bi-heart-fill" style="font-size: 1.5rem;"></i>
                                                        </button>
                                                    </form>
                                                
                                            
                                                @endif
                                            </div>

                                            <div class="w-100 card-text">{{ $item->product->product_name }}</div>
                                        </div>
                                    </a>

                                    <div class="card-footer w-100 d-flex justify-content-around p-3 mt-auto">
                                        <!-- Add to cart -->
                                        <div class="product_add_to_cart text-center">
                                            <a href="add-to-cart/{{ $item->product->product_id }}" 
                                            data-id="{{ $item->product->product_id }}"  
                                            class="btn btn-primary btn-outline-white mt-auto" 
                                            title="Add to Cart">
                                                Add to Cart
                                            </a>
                                        </div>
                                        <!-- Quick View -->
                                        <div class="product_quick_view text-center">
                                            <a href="{{ route('products.show', ['category' => $item->product->productCategoryType->pct_name, 'name' => $item->product->product_name]) }}" 
                                            class="btn btn-warning" 
                                            title="Quick View">
                                                Quick View
                                            </a>
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
