<!-- resources/views/index.blade.php -->

@extends('layouts.adminpanel')

@section('content')
    <div class="container-fluid">
        <h1>Welcome to the Dashboard</h1>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">1</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text">2</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Categories</h5>
                        <p class="card-text">3</p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
@endsection
