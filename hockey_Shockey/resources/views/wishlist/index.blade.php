
@extends('layouts.app')

@section('content')
    <h2>Wishlist</h2>

    @forelse ($wishlistItems as $item)
        <?php dd($item->product_id); ?>
    @empty
        <p>Your wishlist is empty.</p>
    @endforelse
@endsection
