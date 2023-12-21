<!-- resources/views/index.blade.php -->

@extends('layouts.adminpanel')

@section('content')
    <div class="container-fluid">
        <h1>Welcome to the Dashboard</h1>

        <div class="row mt-4 justify-content-around text-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-3 bg-info">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title text-white"><i class="bi bi-person" style="font-size: 2rem;"></i></h5>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text">{{$total_users}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-3 bg-info">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title text-white"><i class="bi bi-box" style="font-size: 2rem;"></i></h5>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">Total Products</h5>
                                <p class="card-text">{{$total_products}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-3 bg-info">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <h5 class="card-title text-white"><i class="bi bi-tags" style="font-size: 2rem;"></i></h5>
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">Total Categories</h5>
                                <p class="card-text">{{$total_categories}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        
    </div>
@endsection
