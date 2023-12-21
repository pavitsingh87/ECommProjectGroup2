<!-- resources/views/admin/users/show.blade.php -->

@extends('layouts.adminpanel')

@section('content')
    <h1>User Details</h1>

    <div class="card">
        <div class="card-body">
            <h3><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></h3>

            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Username:</strong> {{ $user->user_name }}</p>
            <p class="card-text"><strong>Address Line 1:</strong> {{ $user->address_line_1 }}</p>
            <p class="card-text"><strong>Address Line 2:</strong> {{ $user->address_line_2 }}</p>
            <p class="card-text"><strong>City:</strong> {{ $user->city }}</p>
            <p class="card-text"><strong>Country:</strong> {{ $user->country }}</p>
            <p class="card-text"><strong>Postal Code:</strong> {{ $user->postal_code }}</p>
            <p class="card-text"><strong>Role:</strong> {{ $user->role_id == 1 ? 'Admin' : 'User' }}</p>
            <!-- Add more fields as needed -->

            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users</a>
        </div>
    </div>
@endsection
