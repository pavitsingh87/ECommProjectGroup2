<!-- resources/views/admin/taxes/show.blade.php -->

@extends('layouts.adminpanel')

@section('content')

<div class="container">
    <h1>{{ $tax->province }}</h1>

    <div>
        <strong>Province:</strong>
        <p>{{ $tax->province }}</p>
    </div>

    <div>
        <strong>GST:</strong>
        <p>{{ $tax->gst }}</p>
    </div>

    <div>
        <strong>PST:</strong>
        <p>{{ $tax->pst }}</p>
    </div>

    <div>
        <strong>Created At:</strong>
        <p>{{ $tax->created_at }}</p>
    </div>

    <div>
        <strong>Updated At:</strong>
        <p>{{ $tax->updated_at }}</p>
    </div>

    <a href="{{ route('admin.taxes.index') }}" class="btn btn-primary">Back to Tax List</a>
</div>

@endsection
