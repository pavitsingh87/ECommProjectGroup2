<!-- resources/views/admin/taxes/edit.blade.php -->

@extends('layouts.adminpanel')

@section('content')

<div class="container">
    <h1>Edit Tax</h1>

    <form action="{{ route('admin.taxes.update', $tax->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="province">Province</label>
            <input type="text" name="province" id="province" class="form-control" value="{{ $tax->province }}" disabled>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ $tax->city }}" disabled>
        </div>

        <div class="form-group">
            <label for="gst">GST</label>
            <input type="text" name="gst" id="gst" class="form-control" value="{{ old('gst', $tax->gst) }}" required>
        </div>

        <div class="form-group">
            <label for="pst">PST</label>
            <input type="text" name="pst" id="pst" class="form-control" value="{{ old('pst', $tax->pst) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Tax</button>
    </form>
</div>

@endsection
