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
                        <p class="card-text">2</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Categories</h5>
                        <p class="card-text">3</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Taxes</h5>
                        <p class="card-text">4</p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
@endsection
