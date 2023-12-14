@extends('layouts.main')

@section('content')

<section class="wishlist-page py-5">
    <div class="container">
        <h2>My Wishlist</h2>

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
</section>

@endsection
