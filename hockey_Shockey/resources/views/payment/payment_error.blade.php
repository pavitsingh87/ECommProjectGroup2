<!-- resources/views/payment_error.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Payment Failed / Pending</h4>
            <p>{{ session('error_message', 'An error occurred during payment. Please try again.') }}</p>
        </div>
    </div>
@endsection
