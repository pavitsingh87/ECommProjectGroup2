

@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row p-4">
         <!-- Sidebar -->
         <div class="col-md-3 mt-5 ">
            <div class="list-group d-flex flex-column">
            <a href="/edituserprofile" class="list-group-item list-group-item-action">Edit Profile</a>
                <a href="#" class="list-group-item list-group-item-action">My Orders</a>
                <a href="#" class="list-group-item list-group-item-action">Wishlist</a>
                <a href="{{ route('change-password') }}" class="list-group-item list-group-item-action">Change Password</a>
            </div>
        </div>
        <div class="col-md-9">
            <h2 class="heading">Change Password</h2>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password:</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password:</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password:</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
