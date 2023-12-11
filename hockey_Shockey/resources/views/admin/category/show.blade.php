<!-- resources/views/admin/categories/show.blade.php -->

@extends('layouts.adminpanel')

@section('content')
    <div class="container">
        <h2>View Category</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category: {{ $category->pct_name }}</h5>

                <!-- Display other category details here -->

                <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Back to Categories</a>
            </div>
        </div>
    </div>
@endsection
