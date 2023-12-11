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
        <label for="product_description">Product Long Description</label>
        <textarea name="product_description" id="product_description" class="form-control" required>{{ old('product_description', $product->product_description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="short_description">Product Short Description</label>
        <textarea name="short_description" id="short_description" class="form-control" required>{{ old('short_description', $product->short_description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="product_category_type_id">Product Category</label>
        <select name="product_category_type_id" id="product_category_type_id" class="form-control" required>
            @foreach($productCategories as $category)
                <option value="{{ $category->id }}" @if($category->id == $product->product_category_type_id) selected @endif>{{ $category->pct_name }}</option>
            @endforeach
        </select>
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

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
</div>
@endsection()