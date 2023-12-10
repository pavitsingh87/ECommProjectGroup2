<!-- create.blade.php -->

@extends('layouts.adminpanel')

@section('content')
    <div class="container">
        <h2>Add Category</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Category Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>
@endsection
