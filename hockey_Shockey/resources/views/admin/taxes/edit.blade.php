<!-- resources/views/admin/taxes/edit.blade.php -->

@extends('layouts.adminpanel')

@section('content')

<div class="container">
    <h1>Edit Tax</h1>

    <form action="{{ route('admin.taxes.update', $tax->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <strong><label for="province">Province</label></strong>
            <input type="text" name="province" id="province" class="form-control" value="{{ $tax->province->name }}">
            @error('province')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <strong><label for="gst">GST</label></strong>
            <input type="text" name="gst" id="gst" class="form-control" value="{{ old('gst', $tax->gst_rate) }}">
            @error('gst')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <strong><label for="pst">PST</label></strong>
            <input type="text" name="pst" id="pst" class="form-control" value="{{ old('pst', $tax->pst_rate) }}">
            @error('pst')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <strong><label for="hst">HST</label></strong>
            <input type="text" name="hst" id="hst" class="form-control" value="{{ old('hst', $tax->hst_rate) }}">
            @error('hst')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Tax</button>
    </form>
</div>

@endsection
