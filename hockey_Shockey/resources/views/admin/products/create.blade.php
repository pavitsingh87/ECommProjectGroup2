@extends('layouts.adminpanel')

@section('content')

<div class="container">
<h1>Create Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" id="product_name" class="form-control" value="{{ old('product_name') }}" required>
    </div>

    <div class="form-group">
        <label for="product_description">Product Description</label>
        <textarea name="product_description" id="product_description" class="form-control" required>{{ old('product_description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="product_category_type_id">Product Category</label>
        <select name="product_category_type_id" id="product_category_type_id" class="form-control" required>
            @foreach($productCategories as $category)
                <option value="{{ $category->id }}">{{ $category->pct_name }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="product_image">Product Image</label>
        <input type="text" name="product_image" id="product_image" class="form-control" value="{{ old('product_image') }}" required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
    </div>

    <div class="form-group">
        <label for="availability_status">Availability Status</label>
        <select name="availability_status" id="availability_status" class="form-control" required>
            <option value="available" {{ old('availability_status') === 'available' ? 'selected' : '' }}>Available</option>
            <option value="out_of_stock" {{ old('availability_status') === 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Add Product</button>
</form>
</div>
@endsection()
