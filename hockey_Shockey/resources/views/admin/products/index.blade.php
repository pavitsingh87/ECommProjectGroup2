@extends('layouts.adminpanel')

@section('content')

<div class="container">
    <h1>Product List</h1>

    @if (count($products) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->short_description }}</td>
                        <td>{{ $product->productCategoryType->pct_name ?? 'N/A' }}</td>
                        <td>
                            <img class="card-img-top" src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" style="width:150px;">
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->availability_status }}</td>
                        <td>
                            <a href="{{ route('admin.products.show', $product->product_id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.products.edit', $product->product_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->product_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No products available.</p>
    @endif

    <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add Product</a>
</div>

@endsection()