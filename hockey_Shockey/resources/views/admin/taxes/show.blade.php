<!-- resources/views/admin/taxes/show.blade.php -->

@extends('layouts.adminpanel')

@section('content')

<div class="container">
    <h1>{{ $tax->province->name }}</h1>

    <div>
        <strong>Province:</strong>
        <p>{{ $tax->province->name }}</p>
    </div>

    <div>
        <strong>GST:</strong>
        <p>{{ $tax->province->gst_rate }}</p>
    </div>

    <div>
        <strong>PST:</strong>
        <p>{{ $tax->province->pst_rate }}</p>
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
