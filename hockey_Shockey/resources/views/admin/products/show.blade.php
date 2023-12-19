@extends('layouts.adminpanel')

@section('content')

<div class="container mt-4">
    <div class="row">

            <div class="col-md-4">
                <img class="img-fluid rounded" src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image">
            </div>

            <div class="col-md-8">
                <h1>{{ $product->product_name }}</h1>

                <div class="mb-4">
                    <strong>Short Description:</strong>
                    <p>{{ $product->short_description }}</p>
                </div>

                <div class="mb-4">
                    <strong>Long Description:</strong>
                    <p>{{ $product->product_description }}</p>
                </div>

                <div class="mb-4">
                    <strong>Product Category</strong>
                    <p>{{ $product->productCategoryType->pct_name ?? 'N/A' }}</p>
                </div>
                
                <div class="mb-4">
                    <strong>Price:</strong>
                    <p>${{ $product->price }}</p>
                </div>

                <div class="mb-4">
                    <strong>Status:</strong>
                    <p>{{ $product->availability_status }}</p>
                </div>

                <div class="mb-4">
                    <strong>Created At:</strong>
                    <p>{{ $product->created_at }}</p>
                </div>

                <div class="mb-4">
                    <strong>Updated At:</strong>
                    <p>{{ $product->updated_at }}</p>
                </div>

            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back to Product List</a>
        </div>
    </div>
</div>
@endsection()