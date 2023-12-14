<!-- resources/views/profile/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-4">

        <!-- Sidebar -->
        <div class="col-md-3 mt-5 ">
            <div class="list-group d-flex flex-column">
            <a href="/edituserprofile" class="list-group-item list-group-item-action">Edit Profile</a>
                <a href="#" class="list-group-item list-group-item-action">My Orders</a>
                <a href="/wishlist" class="list-group-item list-group-item-action">My Wishlist</a>
                <a href="{{ route('change-password') }}" class="list-group-item list-group-item-action">Change Password</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <h2 class="heading">Edit Profile</h2>
            <div class="card">

                <div class="card-body">
                <form action="{{ route('userprofile.update') }}" method="POST">
                @csrf
    @method('PATCH')

                        <div class="mb-3">
                            <label for="name" class="form-label"><strong>Name:</strong></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label"><strong>Email:</strong></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="contact_no" class="form-label"><strong>Contact Number:</strong></label>
                            <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{ auth()->user()->contact_no }}">
                        </div>

                        <div class="mb-3">
                            <label for="address_line_1" class="form-label"><strong>Address Line 1:</strong></label>
                            <input type="text" class="form-control" id="address_line_1" name="address_line_1" value="{{ auth()->user()->address_line_1 }}">
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label"><strong>City:</strong></label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->city }}">
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label"><strong>Country:</strong></label>
                            <input type="text" class="form-control" id="country" name="country" value="{{ auth()->user()->country }}">
                        </div>

                        <div class="mb-3">
                            <label for="postal_code" class="form-label"><strong>Postal Code:</strong></label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ auth()->user()->postal_code }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
