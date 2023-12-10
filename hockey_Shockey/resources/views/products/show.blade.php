@extends('layouts.main')

@section('content')

<div class="container">
    <h1>{{ $product->product_name }}</h1>

    <div>
        <strong>Description:</strong>
        <p>{{ $product->product_description }}</p>
    </div>

    <div>
        <strong>Image:</strong>
        <img src="{{ $product->product_image }}" alt="{{ $product->product_name }}" width="300">
    </div>

    <div>
        <strong>Size:</strong>
        <p>{{ $product->product_size ?: 'N/A' }}</p>
    </div>

    <div>
        <strong>Price:</strong>
        <p>${{ $product->price }}</p>
    </div>

    <div>
        <strong>Status:</strong>
        <p>{{ $product->availability_status }}</p>
    </div>

    <div>
        <strong>Pct ID:</strong>
        <p>{{ $product->pct_id }}</p>
    </div>

    <div>
        <strong>I ID:</strong>
        <p>{{ $product->i_id }}</p>
    </div>

    <div>
        <strong>Created At:</strong>
        <p>{{ $product->created_at }}</p>
    </div>

    <div>
        <strong>Updated At:</strong>
        <p>{{ $product->updated_at }}</p>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Product List</a>
</div>
@endsection()