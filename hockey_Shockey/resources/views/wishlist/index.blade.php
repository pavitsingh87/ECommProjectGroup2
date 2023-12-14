@extends('layouts.main')

@section('content')

<section class="wishlist-page py-5">
    <div class="container">
        <h2>My Wishlist</h2>

        <div class="row">
            @forelse($wishlistItems as $item) 
                <?php dd($item->product); ?>

            @empty
                <div class="col-12">
                    <p>Your wishlist is empty.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
