<!-- resources/views/users/index.blade.php -->

@extends('layouts.main')

@section('content')
    <h1>Users</h1>

    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route('users.index', $user) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
@endsection
