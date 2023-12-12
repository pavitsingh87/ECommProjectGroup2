<!-- resources/views/admin/taxes/index.blade.php -->

@extends('layouts.adminpanel')

@section('content')

<div class="container">
    <h1>Tax List</h1>
    <a href="{{ route('admin.taxes.create') }}" class="btn btn-success">Add Tax</a>

    @if (count($taxes) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Province</th>
                    <th>GST</th>
                    <th>PST</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taxes as $tax)
                    <tr>
                        <td>{{ $tax->id }}</td>
                        <td>{{ $tax->province }}</td>
                        <td>{{ $tax->gst }}</td>
                        <td>{{ $tax->pst }}</td>
                        <td>
                            <a href="{{ route('admin.taxes.show', $tax->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.taxes.edit', $tax->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.taxes.destroy', $tax->id) }}" method="POST" style="display:inline;">
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
        <p>No taxes available.</p>
    @endif

</div>

@endsection
