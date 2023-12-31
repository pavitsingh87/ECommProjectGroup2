@extends('layouts.adminpanel')

@section('content')
    <h1>Create User</h1>

    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary ">Back to Users</a>
    <form method="post" action="{{ route('admin.users.store') }}" novalidate>
        @csrf

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
        
            @error('first_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
        
            @error('last_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                <label class="form-check-label" for="male">Male</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="other" value="Other" {{ old('gender') == 'Other' ? 'checked' : '' }}>
                <label class="form-check-label" for="other">Other</label>
            </div>
        
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
        
            @error('date_of_birth')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="user_name" class="form-label">Username</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}">
        
            @error('user_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contact_no" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{ old('contact_no') }}">
        
            @error('contact_no')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address_line_1" class="form-label">Address Line 1</label>
            <input type="text" class="form-control" id="address_line_1" name="address_line_1" value="{{ old('address_line_1') }}">
            
            @error('address_line_1')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address_line_2" class="form-label">Address Line 2 (optional)</label>
            <input type="text" class="form-control" id="address_line_2" name="address_line_2" value="{{ old('address_line_2') }}">
        
            @error('address_line_2')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
        
            @error('city')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}">
        
            @error('country')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="postal_code" class="form-label">Postal Code (R2P 1N8)</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code') }}">
        
            @error('postal_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select class="form-select" id="role_id" name="role_id" required>
                <option value="" selected disabled>Select Role</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
                <!-- Add more role options as needed -->
            </select>
        
            @error('role_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>

     
@endsection