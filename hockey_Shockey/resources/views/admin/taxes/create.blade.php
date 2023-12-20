<!-- resources/views/admin/taxes/create.blade.php -->

@extends('layouts.adminpanel')

@section('content')

<div class="container">
    <h1>Create Tax</h1>

    <form action="{{ route('admin.taxes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="province">Province</label>
            <input type="text" name="province" id="province" class="form-control" value="{{ old('province') }}" required>
            @error('province')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="gst">GST</label>
            <input type="text" name="gst" id="gst" class="form-control" value="{{ old('gst') }}" required>
            @error('gst')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="pst">PST</label>
            <input type="text" name="pst" id="pst" class="form-control" value="{{ old('pst') }}" required>
            @error('pst')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="hst">HST</label>
            <input type="text" name="hst" id="hst" class="form-control" value="{{ old('hst') }}" required>
            @error('hst')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Tax</button>
    </form>
</div>

@endsection
