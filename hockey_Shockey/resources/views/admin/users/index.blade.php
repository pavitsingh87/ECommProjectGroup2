@extends('layouts.adminpanel')

@section('content')
    <h1>Users List</h1>

    <a href="{{ route('admin.users.create') }}" class="btn btn-success">Add User</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
@endsection
