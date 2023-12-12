@extends('layouts.adminpanel')

@section('content')

<div class="container">
    <h1>{{ $product->product_name }}</h1>

    <div>
        <strong>Short Description:</strong>
        <p>{{ $product->short_description }}</p>
    </div>

    <div>
        <strong>Long Description:</strong>
        <p>{{ $product->product_description }}</p>
    </div>

    <div>
        <strong>Product Category</strong>
        <p>{{ $product->productCategoryType->pct_name ?? 'N/A' }}</p>
    </div>

    <div>
        <strong>Image:</strong>
        <p>                           <img class="card-img-top" src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image">
</p>
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
        <strong>Created At:</strong>
        <p>{{ $product->created_at }}</p>
    </div>

    <div>
        <strong>Updated At:</strong>
        <p>{{ $product->updated_at }}</p>
    </div>

    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back to Product List</a>
</div>
@endsection()