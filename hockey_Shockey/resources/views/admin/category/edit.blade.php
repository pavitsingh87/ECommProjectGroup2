<!-- resources/views/admin/categories/edit.blade.php -->

@extends('layouts.adminpanel')

@section('content')
    <div class="container">
        <h2>Edit Category</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Category Name:</label>
                <input type="text" class="form-control" id="name" name="pct_name" value="{{ $category->pct_name }}" required>
            </div>

            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
