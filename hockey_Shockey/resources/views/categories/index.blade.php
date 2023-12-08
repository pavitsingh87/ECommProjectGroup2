
@extends('layouts.app')

@section('content')
    <h2>Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}
                <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
