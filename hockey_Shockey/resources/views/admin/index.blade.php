<!-- resources/views/index.blade.php -->

@extends('layouts.adminpanel')

@section('content')
    <div class="container-fluid">
        <h1>Welcome to the Dashboard</h1>

        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">{{$total_users}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text">{{$total_products}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Categories</h5>
                        <p class="card-text">{{$total_categories}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Taxes</h5>
                        <p class="card-text">{{$total_taxes}}</p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
@endsection
