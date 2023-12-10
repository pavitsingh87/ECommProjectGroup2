@extends('layouts.main')

@section('content')

<div class="container">
<h1>Edit Product</h1>

<form action="{{ route('products.update', $product->product_id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" id="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}" required>
    </div>

    <div class="form-group">
        <label for="product_description">Product Description</label>
        <textarea name="product_description" id="product_description" class="form-control" required>{{ old('product_description', $product->product_description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="product_image">Product Image</label>
        <input type="text" name="product_image" id="product_image" class="form-control" value="{{ old('product_image', $product->product_image) }}" required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
    </div>

    <div class="form-group">
        <label for="availability_status">Availability Status</label>
        <select name="availability_status" id="availability_status" class="form-control" required>
            <option value="available" {{ old('availability_status', $product->availability_status) === 'available' ? 'selected' : '' }}>Available</option>
            <option value="out_of_stock" {{ old('availability_status', $product->availability_status) === 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
        </select>
    </div>

    <div class="form-group">
        <label for="pct_id">Pct ID</label>
        <input type="number" name="pct_id" id="pct_id" class="form-control" value="{{ old('pct_id', $product->pct_id) }}" required>
    </div>

    <div class="form-group">
        <label for="i_id">I ID</label>
        <input type="number" name="i_id" id="i_id" class="form-control" value="{{ old('i_id', $product->i_id) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
</div>
@endsection()