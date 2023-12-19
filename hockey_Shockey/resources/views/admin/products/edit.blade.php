@extends('layouts.adminpanel')

@section('content')

<div class="container">
<h1>Edit Product</h1>

<form action="{{ route('admin.products.update', $product->product_id) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group mb-4">
        <strong><label for="product_name" class="mb-1">Product Name</label></strong>
        <input type="text" name="product_name" id="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}">
        @error('product_name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-3">
        <strong><label for="product_description" class="mb-1">Product Long Description</label></strong>
        <textarea name="product_description" id="product_description" class="form-control">{{ old('product_description', $product->product_description) }}</textarea>
        @error('product_description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-3">
        <strong><label for="short_description" class="mb-1">Product Short Description</label></strong>
        <textarea name="short_description" id="short_description" class="form-control">{{ old('short_description', $product->short_description) }}</textarea>
        @error('short_description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-3">
        <strong><label for="product_category_type_id" class="mb-1">Product Category</label></strong>
        <select name="product_category_type_id" id="product_category_type_id" class="form-control">
            @foreach($productCategories as $category)
                <option value="{{ $category->id }}" @if($category->id == $product->product_category_type_id) selected @endif>{{ $category->pct_name }}</option>
            @endforeach
        </select>
        @error('product_category_type_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-3">
        <strong><label for="product_image" class="mb-1">Product Image</label></strong>
        <input type="file" name="product_image" id="product_image" class="form-control">
        <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" class="mt-2" style="max-width: 200px;">
        @error('product_image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-3">
        <strong><label for="price" class="mb-1">Price</label></strong>
        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
        @error('price')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group mb-3">
        <strong><label for="availability_status" class="mb-1">Availability Status</label></strong>
        <select name="availability_status" id="availability_status" class="form-control" required>
            <option value="available" {{ old('availability_status', $product->availability_status) === 'available' ? 'selected' : '' }}>Available</option>
            <option value="out_of_stock" {{ old('availability_status', $product->availability_status) === 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
        </select>
        @error('availability_status')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
</div>
@endsection()
