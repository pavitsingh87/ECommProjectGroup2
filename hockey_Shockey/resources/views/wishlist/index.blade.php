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

                                <div class="card h-100 w-100 my-2 border-top-0  text-center">
                            
                                    <a href="{{ route('products.show', ['category' => $item->product->productCategoryType->pct_name, 'name' => $item->product->product_name]) }}" class="no_link_style">
                                        <img  src="{{ asset('storage/' . $item->product->product_image) }}" alt="{{ $item->product->product_name }}" class="card-img-top" />
                                    
                                        <div class="card-body">
                                            <p class="card-text">{{ $item->product->product_description }}</p>
                                            <div class=" d-flex justify-content-between align-items-center">
                                                <h5 class="card-title">{{ $item->product->product_name }}</h5>
                                                <p class="card-text">${{ $item->product->price }}</p>
                                            </div>   
                                        </div>
                                    </a>
                                
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <!-- Add to cart -->
                                        <div class="product_add_to_cart text-center">
                                            <a href="add-to-cart/{{ $item->product->product_id }}" data-id="{{ $item->product->product_id }}"  class="btn btn-success" >
                                                <i class="bi bi-cart"></i>
                                            </a>
                                        </div>

                                        <!-- Remove from Wishlist -->
                                        <form method="post" action="{{ route('wishlist.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                                        </form>
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
