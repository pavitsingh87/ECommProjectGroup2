@extends('layouts.main')




@section('content')




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Wonders Galleries</div>

                <div class="card-body">

               <h1>{{ $title}}</h1>
               <form action="/admin/update" method="POST" class="form" novalidate>
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{ $wonder->id }}">
                    <div class="form-group mb-3">
                        <label for="Name">Name</label>
                        <input type="text" name="Name" class="form-control"  value="{{ old('Name') ?? $wonder->Name }}">
                        @error('Name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="YearBuilt">Built Year</label>
                        <input type="number" name="YearBuilt" class="form-control"  value="{{ old('YearBuilt') ?? $wonder->YearBuilt }}">
                        @error('YearBuilt')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="Description">Description</label>
                        <textarea name="Description" class="form-control">{!! old('Description') ?? $wonder->Description !!}</textarea>
                        @error('Description')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="HeightInMeters">HeightInMeters</label>
                        <input type="text" name="HeightInMeters" class="form-control" value="{{ old('HeightInMeters') ?? $wonder->HeightInMeters }}">
                        @error('HeightInMeters')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="Location">Location</label>
                        <input type="text" name="Location" class="form-control" value="{{ old('Location') ?? $wonder->Location }}">
                        @error('Location')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="text" name="image" class="form-control" value="{{ $wonder->image }}">
                        @error('image')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection