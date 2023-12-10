@extends('layouts.main')

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
                    <th>Image</th>
                    <th>Size</th>
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
                        <td>{{ $product->product_description }}</td>
                        <td>
                            <img src="{{ $product->product_image }}" alt="{{ $product->product_name }}" width="50">
                        </td>
                        <td>{{ $product->product_size ?? 'N/A' }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->availability_status }}</td>
                        <td>
                            <form action="{{ route('products.index', $product->product_id) }}" method="POST" style="display:inline;">
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

    <a href="{{ route('products.index') }}" class="btn btn-success">Add Product</a>
</div>

@endsection()