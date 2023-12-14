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
                <h2 class="heading">My Profile</h2>
                    <div class="row">
                        @forelse($wishlistItems as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                                <div class="card h-100">
                                    <img src="{{ asset('storage/' . $item->product->product_image) }}" alt="{{ $item->product->product_name }}"
                                        class="card-img-top" />
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->product->product_name }}</h5>
                                        <p class="card-text">{{ $item->product->description }}</p>
                                        <p class="card-text">${{ $item->product->price }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <form method="post" action="{{ route('wishlist.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove from Wishlist</button>
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
